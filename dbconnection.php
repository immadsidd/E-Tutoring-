<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "e_tutoring";

// create connection
$conn = new mysqli($db_host,$db_username,$db_password,$db_name);


//check connection

if($conn-> connect_error){
    die("connection failed");
}

?>