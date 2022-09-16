<?php 
if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');
?>


<div style="margin-bottom: 100px;">
    <p class="cc text-white p-2 text-center"> List of Courses</p>
    <?php
   
    $tutorlogemail = $_SESSION['tuemail'];
    $sql =" SELECT * FROM courses where COURSE_AUTHOR=(SELECT TUTOR_NAME FROM tutor WHERE TUTOR_EMAIL= '".$tutorlogemail."')";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Course ID</th>
            <th scope='col'> Name</th>
            <th scope='col'> Category</th>
            <th scope='col'>Teacher</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['COURSE_ID'].'</th>';
            echo '<td>'.$row['COURSE_NAME'].'</td>';
            echo '<td>'.$row['COURSE_CAT'].'</td>';
            echo '<td>'.$row['COURSE_AUTHOR'].'</td>';
            echo '<td>';
            echo '<form action="editcourse.php" method="POST" class="d-inline" >
            <input type="hidden" name="id" value='.$row["COURSE_ID"].'>
            <button
                type="submit" 
                class="btn btn-info mr-3"
                name="view"
                value="view"
                >
                <img height="20px"  src="https://img.icons8.com/ios-glyphs/30/000000/edit--v1.png"/>
                </button>
            </form>';

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
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
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
  
 ?>
</div>


<div>
    <a class="btn box" href="addcourse.php" style="background-color: #0CAAA5;">
    <img src="https://img.icons8.com/android/24/000000/plus.png"/>
    </a>

</div>


