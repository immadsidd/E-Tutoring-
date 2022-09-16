

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
<a class="navbar-brand"><img height="100px"src="../logoo.png"/></a>
</nav>
    <div class="adform">
        <h1 style="text-align:center">Result</h1><br>
<?php
if(!isset($_SESSION)){
    session_start();
}
include("../dbconnection.php");
if(isset($_POST['submit'])){

    if(!empty($_POST['quizcheck'])){
        $count= count($_POST['quizcheck']);
        $S=$_GET['id'];
        $sql= "SELECT QUIZ_QUES from quiz where QUIZ_ID=$S";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        echo "<h3 style='text-align:center'>Out of ".$row['QUIZ_QUES'].", you have selected ".$count." options</h3>";
    } 

    $select =$_POST['quizcheck'];
    //print_r($select);
    $i=1;
    $rr=0;
    $sql= "SELECT * from addques where QUIZ_ID=$S";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        //echo($row['OP_C']);
       
        
            $check = $row['OP_C'] == $select[$i];

            if($check){
                $rr++;
            }
        
       
        $i++;

    }

    echo " <h3 style='text-align:center'>Your total score is ".$rr."</h3>";
    $id=$_GET['id'];
    $stulogemail=$_SESSION['email'];
    $sql="INSERT into history (QUIZ_ID, RESULT, STU_EMAIL) VALUES($id, '$rr','".$stulogemail."')";
    $result=$conn->query($sql);
}

?>



        <form  method="POST" class="d-inline"><br><br>
            <input style="background-color: #0CAAA5;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    width:120px; font-size:16px;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    padding: 12px 20px; margin-left:40%;"type="submit" value="done"  name="done">       
         </form>
<?php
 $idd=$_GET['id'];
         if(isset($_POST['done'])){
            $stulogemail=$_SESSION['email'];
            $sql="UPDATE quizstat SET QUIZ_STAT='DONE' WHERE QUIZ_ID=$idd and STU_EMAIL='".$stulogemail."'"  ;
             $result=$conn->query($sql);
             ?>
             <script> location.href='courses.php'</script>

        <?php }?>

        </div>

</body>
</html>
