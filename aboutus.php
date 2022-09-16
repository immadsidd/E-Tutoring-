<?php
include_once('dbconnection.php');
include('header.php');
?>


<div class="aa">
<img src="homeimg/a1.PNG" width=100%;>
  <h2>Our Motive</h2>
    <hr>
     <br>
     <?php
 $sql="SELECT * from details";
 $result = $conn->query($sql); 
 $row = $result ->fetch_assoc();?>
        <p style="width:700px; text-align:justify;" ><?php echo $row['ABOUT']?> A new different way to improve your skills during online situations.</p>  <br>    
          <div class="vv">
          <video class="video5 reveal" playsinline autoplay muted loop>
               <source src="homeimg/a2.mp4">
           </video>
          <h5 style="width:450px;text-align:center ;">A feature-packed, powerful learning management system that covers everyone including universities, prodessional trainers, coaching, an indiviual instructor</h5> 
       </div> <br><br><br>
       <h2 class="text-center" style="margin-top:60px">Developers' Message</h2>
       <div class="flexa">
        <div class="aaf">
            <i style="float:none"class="fa fa-quote-left" ></i>
            <h4> ENHANCE YOUR SKILLS</h4>
            <h3>Learn Anything You Want Today</h3>
            <img src="homeimg/aa1.jpeg">
            <h6>Immad </h6>
        </div>
        <div class="aaf">
        <i style="float:none"class="fa fa-quote-left" ></i>
            <h4> RAISE YOUR LEVEL</h4>
            <h3>Education is The Passport To The Future</h3>
            <img src="homeimg/aa2.jpeg">
            <h6>Shah Shan</h6>
        </div>
       </div>
        
    </div>
    
      
 
    


<?php
include('footer.php');
?>