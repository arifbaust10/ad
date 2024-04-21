<?php

	include("connection.php");
	$id = $_GET['ids'];
    $query = "delete from alumni where student_id='$id'";
    $data = mysqli_query($conne,$query);

    if($data){
            echo 'data is deleted';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/alumni/display.php" />


            <?php
        }
?>