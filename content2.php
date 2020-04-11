<?php 
if(!isset($_COOKIE)){
	header('Location: index.php');
}
require __DIR__ .'/header.php';

class Book extends Profil {
	  function get_book(){

$db = Db::getConnection();

$res = $db->query("SELECT * FROM books");
while($row = $res->fetch()){
  echo  "<div class='bookimage'><a href='product.php?id=$row[id]'><img  src='".$row['img']."'></a>". $row['name']."<br><a download href='".$row['src']."'> Скачать </a> </div>"  ;
}
$res2 = $db->query("SELECT * FROM books WHERE category = 'program' LIMIT 4");
while($row2 = $res->fetch()){
  echo  '<div class="bookimage"><img  src="'.$row['img'].'">'. $row['name'].'<br><a download href="'.$row['src'].'"> Скачать </a> </div>'  ;
}}


}
$obj3 = new Book;
$obj3->get_book();


require __DIR__ .'/chatt.php';
?>
<br>
<?
require __DIR__ .'/footer.php';

 ?>
