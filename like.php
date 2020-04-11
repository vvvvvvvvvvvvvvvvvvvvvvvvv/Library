<?php 

require_once __DIR__ .'/db.php';

class like 
{
	
	function lake()
	{
		 $bookid = $_POST['bookid'];//Это вообще что такое
		 $userid = $_POST['userid'];//Это вообще что такое
		 $db = Db::getConnection();
		 $bookid = $_COOKIE['book_id'];
		 $id = $_COOKIE['id'];
		

		 $lake = $db->query("SELECT * FROM lake WHERE user_id = '$userid' AND book_id = '$bookid'");
		 $like = $db->query("SELECT * FROM lake WHERE book_id = '$bookid' ORDER BY id DESC LIMIT 1 ");
		 $like = $like->fetch();
		 	$like = $like['lake'];
		 echo  ' '.$like;
		
		if($lake->fetchColumn() == 0){
		
		$res = $db->prepare("INSERT INTO lake(id, user_id, book_id, lake, dislake) VALUES (?, ?, ?, ?, ?)");
		$res->execute([null, $userid, $bookid, $like + 1, 0]);
		$res3 = $db->query("SELECT * FROM lake WHERE book_id = '$bookid'");
		$res3 = $res3->fetch();
		$lake2 = $res3['lake'];
		$lake2 = $lake2 + 1;

		//echo $lake2;
		
		//$res2 = $db->query("UPDATE books SET lake = $lake2 WHERE id = '$bookid'");
		
	}
	
}
}
$obj = new like;

$obj->lake();