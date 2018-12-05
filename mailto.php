<?php
session_start();
define("TOKEN_FIELD_NAME", 'csrf_token');
define('CSRF_TOKEN_EXPIRE', 30 * 60); // 30m
// define('CSRF_TOKENS', 5);

function readConfig()
{
    $mode = getopt('mode');
    if ($mode === 'prod') {
        return parse_ini_file('./config/prod.ini');
    } else {
        return parse_ini_file('./config/devel.ini');
    }
}

function checkToken($session, $post)
{
    return (
        !empty($_SESSION[TOKEN_FIELD_NAME]) &&
        $_SESSION[TOKEN_FIELD_NAME] === $_POST[TOKEN_FIELD_NAME] &&
        $_SESSION['csrf_generated_at'] - $_SERVER['REQUEST_TIME'] < CSRF_TOKEN_EXPIRE
    );
}

function checkReferer($host)
{
    $url = parse_url($_SERVER['HTTP_REFERER']);
    return $host === $url['host'];
}

function sanitize($str)
{
    $str = trim($str);
    $str = stripslashes($str);
    $str = h($str);
    return $str;
}

function validateName($name)
{
    if ($name === '') {
        return "Empty name string";
    }
    return '';
}

function validateEmail($email)
{
    $emailSep = explode('@', $email);
    $regExp = "/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-zA-Z]+(\.[!#%&\-_0-9a-zA-Z]+)+$/";
    if (preg_match($regExp, $email) && count($emailSep) == 2) {
        return '';
    } else {
        return 'Invalid email address';
    }
}

function mailToMe($addressFrom, $name, $senderEmail, $message, $myEmail)
{
    $subject = "[{$name}]お問い合わせ";
    $message = "<html>
            <body>
                <p>{$name}</p>
                <p>{$senderEmail}</p>
                <p>{$message}</p>
            </body>
        </html>";
    $headers = '';
    $headers .= 'From: ' . $addressFrom;
    $headers .= '\r\n';
    $headers .= 'Content-type: text/html; charset=UTF-8';
    $wasSuccessful = mail($myEmail, $subject, $message, $headers);
    if (!$wasSuccessful) {
        return error_get_last()['message'];
    }
    return '';
}

function mailToSender($addressFrom, $name, $email, $message)
{
    $subject = "[村岡宏是]お問い合わせありがとうございます";
    $message = "<html>
            <body>
                <p>
                    ==========================================<br>
                    このメールは自動配信されております。<br>
                    セキュリティ対策のため、返信は他のgmailアドレスから行います。<br>
                    返信まで今しばらくお待ち下さい。<br>
                    なお、村岡からの返信前に追加のメッセージがある場合は、<br>
                    このメールに返信していただいて構いません。<br>
                    ==========================================<br>
                </p>
                <h2>
                    {$name} 様
                </h2>
                <p>
                    この度はお問い合わせいただきまして、誠にありがとうございます。<br>
                    以下の内容でメッセージを送信しておりますので、ご確認ください。<br>
                </p>
                <p>
                    ------------------------------------------<br>
                    [お名前] {$name}<br>
                    [アドレス] {$email}<br>
                    [メッセージ]<br>
                    {$message}
                    ------------------------------------------<br>
                </p>
                <p>
                    村岡 宏是<br>
                    Hiroshi Muraoka
                </p>
            </body>
        </html>";
    $headers = '';
    $headers .= 'From: ' . $addressFrom;
    $headers .= '\r\n';
    $headers .= 'Content-type: text/html; charset=UTF-8';
    $wasSuccessful = mail($email, $subject, $message, $headers);
    if (!$wasSuccessful) {
        return error_get_last()['message'];
    }
    return '';
}

function sendResponse($statusCode, $body)
{
    header('Content-type: application/json');
    http_response_code($statusCode);
    echo json_encode($body);
    return json_last_error() === JSON_ERROR_NONE;
}

function sendResponseMessage($statusCode, $message)
{
    $body = array("message" => $message);
    return sendResponse($statusCode, $body);
}

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

// mode
$config = readConfig();
$host = $config['hostname'];
$referer = $config['referer'];
$addressFromServer = $config['addressFromServer'];
$myEmail = $config['myEmail'];

// security
if (!checkToken($_SESSION, $_POST)) {
    sendResponseMessage(401, 'Invlalid Form token was sent');
    exit;
}
unset($_POST[TOKEN_FIELD_NAME]);

if (!checkReferer($referer)) {
    sendResponseMessage(401, 'Form was sent from invalid referer ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// sanitize
$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$message = sanitize($_POST['message']);

// validation
$validationError = array();

$errorName = validateName($name);
if ($errorName !== '') {
    $validationError['name'] = $errorName;
}

$errorMail = validateEmail($email);
if ($errorMail !== '') {
    $validationError['email'] = $errorMail;
}

if (count($validationError) > 0) {
    $valMessage = "";
    foreach ($validationError as $k => $v) {
        $valMessage = $valMessage . $k . ': ' . $v . ' ';
    }
    $valMessage = trim($valMessage);
    sendResponse(422, $valMessage);
    exit;
}

// // send mail
if (mailToMe($addressFromServer, $name, $email, $message, $myEmail) !== '') {
    sendResponse(501, 'Failed to send email to admin');
    exit;
}

if (mailToSender($addressFromServer, $name, $email, $message) !== '') {
    sendResponse(501, 'Failed to send confirmation email to you');
    exit;
}

if (sendResponseMessage(200, 'Form was sent successfully')) {
    unset($_SESSION[TOKEN_FIELD_NAME]);
    exit;
}
