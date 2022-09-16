<?php 
if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');

if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['COURSE_ID'] == "")||($_REQUEST['COURSE_NAME'] == "")||($_REQUEST['COURSE_CAT'] == "")||($_REQUEST['COURSE_DESC'] == "")
    ||($_REQUEST['COURSE_AUTHOR'] == "")||($_REQUEST['COURSE_DURATION'] == "")||($_REQUEST['COURSE_PRICE'] == "")){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
        }else{
            $cid=$_REQUEST['COURSE_ID'];
            $cname=$_REQUEST['COURSE_NAME'];
            $ccat=$_REQUEST['COURSE_CAT'];
            $cdesc=$_REQUEST['COURSE_DESC'];
            $cduration=$_REQUEST['COURSE_DURATION'];
            $cprice=$_REQUEST['COURSE_PRICE'];
            $COURSE_IMG= $_FILES['COURSE_IMG']['name'];
            $COURSE_IMG_temp=$_FILES['COURSE_IMG']['tmp_name'];
            $img_folder ='../image/courseimg/'.$COURSE_IMG;
            move_uploaded_file($COURSE_IMG_temp, $img_folder);
    

            $sql ="UPDATE courses SET COURSE_ID='$cid', COURSE_NAME=' $cname' , COURSE_CAT='$ccat',COURSE_DESC='$cdesc',COURSE_DURATION= '$cduration',COURSE_PRICE='$cprice',COURSE_IMG='$img_folder' WHERE COURSE_ID='$cid'";
            if ($conn-> query($sql) == TRUE){
            $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> COURSE update sucessfully</div>';
        }
        else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to update COURSE</div>';
    }
            
        }}
?>


<div >
    <h3 class="text-center"> UPDATE COURSE</h3>
    <?php
     if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM courses WHERE COURSE_ID ={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM courses WHERE COURSE_ID ={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }

    ?>
    <div class="adform">
    <form action="" method="POST" enctype="multipart/form-data">
        
        <b><label for="COURSE_id">Course ID</label></b>
        <input type="text" class="form-control" id="COURSE_ID" name="COURSE_ID" value="<?php if(isset($row['COURSE_ID'])){echo $row['COURSE_ID'];} ?>" readonly> 
        
        <b><label for="COURSE_AUTHOR">Course Author</label></b>
        <input type="text" class="form-control" id="COURSE_AUTHOR" 
        name="COURSE_AUTHOR" value="<?php 
        $tutorlogemail = $_SESSION['tuemail'];
        $sql ="SELECT TUTOR_NAME  from tutor where TUTOR_EMAIL= '".$tutorlogemail."'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            $row = $result ->fetch_assoc();{
            echo $row['TUTOR_NAME'];
            }
        } ?>" readonly> 

        <?php
          if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM courses WHERE COURSE_ID ={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
         ?>
        <b><label for="COURSE_NAME">Course Name</label></b>
        <input type="text" class="form-control" id="COURSE_NAME"   name="COURSE_NAME" value="<?php if(isset($row['COURSE_NAME'])){echo $row['COURSE_NAME'];} ?>"> 
    
        <b><label for="COURSE_CAT">Course Category</label></b>
        <?php
        $sql ="SELECT * FROM category";
        $result = $conn->query($sql);
        if($result -> num_rows >0){?>

            <select id="COURSE_CAT" name="COURSE_CAT">
            <option>Select Option</option>
                <?php  while($row = $result ->fetch_assoc()){
            echo '<option value="'.$row['CAT_NAME'].' ">'.$row['CAT_NAME'].'</option>';}}?>   
            </select>
            <?php
          if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM courses WHERE COURSE_ID ={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
         ?>
            <b><label for="COURSE_DESC">Course Description</label></b>
        <textarea class="form-group" id="COURSE_DESC" name="COURSE_DESC"
        row=2><?php if(isset($row['COURSE_DESC'])){echo $row['COURSE_DESC'];} ?></textarea>

       
   
        <b><label for="COURSE_DURATION">Course Duration</label></b>
        <input type="text" class="form-control" id="COURSE_DURATION" 
        name="COURSE_DURATION"
        value="<?php if(isset($row['COURSE_DURATION'])){echo $row['COURSE_DURATION'];} ?>"> 
  
        <b><label for="COURSE_PRICE">Course price</label></b>
        <input type="text" class="form-control" id="COURSE_PRICE" 
        name="COURSE_PRICE" value="<?php if(isset($row['COURSE_PRICE'])){echo $row['COURSE_PRICE'];} ?>" > 
 
       <b><label for="COURSE_IMG">Course Image</label></b>
        <img  src="<?php if(isset($row['COURSE_IMG'])){echo $row['COURSE_IMG'];} ?>  " alt="" class="img"><br>
        <input type="file" class="form-control-file" id="COURSE_IMG" 
        name="COURSE_IMG">
        <br><br>
        
    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="requpdate" name="requpdate">Update</button>
        <a href="Courses.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;}?>

</form>
    </div>

</div>
</div>