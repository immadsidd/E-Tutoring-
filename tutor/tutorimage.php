<?php
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
}


$tutorlogemail = $_SESSION['tuemail'];
    $sql="SELECT TUTOR_IMG FROM tutor WHERE TUTOR_EMAIL= '$tutorlogemail'";
    $result= $conn ->query($sql);
    $row= $result->fetch_assoc();
    $TUTOR_IMG=$row['TUTOR_IMG'];

?>