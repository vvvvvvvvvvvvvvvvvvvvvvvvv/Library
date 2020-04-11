
    function show() {
        // âûâîäèì ñîîáùåíèÿ â áëîê #messages
        $.ajax({
            url: 'show.php',
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
        
        if(message.length >  ) { // ïðîâåðêà ïîëåé "Èìÿ" è "Ñîîáùåíèå"
            $.ajax({
                url: 'send.php',
                type: 'POST',
                timeout: 10000, // âðåìÿ îæèäàíèÿ îòïðàâêè ñîîáùåíèÿ 10 ñåê.
                data: {'sender': sender, 'message': message},
                success: function(data) {
                    document.getElementById('message').value = ""; // óäàëÿåì ñîäåðæèìîå ïîëÿ "Ñîîáùåíèå", åñëè ñîîáùåíèå áûëî óñïåøíî îòïðàâëåíî
                    $('#send_message_result').html("");
                },
                error: function() {
                    $('#send_message_result').html("Íå óäàëîñü îòïðàâèòü ñîîáùåíèå");
                }
            });
        } else if(message.length == 0) {
            $('#send_message_result').html("Ââåäèòå ñîîáùåíèå!");
        }
    }
    
    var interval = 1000; // êîëè÷åñòâî ìèëëèñåêóíä äëÿ àâòî-îáíîâëåíèÿ ñîîáùåíèé (1 ñåêóíäà = 1000 ìèëëèñåêóíä)
    
    show();
    
    setInterval('show()', interval);
    