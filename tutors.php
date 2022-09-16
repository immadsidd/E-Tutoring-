<?php
include_once('dbconnection.php');
include('header.php');
?>

<div class="video">
        <video class="video3" playsinline autoplay muted loop>
            <source src="homeimg/t1.mp4">
        </video>

 <!--  tutor -->
    </div>
    <h1 style=" margin-top: 50px; text-align: center;">CERTIFIED TUTORS</h1>
<div class="tutors">
    <?php
        $sql =" SELECT * FROM tutor ";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo  '<div class="box">
            <img class="pic" src="'.str_replace('..','.',$row['TUTOR_IMG']).'">
            <br><br>
            <h2 class="name">'.$row['TUTOR_NAME'].'</h2>
            <h6 class="occ">'.$row['TUTOR_OCC'].'</h6>
            <p class="desc">'.$row['TUTOR_BIO'].'</p>
            </div>';

          }
        }
    ?>
  </div>  
  
  <!-- tutor -->

<?php
include('footer.php');
?>