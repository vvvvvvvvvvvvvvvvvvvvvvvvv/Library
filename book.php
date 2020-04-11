<?php 
require __DIR__ .'/db.php';
echo $_POST['search'];
class book{
	function get_book(){
if(!empty($_POST['search'])){
	$name = $_POST['search'];
$db = Db::getConnection();

$res = $db->query("SELECT * FROM book WHERE name LIKE '%$name%'");
while($row = $res->fetch()){
	echo $row['name'];


}

}
}
}
$obj = new book;
$obj->get_book();
 ?>