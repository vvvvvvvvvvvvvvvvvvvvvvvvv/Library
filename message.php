<?php  
require __DIR__ .'/db.php';
class data {
 function message(){
		
		$sender = Db::userdata();
		$text = $_POST['message'];
		$sender = $sender['login'];
	$db = Db::getConnection();
	$res = $db->prepare("INSERT INTO ajax(id, textt, sender) VALUES (?, ?, ?)");
	$res->execute([null, $text, $sender]);
	$res = $db->query("SELECT * FROM ajax");
	while($data = $res->fetch()){
	echo  $data['sender'], ':    '. $data['textt'] .'<br>';

	}
	}
}
	$obj = new data;
	$obj->message();