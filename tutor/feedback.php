<?php 
if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');
?>

<div style="margin-bottom: 100px;">
    <p class="cc text-white p-2 text-center">Feedbacks</p>
    <?php
     $tutorlogemail = $_SESSION['tuemail'];
    $sql =" SELECT * FROM feedback where T_NAME=(SELECT TUTOR_NAME FROM tutor WHERE TUTOR_EMAIL='".$tutorlogemail."')";
    $result = $conn->query($sql);
    $q=0;
    if($result -> num_rows >0){

    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Feedback</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                    $q++;
            echo '<tr>';
            echo '<th scope="row">'.$q.'</th>';
            echo '<td>'.$row['F_CONTENT'].'</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

  
 ?>
</div>


