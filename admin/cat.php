<?php 
if(!isset($_SESSION)){
    session_start();
}

include('header.php');

include_once('../dbconnection.php');
if(isset($_REQUEST['coursesubmitBtn'])){
if(($_REQUEST['CAT_NAME'] == "")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
    }
    else{
        $CAT_NAME=$_REQUEST['CAT_NAME'];
        $CAT_IMG= $_FILES['CAT_IMG']['name'];
        $CAT_IMG_temp=$_FILES['CAT_IMG']['tmp_name'];
        $img_folder ='../image/catimg/'.$CAT_IMG;
        move_uploaded_file($CAT_IMG_temp, $img_folder);
    
    $sql ="INSERT INTO category (CAT_NAME, CAT_IMG) VALUES('$CAT_NAME','$img_folder')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Category added sucessfully</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add category</div>';
    }
}
   
}
?>

<div class="cc1" >
    <h3 class="text-center"> Add new category</h3>
    <div class="adform">
        <form action="" method="POST" enctype="multipart/form-data">
        
        <label for="CAT_NAME">Category Name</label>
        <input type="text" class="form-control" id="CAT_NAME" 
        name="CAT_NAME"><br>
 
        <label for="CAT_IMG">Course Image</label>
        <input type="file" class="form-control-file" id="CAT_IMG" 
        name="CAT_IMG"> 
        <br><br>
   
    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="coursesubmitBtn" name="coursesubmitBtn">Submit</button>
        <a href="addcategory.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;
        }?>

</form>
    </div>
</div>

</div>
</div>
