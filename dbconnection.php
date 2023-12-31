<?php
$db_host = "e-tutoring-server.mysql.database.azure.com";
$db_username = "sspqalqiky";
$db_password = "4PGD5Z6O4O2P756W$";
$db_name = "e_tutoring";

// create connection
$conn = new mysqli($db_host,$db_username,$db_password,$db_name);


//check connection

if($conn-> connect_error){
    die("connection failed");
}

?>
