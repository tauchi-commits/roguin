<?php
session_start();

if (!isset($_POST['send'])) {
  $erross[]="直接完了画面にアクセスしないでください";
}
$db_host ='127.0.0.1';// サーバーのホスト名
$db_name ='userDeta';// データベース名
$db_user ='user';      // データベースのユーザー名
$db_pass ='password';// データベースのパスワード
$userid=$_POST['userid'];
$password=$_POST['password'];

if (empty($userid)){  // 値が空のとき
  $erross[]='ユーザーIDが未入力です。';
}
if (empty($password)){ // 値が空のとき
  $erross[]='passwordが未入力です。';
}
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=userDeta', $db_user,$db_pass);
    $stmt = $pdo->prepare('SELECT * FROM userdeta WHERE id = ?');
    $stmt->execute(array($userid));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//fetch(PDO::FETCH_ASSOC)は連想配列で行を取り出す
    if ( password_verify($password, $row['password'] )) {
        session_regenerate_id(true);
        $_SESSION['name']=$row['name']; // 入力したIDのユーザー名を取得
        echo "ログインに成功しました";
    }else{
      $erross[]="ログインに失敗しました";
    }
} catch (PDOException $e) {
   exit('データベース接続失敗 ' . $e->getMessage());
}

if(isset($erross)){
  $_SESSION['erross']=$erross;
  header('Location: signUP.php'); // 入力画面へのリダイレクト
  exit;
};

?>