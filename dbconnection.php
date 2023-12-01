<?php
    $db_host = "dbd.mysql.database.azure.com";
    $db_username = "Immad";
    $db_password = "ETutoring123!";
    $db_name = "e_tutoring";

// create connection
    $conn = new mysqli($db_host,$db_username,$db_password,$db_name, 3306);


//check connection

     if($conn-> connect_error){
         die("connection failed");
     }

?>

