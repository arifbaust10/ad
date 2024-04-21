<?php

	include("connection.php");
	$ids = mysqli_real_escape_string($conne, $_GET['ids']); 
    $course = mysqli_real_escape_string($conne, $_GET['course']); 
    $query = "DELETE FROM students_course WHERE student_id='$ids' AND course_code='$course'";

    $data = mysqli_query($conne,$query);

    if($data){    
     

            header("Location: http://localhost/department/regis.php");


           
        }
?>