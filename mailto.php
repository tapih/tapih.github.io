<?php header("Content-Type:text/html;charset=utf-8");?>
<?php
if (version_compare(PHP_VERSION, '5.1.0', '>=')) { //PHP5.1.0以上の場合のみタイムゾーンを定義
    date_default_timezone_set('Asia/Tokyo'); //タイムゾーンの設定（日本以外の場合には適宜設定ください）
}
$site_top = "http://localhost/";
$to = "a_regular_customer@yahoo.co.jp";
$from = "xxxxxxxxxx@xxx.xxx";
$Email = "email";

//スパム防止のためのリファラチェック（フォーム側とこのファイルが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check_domain = "localhost";

// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください 例 $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "ホームページのお問い合わせ";

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。（相対パスでも基本的には問題ないです）
$thanksPage = "http://localhost/";

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです。
配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。*/
$require = array('name', 'email');

//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "送信ありがとうございました";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = 'name';

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

お問い合わせありがとうございました。
早急にご返信致しますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;

//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 0;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

──────────────────────
村岡 宏是(Hiroshi Muraoka)
#{site_top}
──────────────────────

FOOTER;

//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。特に理由がなければ変更しないで下さい。メール入力欄のname属性の値が上記「$Email」で指定した値である必要があります。
$mail_check = 1;

//機種依存文字の変換
/*たとえば㈱（かっこ株）や①（丸1）、その他特殊な記号や特殊な漢字などは変換できずに「？」と表示されます。それを回避するための機能です。
確認画面表示時に置換処理されます。「変換前の文字」が「変換後の文字」に変換され、送信メール内でも変換された状態で送信されます。（たとえば「㈱」の場合、「（株）」に変換されます）
必要に応じて自由に追加して下さい。ただし、変換前の文字と変換後の文字の順番と数は必ず合わせる必要がありますのでご注意下さい。*/

//変換前の文字
$replaceStr['before'] = array('①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨', '⑩', '№', '㈲', '㈱', '髙');
//変換後の文字
$replaceStr['after'] = array('(1)', '(2)', '(3)', '(4)', '(5)', '(6)', '(7)', '(8)', '(9)', '(10)', 'No.', '（有）', '（株）', '高');

//------------------------------- 任意設定ここまで ---------------------------------------------

// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = "UTF-8"; //このファイルの文字コード定義（変更不可）
if (isset($_GET)) {
    $_GET = sanitize($_GET);
}
//NULLバイト除去//
if (isset($_POST)) {
    $_POST = sanitize($_POST);
}
//NULLバイト除去//
if (isset($_COOKIE)) {
    $_COOKIE = sanitize($_COOKIE);
}
//NULLバイト除去//
if ($encode == 'SJIS') {
    $_POST = sjisReplace($_POST, $encode);
}
//Shift-JISの場合に誤変換文字の置換実行
// $funcRefererCheck = refererCheck($Referer_check_domain); //リファラチェック実行

//変数初期化
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm = '';
$header = '';

$requireResArray = requireCheck($require); //必須チェック実行し返り値を受け取る
$errm = $requireResArray['errm'];
$empty_flag = $requireResArray['empty_flag'];
//メールアドレスチェック
if (empty($errm)) {
    foreach ($_POST as $key => $val) {
        if ($val == "confirm_submit") {
            $sendmail = 1;
        }

        if ($key == $Email) {
            $post_mail = h($val);
        }

        if ($key == $Email && $mail_check == 1 && !empty($val)) {
            if (!checkMail($val)) {
                $errm .= "<p class=\"error_messe\">【" . $key . "】はメールアドレスの形式が正しくありません。</p>\n";
                $empty_flag = 1;
            }
        }
    }
}

if ($_SESSION['mailform_token'] == "" || $_SESSION['mailform_token'] !== $_POST['mailform_token']) {
    echo $_SESSION['mailform_token'];
    echo $_POST['mailform_token'];
    exit('ページ遷移が不正です');
}
if (isset($_SESSION['mailform_token'])) {
    unset($_SESSION['mailform_token']);
}
//トークン破棄
if (isset($_POST['mailform_token'])) {
    unset($_POST['mailform_token']);
}

//差出人に届くメールをセット
$userBody = mailToUser($_POST, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode);
$reheader = userHeader($refrom_name, $from, $encode);
$re_subject = "=?iso-2022-jp?B?" . base64_encode(mb_convert_encoding($re_subject, "JIS", $encode)) . "?=";
//管理者宛に届くメールをセット
$adminBody = mailToAdmin($_POST, $subject, $mailFooterDsp, $mailSignature, $encode);
$header = adminHeader($userMail, $post_mail, $BccMail, $to);
$subject = "=?iso-2022-jp?B?" . base64_encode(mb_convert_encoding($subject, "JIS", $encode)) . "?=";

//-fオプションによるエンベロープFrom（Return-Path）の設定(safe_modeがOFFの場合かつ上記設定がONの場合のみ実施)
// mail($to, $subject, $adminBody, $header);
// if (!empty($post_mail)) {
//     mail($post_mail, $re_subject, $userBody, $reheader);
// }

if ($empty_flag == 1) {?>
<div align="center"><h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
<?php
} else {header("Location: " . $thanksPage);}

// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function checkMail($str)
{
    $mailaddress_array = explode('@', $str);
    if (preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-zA-Z]+(\.[!#%&\-_0-9a-zA-Z]+)+$/", "$str") && count($mailaddress_array) == 2) {
        return true;
    } else {
        return false;
    }
}
function h($string)
{
    global $encode;
    return htmlspecialchars($string, ENT_QUOTES, $encode);
}
function sanitize($arr)
{
    if (is_array($arr)) {
        return array_map('sanitize', $arr);
    }
    return str_replace("\0", "", $arr);
}
//Shift-JISの場合に誤変換文字の置換関数
function sjisReplace($arr, $encode)
{
    foreach ($arr as $key => $val) {
        $key = str_replace('＼', 'ー', $key);
        $resArray[$key] = $val;
    }
    return $resArray;
}
//送信メールにPOSTデータをセットする関数
function postToMail($arr)
{
    $resArray = '';
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                //連結項目の処理
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');

        } else { $out = $val;} //チェックボックス（配列）追記ここまで
        if (get_magic_quotes_gpc()) {$out = stripslashes($out);}

        if ($out != "confirm_submit" && $key != "httpReferer") {
            $resArray .= "【 " . h($key) . " 】 " . h($out) . "\n";
        }
    }
    // $out = str_replace($replaceStr['before'], $replaceStr['after'], $out); //機種依存文字の置換処理
    return $resArray;
}

//配列連結の処理
function connect2val($arr)
{
    $out = '';
    foreach ($arr as $key => $val) {
        if ($key === 0 || $val == '') { //配列が未記入（0）、または内容が空のの場合には連結文字を付加しない（型まで調べる必要あり）
            $key = '';
        } elseif (strpos($key, "円") !== false && $val != '' && preg_match("/^[0-9]+$/", $val)) {
            $val = number_format($val); //金額の場合には3桁ごとにカンマを追加
        }
        $out .= $val . $key;
    }
    return $out;
}

//管理者宛送信メールヘッダ
function adminHeader($userMail, $post_mail, $BccMail, $to)
{
    $header = '';
    if ($userMail == 1 && !empty($post_mail)) {
        $header = "From: $post_mail\n";
        if ($BccMail != '') {
            $header .= "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $post_mail . "\n";
    } else {
        if ($BccMail != '') {
            $header = "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $to . "\n";
    }
    $header .= "Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr, $subject, $mailFooterDsp, $mailSignature, $encode)
{
    $adminBody = "「" . $subject . "」からメールが届きました\n\n";
    $adminBody .= "＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $adminBody .= postToMail($arr); //POSTデータを関数からセット
    $adminBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
    $adminBody .= "送信された日時：" . date("Y/m/d (D) H:i:s", time()) . "\n";
    $adminBody .= "送信者のIPアドレス：" . @$_SERVER["REMOTE_ADDR"] . "\n";
    // $adminBody .= "送信者のホスト名：" . getHostByAddr(getenv('REMOTE_ADDR')) . "\n";
    $adminBody .= "問い合わせのページURL：" . @$_SERVER['HTTP_REFERER'] . "\n";
    if ($mailFooterDsp == 1) {
        $adminBody .= $mailSignature;
    }

    return mb_convert_encoding($adminBody, "JIS", $encode);
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name, $to, $encode)
{
    $reheader = "From: ";
    if (!empty($refrom_name)) {
        $default_internal_encode = mb_internal_encoding();
        if ($default_internal_encode != $encode) {
            mb_internal_encoding($encode);
        }
        $reheader .= mb_encode_mimeheader($refrom_name) . " <" . $to . ">\nReply-To: " . $to;
    } else {
        $reheader .= "$to\nReply-To: " . $to;
    }
    $reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode)
{
    $userBody = '';
    if (isset($arr[$dsp_name])) {
        $userBody = h($arr[$dsp_name]) . " 様\n";
    }

    $userBody .= $remail_text;
    $userBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $userBody .= postToMail($arr); //POSTデータを関数からセット
    $userBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $userBody .= "送信日時：" . date("Y/m/d (D) H:i:s", time()) . "\n";
    if ($mailFooterDsp == 1) {
        $userBody .= $mailSignature;
    }

    return mb_convert_encoding($userBody, "JIS", $encode);
}
//必須チェック関数
function requireCheck($require)
{
    $res['errm'] = '';
    $res['empty_flag'] = 0;
    foreach ($require as $requireVal) {
        $existsFalg = '';
        foreach ($_POST as $key => $val) {
            if ($key == $requireVal) {

                //連結指定の項目（配列）のための必須チェック
                if (is_array($val)) {
                    $connectEmpty = 0;
                    foreach ($val as $kk => $vv) {
                        if (is_array($vv)) {
                            foreach ($vv as $kk02 => $vv02) {
                                if ($vv02 == '') {
                                    $connectEmpty++;
                                }
                            }
                        }

                    }
                    if ($connectEmpty > 0) {
                        $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                        $res['empty_flag'] = 1;
                    }
                }
                //デフォルト必須チェック
                elseif ($val == '') {
                    $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                    $res['empty_flag'] = 1;
                }

                $existsFalg = 1;
                break;
            }

        }
        if ($existsFalg != 1) {
            $res['errm'] .= "<p class=\"error_messe\">【" . $requireVal . "】が未選択です。</p>\n";
            $res['empty_flag'] = 1;
        }
    }

    return $res;
}
//リファラチェック
function refererCheck($Referer_check_domain)
{
    if (strpos($_SERVER['HTTP_REFERER'], $Referer_check_domain) === false) {
        return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
    }
}
//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>
