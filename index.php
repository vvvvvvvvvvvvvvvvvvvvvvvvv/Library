<?php
require __DIR__ .'/db.php';
/*if(isset($_COOKIE['id'])){
   header('Location: content2.php');
}*/
class Reg {
public static function aut() {
$db = Db::getConnection();

if(isset($_POST['submit'])){
  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);
 if(!empty($login) && !empty($password)) {
     $res = $db->query("SELECT id, login FROM user WHERE login = '$login' AND password = sha1('$password')");
      if($res->rowCount() == 1) {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        setcookie('id', $row['id'], time() + (60*60*24*30));
         /*$id = $row['id'];
         $l = $row['login'];
        $_SESSION['user'] = ['login' => '$l','id' => '$id'];*/

                     //. $_SERVER['HTTP_HOST'];
        header('Location: content2.php');
      }
      else {
        echo '<p style=color:red>Извините, вы должны ввести правильные имя пользователя и пароль</p>';
      }
    }
    else {
      echo 'Извините вы должны заполнить поля правильно';
    }
}
}}
Reg::aut();

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Авторизация</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<!-- vladmaxi top bar -->
    <div class="vladmaxi-top">
        
    <div class="clr"></div>
    </div>
<!--/ vladmaxi top bar -->

  <form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" class="login">
    <p>
      <label for="login">Логин:</label>
      <input type="text" name="login" id="login" value="">
    </p>

    <p>
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" name="submit"class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="reg.php"> Зарегестрироваться </a></p>
    <p class="forgot-password"></p> </form>       
</body>
</html>