<?php
    include "db.php";
    $consultation = "SELECT * FROM chat ORDER BY id DESC";
    $execute = $conection->query($consultation);
    while($row = $execute->fetch_array()):
?>
            <div id="data-chat">
               <span class="color-name"><?php echo $row['name']; ?>: </span>
               <span class="color-greetings"><?php echo $row['message']; ?></span>
               <span class="hour"><?php echo formatDate($row['date']); ?></span>
            </div>
<?php endwhile; ?>