<?php 
require __DIR__ .'/db.php';
require __DIR__ .'/avatarka.php';
//require __DIR__ .'/script.js';


if(empty($_COOKIE['id'])){
	echo 'Доступ запрещен!';
	die;
}
class Profil {
	public static function userdata(){
$cookie_id =  $_COOKIE['id'];
$db = Db::getConnection();
$res = $db->query("SELECT * FROM user WHERE id='$cookie_id'");
	return $res->fetch();
}
	function cookie() {
		if(isset($_POST['submit'])){
		 unset($_COOKIE['id']);
		 //setcookie('id', '', -1, '/');
		 setcookie('id', $user['id'], time() - (60*60*24*30) );
		 header('Location: index.php');

		}
	}
  function get_book(){

$db = Db::getConnection();

$res = $db->query("SELECT * FROM book WHERE name LIKE '%$name%'");
while($row = $res->fetch()){
  echo  '<div class="bookimage"><img  src="'.$row['image'].'">'. $row['name'].'<br><a download href="'.$row['src'].'"> Скачать </a> </div>'  ;


}}
function category(){
  $db = Db::getConnection();
  $res = $db->query("SELECT * FROM category");
  while($row = $res->fetch()){
    echo $row['categoty'];
}

}
	function file() {
		if(isset($_FILES['file'])) {
     
      $check = avatar::can_upload($_FILES['file']);
    
      if($check === true){
        
        avatar::make_upload($_FILES['file']);
        echo "<strong>Файл успешно загружен!</strong>";
      }
      else{
        echo "<strong>$check</strong>";  
      }
    }
	}

	public  function getdata() {
		//$user = $this->userdata();
		$this->cookie();
		//$this->mess();
		$this->get_book();
		$this->file();
		$user = $this->userdata();
		$img = $user['img'];
		//echo '<img src="'.$img.'" heght="100">';
		//echo  $user['login'],'<br>'. $user['email'];
		//$this->comment();
		
		
		
		
	}
  
	/*public function mess(){
		if(isset($_POST['sub'])){
			
			$db = Db::getConnection();
			$log = $this->userdata();
			$login = $log['login'];
			$text = $_POST['text'];
			$reg = $db->prepare("INSERT INTO messeg(id, login, messeg, vremy) VALUES (?, ?, ?, ?)");
			$time = date('d/m/Y H:i');
			$reg->execute([null, $login, $text, $time]);
			}}

		function comment(){
			$db = Db::getConnection();
			$res = $db->query("SELECT * FROM messeg LIMIT 10");
			while($row = $res->fetch()){
				echo '<br>'.$row['login'],'-' .$row['messeg']. '- '.$row['vremy'];
			 
		}
		}*/
	}


  $obj = new  Profil;
//$obj->getdata(); ?>
 <!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylee1.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    
  	<script type="text/javascript"> 
  	/*function show() {
        // âûâîäèì ñîîáùåíèÿ â áëîê #messages
        $.ajax({
            url: 'message.php',
            timeout: 10000, // âðåìÿ îæèäàíèÿ çàãðóçêè ñîîáùåíèé 10 ñåêóíä (èëè 10000 ìèëëèñåêóíä)
            success: function(data) {
                $('#chat').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    
    function send() {
       
        var message = $('#message').val(); // ñîîáùåíèå
        
        if(message.length > 0) { // ïðîâåðêà ïîëåé "Èìÿ" è "Ñîîáùåíèå"
            $.ajax({
                url: 'message.php',
                type: 'post',
                timeout: 10000, // âðåìÿ îæèäàíèÿ îòïðàâêè ñîîáùåíèÿ 10 ñåê.
                data: {'message': message},
                success: function(data) {
                    document.getElementById('message').value = ""; // óäàëÿåì ñîäåðæèìîå ïîëÿ "Ñîîáùåíèå", åñëè ñîîáùåíèå áûëî óñïåøíî îòïðàâëåíî
                    $('#send_message_result').html("");
                },
                error: function() {
                    $('#send_message_result').html("error");
                }
            });
        } else if(message.length == 0) {
            $('#send_message_result').html("Введите сообщение");
        }
    }
    
    var interval = 1000; // êîëè÷åñòâî ìèëëèñåêóíä äëÿ àâòî-îáíîâëåíèÿ ñîîáùåíèé (1 ñåêóíäà = 1000 ìèëëèñåêóíä)
    
    show();
    
    setInterval('show()', interval);
    function search() {
       //var search = $('#search').val();
       $.ajax({
            url: 'book.php',
            timeout: 10000, // âðåìÿ îæèäàíèÿ çàãðóçêè ñîîáùåíèé 10 ñåêóíä (èëè 10000 ìèëëèñåêóíä)
           data: "search="+$('#search').val(),
                success: function(data) {
                $('#book').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    //setInterval('search()', interval);*/
</script>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a href="#">
  			<img src="<?php $image = $obj->userdata();
  			echo $image['img']; ?>" width="35" height="35">
  		</a>
  		<div class="collapse navbar-collapse" >
  			
  			<ul class="navbar-nav mr-auto">
  				<li class="nav-item active"><a href="#" class="nav-link">Главная</a></li>
  				<li class="nav-item "><a href="myaccount.php" class="nav-link">Мой аккаунт</a></li>
          <br>
  				<li class="nav-item "><a href="program.php" class="nav-link">Програмирование</a></li>
          <li class="nav-item "><a href="#" class="nav-link">Бизнес</a></li>
          <li class="nav-item "><a href="#" class="nav-link">Психология</a></li>


  			</ul>
  		</div>
  		<form class="form-inline my-2 my-lg-0" name="search" action="book.php" method="post">
        <input class="form-control mr-sm-2" id="search" oninput="search()" type="text" name="search">
        <input class="btn btn-outline-succes my-2 my-sm-0" type="submit" name="sebmit-serch" value="Поиск">
    </form>
      
    </nav>
    
 

    
    
    
  
 
    
    


    

<?php $obj->getdata(); ?>


    </div>
<br><br>
<textarea  id="message" placeholder="Сообщение"></textarea><br>
    
    <input type="submit" class="btn btn-outline-succes my-2 my-sm-0" onclick="send();" value="Отправить">
    <br><br>

    <div id="send_message_result"></div>
    
    <div id="messages"></div>
    <div id="chat"></div>
     <div id="book"></div>
