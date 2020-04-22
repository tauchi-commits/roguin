<?php
session_start();
   if(isset($_SESSION['erros'])){
    $errors=$_SESSION['erros'];//入力エラーを変数に格納するため
   }
   if(isset($_SESSION['erross'])){
    $errorss= $_SESSION['erross'];
   }
?>
<!DOCTYPE html>
<html lang="ja">
 <head>
     <meta charset="utf-8">
     <title>Login</title>
    <link  href="assets/css/style.css"  rel="stylesheet" media="all"  />

 </head>
<body>
<?php if ( isset( $_SESSION['name'] ) ):  ?>
  <p><br><?='ようこそ' . htmlspecialchars( $_SESSION['name'], ENT_QUOTES, 'utf-8' )?>さん</br></p>
  <a href='/logout.php'>ログアウトはこちら。</a>
  <?= exit; ?> 
<?php endif ?>

<h1 class="Headline">ようこそ、ログインしてください。</h1>
<form  action="roguin.php" method="post">
<?php if ( isset($errorss) ):  ?>
  <?php foreach ($errorss as $error):?>
     <p class="error"><?=htmlspecialchars( $error, ENT_QUOTES, 'utf-8' )//入力エラーの表示?></p>
  <?php endforeach;?>
<?php endif ?>
<div class="cp_iptxt">
     <br><label for="userID">userID</label></br>
     <br><input type="text" name="userid">
     <br><label for="password">password</label></br>
     <br><input type="text" name="password"></br>
</div>
    <div class ="button-center"> <input type="submit" name="send" value="Sign in!" class="button"></div>
</form>
   <h1 class="Headline">初めての方はこちら</h1>
   <form action="register.php" method="post">
<?php if ( isset($errors) ):  ?>
     <?php foreach ($errors as $error):?>
      <p class="error"><?=htmlspecialchars( $error, ENT_QUOTES, 'utf-8' )//入力エラーの表示?></p>
     <?php endforeach;?>
<?php endif ?>
<div class="cp_iptxt">
    <br><label for="username">名前</label></br>
    <br><input type="text" name="username"></br>
    <br><label for="password">password</label></br>
    <br><input type="text" name="password"></br>
</div>
<div class ="button-center"><input type="submit" name="send" value="Sign Up!" class="button"></div>
     <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、5文字以上で設定してください。</p>
     <a href="logout.php">ログアウト</a>
   </form>
 </body>
</html>








