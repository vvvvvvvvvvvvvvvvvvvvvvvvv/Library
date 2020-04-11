<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/styleform.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/uniform.css" media="screen" rel="stylesheet" type="text/css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>
<body>

<div class="TTWForm-container">
     
     
          
          <div class="TTWForm">
          <div id="field1-container" class="field f_100">
               <label for="field1">
                    Имя
               </label>
               <input name="mame" id="field1" required="required" type="text">
          </div>
          
          <div id="field3-container" class="field f_100">
               <label for="field3">
                    Оставить отзыв
                    
               </label>
               <textarea rows="5" cols="20" name="message" id="field3" required="required"></textarea>
          </div>
          
         <button type="submit" id="send"  class="btn btn-outline-succes my-2 my-sm-0">Отравить</button>
          <div id="comment"></div>
  </div>
</div>
<br><br><br><br><br><br>
</body>
</html>
<script type="text/javascript">
$('#send').click(function(){
    var name = $('#field1').val();
     var message = $('#field3').val();
     var user_id = <? echo $_COOKIE['id']?>;
     var book_id = <? echo $_COOKIE['book_id'];
     ?>;
     if(message.length > 0 || name.lenght > 0){
    $.ajax({
      url: 'comm.php',
      type: 'POST',
      data: {'name': name, 'message': message, 'user_id': user_id, 'book_id': book_id},
      dataType: 'json',
      success: function() {
           
         // alert("yes");
      },
      error: function() {
        
    }
 });
  }});
function showcom() {
       
        $.ajax({
            url: 'comm.php',
            //timeout: 10000, 
            success: function(data) {
                $('#comment').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    var interval = 1000; 
    
   
    
    setInterval('showcom()', interval);
          </script>
         