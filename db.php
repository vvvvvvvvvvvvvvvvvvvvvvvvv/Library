<?php  class Db
{

		public static function getConnection()
		{
			$paramsPath = __DIR__ .'/routes.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
		}
		public static function getData($table){
			$db = Db::getConnection();
			$cookie = $_COOKIE['id'];

			$res = $db->query("SELECT * FROM $table WHERE id='$cookie'");
			return $res->fetch();
		}
		public static function insert_data() {

		}
		public static function userdata(){
$cookie_id =  $_COOKIE['id'];
$db = Db::getConnection();
$res = $db->query("SELECT * FROM user WHERE id='$cookie_id'");
	return $res->fetch();
}
	/*public static function massage(){
		
		$sender = Db::userdata();
		$text = $_POST['message'];
		$sender = $sender['login'];
	$db = Db::getConnection();
	$res = $db->prepare("INSERT INTO ajax(id, textt, sender) VALUES (?, ?, ?)");
	$res->execute([null, $text, $sender]);
	$res = $db->query("SELECT * FROM ajax");
	while($data = $res->fetch()){;
	echo $sender, $data['sender'] .'<br>';

	}}*/
}
//$obj = Db::massage();
?>