<?php

	include("connection.php");
	$id = $_GET['ids'];
    $query = "delete from teacher_details where teacher_id='$id'";
    $data = mysqli_query($conne,$query);

    $query1 = "delete from users_teacher where teacher_id='$id'";
    $data1 = mysqli_query($conne,$query1);

    $query2 = "delete from teacher where teacher_id='$id'";
    $data2 = mysqli_query($conne,$query2);

    if($data){
            
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/admissionSystem/teachList.php" />


            <?php
        }
?>