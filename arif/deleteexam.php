<?php
        include("connected.php");


        $username = $_GET['username'];
        $course_code = $_GET['course_code'];
        $title = $_GET['title'];
        $topic = $_GET['topic'];
        $room_no = $_GET['room_no'];
        $exam_type = $_GET['exam_type'];
        $exam_date = $_GET['exam_date'];
        $exam_time = $_GET['exam_time'];

    $query = "DELETE FROM exam_date WHERE course_code='$course_code' 
    AND exam_dates='$exam_date'  AND exam_time='$exam_time'";
    $data = mysqli_query($conne, $query);

    if($data){
        


            header("Location: date.php?username=$username");


        }
?>