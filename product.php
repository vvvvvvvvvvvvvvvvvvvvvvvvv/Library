<?php 
$id = $_GET['id'];
setcookie('book_id', $id, time() + (60*60*24*30));
require __DIR__ .'/header.php';
//require __DIR__ .'/script2.js';
class Product {
  function get() {
  	$db = Db::getConnection();
  $id = $_GET['id'];
  //  setcookie('book_id', $id, time() + (60*60*24*30));

$res = $db->query("SELECT * FROM books WHERE id=$id");
$row = $res->fetch();
  echo  "<div class='product'><img  src='".$row['img']."'>". $row['name']."<br><a download href='".$row['src']."'><input class='btn btn-outline-succes my-2 my-sm-0' type='submit' name='sebmit-serch' value='Скачать ''></a> </div> <br>"  ;
  ;?>
<div class="col-md-12">
  
<button  class="btn btn-primary button-like" id="like">
  Мне нравиться <span  id="cha" class="glyphicon glyphicon-thumbs-up"> </span>
</button>

<button id="dislake"  class="btn btn-primary button-unlike">
Мне не нравиться <span id="dislike" class="glyphicon glyphicon-thumbs-down"> </span>
</button>

</div>
<?
  echo "<div class='text'> ".$row['description']."</div>";

 }


}
$obj4 = new Product;
$obj4->get();
$id = $_GET['id'];


$user_id = $_COOKIE['id'];
?>

<?
require __DIR__ .'/form_comment.php';
require __DIR__ .'/footer.php';

 ?>
 <script type="text/javascript">
 

  $('#like').click(function(){
    var bookid = <? echo $id ?>; //Так делать нельзя гов код
    var userid = <? echo $user_id ?>; //Так делать нельзя гов код
    $.ajax({
      url: 'like.php',
      type: 'POST',
      data: {'bookid': bookid, 'userid': userid},
      dataType: 'json',
      success: function() {
           
          //alert("yes");
      },
      error: function() {
        
    }
    });

  });
  $('#dislake').click(function(){
    var bookid = <? echo $id ?>; //Так делать нельзя гов код
    var userid = <? echo $user_id ?>; //Так делать нельзя гов код
    $.ajax({
      url: 'dislake.php',
      type: 'POST',
      data: {'bookid': bookid, 'userid': userid},
      dataType: 'json',
      success: function() {
           
         // alert("yes");
      },
      error: function() {
        
    }
 });
  });


    function show() {
       
        $.ajax({
            url: 'like.php',
            //timeout: 10000, 
            success: function(data) {
                $('#cha').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    var interval = 1000; 
    
   
    
    setInterval('show()', interval);
    function show2() {
       
        $.ajax({
            url: 'dislake.php',
            //timeout: 10000, 
            success: function(data) {
                $('#dislike').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    var interval = 1001; 
    
   
    
   setInterval('show2()', interval);
 </script>
 <div id='cha'></div>
 <div id="send_message_result"></div>
 <?
 ?>