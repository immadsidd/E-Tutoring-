<?php
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['is_Login'])){
  $stulogemail =$_SESSION['email'];
}

if(isset($stulogemail)){
    $sql="SELECT * FROM student WHERE STU_EMAIL= '$stulogemail'";
    $result= $conn ->query($sql);
    $row= $result->fetch_assoc();
    $STU_NAME=$row['STU_NAME'];
    $STU_IMG=$row['STU_IMG'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&family=Inter&family=Josefin+Sans:wght@500&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="stustyles.css">
    <title>E-Tutoring </title>
</head>
<body>

<nav class="navbar navbar-dark  p-0 shadow s" style=" background-color:#A0C7CE; ">
<a class="navbar-brand" href="../index.php"><img height="100px"src="../logoo.png"/><small style="text-shadow: 0px 8px 15px black;" class="text-white"> Student Area</small></a>
<a ><img src="<?php echo $STU_IMG ?>" alt="studentimage" class=" img img-thumbnail "><h5 class="us"><?php echo $STU_NAME ?></h5></a>
</nav>

 
  <!-- header start bootstrap/responsive-->
  <nav class="navbar mt-40 header navbar-expand-sm ">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link "  href="studentprofile.php">My Profile</a>
              <a class="nav-link "  href="courses.php">My Courses</a>
              <a class="nav-link" href="feedback.php">Feedback</a>
              <a class="nav-link"  href="../logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
    <!--header ends-->


</body>
</html>