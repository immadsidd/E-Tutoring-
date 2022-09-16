<?php
include('./dbconnection.php');
include('header.php');
session_start();
if(!isset($_SESSION['email'])){
    echo"<script>
    alert('Login to your account to buy a course');
    location.href='index.php'
    </script>";
}
else{
    ?>
<?php
if(isset($_REQUEST['pay'])){
    $COURSE_ID=$_REQUEST["COURSE_ID"];
    $COURSE_AUTHOR=$_REQUEST["COURSE_AUTHOR"];
    $STU_ID=$_REQUEST["STU_ID"];
    $A_Name=$_REQUEST["ACC_Name"];
    $A_CNO=$_REQUEST["ACC_CNO"];
    $C_PRICE=$_REQUEST["COURSE_PRICE"];
    $sql="SELECT * from account";
    $result= $conn->query($sql);
    $row =$result->fetch_assoc();
    if( ($conn-> query($sql)== TRUE)&&($A_Name==$row['ACC_NAME'])&&($A_CNO==$row['ACC_CNO'])){
        if($row['ACC_BAL']>=$C_PRICE){
            $bal=$row['ACC_BAL']-$C_PRICE;
            $sql ="UPDATE account SET ACC_BAL='$bal'";
            if ($conn-> query($sql) == TRUE){
                $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> PAYMENT SUCCESFUL</div>';
                $sql="INSERT INTO transactions (STU_ID,COURSE_ID,COURSE_PRICE,COURSE_AUTHOR) VALUES ('$STU_ID','$COURSE_ID','$C_PRICE','$COURSE_AUTHOR')";
                
                if ($conn-> query($sql)== TRUE){
                    echo"<script>location.href='student/courses.php'</script>";
                }
                
            }
      
        }
        else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">INSUFFICIENT BALANCE</div>';
            } 
    }
    else{
        echo"<script>window.alert('incorrectdetails')</script>";
    }
   

    }


?>

<?php
if(isset($_REQUEST['easypay'])){
    $COURSE_ID=$_REQUEST["COURSE_ID"];
    $COURSE_AUTHOR=$_REQUEST["COURSE_AUTHOR"];
    $STU_ID=$_REQUEST["STU_ID"];
    $A_NUM=$_REQUEST["EASYACC_NUM"];
    $A_EMAIL=$_REQUEST["EASYACC_EMAIL"];
    $C_PRICE=$_REQUEST["COURSE_PRICE"];
    $sql="SELECT * from easyaccount";
    $result= $conn->query($sql);
    $row =$result->fetch_assoc();
    if( ($conn-> query($sql)== TRUE)&&($A_NUM==$row['EASYACC_NUM'])&&($A_EMAIL==$row['EASYACC_EMAIL'])){
        if($row['EASYACC_BAL']>=$C_PRICE){
            $bal=$row['EASYACC_BAL']-$C_PRICE;
            $sql ="UPDATE easyaccount SET EASYACC_BAL='$bal'";
            if($conn-> query($sql) == TRUE){
                $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> PAYMENT SUCCESFUL</div>';
                $sql="INSERT INTO transactions (STU_ID,COURSE_ID,COURSE_PRICE,COURSE_AUTHOR) VALUES ('$STU_ID','$COURSE_ID','$C_PRICE','$COURSE_AUTHOR')";
                
                if($conn-> query($sql)== TRUE){
                    echo"<script>location.href='student/courses.php'</script>";
                }
                
            }
      
        }
        else{
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">INSUFFICIENT BALANCE</div>';
            } 
    }
    else{
        echo"<script>window.alert('incorrectdetails')</script>";
    }

    }


?>
<?php
if(isset($_GET['COURSE_ID'])){
    $COURSE_ID= $_GET['COURSE_ID'];
    $sql="SELECT * FROM courses WHERE COURSE_ID='$COURSE_ID'";
    $result= $conn->query($sql);
    $row= $result->fetch_assoc();
    $_SESSION['COURSE_ID'] = $row['COURSE_ID'];
    $_SESSION['COURSE_NAME'] = $row['COURSE_NAME'];
    $_SESSION['COURSE_PRICE'] = $row['COURSE_PRICE'];
}  



?>

<style>
    body{
        background-color:#A0C7CE; 
    }
    .navbar{
        position: absolute;
    }
