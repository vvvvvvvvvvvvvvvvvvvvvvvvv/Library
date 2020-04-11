<?php 
require __DIR__ .'/header.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/styleform.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/uniform.css" media="screen" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.tools.js"></script>
    <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

<div class="TTWForm-container">
     
     
     <form action="process_form.php" class="TTWForm" method="post" novalidate="">
          
          
          <div id="field1-container" class="field f_100">
               <label for="field1">
                    Имя
               </label>
               <input name="Name" id="field1" required="required" type="text">
          </div>
          
          
          <div id="field2-container" class="field f_100">
               <label for="field2">
                   Тема сообщения
               </label>
               <input name="Email_Address" id="field2" required="required" type="email">
          </div>
          
          
          <div id="field3-container" class="field f_100">
               <label for="field3">
                    Сообщение
               </label>
               <textarea rows="5" cols="20" name="Message" id="field3" required="required"></textarea>
          </div>
          
          
          <div id="form-submit" class="field f_100 clearfix submit">
               <input value="Отправить" type="submit">
          </div>
     </form>
</div>

</body>
</html>


<?php 
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
require __DIR__ .'/footer.php';
?>