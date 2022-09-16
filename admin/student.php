<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>

<button class="inbb" style="margin-left:35%;" onclick="document.getElementById('tt1').style.display='block',document.getElementById('tt2').style.display='none'"> student </button>
<button class="inbb" onclick="document.getElementById('tt2').style.display='block',document.getElementById('tt1').style.display='none'"> Tutor </button>

<div id="tt1">
<div >
    <p class="cc text-white p-2 text-center">List of student</p>
    <?php
    $sql =" SELECT * FROM student";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Student ID</th>
            <th scope='col'> Student Name</th>
            <th scope='col'>Student Email</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['STU_ID'].'</th>';
            echo '<td>'.$row['STU_NAME'].'</td>';
            echo '<td>'.$row['STU_EMAIL'].'</td>';
            echo '<td>';
            

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["STU_ID"].'>
                <button
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                style="background-color:gray;">
                <img height="20px" src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/>
                </button>
                </form>';
               
                
            '</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '0 results';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM student WHERE STU_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
  
 ?>
</div>
</div>
<!-- tutor start -->
<div id="tt2">
<div >
    <p class="cc text-white p-2 text-center">List of tutors</p>
    <?php
    $sql =" SELECT * FROM tutor";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Tutor ID</th>
            <th scope='col'> Tutor Name</th>
            <th scope='col'> Tutor Email</th>
            <th scope='col'> Action</th>
            <th scope='col'> Feature</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['TUTOR_ID'].'</th>';
            echo '<td>'.$row['TUTOR_NAME'].'</td>';
            echo '<td>'.$row['TUTOR_EMAIL'].'</td>';
            echo '<td>';
            

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["TUTOR_ID"].'>
                <button
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                style="background-color:gray;">
                <img height="20px" src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/>
                </button>
                </form>';

                echo '<td>';
            
                echo'<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["TUTOR_ID"].'>
                <button style="background-color: khaki;"
                type="submit" 
                class="btn btn-secondary "
                name="feature"
                value="feature"
                style="background-color:gray;">
                <img height="20px" src="https://img.icons8.com/ios-glyphs/100/000000/star--v1.png"/>
                </button>
                </form>';
    
                echo'<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["TUTOR_ID"].'>
                <button style="background-color: brown;"
                type="submit" 
                class="btn btn-secondary "
                name="not_feature"
                value="not_feature"
                style="background-color:gray;">
                <img height="20px" src="https://img.icons8.com/ios/50/000000/star--v1.png"/>
                </button>
                </form>'; 
    
                  '</td>';
                
            '</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> <br><br>
<?php } else {
    echo '0 results';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM tutor WHERE TUTOR_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        $sql="DELETE FROM courses WHERE COURSE_AUTHOR=(Select TUTOR_NAME FROM tutor where TUTOR_ID ={$_REQUEST['id']})";
        $conn->query($sql) == TRUE;
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}

if(isset($_REQUEST['feature'])){
    $sql = "UPDATE tutor set TUTOR_FEA='FEATURED' WHERE TUTOR_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo"<script>window.alert('tutor featured') </script>";
    } else{
        echo"<script>window.alert('tutor not featured') </script>";
    }

}
 
if(isset($_REQUEST['not_feature'])){
    $sql = "UPDATE TUTOR set TUTOR_FEA=' NOT_FEATURED' WHERE TUTOR_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo"<script>window.alert('tutor not featured') </script>";
    } else{
        echo"<script>window.alert('tutor  featured') </script>";
    }
}
  
  
 ?>
 <div class="fea">
 <p class="cc text-white p-2 text-center"> Featured Tutors </p>
<table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Name</th>
            <?php
                $sql = "SELECT * FROM tutor WHERE  TUTOR_FEA ='FEATURED'";
               $result = $conn->query($sql);
          if($result -> num_rows >0){
            $sno= 0;
          ?>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                 $sno= $sno+1;
                $COURSE_ID=$row['TUTOR_ID'];
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<td>'.$row['TUTOR_NAME'].'</td>';
            '</tr>';
        } ?>
        </tbody>
        </table> 
   <?php }
            
   ?>
</div>
</div>
</div>
<!-- tutor end -->
