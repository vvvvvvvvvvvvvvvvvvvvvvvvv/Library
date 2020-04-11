<?php 
require __DIR__ .'/db.php';
class dislake{
	function dislike(){
		 $bookidd = $_POST['bookid'];//Это вообще что такое
		 $userid = $_POST['userid'];//Это вообще что такое
		 $db = Db::getConnection();
		 $bookid = $_COOKIE['book_id'];
		 $id = $_COOKIE['id'];
		
	

		 $dislike = $db->query("SELECT * FROM dislake WHERE user_id = '$userid' AND book_id = '$bookid'");

		 $dislake = $db->query("SELECT * FROM dislake WHERE book_id = '$bookid' ORDER BY id DESC LIMIT 1 ");
		 $dislake = $dislake->fetch();
		 $dislake = $dislake['dislake'];
		
		 echo  ' '.$dislake;

		if($dislike->fetchColumn() == 0){
		
		$res = $db->prepare("INSERT INTO dislake(id, dislake, book_id, user_id) VALUES (?, ?, ?, ?)");
		//$dislake = $res3['dislake'];
		//echo $dislake;
		//$dislake = $dislake + 1;
		$res->execute([null, $dislake + 1, $bookidd, $userid]);

}
}}
$obj = new dislake;
$obj->dislike();



 ?>