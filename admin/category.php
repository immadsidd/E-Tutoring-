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
    $sno=0;
    ?>
     <table class="table" >
        <thead>
        <tr>
            <th scope='col'> Sr No</th>
            <th scope='col'> Category</th>
            <th scope='col'> Action</th>

        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
                $sno= $sno+1;
            echo '<tr>';
            echo '<th scope="row">'.$sno.'</th>';
            echo '<td>'.$row['CAT_NAME'].'</td>';
            echo '<td>';


            echo '<a href="courses.php?COURSE_CAT='.$row['CAT_ID'].'"><button
                type="submit" 
                class="btn btn-secondary "
                name="view"
                value="view"
                style="background-color:#0CAAA5; color:black; ">view courses
                </button></a>';
               
                
            '</td>';
        '</tr>';
    } ?>
    </tbody>
    </table> 

<?php
    }
?>
</div>


