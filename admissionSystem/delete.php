<?php

	include("connection.php");
	$id = $_GET['ids'];
    $query = "delete from student_details where student_id='$id'";
    $data = mysqli_query($conne,$query);

    $query1 = "delete from users_student where student_id='$id'";
    $data1 = mysqli_query($conne,$query1);

    $query2 = "delete from student where student_id='$id'";
    $data2 = mysqli_query($conne,$query2);

    if($data){
            echo 'data is deleted';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/admissionSystem/display.php" />


            <?php
        }
?>