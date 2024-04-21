<?php
if (isset($_POST['Update'])) {
    
    echo "Reached inside if blockss<br>"; // Debugging statement
    
    $sql = "INSERT INTO `attendance`(`student_id`, `course_code`, `date`, `present_state`, `comment`) VALUES (220201010,'cse2206','2029-01-21','present','asdf')";
    
    // Check for SQL errors
    if (mysqli_query($conne, $sql)) {
        echo "Record inserted successfully<br>"; // Debugging statement
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conne);
    }
    
    echo "Reached end of if block<br>"; // Debugging statement
}
?>
