<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stustyles.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-dark  p-0 shadow " style=" background-color:#A0C7CE; ">
<a class="navbar-brand" ><img height="100px"src="../logoo.png"/></a>


</nav>

<div class="adform" style="width:60%">

<?php 
if(!isset($_SESSION)){
    session_start();
}
include("../dbconnection.php");

    $sql="SELECT QUIZ_NAME FROM quiz where QUIZ_ID='".$_GET['QID']."'";
    $result= $conn->query($sql);
    $row = $result ->fetch_assoc()
    ?>

    <h2 style="text-align:center; text-decoration:underline"><?php echo $row['QUIZ_NAME']?></h2><br><br>

<?php
if(isset($_SESSION['is_Login'])){
    $stulogemail=$_SESSION['email'];
$sql="INSERT into quizstat(QUIZ_ID, STU_EMAIL) values('".$_GET['QID']."', '".$stulogemail."')";
$result= $conn->query($sql);



$sql= " SELECT * FROM quizstat
WHERE QUIZ_STAT=' ' AND STAT_ID NOT IN
(
    SELECT Min(STAT_ID)
    FROM quizstat
    GROUP BY QUIZ_ID, STU_EMAIL
)";
$result= $conn->query($sql);

$sql="DELETE FROM quizstat
WHERE QUIZ_STAT=' ' AND STAT_ID NOT IN
(
    SELECT Min(STAT_ID) AS MaxRecordID
    FROM quizstat
    GROUP BY QUIZ_ID, STU_EMAIL
)";
$result= $conn->query($sql);


}
$sql= "SELECT * FROM addques as a join quizstat as q ON a.QUIZ_ID=q.QUIZ_ID where  q.QUIZ_STAT=' ' ";
$result= $conn->query($sql);
$q=0;
if($result -> num_rows >0){


echo '<form action="check.php?id='.$_GET['QID'].'" method="POST" style="margin-left:12%">';

    while($row = $result ->fetch_assoc()){ 
           $q++;
            echo'<h3>Q'.$q.' '. $row['QUIZ_QNO'].'</h3>';
            echo'<input style="margin-left:35px" type="radio" name="quizcheck['.$q.']" value="'.$row['OP_1'].'">';
            echo'<label>'.$row['OP_1'].'</label><br>';
            echo'<input style="margin-left:35px" type="radio" name="quizcheck['.$q.']" value="'.$row['OP_2'].'">';
            echo'<label>'.$row['OP_2'].'</label><br>';
            echo'<input style="margin-left:35px" type="radio" name="quizcheck['.$q.']" value="'.$row['OP_3'].'">';
            echo'<label>'.$row['OP_3'].'</label><br>';
            echo'<input style="margin-left:35px" type="radio" name="quizcheck['.$q.']" value="'.$row['OP_4'].'">';
            echo'<label>'.$row['OP_4'].'</label>';
            echo'<br><br>';
        }
        ?>
         <br><input  style="background-color: #0CAAA5;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); width:120px; font-size:16px;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    padding: 12px 20px; margin-left:40%;" type="submit" name="submit" value="submit">
    <?php
    
    }else{
            echo'<h3 style="text-align:center; color:brown;"><b>You have already given the test!</b></h3>';
            echo '<a href="courses.php"><button style="margin-left:45%; width:80px; height:40px; background-color:#0CAAA5; border:none; color:white; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);">Close</button></a>';

        }
?>
 
</form>
</div>

</body>
</html>