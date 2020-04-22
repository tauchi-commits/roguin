<?php
session_start();
if (!isset($_POST['send'])) {
  $erros[]="直接完了画面にアクセスしないでください";
}
$username=$_POST['username'];
$password=$_POST['password'];



if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{5,100}+\z/i', $_POST['password'])) {
  } else {
    $erros[]= 'パスワードは半角英数字をそれぞれ1文字以上含んだ5文字以上で設定してください。';
  }

  if (empty($username)) {  // 値が空のとき
     $erros[]= 'ユーザー名が未入力です。';
  }
  if(isset($erros)){
    $_SESSION['erros']=$erros;
    header('Location: signUP.php'); // 入力画面へのリダイレクト
    exit;
  };

$db_host ='127.0.0.1';// サーバーのホスト名
$db_name ='userDeta';// データベース名
$db_user ='user';      // データベースのユーザー名
$db_pass ='password';// データベースのパスワード
try {
     $pdo = new PDO('mysql:host=127.0.0.1;dbname=userDeta', $db_user,$db_pass);
     $stmt = $pdo->prepare("INSERT INTO userdeta(name, password) VALUES (?, ?)");
     $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
     $userid= $pdo->lastinsertid();
     $signUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。パスワードは '.$_POST['password']. ' です。';  // ログイン時に使用するIDとパスワード
} catch (PDOException $e) {
    exit('データベース接続失敗 ' . $e->getMessage());
}

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

</head>
<body>
<p class="signUp"><?=htmlspecialchars($signUpMessage, ENT_QUOTES);?></p>
<a href=signUp.php>戻る</a>
</body>
</html>
