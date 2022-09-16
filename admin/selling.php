<?php
include_once('../dbconnection.php');
include('header.php');
?>
<div >
    <p class="cc text-white p-2 text-center"> Courses Sold</p>
    <?php
   
    $sql =" SELECT * FROM transactions";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Transaction ID</th>
            <th scope='col'> Student ID</th>
            <th scope='col'>Course ID</th>
            <th scope='col'>Course Price</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['T_ID'].'</th>';
            echo '<td>'.$row['STU_ID'].'</td>';
            echo '<td>'.$row['COURSE_ID'].'</td>';
            echo '<td>'.$row['COURSE_PRICE'].'</td>';
        
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '0 results';
}

  
 ?>
</div>