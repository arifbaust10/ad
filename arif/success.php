 
<?php
include("connected.php");

if(isset($_POST['Update'])) {
    $classDate = $_POST['classDate'];
    $studentIds = $_POST['student_id'];
    $courseCodes = $_POST['course_code'];
    $presentStates = isset($_POST['check']) ? $_POST['check'] : array(); 

    for($i = 0; $i < count($studentIds); $i++) {
        $studentId = $studentIds[$i];
        $courseCode = $courseCodes[$i];
        
        $presentState = (in_array($studentId, $presentStates)) ? 'present' : 'absent';

        $query = "INSERT INTO `attendance`(`student_id`, `course_code`, `date`, `present_state`) 
                  VALUES ('$studentId', '$courseCode', '$classDate', '$presentState')";

        mysqli_query($conne, $query);
    }
    // Redirect to success page or do something else after insertion
    //header("Location: success.php?username=$username");
    // exit();
}
?>
