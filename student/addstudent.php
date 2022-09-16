<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');
//Checking email if already registered
if(isset($_POST['checkmail']) && isset($_POST['stuemail'])){
    $stuemail= $_POST['stuemail'];
    $sql="SELECT STU_EMAIL FROM student WHERE STU_EMAIL = '".$stuemail."'";
    $result= $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

if(isset($_POST['stusignup'])&& isset($_POST['stuname'])&& isset($_POST['stuemail'])&& isset($_POST['stupass'])){

   $stuname= $_POST['stuname'];
   $stuemail= $_POST['stuemail'];
   $stupass= $_POST['stupass'];

   $sql = "INSERT INTO student(STU_DATE,STU_NAME, STU_EMAIL, STU_PASS) VALUES(current_timestamp(),'$stuname', '$stuemail', '$stupass')";


if ($conn-> query($sql)== TRUE){
    echo json_encode("ok");
}
else{
    echo json_encode("failed");
}
}


// student login verification
if (!isset($_SESSION['is_login'])){
    if(isset($_POST['check']) &&isset($_POST['stulogemail']) &&isset($_POST['stulogpass']) )
{
    $stulogemail =$_POST['stulogemail'];
    $stulogpass =$_POST['stulogpass'];

    $sql ="SELECT STU_EMAIL, STU_PASS  from student where STU_EMAIL= '".$stulogemail."' AND STU_PASS= '".$stulogpass."'";
    $result=$conn->query($sql);
    $row =$result->num_rows;

    if($row==1){
        $_SESSION['is_Login']=true;
        $_SESSION['email']=$stulogemail;
        echo json_encode($row);
    }
    else if($row ===0){
        echo json_encode($row);
    }
} 
}


?>