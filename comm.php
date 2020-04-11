<?php 
require __DIR__ .'/db.php';
class comment {
	 function insert(){
		$text = $_POST['message'];
		$name = $_POST['name'];

		//$book_id = $_POST['book_id'];
		$book_id = $_COOKIE['book_id'];
		$user_id = $_POST['user_id'];
	$db = Db::getConnection();
	$res = $db->prepare("INSERT INTO comment(id, textt, name, book_id, user_id) VALUES (?, ?, ?, ?, ?)");
	$res->execute([null, $text, $name, $book_id , $user_id]);
}
	function select(){
		$bookid = $_COOKIE['book_id'];
		$db = Db::getConnection();
		$comment = $db->query("SELECT * FROM comment WHERE book_id = '$bookid' ORDER BY id DESC LIMIT 10 ");
		while ($comment1 = $comment->fetch()) {

			echo '<div class="comment">'.$comment1['textt']. '</div><br>';
		}
	}
}
$obj = new comment;
$obj->insert();
$obj->select();



 ?>