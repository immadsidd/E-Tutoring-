<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>


<div >
    <p class="cc text-white p-2 text-center"> <a href="category.php"><img  style="border-radius:100%" height="45px"src="https://img.icons8.com/sf-black-filled/64/000000/circled-left-2.png"/></a> List of Courses</p>
          <?php
          $Q="";
          $sql =" SELECT * FROM courses WHERE COURSE_CAT =(SELECT  CAT_NAME FROM category where CAT_ID={$_GET['COURSE_CAT']})";
          $result = $conn->query($sql);
          if($result -> num_rows >0){
            $sno= 0;
          ?>

     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Course ID</th>
            <th scope='col'> Name</th>
            <th scope='col'>Teacher</th>
            <th scope='col'> Action</th>
            <th scope='col'> Feature</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                 $sno= $sno+1;
                $COURSE_ID=$row['COURSE_ID'];
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<th scope="row">'.$row['COURSE_ID'].'</th>';
            echo '<td>'.$row['COURSE_NAME'].'</td>';
            echo '<td>'.$row['COURSE_AUTHOR'].'</td>';
            echo '<td>';

            echo '
                <a href="contents.php?COURSE_ID='.$COURSE_ID.'"><button
                type="submit" 
                class="btn btn-secondary "
                name="view"
                value="view"
                style="background-color:#0CAAA5; color:black; font_weight:400">view contents
                </button></a>';

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["COURSE_ID"].'>
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
            echo '<td>';

            echo'<form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["COURSE_ID"].'>
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
            <input type="hidden" name="id" value='.$row["COURSE_ID"].'>
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
                
        '</tr>';
    } ?>
    </tbody>
    </table> <br><br>

<?php

          } else {
            echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM courses WHERE COURSE_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}

if(isset($_REQUEST['feature'])){
    $sql = "UPDATE courses set COURSE_FEA='FEATURED' WHERE COURSE_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo"<script>window.alert('course featured') </script>";
    } else{
        echo"<script>window.alert('course not featured') </script>";
    }

}
 
if(isset($_REQUEST['not_feature'])){
    $sql = "UPDATE courses set COURSE_FEA=' NOT_FEATURED' WHERE COURSE_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo"<script>window.alert('course not featured') </script>";
    } else{
        echo"<script>window.alert('course featured') </script>";
    }

}
  
 ?>
 <div class="fea">
 <p class="cc text-white p-2 text-center"> Featured Courses</p>
<table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Name</th>
            <?php
                $sql = "SELECT * FROM courses WHERE  COURSE_FEA ='FEATURED'";
               $result = $conn->query($sql);
          if($result -> num_rows >0){
            $sno= 0;
          ?>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                 $sno= $sno+1;
                $COURSE_ID=$row['COURSE_ID'];
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<td>'.$row['COURSE_NAME'].'</td>';
            '</tr>';
        } ?>
        </tbody>
        </table> 
   <?php }
            
   ?>
</div>
</div>


