<?php
if(!isset($_SESSION)){
    session_start();
}
include('stuheader.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_Login'])){
    $stulogemail=$_SESSION['email'];


$sql =" SELECT t.T_ID, t.COURSE_ID, t.STU_ID, t.COURSE_AUTHOR, c.COURSE_DURATION, c.COURSE_ID, c.COURSE_NAME , c.COURSE_DESC , c.COURSE_IMG FROM 
transactions as t join courses as c on c.COURSE_ID=t.COURSE_ID WHERE t.STU_ID=(SELECT STU_ID FROM student where STU_EMAIL='".$stulogemail."')";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        ?>
       <div class="cview">
        <img src="<?php echo $row['COURSE_IMG'] ?>" class="coursepic">
        <div >
            <h5 class="ch2">Course ID: <?php echo $row['COURSE_ID'] ?> <span class="c"><?php echo $row['COURSE_DURATION'] ?></span></h5>
            <h2 class="ch2">Course Name: <?php echo $row['COURSE_NAME'] ?></h2>
            <p class="cp"><?php echo $row['COURSE_DESC'] ?></p>
            
     <a href="contents.php?COURSE_ID=<?php echo $row['COURSE_ID'] ?>"><button class="cb1">Watch now</button></a><br><br>  
        </div> 
    </div>
    <hr> 
        <?php
    }
}else{
    echo'<h1 class="text-center" style="margin-top:150px">purchase a course to view!</h1>';
}
}
?>
