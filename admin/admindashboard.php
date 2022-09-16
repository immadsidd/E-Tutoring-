<?php
include_once('../dbconnection.php');
include('header.php');

 $sql="SELECT * FROM courses";
 $result= $conn->query($sql);
 $totalcourse =$result-> num_rows;

 $sql="SELECT * FROM student";
 $result= $conn->query($sql);
 $totalstudent =$result-> num_rows;

 $sql="SELECT * FROM tutor";
 $result= $conn->query($sql);
 $totaltutor =$result-> num_rows;

 $sql="SELECT * FROM transactions";
 $result= $conn->query($sql);
 $totalsales =$result-> num_rows;
?>



<div class="dash">
    <div class="d1">
        <h1 class="h1">Courses</h1>
        <h1><?php echo $totalcourse?></h1>
        <a href="category.php"><button>view</button></a>
    </div>
    <div class="d2">
        <h1 class="h1">Students</h1>
        <h1><?php echo $totalstudent?></h1>
        <a href="student.php"><button>view</button></a>
    </div>
    <div class="d3">
        <h1 class="h1">Tutors</h1>
        <h1><?php echo $totaltutor?></h1>
        <a href="student.php"><button>view</button></a>
    </div> 
    <div class="d4">
        <h1 class="h1">Sales</h1>
        <h1><?php echo $totalsales?></h1>
        <a href="selling.php"><button>view</button></a>
    </div> 
</div>