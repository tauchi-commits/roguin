<?php
session_start();
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
<h1 class="Headline"> ログイン成功❕<br>ようこそ!<?=htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'utf-8')?>さん</br></h1>
<a href='/logout.php'>ログアウトはこちら。</a>
</body>
</html>