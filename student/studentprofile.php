<?php

if(!isset($_SESSION)){
    session_start();
}
include('stuheader.php');
include('../dbconnection.php');


if(isset($_SESSION['is_Login'])){
    $stulogemail =$_SESSION['email'];
}
if(isset($_REQUEST['uStubtn'])){
    $STU_NAME=$_REQUEST['STU_NAME'];
    $STU_OCC=$_REQUEST['STU_OCC'];
    $STU_IMG= $_FILES['STU_IMG']['name'];
    $STU_IMG_TEMP=$_FILES['STU_IMG']['tmp_name'];
    $img_folder ='../image/stuimg/'.$STU_IMG;
    move_uploaded_file( $STU_IMG_TEMP, $img_folder);
    $sql ="UPDATE student SET STU_NAME=' $STU_NAME', STU_OCC='$STU_OCC', STU_IMG= '$img_folder' WHERE STU_EMAIL='$stulogemail'";
    if($conn->query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> updated sucessfully</div>';
   
}
}

?><div class="adform">
<form action="" method="POST" enctype="multipart/form-data">
<?php
if(isset($_SESSION['is_Login'])){
$stulogemail =$_SESSION['email'];


$sql= "SELECT * FROM student WHERE STU_EMAIL ='$stulogemail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row= $result->fetch_assoc();
$STU_ID= $row['STU_ID'];
$STU_NAME= $row['STU_NAME'];
$STU_OCC= $row['STU_OCC'];
$STU_IMG=$row['STU_IMG'];
}
}?>
    
    <label for="STU_ID"><b style="font-size:18px;">Student ID:</b></label>
    <input type="tel" class="form-control" id="STU_ID" name="STU_ID" value="<?php if(isset($row['STU_ID'])){echo trim($row['STU_ID']);} ?>" readonly> 


    <label for="STU_NAME"><b style="font-size:18px;">Student Name:</b></label>
    <input type="text" class="form-control" id="STU_NAME" name="STU_NAME" value="<?php if(isset($row['STU_NAME'])){echo ltrim($row['STU_NAME'],' '); }?>" readonly> 


    <label for="STU_OCC"><b style="font-size:18px;">Occupation:</b></label>
    <input type="text" class="form-control" id="STU_OCC" 
    name="STU_OCC" value="<?php if(isset($row['STU_OCC'])){echo ltrim($row['STU_OCC'],' '); } ?>" readonly> 

    <div style="display:flex; gap: 50px; margin-bottom: 20px;">
    <div>
    <b style="font-size:18px;">Current Image</b><br><br>
    <img  src="<?php if(isset($row['STU_IMG'])){echo $row['STU_IMG'];} ?>  " alt="" class="img"><br>
    </div>
    <div>
    <label for="STU_IMG"> <b style="font-size:18px;"> Upload new Image</b></label><br><br>
    <input type="file" class="form-control-file" id="STU_IMG" name="STU_IMG" disabled>
    <br><br>
    </div>
    </div>

    


    

<input type="submit" id="uStubtn" class="inb" name="uStubtn"  value="submit" style="margin-left:38% ;">
    <input type="button" id="edit" class="inb" name="edit" value="edit" style="margin-left:38% ;">
<?php if(isset($msg)){echo $msg;}?>

</form>
</div>
<script>
var readonly = true;
$('.adform input[type="button"]').on('click', function() {
$('.adform input[type="text"]').attr('readonly', !readonly);

readonly = !readonly;
$('.adform input[type="file"]').attr("disabled", false);
document.getElementById("edit").style.display = "none";
document.getElementById("uStubtn").style.display = "block";
return false;
});
</script>