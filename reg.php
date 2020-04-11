<?php 
require __DIR__ .'/db.php';
class User {
public static function reg() {
$db = Db::getConnection();

if(isset($_POST['submit'])){
	$email = htmlspecialchars($_POST['email']);
	$login = htmlspecialchars($_POST['login']);
	$password = sha1(htmlspecialchars($_POST['password']));
	$log = $db->query("SELECT * FROM user WHERE login = '$login'");
	$mail = $db->query("SELECT * FROM user WHERE email = '$email'");
	$errors = [];
	if(trim($_POST['login']) == ''){
		$errors[] = 'Введите login' ;
	}
	if(trim($_POST['password']) == ''){
		$errors[] = 'Введите password';
	if(trim($_POST['email']) == ''){
		$errors[] = 'Введите email';
	}
	}
	if(empty($errors)){
		if($log->fetchColumn() == 0 and $mail->fetchColumn() == 0){
		$res = $db->prepare("INSERT INTO user(id, login, password, email, datte, img) VALUES (?, ?, ?, ?, ?, ?)");
		$time = date('d/m/Y H:i');
		$img = 'img/papa.jpg';
		$res->execute([null, $login, $password, $email, $time, $img]);
		echo '<p style="color:white"; font-size:36;> Вы зарегстрированы! можете авторизоваться </p>';
	}else {
		echo '<p style="color:red"; font-size:36;> Такой логин или email уже зарегистрирован </p>';
	}}
		else {
			echo '<p style="color:red"; font-size:36;>' .array_shift($errors). '</p>';
		}

}
}}
User::reg();


 ?>
 <!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Регистрация</title>
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
     <p>
      <label for="login">Email</label>
      <input type="email" name="email" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" name="submit"class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="index.php"> Авторизоваться  </a></p>
    <p class="forgot-password"></p> </form>       
</body>
</html>
