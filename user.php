<?php 
require __DIR__ .'/db.php';
class search{

public static function user_search() {
$db = Db::getConnection();
$request = $_POST['user'];
$res = $db->query("SELECT * FROM user WHERE login LIKE '%$request%'  ");
while($user = $res->fetch()){
//if($user->rowCount() != 0){
	//$res = $db->query("SELECT * FROM user WHERE login LIKE '%$request%'  ");
	//$user =	$res->fetch();
	$img = $user['img'];
	echo $user['id'], $user['login'],'<img src="'.$img.'">' ;
	

//}
/*}
else {
	echo 'Такого пользователя не существует';
}*/}}
function chat_user(){
	$db = Db::getConnection();
	if(isset($_POST['submit-chat'])){
		$res = $db->prepare("INSERT INTO user_message(id, id_send, messages, id_assept) VALUES (?, ?, ?, ?)");
		$res->execute([null, $id_send, $messages, $id_assept]);
		$data = $this->user_saerch();
		echo $id_assept['id'];

}}


}
$obj1 = new search;

$obj1->user_search();


 ?>
 <form action="<? echo $_SERVER['PHP_SELF'] ?>">
				<input type="text" name="user_chat">
				<input type="submit" name="submit-chat" value="Отправить">
    		</p>
    	</form>
 <a href="chat.php"> Написать сообщение</a>
  