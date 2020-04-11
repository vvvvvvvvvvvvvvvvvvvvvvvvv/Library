<?php 
require __DIR__ .'/user.php';
class chat{
	function avatar_user(){
$user = search::user_search();
$img = $user['img'];
	echo $user['id'], $user['login'],'<img src="'.$img.'">' ;
	}



/*function chat_user(){
	$db = Db::getConnection();
	if(isset($_POST['submit-chat'])){
		$res = $db->prepare("INSERT INTO user_message(id, id_send, messages, id_assept) VALUES (?, ?, ?, ?)");
		$res->execute([null, $id_send, $messages, $id_assept]);
		$data = $this->user_saerch();
		echo $id_assept['id'];

}}*/}
$obj = new chat;
$obj->avatar_user();
 ?>






 <form action="<? echo $_SERVER['PHP_SELF'] ?>">
				<input type="text" name="user_chat">
				<input type="submit" name="submit-chat" value="Отправить">
    		</p>
    	</form>