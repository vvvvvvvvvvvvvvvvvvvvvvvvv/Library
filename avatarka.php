<?php
class avatar{
  public static function can_upload($file){
    if($file['name'] == '')
		return '';
	
	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
 public static function make_upload($file){	
	//$name = mt_rand(0, 10000) . $file['name'];
	$name =  $file['name'];
	copy($file['tmp_name'], 'img/' . $name);
	$link = 'img/' . $name ;
	$db = Db::getConnection();
	$cookie_id =  $_COOKIE['id'];
	$res = $db->query("UPDATE user SET img = '$link' WHERE id = '$cookie_id'");

  }}