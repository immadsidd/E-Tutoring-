<?php
define("DB_SERVER", "dbd.mysql.database.azure.com");
define("DB_USERNAME", "Immad");
define("DB_PASSWORD", "ETutoring123!");
define("DB_NAME", "e_tutoring");

# Connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
