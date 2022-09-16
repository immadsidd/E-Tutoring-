<?php 
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include_once('../dbconnection.php');
?>

<p class="cc text-white p-2 text-center ">  <a href="category.php"><img  style="border-radius:100%" height="45px"src="https://img.icons8.com/sf-black-filled/64/000000/circled-left-2.png"/></a> List of Lectures</p>
    <?php
    $sql =" SELECT * FROM contents WHERE COURSE_ID ={$_GET['COURSE_ID']}";
    $result = $conn->query($sql);
    if($result -> num_rows >0){
        $sno= 0;

    ?>
    <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Content ID</th>
            <th scope='col'>Content Name</th>
            <th scope='col'>Content Video Link</th>
            <th scope='col'>Content PDF Link</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
   
            <?php while($row = $result ->fetch_assoc()){
            $sno= $sno+1; 
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<th scope="row">'.$row['CONTENT_ID'].'</th>';
            echo '<td>'.$row['CONTENT_NAME'].'</td>';
            if( "../contentvid/"===$row['CONTENT_LINK']){ 
                echo '<td>---</td>';} else{ echo '<td>'.$row['CONTENT_LINK'].'</td>'; };
            
            if( "../contentpdf/"===$row['CONTENT_PDF']){ 
                    echo '<td>---</td>';} else{ echo '<td>'.$row['CONTENT_PDF'].'</td>'; };
            echo '<td>';


            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["CONTENT_ID"].'>
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
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
     echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM contents WHERE CONTENT_ID ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
  
 ?>
</div>