</style>
<div id="f" class="wrapper">
<form  action="" method="POST" enctype="multipart/form-data">
            <!--Account Information Start-->
            <h4>Course details</h4>
            <label for="COURSE_NAME">Course Name:</label>
            <div class="input_group">
                <div class="input_box">
                    
                    <input type="text" class="form-control" id="COURSE_NAME" name="COURSE_NAME" placeholder="Course Name" required class="name" value="<?php if(isset($row['COURSE_NAME'])){echo $row['COURSE_NAME'];} ?>" readonly>
                  
                
                </div>
              
            </div>
            <label for="COURSE_ID">Course ID:</label>
            <div class="input_group">
                <div class="input_box">
                    
                    <input type="text" class="form-control" id="COURSE_ID" name="COURSE_ID" placeholder="Course Name" required class="name" value="<?php if(isset($row['COURSE_ID'])){echo $row['COURSE_ID'];} ?>" readonly>
                
                </div>
              
            </div>
            <label for="COURSE_ID">Course Author:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="COURSE_AUTHOR" name="COURSE_AUTHOR" required class="name" value="<?php if(isset($row['COURSE_AUTHOR'])){echo $row['COURSE_AUTHOR'];} ?>" readonly>
                   
                </div>
            </div>
            <label for="COURSE_ID">Course Price:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="COURSE_PRICE" name="COURSE_PRICE" required class="name" value="<?php if(isset($row['COURSE_PRICE'])){echo $row['COURSE_PRICE'];} ?>" readonly> 
    
                    
                </div>
            </div>
        <div id="form1">
      
        <?php
        if(isset($_SESSION['is_Login'])){
            $stulogemail=$_SESSION['email'];
        $sql="SELECT * from student WHERE STU_EMAIL= '$stulogemail'";
        $result= $conn->query($sql);
        $row =$result->fetch_assoc();
        $_SESSION['STU_ID'] = $row['STU_ID'];
        }
        ?>
         <h4>Account details</h4>
        <label for="STU_ID">Student ID</label>
        <div class="input_group">
                <div class="input_box">
                    <input type="text" class="  form-control"  id="STU_ID" name="STU_ID" value="<?php if(isset($row['STU_ID'])){echo $row['STU_ID'];} ?>" readonly>
                </div>
            </div>
        <label for="ACC_Name">Account Name</label>
        <input type="text" class="form-control" id="ACC_Name" name="ACC_Name" ><br>
        <label for="ACC_CNO">Card NO</label>
        <input type="text" class="form-control" id="ACC_CNO" name="ACC_CNO" ><br>
        <button type="submit" class="btn btn-primary" name="pay" id="pay">Pay</button>

        <?php if(isset($msg)){echo $msg;}?>
        </div>

        <div id="form2">
        <?php
        if(isset($_SESSION['is_Login'])){
            $stulogemail=$_SESSION['email'];
        $sql="SELECT * from student WHERE STU_EMAIL= '$stulogemail'";
        $result= $conn->query($sql);
        $row =$result->fetch_assoc();
        $_SESSION['STU_ID'] = $row['STU_ID'];
        }
        ?>
        <h4>Easypaisa Account details</h4>
        <label for="STU_ID">Student ID</label>
        <div class="input_group">
                <div class="input_box">
                    <input type="text" class="  form-control"  id="STU_ID" name="STU_ID" value="<?php if(isset($row['STU_ID'])){echo $row['STU_ID'];} ?>" readonly>
                </div>
            </div>
        <label for="EASYACC_NUM">Mobile Number</label>
        <input type="text" class="form-control" id="EASYACC_NUM" name="EASYACC_NUM" ><br>
        <label for="EASYACC_EMAIL">Email</label>
        <input type="text" class="form-control" id="EASYACC_EMAIL" name="EASYACC_EMAIL" ><br>
        <button type="submit" class="btn btn-primary" name="easypay" id="easypay">Pay</button>

        <?php if(isset($msg)){echo $msg;}?>
       
    </div>
         
            </form>
            <div id="hidebtn" class="input_group">
                <div class="input_box">
                    <h4>Payment Mehtod</h4>
                    <button onclick="document.getElementById('form1').style.display='Block',document.getElementById('form2').style.display='none',document.getElementById('hidebtn').style.display='none'" >Credit card</button>
                    <br><br><button onclick="document.getElementById('form2').style.display='Block',document.getElementById('form1').style.display='none',document.getElementById('hidebtn').style.display='none'" >Easy Paisa</button>
                  
                </div>
            </div>
            
        
       
        </div>
        
        



<?php 
}

?>