<?php
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['is_admin'])){
  $stulogemail =$_SESSION['admin_email'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="adminstyle10.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>E-Tutoring </title>
</head>
<body>
<?php
 $sql =" SELECT * FROM transactions";
 $result = $conn->query($sql);
    if($result -> num_rows >0){
      while(($conn-> query($sql)== TRUE)&&($row = $result ->fetch_assoc())){
        $BAL = isset($BAL) ? $BAL : 0;
        $BAL+= + 0.2*$row['COURSE_PRICE'];
       }
    }
    else{
      $BAL=0;
    }

?>
<nav class="navbar navbar-dark  p-0 shadow" style="background-color:#A0C7CE;">
<a class="navbar-brand"><img height="100px "src="../logoo.png"/><small class="text-white" style="text-shadow: 0px 8px 15px black; font-size:25px;">Admin Area</small><div class="uss"><h5 class="us">Balance: <?php echo $BAL ?> /-</h5>
  <div><a href="settingss.php"><button>Settings</button></a></div>

</div>
<div><a class="nav-link "  href="../logout.php"><button class="button1">Logout</button></a></div></a>
</nav>

 
  <!-- header start bootstrap/responsive-->
  <nav class="navbar mt-40 header navbar-expand-sm ">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link "  href="admindashboard.php">Dashboard</a>
              <a class="nav-link "  href="selling.php">Payment Status</a>
              <a class="nav-link "  href="category.php">Courses</a>
              <a class="nav-link "  href="addcategory.php">Category</a>
              <a class="nav-link "  href="pending.php">Pending Courses</a>
              <a class="nav-link" href="feedback.php">Feedback</a>
              <a class="nav-link" href="student.php">Students/ Tutors</a>
              <a class="nav-link" href="helpdesk.php">Queries</a>
            </div>
          </div>
        </div>
      </nav>
    <!--header ends-->


</body>
</html>