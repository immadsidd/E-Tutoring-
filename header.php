<?php
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles19.css">
    <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js">	</script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&family=Inter&family=Josefin+Sans:wght@500&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@swiper-bundlemin.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>E-Tutoring </title>
</head>
<body>

  <script>
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".navbar").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".navbar").removeClass("active");
    }
});
</script>
<script>
  function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active1");
    } 
  }
}

window.addEventListener("scroll", reveal);
</script>


  <!-- header start bootstrap/responsive-->
  <nav class="navbar fixed-top  navbar-expand-sm ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img  src="logoo.png"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link "  href="index.php">Home</a>
              <a class="nav-link "  href="courses.php">Courses</a>
              <a class="nav-link" href="tutors.php">Tutors</a>
              <?php 
                session_start();
                if(isset($_SESSION['is_Login'])){
                  echo '<a class="nav-link" href="student/studentprofile.php">My Profile</a>
                  <a href="logout.php"class="nav-link" href="#">Logout</a>';
                }

                else{
                  echo'<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#get-login">Login / Sign up</a>';
                }
              ?>
              
             
              <a class="nav-link" href="index.php#feedback">Feedback</a>
              <a class="nav-link" href="aboutus.php">About Us</a>
              <a class="nav-link" href="helpdesk.php">Help Desk</a>
            </div>
          </div>
        </div>
      </nav>
    <!--header ends-->
 
 <!-- full screen modal signup/login end -->
 <div class="modal fade" id="get-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style="background-color: #A0C7CE;">
        <div class="modal-header ">
          <h5 class="modal-title" id="staticBackdropLabel" style="margin-left:49%; font-size:30px;text-shadow: 1px 1px 16px rgba(0, 0, 0, 0.2);">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('img2').style.display='block',document.getElementById('img1').style.display='block',document.getElementById('sf1').style.display='none' , document.getElementById('sf3').style.display='none' , document.getElementById('sf4').style.display='none'"></button>
        </div>
        <div class="modal-body" style="overflow-y:hidden">
          <button onclick="document.getElementById('sf1').style.display='block',document.getElementById('sf2').style.display='none',document.getElementById('img1').style.display='none',document.getElementById('img2').style.display='none' , document.getElementById('sf3').style.display='none' , document.getElementById('sf4').style.display='none'" class="l1">Student</button>
          &nbsp;<button onclick="document.getElementById('sf1').style.display='none',document.getElementById('img1').style.display='none' ,document.getElementById('img2').style.display='none', document.getElementById('sf2').style.display='block', document.getElementById('sf3').style.display='none' , document.getElementById('sf4').style.display='none'" class="l1">Tutor</button>
          <img id="img2" style="float: right;"src="homeimg/s2.PNG">
          <img id="img1" style="margin-top:20px"src="homeimg/s1.PNG">
      
          <div class="form1" id="sf1">
            <form >
          <h1>Student </h1><br>
             <b><label for="email">E-mail </label></b>
              <input type="email" id="stulogemail" name="email" placeholder="Your Email..">
              <b><label for="password">Password</label></b>
              <input type="password" id="stulogpass" name="password" placeholder="Your password..">
              <input type="button" value="Login" onclick="login()">
              <small id="logmsg"></small>
              <div   class="signup"> <a style="color:black" href="#" onclick="document.getElementById('sf1').style.display='none',document.getElementById('sf2').style.display='none' , document.getElementById('sf3').style.display='block' , document.getElementById('sf4').style.display='none'">signup?</a></div>
            </form>
          </div>

          <div class="form1" id="sf2">
            <form >
              <h1>Tutor</h1><br>
              <b><label for="email">E-mail</label></b>
              <input type="email" id="tutorlogemail" name="email" placeholder="Your Email..">
              <b><label for="password">Password</label></b>
              <input type="password" id="tutorlogpass" name="password" placeholder="Your password..">
              <input type="button" value="Login" onclick="tutorlogin()">
              <small id="logtmsg"></small>
              <div class="signup"><a style="color:black" href="#" onclick="document.getElementById('sf1').style.display='none',document.getElementById('sf2').style.display='none' , document.getElementById('sf3').style.display='none' , document.getElementById('sf4').style.display='block'">signup?</a></div>
            </form>
          </div>

          <div class="form1" id="sf3" >
            <form method="POST">
              <h1>Sign Up for Student</h1><br>
              <b><label for="name">Your Name</label></b>
              <small id="msg1"></small>
              <input type="text" id="stuname" name="name" placeholder="Your name..">
              <b><label for="email">E-mail</label></b>
              <small id="msg2"></small>
              <input type="email" id="stuemail" name="email" placeholder="Your Email..">
              <b><label for="password">Password</label></b>
              <small id="msg3"></small>
              <input type="password" id="stupass" name="password" placeholder="Your password..">
              <input type="button" id="signup1" onclick="addStu()" value="Signup">
              <span id="success"></span>
            </form>
          </div>

          <div class="form1" id="sf4">
            <form >
              <h1>Sign Up for Tutor</h1><br>
              <b><label for="name">Your Name</label></b>
              <small id="tmsg1"></small>
              <input type="text" id="tutorname" name="name" placeholder="Your name..">
              <b><label for="email">E-mail</label></b>
              <small id="tmsg2"></small>
              <input type="email" id="tutoremail" name="email" placeholder="Your Email..">
              <b><label for="password">Password</label></b>
              <small id="tmsg3"></small>
              <input type="password" id="tutorpass" name="password" placeholder="Your password..">
              <input type="button" id="signup2" onclick="addtutor()" value="Signup">
              <span id="successs"></span>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('img1').style.display='block',document.getElementById('img2').style.display='block',document.getElementById('sf1').style.display='none' ,document.getElementById('sf2').style.display='none', document.getElementById('sf3').style.display='none' , document.getElementById('sf4').style.display='none'">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- full screen modal signup/login end -->
