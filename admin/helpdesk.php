<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>

<div >
    <p class="cc text-white p-2 text-center">List of Query</p>
    <?php
    $sql =" SELECT * FROM helpdesk";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Querry ID</th>
            <th scope='col'> Name</th>
            <th scope='col'> Email</th>
            <th scope='col'> Country</th>
            <th scope='col'> Querry</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['HD_ID'].'</th>';
            echo '<td>'.$row['NAME'].'</td>';
            echo '<td>'.$row['EMAIL'].'</td>';
            echo '<td>'.$row['COUNTRY'].'</td>';
            echo '<td>'.$row['SUB'].'</td>';
          
  
        '</tr>';
    } ?>
    </tbody>
    </table> <br><br>
<?php } else {
    echo '0 results';
}

  
 ?>

</div>





