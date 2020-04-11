<?php 
if(empty($_COOKIE['id'])){
	echo 'Сначала войдите в аккаунт!';
	die;
}
 require __DIR__ .'/header.php';
//require __DIR__ .'/db.php';
require_once __DIR__ .'/avatarka.php';
	class Myaccount{
		function cookie() {
		if(isset($_POST['submit'])){
		 unset($_COOKIE['id']);
		 setcookie('id', $user['id'], time() - (60*60*24*30) );
		 header('Location: index.php');

		}
	}
		function file() {
		if(isset($_FILES['file'])) {
     
      $check = avatar::can_upload($_FILES['file']);
    
      if($check === true){
        
        avatar::make_upload($_FILES['file']);
        echo "<strong></strong>";
      }
      else{
        echo "<strong>$check</strong>";  
      }
    }
	}
	function call() {
		$this->cookie();
		$this->file();
		$this->user();
	}
	function user() {
		$user = Db::userdata();
		echo '<img src="'.$user['img'].'" width="200" height="200"', '<div style="font-size: 20px;>'.$user['login']. '</div>';
	}
	} 
	$obj = new Myaccount;
	$obj->call();



 ?>
 <form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" class="login">
<input class="btn btn-outline-succes my-2 my-sm-0" type="submit" name="submit" value="Выйти из Аккаунта"></form>
<form method="post" enctype="multipart/form-data">
      <input class="btn btn-outline-succes my-2 my-sm-0" type="file" name="file" value="Выберите аватарку">
      <input class="btn btn-outline-succes my-2 my-sm-0" type="submit" value="Загрузить ">
    </form>