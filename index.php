<?php
$host = "dbd.mysql.database.azure.com";
$username = "Immad";
$password = "ETutoring123!";
$name = "e_tutoring";

// create connection
$conn = mysqli_init();
mysqli_real_connect($conn, "dbd.mysql.database.azure.com", "Immad", "ETutoring123!", "e_tutoring", 3306, MYSQLI_CLIENT_SSL);
// $conn = new mysqli($host, $username, $password, $name);

?>
<?php
include('header.php');
?>
    <div class="bgpic">
      <img src="bg.jpeg">
    </div>
    <div class="contents contents1">
        <h1>Best Online Education Expertise</h1>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

        <?php 
                if(isset($_SESSION['is_Login'])){
                  echo '<a href="student/studentprofile.php"><button  class="button1" >My Profile</button></a>';
                }

                else{
                  echo' <button  class="button1" data-bs-toggle="modal" data-bs-target="#get-login">Get Started</button>';
                }
              ?>
       
        <a href="courses.php"><button  class="button2" >View Courses</button></a>
    </div >
    
<!--section 1 end-->
  <div class="sec">
    <h4>Learn Anything</h4>
    <h1>Welcome To E-Tutoring</h1>
    <hr>
    <h6>OWN YOUR FUTURE BY LEARNING SKILLS</h6>
    <br>
    <div class="imgf reveal" >
    <img src="homeimg/c1.PNG">
    <div>
    <h4>Online Courses</h4>
    <p>Wheather you stay with us for one week or one year, we will make sure you have the right time of your life</p>
    </div>
    </div>
    <div class="imgf reveal">
    <img src="homeimg/c2.PNG">
    <div>
    <h4>Books & Library</h4>
    <p>Discover free online courses from top universites, and functionality of Canvas the that makes teaching</p>
    </div>
    </div>
    <div class="imgf reveal">
    <img src="homeimg/c3.PNG">
    <div>
    <h4>Great Tutors</h4>
    <p>While other platforms offer only a subse of online teaching tools, network provides all the ease.</p>
    </div>
  </div>
    <img src="homeimg/c4.PNG" class="im">
</div>
 
  <!-- category -->
  <div class="cat ">
    <h4 style="margin-top: 150px; color:#0CAAA5;"class="h4 text-center ">Start Larning Today</h4>
    <h1 class="h1 text-center">Browse Online Course Category</h1>
    <div class="cats">
    <?php $sql="SELECT * FROM category where CAT_FEA='FEATURED'";
     $result=$conn->query($sql);
     if($result-> num_rows > 0){
      while($row = $result->fetch_assoc()){?>
     
      <?php echo'<div class="catf reveal">
        <a href="category.php?COURSE_CAT='.$row['CAT_ID'].'"><img class="reveal" src="'.str_replace('..','.',$row['CAT_IMG']).'"></a>
        <h5>'.$row['CAT_NAME'].'</h5>
      </div>';}} ?>
     </div>
      </div>
    
   
  <!-- category end -->


  <!-- course -->
  <div class="courses ">
    <h4 class="h4">Our Courses</h4>
    <h1 class="h1">Explore Our Popular Courses Online</h1>
    <?php
        $sql =" SELECT * FROM courses where COURSE_FEA='FEATURED' limit 3  ";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            $COURSE_ID= $row['COURSE_ID'];
            echo '<div class="box reveal" >
            <img class="pic" src="'.str_replace('..','.',$row['COURSE_IMG']).'">
            <h1 class="title">'.$row['COURSE_NAME'].'</h1>
            <p class="desc">'.$row['COURSE_DESC'].'</p>
            <div class="foot">
                <h5 class="prices1">Price: </h5>
                <h5 class="prices">&nbsp;'.$row['COURSE_PRICE'].'/-</h5>
                <a href="coursedetails.php?COURSE_ID='.$COURSE_ID.'" class="button"><button class="button">Enroll</button></a>
            </div>
            </div>';

          }
        }
    ?>
    <a href="courses.php" ><button style="width: 250px; height:60px; margin-left:39%; margin-bottom:50px;"  class="bb">View All Courses</button></a>
  </div>    

   
  <!-- courses end -->

<!-- tutor strat -->
<h4 style="margin-top: 80px; color:#0CAAA5;" class="text-center"> Our Instructors</h4>
<h1 style="  text-align: center;">Certified Tutors</h1>
<div class="tutors reveal">
    <?php
        $sql =" SELECT * FROM tutor  where TUTOR_FEA='FEATURED' LIMIT 3";
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
    <a href="tutors.php" ><button style="width: 250px; height:60px;  margin:50px 0px 50px 0px; margin-left:39%;background-color: #0CAAA5;color:#ffff;border:none; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);"  class="bb">View All tutors</button></a>
  </div>  
