<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylee1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>
<script type="text/javascript"> 
  	function show() {
        // âûâîäèì ñîîáùåíèÿ â áëîê #messages
        $.ajax({
            url: 'message.php',
            timeout: 10000, // âðåìÿ îæèäàíèÿ çàãðóçêè ñîîáùåíèé 10 ñåêóíä (èëè 10000 ìèëëèñåêóíä)
            success: function(data) {
                $('#chat').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    
    function send() {
       
        var message = $('#message').val(); // ñîîáùåíèå
        
        if(message.length > 0) { // ïðîâåðêà ïîëåé "Èìÿ" è "Ñîîáùåíèå"
            $.ajax({
                url: 'message.php',
                type: 'post',
                timeout: 10000, // âðåìÿ îæèäàíèÿ îòïðàâêè ñîîáùåíèÿ 10 ñåê.
                data: {'message': message},
                success: function(data) {
                    document.getElementById('message').value = ""; // óäàëÿåì ñîäåðæèìîå ïîëÿ "Ñîîáùåíèå", åñëè ñîîáùåíèå áûëî óñïåøíî îòïðàâëåíî
                    $('#send_message_result').html("");
                },
                error: function() {
                    $('#send_message_result').html("error");
                }
            });
        } else if(message.length == 0) {
            $('#send_message_result').html("Введите сообщение");
        }
    }
    
    //var interval = 1000; // êîëè÷åñòâî ìèëëèñåêóíä äëÿ àâòî-îáíîâëåíèÿ ñîîáùåíèé (1 ñåêóíäà = 1000 ìèëëèñåêóíä)
    
    //show();
    
    setInterval('show()', interval);
    function search() {
       //var search = $('#search').val();
       $.ajax({
            url: 'book.php',
            timeout: 10000, // âðåìÿ îæèäàíèÿ çàãðóçêè ñîîáùåíèé 10 ñåêóíä (èëè 10000 ìèëëèñåêóíä)
           data: "search="+$('#search').val(),
                success: function(data) {
                $('#book').html(data);
            },
            error: function() {
                $('#messages').html("11");
            }
        });
    }
    //setInterval('search()', interval);
</script>

<br><br>
<textarea  id="message" placeholder="Сообщение"></textarea><br>
    
    <input type="submit" class="btn btn-outline-succes my-2 my-sm-0" onclick="send();" value="Отправить">
    <br><br>

    <div id="send_message_result"></div>
    
    <div id="messages"></div>
    <div id="chat"></div>