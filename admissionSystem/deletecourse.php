<?php
	include("connection.php"); 
    $course =  $_GET['course_code']; 
$query = "DELETE FROM course_details WHERE course_code='$course'";
$data = mysqli_query($conne,$query);
if($data){    
    header("Location: http://localhost/admissionSystem/courselist.php");
    exit(); 
}
?>
