<?php
include_once('dbconnection.php');
include('header.php');
?>
<img src="cc.PNG"  width="100%"style="margin-top:120px;">
<!-- course details start -->
<div class="coursecon" id="cc">
    <?php
     if(isset($_GET['COURSE_ID'])){
        $COURSE_ID= $_GET['COURSE_ID'];
        $sql="SELECT * FROM courses WHERE COURSE_ID='$COURSE_ID'";
        $result= $conn->query($sql);
        $row= $result->fetch_assoc();
     }
    ?>

     
    <div class="cview">
        <img src="<?php echo str_replace('..','.',$row['COURSE_IMG']) ?>" class="coursepic">
        <div >
            <h2 class="ch2"> <?php echo $row['COURSE_NAME'] ?> <small><?php echo $row['COURSE_DURATION'] ?></small></h2>
            <p class="cp"><?php echo $row['COURSE_DESC'] ?></p>
            <div class="cc1">
                
                
                     <h5 class="ch3">Price: &nbsp; <?php echo $row['COURSE_PRICE'] ?></h5>
                     
                     <?php
     if(isset($_GET['COURSE_ID'])){
        $COURSE_ID= $_GET['COURSE_ID'];
        $sql="SELECT * FROM courses WHERE COURSE_ID='$COURSE_ID'";
        $result= $conn->query($sql);
        $row= $result->fetch_assoc();
        $COURSE_ID= $row['COURSE_ID'];
        echo'<a href="checkout.php?COURSE_ID='.$COURSE_ID.'"><button class="cb1">Buy now</button></a>';
     }
    ?>     
            </div>
            
        </div>
    </div>
    <?php
     if(isset($_GET['COURSE_ID'])){
        $COURSE_ID= $_GET['COURSE_ID'];
        $sql="SELECT * FROM tutor WHERE TUTOR_NAME=(SELECT COURSE_AUTHOR FROM courses WHERE COURSE_ID='$COURSE_ID')";
        $result= $conn->query($sql);
        $row= $result->fetch_assoc();
     }
    ?>
        <div class="tflex">
            <img style="margin-left:320px"src="<?php echo str_replace('..','.',$row['TUTOR_IMG']) ?>" class="tutorpic ">
            <h6 >Tutor: <?php echo $row['TUTOR_NAME'] ?> </h6>
        </div>
    <table class="ctable">
            <tr>
                <th>Content NO.</th>
                <th>Content Name</th>
            </tr>
            <?php
         $sql= "SELECT * FROM contents";
         $result =$conn->query($sql);
         if($result->num_rows >0){
            $sno=0;
            while($row =$result->fetch_assoc()){
                if($COURSE_ID== $row['COURSE_ID']){
                    $sno++;
                    echo'<tr>
                   <th>'.$sno.'</th>
                   <th>'.$row['CONTENT_NAME'].'</th>
                  </tr>'; 
                }
               
            }
         }
        ?>
            
        </table>
    
       



</div>
<!-- course details end -->


<?php
include('footer.php');
?>