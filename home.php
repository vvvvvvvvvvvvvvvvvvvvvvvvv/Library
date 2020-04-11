<?php 
require __DIR__ .'/content.php';
$obj->getdata();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a href="#">
  			<img src="<?php $image = $obj->userdata();
  			echo $image['img']; ?>" width="35" height="35">
  		</a>
  		<div class="collapse navbar-collapse" >
  			
  			<ul class="navbar-nav mr-auto">
  				<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
  				<li class="nav-item "><a href="#" class="nav-link">My account</a></li>
  				<li class="nav-item "><a href="#" class="nav-link">Reg</a></li>

  			</ul>
  		</div>
  		<form class="form-inline my-2 my-lg-0" name="search" action="user.php" method="post">
				<input class="form-control mr-sm-2" type="text" name="user">
				<input class="btn btn-outline-succes my-2 my-sm-0" type="submit" name="sebmit-serch" value="Поиск">
    	</form>
    	<form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" class="login">
<button type="submit" name="submit" class="login-button">Выйти</button></form>
  	</nav>
    <h1>Hello, world!</h1>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
 <form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" class="login">
<button type="submit" name="submit"class="login-button">Выйти из аккаунта</button></form>
    <form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" class="login">
    <textarea id="message" name="text" placeholder="Сообщение"></textarea><br><br>
    
    <input type="submit" name="sub" value="Отправить"><br><br></form>

    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Загрузить файл!">
    </form>

    <form name="search" action="user.php" method="post">
		<p>	
				<input type="text" name="user">
				<input type="submit" name="sebmit-serch" value="Поиск">
    		</p>
    	</form>
    	</body>
</html>