<?php
if(!isset($_SESSION)){
    session_start();
}
include('stuheader.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_Login'])){
    $stulogemail=$_SESSION['email'];
}

?>
<?php
if(isset($_REQUEST['sfbbtn'])){
    $F_CONTENT=$_REQUEST["F_CONTENT"];
    $F_TUTOR=$_REQUEST["COURSE_AUTHOR"];
    $STU_ID=$_REQUEST["STU_ID"];
    $sql="INSERT INTO feedback (F_CONTENT,STU_ID,T_NAME) VALUES ('$F_CONTENT','$STU_ID','$F_TUTOR')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> thanks for your feedback</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add content</div>';
    }
}

?>

<form action="" class="fb">
    <label for="checkid">Enter course ID:</label>
    <input type="text" id="checkid" name="checkid">
    <button type="submit" class="btn btn-danger" > search</button>

</form>

<?php 
$sql= "SELECT COURSE_ID FROM courses";
$result= $conn->query($sql);
while($row =$result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['COURSE_ID']){
        $sql="SELECT * FROM courses where COURSE_ID ={$_REQUEST['checkid']}";
        $result= $conn->query($sql);  
        $row =$result->fetch_assoc();
        if(($row['COURSE_ID']) == $_REQUEST['checkid']){
            $_SESSION['COURSE_ID'] = $row['COURSE_ID'];
            $_SESSION['COURSE_NAME'] = $row['COURSE_NAME'];
            $_SESSION['COURSE_AUTHOR'] = $row['COURSE_AUTHOR'];
    
        ?>
        <div class="adform">
        <form action="" method="POST" enctype="multipart/form-data">
        <label for="COURSE_ID">Course ID</label>
        <input type="text" class="form-control" id="COURSE_ID" name="COURSE_ID" value="<?php if(isset($row['COURSE_ID'])){echo $row['COURSE_ID'];} ?>" readonly> 
        <label for="COURSE_NAME">COURSE NAME</label>
        <input type="text" class="form-control" id="COURSE_NAME" name="COURSE_NAME" value="<?php if(isset($row['COURSE_NAME'])){echo $row['COURSE_NAME'];} ?>" readonly> 
        <label for="COURSE_AUTHOR">Course Author</label>
        <input type="text" class="form-control" id="COURSE_AUTHOR" name="COURSE_AUTHOR" value="<?php if(isset($row['COURSE_AUTHOR'])){echo $row['COURSE_AUTHOR'];} ?>" readonly> 
        <?php
        $sql="SELECT * FROM student WHERE STU_EMAIL='$stulogemail'";
        $result=$conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $STU_ID=$row["STU_ID"];
        }
        ?>
        <label for="STU_ID">STUDENT ID</label>
        <input type="text" class="form-control" id="STU_ID" name="STU_ID" value="<?php if(isset($row['STU_ID'])){echo $row['STU_ID'];} ?>" readonly> 

        <label for="F_CONTENT">WRITE FEEDBACK</label>
        <input type="text" class="form-control" id="F_CONTENT" name="F_CONTENT" >

        <button type="submit" class="btn btn-primary" name="sfbbtn" id="sfbbtn">Submit</button>
        <?php if(isset($msg)){echo $msg;}?>


        </form>
    </div>
    <?php   }
   
}
}
?>
