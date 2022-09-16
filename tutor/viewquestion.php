<?php if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_tutorLogin'])){
    $tutorlogemail=$_SESSION['tuemail'];
}
?>

<div class="tform" style="width:60%">
    <?php
$QID=$_GET['QUIZ_ID'];
    $sql="SELECT QUIZ_NAME FROM quiz where QUIZ_ID='".$QID."'";
    $result= $conn->query($sql);
    $row = $result ->fetch_assoc()
    ?>

    <h2 style="text-align:center; text-decoration:underline"><?php echo $row['QUIZ_NAME']?></h2><br><br>
<?php

$QID=$_GET['QUIZ_ID'];
$sql= "SELECT * FROM addques where QUIZ_ID='".$QID."'";
$result= $conn->query($sql);
$q=0;
if($result -> num_rows >0){
    while($row = $result ->fetch_assoc()){ 
           $q++;
           echo '<form action="" id="de"  method="POST" class="d-inline">
           <input type="hidden" name="id" value='.$row["ADDQ_ID"].'>
           <button
           type="submit" 
           class="btn btn-secondary "
           name="delete"
           value="delete"
           style="background-color:gray;">
           <img height="20px" src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/>
           </button>
           </form>';
            echo'<h4>Q'.$q.'. '. $row['QUIZ_QNO'].'</h4> <br>';
            echo'<h6>1) '.$row['OP_1'].'</h6>';
            echo'<h6>2) '.$row['OP_2'].'</h6>';
            echo'<h6>3) '.$row['OP_3'].'</h6>';
            echo'<h6>4) '.$row['OP_4'].'</h6>';
            echo'<br>';
            echo'<h6 style="color:#0CAAA5; font-size: 18px;"> <b>Correct Option: '.$row['OP_C'].'</b></h6><br>';
            echo'<hr>';
            echo'<br>';
           
        }}
        else{
            echo '<h4 class="text-center">0 questions</h4>';
        }



        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM addques WHERE ADDQ_ID ={$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
            } else{
                echo 'Unable to Delete Data';
            }
        
        }

?>
</div>

