<?php 
if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');
?>


<div >
    <p class="cc text-white p-2 text-center"> courses sold</p>
    <?php
   
    $tutorlogemail = $_SESSION['tuemail'];
    $sql =" SELECT * FROM transactions where COURSE_AUTHOR=(SELECT TUTOR_NAME FROM tutor WHERE TUTOR_EMAIL= '".$tutorlogemail."')";
    $result = $conn->query($sql);
    if($result -> num_rows >0){
        $q=0;
    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'>Course ID</th>
            <th scope='col'>Course Price</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                    $q++;
            echo '<tr>';
            echo '<th scope="row">'.$q.'</th>';
            echo '<td>'.$row['COURSE_ID'].'</td>';
            echo '<td>'.$row['COURSE_PRICE'].'</td>';
           
        '</tr>';
    } 
    ?>

    <tr>
        <td style="background-color: #0CAAA5" > Total</td>
        <td style="background-color: #0CAAA5"></td>
        <td style="background-color: #0CAAA5">
            <?php
                $sql =" SELECT * FROM transactions where COURSE_AUTHOR=(SELECT TUTOR_NAME FROM tutor WHERE TUTOR_EMAIL= '".$tutorlogemail."')";
                 $result = $conn->query($sql);
                 if($result -> num_rows >0){
                    $BAL =0;
                    while(($conn-> query($sql)== TRUE)&&($row = $result ->fetch_assoc())){
                        $BAL= $BAL+ $row['COURSE_PRICE'];
                            }
                            echo $BAL;
                           }
                    else{
                        echo '0';
                       }

?></td>
    </tr>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

  
 ?>
</div>