<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>


<div >
    <p class="cc text-white p-2 text-center"> List of Pending Courses</p>
          <?php
          $sql =" SELECT * FROM approval ";
          $result = $conn->query($sql);
          if($result -> num_rows >0){
            $sno= 0;
          ?>

     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Pending ID</th>
            <th scope='col'> Name</th>
            <th scope='col'>Teacher</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                 $sno= $sno+1;
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<th scope="row">'.$row['AP_ID'].'</th>';
            echo '<td>'.$row['AP_NAME'].'</td>';
            echo '<td>'.$row['AP_AUTHOR'].'</td>';
            echo '<td>';


            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["AP_ID"].'>
                <button style="background-color:forestgreen;"
                type="submit" 
                class="btn btn-secondary "
                name="approved"
                value="approved"
                style="background-color:gray;">
                <img height="30px" src="https://img.icons8.com/external-regular-kawalan-studio/24/000000/external-tick-user-interface-regular-kawalan-studio.png"/>  </button>
                </form>';

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["AP_ID"].'>
                <button style="background-color:firebrick;"
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                style="background-color:gray;">
                <img height="30px"  src="https://img.icons8.com/ios-glyphs/30/000000/multiply.png"/>
                </button>
                </form>';


            '</td>';
            
            
                
        '</tr>';
    } ?>
    </tbody>
    </table> <br><br>

<?php

          } else {
            echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 request</b></div>';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM approval WHERE AP_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}

if(isset($_REQUEST['approved'])){
    $sql ="SELECT AP_NAME, AP_CAT, AP_DESC, AP_AUTHOR, AP_IMG, AP_DURATION, AP_PRICE FROM approval WHERE AP_ID ={$_REQUEST['id']}";
    $result=$conn->query($sql);
    if( $result== TRUE){
        $row = $result ->fetch_assoc();
        echo $row['AP_NAME'];
        $C_N = $row['AP_NAME'];
        $C_C = $row['AP_CAT'];
        $C_D = $row['AP_DESC'];
        $C_A = $row['AP_AUTHOR'];
        $C_I = $row['AP_IMG'];
        $C_DR = $row['AP_DURATION'];
        $C_P = $row['AP_PRICE'];
    }


        $sql ="INSERT INTO COURSES (COURSE_NAME, COURSE_CAT, COURSE_DESC, COURSE_AUTHOR, COURSE_IMG, COURSE_DURATION, COURSE_PRICE) VALUES('$C_N','$C_C','$C_D','$C_A','$C_I','$C_DR','$C_P')";
        if($conn->query($sql) == TRUE){
        echo"<script>window.alert('course approved') </script>";
        $sql = "DELETE FROM approval WHERE AP_ID ={$_REQUEST['id']}";
         if($conn->query($sql) == TRUE){
            echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
         } else{
              echo 'Unable to Delete Data';
         }
        }
    else{
        echo"<script>window.alert('course not approved') </script>";
    }

}
 

  
 ?>
 
</div>
</div>


