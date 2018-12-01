<?php
session_start();
define("TOKEN_FIELD_NAME", 'csrf_token');

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
    return !empty($_SESSION[TOKEN_FIELD_NAME]) && $_SESSION[TOKEN_FIELD_NAME] === $_POST[TOKEN_FIELD_NAME];
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

function mailToAdmin($addressFrom, $addressTo)
{
    $subject = 'TEST MAIL';
    $message = '<html><body>tapitapi</body></html>';
    $headers = '';
    $headers .= 'From: ' . $addressFrom;
    $headers .= '\r\n';
    $headers .= 'Content-type: text/html; charset=UTF-8';
    $wasSuccessful = mail($addressTo, $subject, $message, $headers);
    if (!$wasSuccessful) {
        return error_get_last()['message'];
    }
    return '';
}

function mailToServer($addressFrom, $addressTo)
{
    $subject = 'TEST MAIL';
    $message = '<html><body>tapitapi</body></html>';
    $headers = '';
    $headers .= 'From: ' . $addressFrom;
    $headers .= '\r\n';
    $headers .= 'Content-type: text/html; charset=UTF-8';
    $wasSuccessful = mail($addressTo, $subject, $message, $headers);
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
$addressToAdmin = $config['addressToAdmin'];
// echo $host;
// echo "\n";
// echo $referer;
// echo "\n";
// echo $addressFromServer;
// echo "\n";
// echo $addressToAdmin;
// echo "\n";

// security
if (!checkToken($_SESSION, $_POST)) {
    sendResponseMessage(401, 'Invlalid Form token was sent');
    exit;
}
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
if (mailToAdmin($addressFromServer, $addressToAdmin) !== '') {
    sendResponse(501, 'Failed to send mail to admin');
    exit;
}

if (mailToSender($addressFromServer, $email)) {
    sendResponse(501, 'Failed to send mail to sender');
    exit;
}

if (sendResponseMessage(200, 'Form was sent successfully')) {
    // unset($_SESSION[TOKEN_FIELD_NAME]);
    // unset($_POST[TOKEN_FIELD_NAME]);
    exit;
}
