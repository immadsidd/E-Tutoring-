<?php
$db_host = "dbd.mysql.database.azure.com";
$db_username = "Immad";
$db_password = "ETutoring123!";
$db_name = "e_tutoring";

// create connection
// $conn = new mysqli($db_host,$db_username,$db_password,$db_name);
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $db_host, $db_username, $db_password, $db_name, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}


?>
