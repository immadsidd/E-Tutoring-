<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>


<div >
    <p class="cc text-white p-2 text-center"> List of Categories</p>
    <?php
   
    $sql =" SELECT * FROM category";
    $result = $conn->query($sql);
    if($result -> num_rows >0){

    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Category ID</th>
            <th scope='col'> Category Name</th>
            <th scope='col'> Category Img</th>
            <th scope='col'> Action</th>
            <th scope='col'> Feature</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['CAT_ID'].'</th>';
            echo '<td>'.$row['CAT_NAME'].'</td>';
            echo '<td>'.$row['CAT_IMG'].'</td>';
            echo'<td>';
            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["CAT_ID"].'>
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

            echo'<form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["CAT_ID"].'>
            <button style="background-color: khaki;"
            type="submit" 
            class="btn btn-secondary "
            name="feature"
            value="feature"
            style="background-color:gray;">
            <img height="20px" src="https://img.icons8.com/ios-glyphs/100/000000/star--v1.png"/>
            </button>
            </form>';

            echo'<form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["CAT_ID"].'>
            <button style="background-color: brown;"
            type="submit" 
            class="btn btn-secondary "
            name="not_feature"
            value="not_feature"
            style="background-color:gray;">
            <img height="20px" src="https://img.icons8.com/ios/50/000000/star--v1.png"/>
            </button>
            </form>'; 

              '</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM category WHERE CAT_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
if(isset($_REQUEST['feature'])){
    $sql = "UPDATE category set CAT_FEA='FEATURED' WHERE CAT_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Content added sucessfully</div>';
        echo"<script>window.alert('category featured') </script>";
    } else{
        echo"<script>window.alert('category not featured') </script>";
    }

}
 
if(isset($_REQUEST['not_feature'])){
    $sql = "UPDATE category set CAT_FEA='NOT_FEATURED' WHERE CAT_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo"<script>window.alert('category not featured') </script>";
    } else{
        echo"<script>window.alert('category featured') </script>";
    }

}
  
 ?>
</div>


<div>
    <a class="btn box" href="cat.php" style="background-color: #0CAAA5; float:right; margin-right:20px">
    <img src="https://img.icons8.com/android/24/000000/plus.png"/>
    </a>

</div>
<br> <br><br>
<div class="fea">
 <p class="cc text-white p-2 text-center"> Featured Categories</p>
<table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Name</th>
            <?php
                $sql = "SELECT * FROM category WHERE  CAT_FEA ='FEATURED'";
               $result = $conn->query($sql);
          if($result -> num_rows >0){
            $sno= 0;
          ?>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                 $sno= $sno+1;
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<td>'.$row['CAT_NAME'].'</td>';
            '</tr>';
        } ?>
        </tbody>
        </table> 
   <?php }
            
   ?>
</div>

