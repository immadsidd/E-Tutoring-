
<?php
 $sql =" SELECT * FROM details";
 $result=$conn->query($sql);
$row = $result->fetch_assoc();
?>
<footer>
    <div class="flexbox">

            <h2 style="font-size:18px; margin-top:10px; text-align:center;">Wheather you stay with us for one week or one year, we will make sure you have the right time of your life</h2>
            <br><h4 style="text-align:center;">Follow us on</h4><br>
            <a href="<?php echo $row['SOCIAL_FB'];?>" target="blank" style="float:none; margin-left:42%;" class="fa fa-facebook"></a>
            <a href="<?php echo $row['SOCIAL_IN'];?>" target="blank" style="float:none;" class="fa fa-instagram"></a>
            <a href="<?php echo $row['SOCIAL_TW'];?>" target="blank" style="float:none;"class="fa fa-twitter"></a>
            <a href="<?php echo $row['SOCIAL_PI'];?>" target="blank" style="float:none;"class="fa fa-pinterest"></a>
    </div> 
</footer>
<style>
    .adb1{
        border: none;
        background-color: white;
        text-decoration: underline;
    }
</style>
<p class="fp"> <b>&copy E-Tutoring Website || &nbsp;</b><button type="button" class="adb1" data-bs-toggle="modal" data-bs-target="#admin-login">admin-login</button></p>
   
 <!--admin login page-->
 <div class="modal fade" id="admin-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Login Area</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body admin">
      <div class="admin" id="ad">
            <form >
              <label for="email">E-mail</label>
              <input type="email" id="ademail" name="email" placeholder="Your Email..">
              <label for="password">Password</label>
              <input type="password" id="adpass" name="password" placeholder="Your password..">
              <input type="button" value="Login" onclick="adlogin()">
              <small id="admsg"></small>
            </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!--admin login page end-->
<script type="text/javascript" src="js/ajax4.js"></script>
<script src="js/adminajaxreq.js"></script>
<script src="js/tutorsajax3.js"></script>

</body>
</html>