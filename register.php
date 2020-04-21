<?php
session_start();
if (!isset($_POST['send'])) {
  $erros[]="直接完了画面にアクセスしないでください";
}
$username=$_POST['username'];
$password=$_POST['password'];



if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{5,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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
     $signUpMessage='登録が完了しました。あなたの登録IDは '. $userid. ' です。passwordは '. $_POST['password']. ' です。';  // ログイン時に使用する名前とパスワード
} catch (PDOException $e) {
    exit('データベース接続失敗 ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ログイン画面</title>

</head>
<body>
<?=htmlspecialchars($signUpMessage, ENT_QUOTES);?>
<a href=signUp.php>戻る</a>
</body>
</html>
