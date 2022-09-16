<?php 
if(!isset($_SESSION)){
    session_start();
}

include('head_side.php');

include_once('../dbconnection.php');
if(isset($_REQUEST['contentsubmitBtn'])){
    //checking for empty fields
if((($_REQUEST['CONTENT_NAME'] == "")||($_REQUEST['CONTENT_DESC'] == "")||($_REQUEST['COURSE_ID'] == "")||$_REQUEST['COURSE_NAME'] == "")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
    }
    else{
        $CONTENT_NAME=$_REQUEST['CONTENT_NAME'];
        $CONTENT_DESC=$_REQUEST['CONTENT_DESC'];
        $COURSE_ID=$_REQUEST['COURSE_ID'];
        $COURSE_NAME=$_REQUEST['COURSE_NAME'];
        $CONTENT_LINK= $_FILES['CONTENT_LINK']['name'];
        $CONTENT_LINK_temp=$_FILES['CONTENT_LINK']['tmp_name'];
        $link_folder ='../contentvid/'.$CONTENT_LINK;
        move_uploaded_file($CONTENT_LINK_temp, $link_folder);

        $CONTENT_PDF= $_FILES['CONTENT_PDF']['name'];
        $CONTENT_PDF_temp=$_FILES['CONTENT_PDF']['tmp_name'];
        $pdf_folder ='../contentpdf/'.$CONTENT_PDF;
        move_uploaded_file($CONTENT_PDF_temp, $pdf_folder);
    
    $sql ="INSERT INTO contents (CONTENT_NAME, CONTENT_DESC, CONTENT_LINK,CONTENT_PDF, COURSE_ID, COURSE_NAME) VALUES('$CONTENT_NAME','$CONTENT_DESC','$link_folder','$pdf_folder','$COURSE_ID','$COURSE_NAME')";
    if ($conn-> query($sql)== TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Content added sucessfully</div>';
    }
    else{
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add content</div>';
    }
}
   
}
?>

<div >
    <h3 class="text-center"> Add New Content</h3>
    <div class="adform">
        <form action="" method="POST" enctype="multipart/form-data">
        
        <label for="COURSE_ID">Course ID</label>
        <input type="text" class="form-control" id="COURSE_ID" 
        name="COURSE_ID" value ="<?php if(isset($_SESSION['COURSE_ID'])){echo $_SESSION['COURSE_ID'];} ?>" readonly> 

        <label for="COURSE_NAME">Course Name</label>
        <input type="text" class="form-control" id="COURSE_NAME" 
        name="COURSE_NAME" value ="<?php if(isset($_SESSION['COURSE_NAME'])){echo $_SESSION['COURSE_NAME'];} ?>" readonly> 

        <label for="CONTENT_NAME">Content Name</label>
        <input type="text" class="form-control" id="CONTENT_NAME" name="CONTENT_NAME"> 
  
        <label for="CONTENT_DESC">Content Description</label>
        <input type="text" class="form-control" id="CONTENT_DESC" name="CONTENT_DESC" > 
   
    
 
        <label for="CONTENT_LINK">Content Video Link</label>
        <input type="file" class="form-control-file" id="CONTENT_LINK" 
        name="CONTENT_LINK"> 

        <label for="CONTENT_PDF">Content PDF Link</label>
        <input type="file" class="form-control-file" id="CONTENT_PDF" 
        name="CONTENT_PDF"> 
        <br><br>
   
    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="contentsubmitBtn" name="contentsubmitBtn">Submit</button>
        <a href="contents.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;}?>

</form>
    </div>

</div>
</div>
