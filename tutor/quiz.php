<?php 
if(!isset($_SESSION)){
    session_start();
}
include('head_side.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_tutorLogin'])){
    $tutorlogemail=$_SESSION['tuemail'];
}
?>

<form action="" class="fb">
    <h1>QUIZ</h1>
    <label for="checkid">Enter course ID:</label>
    <input type="text" id="checkid" name="checkid">
    <button type="submit" class="btn btn-danger" > search</button>

</form>

<?php 
$sql= "SELECT COURSE_ID FROM courses";
$result= $conn->query($sql);
while($row =$result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['COURSE_ID']){
        $sql="SELECT * FROM courses where COURSE_ID ={$_REQUEST['checkid']}";
        $result= $conn->query($sql);  
        $row =$result->fetch_assoc();
        if(($row['COURSE_ID']) == $_REQUEST['checkid']){
            $_SESSION['COURSE_ID'] = $row['COURSE_ID'];
            $_SESSION['COURSE_NAME'] = $row['COURSE_NAME'];
    
        ?>
       <br><br><h3 class="fb" style="text-align:center; width:40%"> <?php if(isset($row['COURSE_NAME'])) {echo $row['COURSE_NAME'];}?></h3><br><br>
 
        <div style="margin-bottom: 100px;">
<p class="cc text-white p-2 text-center " style="width:80%; margin:auto; "> Quizes</p>
    <?php
    $sql =" SELECT * FROM quiz where COURSE_ID={$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Quiz ID</th>
            <th scope='col'> Quiz Name</th>
            <th scope='col'> Quiz No</th>
            <th scope='col'> Total Questions</th>
            <th scope='col'> Action</th>
            <th scope='col'> View Quiz</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['QUIZ_ID'].'</th>';
            echo '<td>'.$row['QUIZ_NAME'].'</td>';
            echo '<td>'.$row['QUIZ_NO'].'</td>';
            echo '<td>'.$row['QUIZ_QUES'].'</td>';
            echo '<td>';

            echo '<form action="addquestion.php?QUIZ_ID='.$row["QUIZ_ID"].'" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["QUIZ_ID"].'>
            <button
            type="submit" 
            class="btn btn-secondary "
            name="add_ques"
            value="add_ques"
            style="background-color:#05b1a3; color:black;">
            <img height="20px" src="https://img.icons8.com/ios-glyphs/30/000000/add--v1.png"/>
            </button>
            </form>';

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["QUIZ_ID"].'>
                <button
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                style="background-color:gray;">
                <img height="20px" src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/>
                </button>
                </form>';

              
            '</td>';
            echo '<td>';
            echo '<form action="viewquestion.php?QUIZ_ID='.$row["QUIZ_ID"].'" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["QUIZ_ID"].'>
            <button
            type="submit" 
            class="btn btn-secondary "
            name="view"
            value="view"
            style="background-color:#05b1a3; color:black;">
           View
            </button>
            </form>';
            '</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> <br>
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM quiz WHERE QUIZ_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
  
 ?>
</div>

    <?php   


        }
       
    
}

}

?>

<div>
    <a class="btn box"  href="addquiz.php" style="background-color: #0CAAA5;">
    <img src="https://img.icons8.com/android/24/000000/plus.png"/>
    </a>

</div>