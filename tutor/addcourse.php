<?php 
if(!isset($_SESSION)){
    session_start();
}

include('head_side.php');

include_once('../dbconnection.php');
if(isset($_REQUEST['coursesubmitBtn'])){
if(($_REQUEST['COURSE_NAME'] == "")||($_REQUEST['COURSE_CAT'] == "")||($_REQUEST['COURSE_DESC'] == "")
||($_REQUEST['COURSE_AUTHOR'] == "")||($_REQUEST['COURSE_DURATION'] == "")||($_REQUEST['COURSE_PRICE'] == "")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
    }
    else{
        $COURSE_NAME=$_REQUEST['COURSE_NAME'];
        $COURSE_CAT=$_REQUEST['COURSE_CAT'];
        $COURSE_DESC=$_REQUEST['COURSE_DESC'];
        $COURSE_AUTHOR=$_REQUEST['COURSE_AUTHOR'];
        $COURSE_DURATION=$_REQUEST['COURSE_DURATION'];
        $COURSE_PRICE=$_REQUEST['COURSE_PRICE'];
        $COURSE_IMG= $_FILES['COURSE_IMG']['name'];
        $COURSE_IMG_temp=$_FILES['COURSE_IMG']['tmp_name'];
        $img_folder ='../image/courseimg/'.$COURSE_IMG;
        move_uploaded_file($COURSE_IMG_temp, $img_folder);
    
    $sql ="INSERT INTO approval (AP_NAME, AP_CAT, AP_DESC, AP_AUTHOR, AP_IMG, AP_DURATION, AP_PRICE) VALUES('$COURSE_NAME','$COURSE_CAT','$COURSE_DESC','$COURSE_AUTHOR','$img_folder','$COURSE_DURATION',' $COURSE_PRICE')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Course added sucessfully</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add course</div>';
    }
}
   
}
?>

<div >
    <h3 class="text-center"> Add new course</h3>
    <div class="adform">
        <form action="" method="POST" enctype="multipart/form-data">
        
        <label for="COURSE_NAME">Course Name</label>
        <input type="text" class="form-control" id="COURSE_NAME" 
        name="COURSE_NAME"> 

        <label for="COURSE_CAT">Course Category</label>
        <?php
        $sql ="SELECT * FROM category";
        $result = $conn->query($sql);
        if($result -> num_rows >0){?>

            <select id="COURSE_CAT" name="COURSE_CAT">
            <option>Select Option</option>
                <?php  while($row = $result ->fetch_assoc()){
            echo '<option value="'.$row['CAT_NAME'].' ">'.$row['CAT_NAME'].'</option>';}}?>   
            </select>

        <label for="COURSE_DESC">Course Description</label>
        <textarea class="form-group" id="COURSE_DESC" name="COURSE_DESC"
        row=2></textarea>
  
        <label for="COURSE_AUTHOR">Course Author</label>
        <input type="text" class="form-control" id="COURSE_AUTHOR" name="COURSE_AUTHOR" 
        value="<?php 
        if(isset($_SESSION['is_tutorLogin'])) {
        $tutorlogemail = $_SESSION['tuemail'];
        $sql ="SELECT TUTOR_NAME  from tutor where TUTOR_EMAIL= '".$tutorlogemail."'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            $row = $result ->fetch_assoc();{
            echo $row['TUTOR_NAME'];
            }}
        } ?>" readonly> 
   
        <label for="COURSE_DURATION">Course Duration</label>
        <input type="text" class="form-control" id="COURSE_DURATION" 
        name="COURSE_DURATION"> 
 
        <label for="COURSE_PRICE">Course price</label>
        <input type="text" class="form-control" id="COURSE_PRICE" 
        name="COURSE_PRICE"> 
 
        <label for="COURSE_IMG">Course Image</label>
        <input type="file" class="form-control-file" id="COURSE_IMG" 
        name="COURSE_IMG"> 
        <br><br>
   
    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="coursesubmitBtn" name="coursesubmitBtn">Submit</button>
        <a href="courses.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;
        }?>

</form>
    </div>

</div>
</div>
