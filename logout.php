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
