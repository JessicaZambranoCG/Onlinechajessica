<?php
  include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Php, MySql y Ajax</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type = "text/javascript">
      function ajax(){
           let request = new XMLHttpRequest();
           request.onreadystatechange = function() {
                  if (request.readyState == 4 && request.status == 200) {
                      document.getElementById('chat').innerHTML = request.responseText;
                  }
           }
           request.open('GET', 'chat.php', true);
           request.send();
      }
      setInterval(function(){ajax();}, 1000);
    </script>
</head>
<body onLoad ="ajax();">
    <div id="container">
      <div id="box-chat">
        <div id="chat"></div>
      </div>
      <form method="POST" action="index.php">
        <input type="text" name="name" placeholder="Enter your name">
        <textarea name="message" placeholder="Enter your message"></textarea>
        <input type="submit" name="send" value="SEND">
      </form>
      <?php
          if (isset($_POST['send'])) {
              $name = $_POST['name'];
              $message = $_POST['message'];
              $consultation = "INSERT INTO chat (name, message) VALUES ('$name', '$message')";
              $execute = $conection->query($consultation);
              if ($execute) {
                  echo "<embed loop = 'false' src = 'message-incoming.mp3' hidden = 'true' autoplay = 'true'>";
            }
        }
      ?>
    </div>
</body>
</html>