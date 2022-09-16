<?php 
if(!isset($_SESSION)){
    session_start();
    $_SESSION['QUIZ_ID']=$_GET['QUIZ_ID'];
}

include('head_side.php');

include_once('../dbconnection.php');
if(isset($_REQUEST['qsubmitBtn'])){
    //checking for empty fields
if((($_REQUEST['QUIZ_QNO'] == "")||($_REQUEST['OP_1'] == "")||($_REQUEST['OP_2'] == "")||($_REQUEST['OP_3'] == "")||($_REQUEST['OP_4'] == "")||($_REQUEST['OP_C'] == ""))){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
    }
    else{
        $QUIZ_QNO=$_REQUEST['QUIZ_QNO'];
        $QUIZ_ID=$_REQUEST['QUIZ_ID'];
        $OP_1=$_REQUEST['OP_1'];
        $OP_2=$_REQUEST['OP_2'];
        $OP_3=$_REQUEST['OP_3'];
        $OP_4=$_REQUEST['OP_4'];
        $OP_C=$_REQUEST['OP_C'];

    
    $sql ="INSERT INTO addques ( QUIZ_ID, QUIZ_QNO, OP_1, OP_2, OP_3, OP_4, OP_C) VALUES('$QUIZ_ID','$QUIZ_QNO','$OP_1','$OP_2','$OP_3','$OP_4','$OP_C')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2">   Question added sucessfully</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add Question</div>';
    }
}
   
}
?>

<div >
    <h3 class="text-center"> Add Questions To Quiz</h3>
    <div class="adform">
        <form action="" method="POST" >
        
        <label for="QUIZ_ID">Quiz ID</label>
        <input type="text" class="form-control" id="QUIZ_ID" 
        name="QUIZ_ID" value ="<?php if(isset($_GET['QUIZ_ID'])){echo $_GET['QUIZ_ID'];} ?>" readonly> 

        <label for="QUIZ_QNO">Question</label>
        <input type="text" class="form-control" id="QUIZ_QNO" name="QUIZ_QNO"> 
 
        <label for="OP_1">Option 1</label>
        <input type="text" class="form-control" id="OP_1" name="OP_1">

        <label for="OP_2">Option 2</label>
        <input type="text" class="form-control" id="OP_2" name="OP_2">

        <label for="OP_3">Option 3</label>
        <input type="text" class="form-control" id="OP_3" name="OP_3">

        <label for="OP_4">Option 4</label>
        <input type="text" class="form-control" id="OP_4" name="OP_4">

        <label for="OP_C">Correct Option</label>
        <input type="text" class="form-control" id="OP_C" name="OP_C">
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
