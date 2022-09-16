<?php
if(!isset($_SESSION)){
    session_start();
}
include('../dbconnection.php');

if(isset($_SESSION['is_Login'])){
    $stulogemail=$_SESSION['email'];
}
else{
    echo"<script>location.href='../index.php';</script>";
}

if(isset($stulogemail)){
    $sql="SELECT * FROM student WHERE STU_EMAIL= '$stulogemail'";
    $result= $conn ->query($sql);
    $row= $result->fetch_assoc();
    $STU_NAME=$row['STU_NAME'];
    $STU_IMG=$row['STU_IMG'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stustyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&family=Inter&family=Josefin+Sans:wght@500&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Watch Course</title>
</head>
<body>
<nav class="navbar navbar-dark  p-0 shadow" style=" background-color:#A0C7CE;">
<a class="navbar-brand" href="../index.php"><img height="100px"  src="../logoo.png"/><small class="text-white" style="text-shadow: 0px 8px 15px black; font-size: 30px;"> Student Area</small></a>
<a href="./courses.php"><button style="margin-right: 50px; width:160px;background-color:#0CAAA5; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);color:white; border:2px solid white; text-shadow: 0px 8px 15px black; height:45px;">My Courses</button></a>
</nav>    

    
<div class="bar1">
              <button onclick="document.getElementById('l1').style.display='block',document.getElementById('l2').style.display='none',document.getElementById('l4').style.display='none'">Lessons</button>
              <button onclick="document.getElementById('l1').style.display='none',document.getElementById('l2').style.display='block',document.getElementById('l4').style.display='none'">Quizes</button>
              <button onclick="document.getElementById('l1').style.display='none',document.getElementById('l2').style.display='none',document.getElementById('l4').style.display='block'">Course Certificate</button>

            

            </div>
<div  id="l1" >
    <h4 class="content1">Lessons</h4>
    <button class="bb" onclick="document.getElementById('f1').style.display='flex',document.getElementById('f2').style.display='none'">Video Lectures</button>  
    <button class="bb" onclick="document.getElementById('f1').style.display='none',document.getElementById('f2').style.display='flex'">PDF Lectures</button>
    <div class="flex" id="f1">
       <div id="playlist">
        <?php 
        if(isset($_GET['COURSE_ID'])){
            $COURSE_ID=$_GET['COURSE_ID'];
            $sql="SELECT * FROM contents WHERE COURSE_ID='$COURSE_ID' and CONTENT_PDF='../contentpdf/' ";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result-> fetch_assoc()){
                    $r=$row['CONTENT_DESC'];
                    echo'<button class="conb1" onclick="myfunc2()" id="playlist" movieurl='.$row['CONTENT_LINK'].'  style="cursor:pointer;">'.$row['CONTENT_NAME'].'</button>';
                    echo'<div class="contentp"><p>'.$row['CONTENT_DESC'].' </p></div>';                      
                }
                
            }
        }
        ?>
        </div>
        <div>  
            <video id="videoarea" src="" controls autoplay></video><br><br><br>
        </div>
    </div> 

    <div class="flex" id="f2">
       <div id="playlist1">
        <?php 
        if(isset($_GET['COURSE_ID'])){
            $COURSE_ID=$_GET['COURSE_ID'];
            $sql="SELECT * FROM contents WHERE COURSE_ID='$COURSE_ID' AND CONTENT_LINK='../contentvid/' ";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result-> fetch_assoc()){
                    echo'<button class="conb1"  id="playlist" movieurl='.$row['CONTENT_PDF']. '  style="cursor:pointer;">'.$row['CONTENT_NAME'].'</button>';
                }
                
            }
        }
        ?>
        </div>
        <div>   
        <iframe name="abc_frame" id="abs" src="" frameborder="0" scrolling="no" width="800px" height="450px" style="margin-top:-40px;"></iframe><br><br><br><br>
        </div>
    </div> 
    </div>
    
    <div id="l2">
        <h4 class="content1">Quizes</h4>
        <div class="flex1">
        <div id="playlist2">
    <button class="bb" onclick="document.getElementById('q1').style.display='block',document.getElementById('q2').style.display='none'">Quiz</button>  
    <button class="bb" onclick="document.getElementById('q1').style.display='none',document.getElementById('q2').style.display='block'">History</button>
    <div id="q1">
        <?php 
        if(isset($_GET['COURSE_ID'])){
            $COURSE_ID=$_GET['COURSE_ID'];
            $sql="SELECT * FROM quiz WHERE COURSE_ID='$COURSE_ID'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
               
                while($row=$result-> fetch_assoc()){
                    echo '<form action="quiz.php?QID='.$row["QUIZ_ID"].'" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["QUIZ_ID"].'>
                    <button
                    type="submit" 
                    class="btn  conb1"
                    name="view"
                    value="view">
                    '.$row["QUIZ_NAME"].'
                    </button> <br>
                    </form>';

                }
               
            } else{
                echo'<br><br><h4 style="margin-left:20%">0 quiz</h4>';
            }
        }
        ?>
        </div>


        <div id="q2">

            
    
    <?php
    $COURSE_ID=$_GET['COURSE_ID'];
    $sql="SELECT * FROM quiz WHERE COURSE_ID='$COURSE_ID'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result-> fetch_assoc()){
            $s=$row["QUIZ_ID"];
           $sql="SELECT * FROM history WHERE QUIZ_ID=$s  AND STU_EMAIL='".$stulogemail."'";
             $result=$conn->query($sql);
        if($result->num_rows>0){
            $q=0;
            ?>
                    
            <table class="table" >
            <thead>
            <tr>
                <th scope='col' colspan="2">QUIZ HISTORY</th>
            </tr>
            <tr>
                <th scope='col'> Sr No</th>
                <th scope='col'> Result</th>
    
            </tr>
            </thead>
            <tbody>
                <?php
            while($row=$result-> fetch_assoc()){
                $q++;
                echo '<tr>';
            echo '<th scope="row">'.$q.'</th>';
            echo '<td>'.$row['RESULT'].'</td>';
              '</tr>';
            }}else {
                echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
            }}}
    ?>
    
            
    </tbody>
    </table> 


        </div>
        </div>
       
        </div>
    </div>


    <div id="l4">

    <?php 
              $COURSE_ID=$_GET['COURSE_ID'];
              $s="SELECT * FROM quiz as a join quizstat as q  ON  a.QUIZ_ID =q.QUIZ_ID WHERE a.COURSE_ID='$COURSE_ID' AND q.QUIZ_STAT='DONE' AND a.QUIZ_NO='LAST' AND q.STU_EMAIL='".$stulogemail."'";
              $result=$conn->query($s);
              if($result -> num_rows >0){
            if(isset($_SESSION['is_Login'])){
                $stulogemail=$_SESSION['email'];
                $sql =" SELECT STU_NAME FROM student where STU_EMAIL='".$stulogemail."'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            }
          ?>
            <div style="width:1000px; height:700px; padding:20px; text-align:center; border: 10px solid #525050; background-color:#A0C7CE; margin:auto; margin-top:60px; margin-bottom:60px;">
            <div style="width:920px; height:630px; padding:40px; text-align:center; border: 5px solid #525050;  margin:auto;">
                   <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
                   <br><br>
                   <span style="font-size:25px"><i>This is to certify that</i></span>
                   <br>
                   <span style="font-size:30px;"><b><?php echo $row['STU_NAME'] ?></b></span><br><br>
                   <span style="font-size:25px"><i>has successfully completed the course</i></span> <br>
                   <?php 
                      if(isset($_GET['COURSE_ID'])){
                        $COURSE_ID=$_GET['COURSE_ID'];
                        $sql =" SELECT COURSE_NAME FROM courses where COURSE_ID='".$COURSE_ID."' ";
                       $result=$conn->query($sql);
                       $row=$result->fetch_assoc();
                       ?>
                   <b><span style="font-size:30px"><?php echo $row['COURSE_NAME'] ?></span></b> <br><br>
                   <span style="font-size:20px">an online non-credit course offered through <b>E-Tutoring</b></span> <br><br>
                   <span style="font-size:25px"><i>dated</i></span><br>
                 <b> <span  id="d" style="font-size:25px"></span></b><br><br>
                 <img src="../logoo.png" height="100px">
            </div>
            </div>
    
    
            <script>
                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                document.getElementById("d").innerHTML= date;
                </script>
<?php
          }}else{
            echo'<h3 class="text-center" style="margin-top:200px;"> complete the course to earn a certificate! </h3>';
          }
?>
    </div>


    <script>
              $(document).ready(function(){
         $(function(){
        $("#playlist1 button").on("click",function(){
            $("#abs").attr({
                src:$(this).attr("movieurl"),
            });       
        });
        });

     
        
        });
    </script>

    <script type="text/javascript" src="../js/custom2.js" >
     

    </script>
</body>
</html>




