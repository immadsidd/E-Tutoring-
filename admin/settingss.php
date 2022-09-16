<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>



<?php
if(isset($_REQUEST['save'])){
    $C_NO=$_REQUEST["C_NO"];
    $C_E=$_REQUEST["Email"];
    $C_W=$_REQUEST["web"];
    $FB=$_REQUEST["FB"];
    $IN=$_REQUEST["IN"];
    $PI=$_REQUEST["PI"];
    $TW=$_REQUEST["TW"];
    $ABOUT=$_REQUEST["ABOUT"];
    $sql="UPDATE details set  DETAILS_CNO='$C_NO',DETAILS_EMAIL='$C_E',DETAILS_SITE='$C_W' ,SOCIAL_FB='$FB',SOCIAL_IN='$IN', SOCIAL_PI='$PI', SOCIAL_TW='$TW', ABOUT='$ABOUT' ";
    $result= $conn->query($sql);
    }
?>



<div id="f" class="wrapper">
<form  action="" method="POST" enctype="multipart/form-data">
           <?php
            $sql = "SELECT * FROM details";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="bbbb">
            <div style="width:40%">
            <h4>Details</h4>
            <label >Contact No:</label>
            <div class="input_group">
                <div class="input_box">                  
                    <input type="text" class="form-control"id="C_NO" name="C_NO" value="<?php if(isset($row['DETAILS_CNO'])){echo $row['DETAILS_CNO'];} ?>" required class="name" readonly>
                </div>
            </div>
            <label >Email Address:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="C_E"  name="Email" value="<?php if(isset($row['DETAILS_EMAIL'])){echo $row['DETAILS_EMAIL'];} ?>"  required class="name" readonly>
                </div>
            </div>
            <label >Website:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="C_W"  name="web" value="<?php if(isset($row['DETAILS_SITE'])){echo $row['DETAILS_SITE'];} ?>" required class="name" readonly>
                   
                </div>
            </div>
            </div>

            <div style="width:40%">
            <h4>Social Links</h4>
            <label >Facebook:</label>
            <div class="input_group">
                <div class="input_box">                  
                    <input type="text" class="form-control"id="FB" name="FB" value="<?php if(isset($row['SOCIAL_FB'])){echo $row['SOCIAL_FB'];} ?>" required class="name" readonly>
                </div>
            </div>
            <label >Instagram:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="IN"  name="IN"value="<?php if(isset($row['SOCIAL_IN'])){echo $row['SOCIAL_IN'];} ?>" required class="name" readonly>
                </div>
            </div>
            <label >Pinterest:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="PI"  name="PI"value="<?php if(isset($row['SOCIAL_PI'])){echo $row['SOCIAL_PI'];} ?>" required class="name" readonly>
                </div>
            </div>

            <label >Twitter:</label>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="form-control" id="TW"  name="TW"value="<?php if(isset($row['SOCIAL_TW'])){echo $row['SOCIAL_TW'];} ?>" required class="name" readonly>
                   
                </div>
            </div>
            </div>

            <div style="width:40%">
            <h4>ABOUT</h4>
            <label >MOTIVE</label>
            <div class="input_group">
                <div class="input_box">                  
                    <textarea class="form-group" id="ABOUT" name="ABOUT" required class="name"
                        rows=12 cols=40 readonly><?php if(isset($row['ABOUT'])){echo $row['ABOUT'];} ?></textarea>

                </div>
            </div>
    
            </div>
            </div>
        <input type="submit" id="save" class="inb" name="save"  value="submit">
        <input type="button" id="edit" class="inb" name="edit" value="edit">
</form>
</div>

<script>
    var readonly = true;
$('.wrapper input[type="button"]').on('click', function() {
    $('.wrapper input[type="text"], .wrapper textarea').attr('readonly', !readonly);

    readonly = !readonly;
    document.getElementById("edit").style.display = "none";
    document.getElementById("save").style.display = "block";
    return false;
});
</script>