<?php
session_start();
if (isset($_SESSION["name"])) {
  echo 'Logoutしました。';
} else {
  echo 'SessionがTimeoutしました。';
}
if (ini_get("session.use_cookies")) {//cookie値があるなら
    $params = session_get_cookie_params();//セッションクッキーのパラメータを取得します。
    setcookie(session_name(), '', time() - 42000,//cokkieの削除時間
        $params["path"], $params["domain"],//情報が保存されている場所のパス クッキーのドメイン
        $params["secure"], $params["httponly"]// クッキーはセキュアな接続でのみ送信されます。 クッキーは HTTP を通してのみアクセス可能となります。
    );
}
$_SESSION = array();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ログイン画面</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link  href="assets/css/style.css"  rel="stylesheet" media="all"  />
  <body>
  <a href=signUp.php>戻る</a>
  </body>
</html>