<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');
if(isset($_POST['checkmail']) && isset($_POST['tutoremail'])){
    $tutoremail= $_POST['tutoremail'];
    $sql="SELECT TUTOR_EMAIL FROM tutor WHERE TUTOR_EMAIL = '".$tutoremail."'";
    $result= $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}
if(isset($_POST['tutorsignup'])&& isset($_POST['tutorname'])&& isset($_POST['tutoremail'])&& isset($_POST['tutorpass'])){

   $tutorname= $_POST['tutorname'];
   $tutoremail= $_POST['tutoremail'];
   $tutorpass= $_POST['tutorpass'];

   $sql = "INSERT INTO tutor(TUTOR_DATE,TUTOR_NAME, TUTOR_EMAIL, TUTOR_PASS) VALUES(current_timestamp(),'$tutorname', '$tutoremail', '$tutorpass')";


if ($conn-> query($sql)== TRUE){
    echo json_encode("ok");
}
else{
    echo json_encode("failed");
}
}


// tutor login verification
if (!isset($_SESSION['is_tutorLogin'])){
    if(isset($_POST['check']) &&isset($_POST['tutorlogemail']) &&isset($_POST['tutorlogpass']) )
{
    $tutorlogemail =$_POST['tutorlogemail'];
    $tutorlogpass =$_POST['tutorlogpass'];

    $sql ="SELECT TUTOR_EMAIL, TUTOR_PASS  from tutor where TUTOR_EMAIL= '".$tutorlogemail."' AND TUTOR_PASS= '".$tutorlogpass."'";
    $result=$conn->query($sql);
    $row =$result->num_rows;

    if($row==1){
        $_SESSION['is_tutorLogin']=true;
        $_SESSION['tuemail']=$tutorlogemail;
        echo json_encode($row);
    }
    else if($row ===0){
        echo json_encode($row);
    }
} 
}


?>