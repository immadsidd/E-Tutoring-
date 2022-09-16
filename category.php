<?php
include_once('dbconnection.php');
include('header.php');
?>
<img src="c.PNG"  width="100%"style="margin-top:120px;">


  <!-- course -->

  <div class="courses">

    <?php
       
      if(isset($_GET['COURSE_CAT'])){
        $sql =" SELECT * FROM courses where COURSE_CAT=(SELECT CAT_NAME FROM category where CAT_ID={$_GET['COURSE_CAT']})";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            $COURSE_ID= $row['COURSE_ID'];
            echo  '<div class="box">
            <img class="pic" src="'.str_replace('..','.',$row['COURSE_IMG']).'">
            <h1 class="title">'.$row['COURSE_NAME'].'</h1>
            <p class="desc">'.$row['COURSE_DESC'].'</p>
            <div class="foot">
                <h5 class="prices1">Price: </h5>
                <h5 class="prices">&nbsp;'.$row['COURSE_PRICE'].'/-</h5>
                <a  href="coursedetails.php?COURSE_ID='.$COURSE_ID.'" class="button"><button class="button">Enroll</button></a>
            </div>
            </div>';

          }
        }
    }
    ?>
  </div>   
   
  <!-- courses end -->





















<?php
include('footer.php');
?>