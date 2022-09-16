<?php 
if(!isset($_SESSION)){
    session_start();
}

include('head_side.php');

include_once('../dbconnection.php');
if(isset($_REQUEST['qsubmitBtn'])){
    //checking for empty fields
if((($_REQUEST['QUIZ_NAME'] == "")||($_REQUEST['QUIZ_NO'] == "")||($_REQUEST['COURSE_ID'] == "")||($_REQUEST['COURSE_NAME'] == ""))){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
    }
    else{
        $QUIZ_NAME=$_REQUEST['QUIZ_NAME'];
        $QUIZ_NO=$_REQUEST['QUIZ_NO'];
        $COURSE_ID=$_REQUEST['COURSE_ID'];
        $COURSE_NAME=$_REQUEST['COURSE_NAME'];
        $QUIZ_QUES=$_REQUEST['QUIZ_QUES'];

    
    $sql ="INSERT INTO quiz (QUIZ_NAME, QUIZ_NO, QUIZ_QUES, COURSE_ID, COURSE_NAME) VALUES('$QUIZ_NAME','$QUIZ_NO','$QUIZ_QUES','$COURSE_ID','$COURSE_NAME')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Quiz added sucessfully</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add Quiz</div>';
    }
}
   
}
?>

<div >
    <h3 class="text-center"> Make Quiz</h3>
    <div class="adform">
        <form action="" method="POST" >
        
        <label for="COURSE_ID">Course ID</label>
        <input type="text" class="form-control" id="COURSE_ID" 
        name="COURSE_ID" value ="<?php if(isset($_SESSION['COURSE_ID'])){echo $_SESSION['COURSE_ID'];} ?>" readonly> 

        <label for="COURSE_NAME">Course Name</label>
        <input type="text" class="form-control" id="COURSE_NAME" 
        name="COURSE_NAME" value ="<?php if(isset($_SESSION['COURSE_NAME'])){echo $_SESSION['COURSE_NAME'];} ?>" readonly> 

        <label for="QUIZ_NAME">Quiz Name</label>
        <input type="text" class="form-control" id="QUIZ_NAME" name="QUIZ_NAME"> 
 
        <input type="radio" id="QUIZ_NO1" name="QUIZ_NO" value="NOT_LAST">
        <label for="QUIZ_NO1">Not Last</label><br>
        <input type="radio" id="QUIZ_NO2" name="QUIZ_NO" value="LAST">
        <label for="QUIZ_NO2">Last Quiz</label><br>

        <label for="QUIZ_QUES">Total Questions</label>
        <input type="number" min="5" max="40" class="form-control" id="QUIZ_QUES" name="QUIZ_QUES">
        <br><br>
   
    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="qsubmitBtn" name="qsubmitBtn">Submit</button>
        <a href="quiz.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;}?>

</form>
    </div>

</div>
</div>
