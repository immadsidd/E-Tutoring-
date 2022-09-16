<?php

if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include('../dbconnection.php');

if(isset($_SESSION['is_tutorLogin'])){
    $stulogemail =$_SESSION['tuemail'];

}
if(isset($_REQUEST['uStubtn'])){
    $TUTOR_NAME=$_REQUEST['TUTOR_NAME'];
    $TUTOR_OCC=$_REQUEST['TUTOR_OCC'];
    $TUTOR_BIO=$_REQUEST['TUTOR_BIO'];
    $TUTOR_IMG= $_FILES['TUTOR_IMG']['name'];
    $TUTOR_IMG_TEMP=$_FILES['TUTOR_IMG']['tmp_name'];
    $img_folder ='../image/tutor/'.$TUTOR_IMG;
    move_uploaded_file( $TUTOR_IMG_TEMP, $img_folder);
    $sql ="UPDATE tutor SET TUTOR_NAME=' $TUTOR_NAME', TUTOR_OCC='$TUTOR_OCC', TUTOR_IMG= '$img_folder' , TUTOR_BIO='$TUTOR_BIO' WHERE TUTOR_EMAIL='$stulogemail'";
    if($conn->query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> updated sucessfully</div>';
   
}
}

?>
<div class="tform">
    <form action="" method="POST" enctype="multipart/form-data">
    <?php
    if(isset($_SESSION['is_tutorLogin'])){
    $stulogemail =$_SESSION['tuemail'];
    

$sql= "SELECT * FROM tutor WHERE TUTOR_EMAIL ='$stulogemail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row= $result->fetch_assoc();
    $TUTOR_ID= $row['TUTOR_ID'];
    $TUTOR_NAME= $row['TUTOR_NAME'];
    $TUTOR_OCC= $row['TUTOR_OCC'];
    $TUTOR_BIO=$row['TUTOR_BIO'];
    $TUTOR_IMG=$row['TUTOR_IMG'];
}
}?>
        
        <label for="TUTOR_ID"><b style="font-size:18px;">Tutor ID:</b></label>
        <input type="tel" class="form-control" id="TUTOR_ID" name="TUTOR_ID" value="<?php if(isset($row['TUTOR_ID'])){echo trim($row['TUTOR_ID']);} ?>" readonly> 
        <br>
   
        <label for="TUTOR_NAME"><b style="font-size:18px;">Tutor Name:</b></label>
        <input type="text" class="form-control" id="TUTOR_NAME" name="TUTOR_NAME" value="<?php if(isset($row['TUTOR_NAME'])) {echo ltrim($row['TUTOR_NAME'],' '); }?>"readonly>  
  
       
        <label for="TUTOR_OCC"><b style="font-size:18px;">Occupation:</b></label>
        <input type="text" class="form-control" id="TUTOR_OCC" 
        name="TUTOR_OCC" value="<?php if(isset($row['TUTOR_OCC'])){echo $row['TUTOR_OCC'];} ?>"readonly>
        <label for="TUTOR_NAME"><b style="font-size:18px;">Bio:</b></label>
        <textarea readonly id="TUTOR_BIO" name="TUTOR_BIO" placeholder="Write something.." style="height:130px"> <?php if(isset($row['TUTOR_BIO'])){echo ltrim($row['TUTOR_BIO'],' '); } ?></textarea> 

        <div style="display:flex; gap: 50px; margin-bottom: 20px;">
        <div>
        <b style="font-size:18px;">Current Image</b><br><br>
        <img  src="<?php if(isset($row['TUTOR_IMG'])){echo $row['TUTOR_IMG'];} ?>  " alt="" class="img"><br>
        </div>
        <div>
        <label for="TUTOR_IMG"> <b style="font-size:18px;"> Upload new Image</b></label><br><br>
        <input type="file" class="form-control-file" id="TUTOR_IMG" name="TUTOR_IMG" disabled>
        <br><br>
        </div>
        </div>
    
   
    <input type="submit" id="uStubtn" class="inb" name="uStubtn"  value="submit">
        <input type="button" id="edit" class="inb" name="edit" value="edit">
    <?php if(isset($msg)){echo $msg;}?>

</form>
    </div>
<script>
    var readonly = true;
$('.tform input[type="button"]').on('click', function() {
    $('.tform input[type="text"], .tform textarea ').attr('readonly', !readonly);

    readonly = !readonly;
    $('.tform input[type="file"]').attr("disabled", false);
    document.getElementById("edit").style.display = "none";
    document.getElementById("uStubtn").style.display = "block";
    return false;
});
</script>