<!-- tutor end -->

<!--ABOUT US-->
<?php
 $sql="SELECT * from details";
 $result = $conn->query($sql); 
 $row = $result ->fetch_assoc();?>
<br><br>
<div class="v2">
           <video class="video2 reveal" playsinline autoplay muted loop>
            <source src="homeimg/ab.mp4">
        </video>
</div>
<div class="about" id="about" >
  <h4> Our Story!</h4>
    <h1>About Us!</h1>
    <hr>
     <br>
       <p><?php echo $row['ABOUT']?></p> 
       <a href="aboutus.php"><button class="bbb" style="width: 200px; height:50px;">More About Us</button></a>
       
</div>

        
<!---about us ends-->
<!-- contact us -->
<br><br>
    <div class="video">
        <video class="video1" playsinline autoplay muted loop>
            <source src="bg.mp4">
        </video>
        <div class="overlay">
          <h4 style="color: #0CAAA5; ">Help Desk</h4>
        <h1>Contact us</h1>
        <hr>
        <h5>We're inspiring the next <b>generation</b> of the <b>brightest minds.</b> Helping each <b>child</b> find and follow their best <b>learning path.</b></h5>
        <a href="helpdesk.php"><button style="margin-left: 180px;">Contact us</button></a>
      </div>
    </div> 
<!-- contact us end -->

    <div class="count1">
      <img  class="reveal"src="homeimg/count.jpeg" height="450px" style="margin: 80px 0px 10px 250px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.7);">
      <img style="margin-left: 200px; " height="80px" src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-graduate-university-vitaliy-gorbachev-lineal-vitaly-gorbachev.png"/>
      <span class="counter">1,00,000</span>
      <h3 class="h3">SUCCESS STORIES</h3>
      <h2 class="h2">ACHIEVE YOUR GOALS WITH US</h2>
     <p>Our distance students choose  E-Tutoring for many reasons; quality of education, flexibility, career advancement, and the pride that comes with earning a University degree.</p> 
      <script>
    const counterUp = window.counterUp.default
const callback = entries => {
	entries.forEach( entry => {
		const el = entry.target
		if ( entry.isIntersecting && ! el.classList.contains( 'is-visible' ) ) {
			counterUp( el, {
				duration: 2000,
				delay: 16,
			} )
			el.classList.add( 'is-visible' )
		}
	} )
}
const IO = new IntersectionObserver( callback, { threshold: 1 } )
const el = document.querySelector( '.counter' )
IO.observe( el )
</script>
    </div>
   



<!-- slider feedback start -->
<h4 style="margin-top: 80px; color:#0CAAA5;"id="feedback" class="text-center">Testimonals</h4>
<h1 class="text-center feed" >Students Feedback</h1>
        <section>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
        
          <?php
          $sql="SELECT s.STU_NAME, s.STU_OCC, s.STU_IMG, f.F_CONTENT FROM student AS s JOIN feedback AS f ON s.STU_ID= f.STU_ID";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            while($row = $result ->fetch_assoc()){
              $STU_IMG = $row['STU_IMG'];
              $N_IMG = str_replace('..','.', $STU_IMG);
           

          ?>
          
              <div class="swiper-slide">
                  <div class="testimonialbox">
                      <div class="r">
                        <p class="content"><?php echo $row['F_CONTENT'] ?></p>
                          <div class="details">
                              <div class="imgbox">
                                <img  src="<?php echo $N_IMG  ?>" alt="">
                              </div>
                              <div>
                                 <h3 class="name"><?php echo $row['STU_NAME'] ?></h3>
                                 <h6><?php echo $row['STU_OCC'] ?></h6> 
                              </div>
                              
                
                          </div>
                      </div>
                  </div>
               
              </div> 
          <?php }
        }?>
           </div>
            
            <div class="swiper-pagination"></div>
          </div>

    </section>
      <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true
          },
          pagination: {
            el: ".swiper-pagination"
          }
        });
      </script>
<!-- slider feeback end -->

<!-- last -->
<?php
 $sql="SELECT * from details";
 $result = $conn->query($sql); 
 $row = $result ->fetch_assoc();?>
<div class="last">
  <div class="lf">
   <a href="#" class="fa fa-phone"></a>
   <h5><?php echo $row['DETAILS_CNO']?></h5>
  </div>
  <div class="lf">
   <a href="#" class="fa fa-envelope"></a>
   <h5><?php echo $row['DETAILS_EMAIL']?></h5>
  </div>
  <div class="lf">
   <a href="#" class="fa fa-globe"></a>
   <h5><?php echo $row['DETAILS_SITE']?></h5>
  </div>
</div>
<!-- last -->
<?php
include('footer.php');
?>
