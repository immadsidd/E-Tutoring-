<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>

<div >
    <p class="cc text-white p-2 text-center">Feedbacks</p>
    <?php
    $sql =" SELECT * FROM feedback";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Feedback ID</th>
            <th scope='col'> Feedback Content</th>
            <th scope='col'> Student ID</th>
            <th scope='col'> Teacher Name</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['F_ID'].'</th>';
            echo '<td>'.$row['F_CONTENT'].'</td>';
            echo '<td>'.$row['STU_ID'].'</td>';
            echo '<td>'.$row['T_NAME'].'</td>';
            echo '<td>';
            

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["F_ID"].'>
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
    $sql = "DELETE FROM feedback WHERE F_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
  
 ?>
</div>


