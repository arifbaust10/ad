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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
  <input type="submit" name="Update">
</form>


    
</body>
</html>

<?php
if (isset($_POST['Update'])) {
    
    echo "Reached inside if block<br>"; // Debugging statement
    
    $sql = "INSERT INTO `attendance`(`student_id`, `course_code`, `date`, `present_state`, `comment`) VALUES (220201010,'cse2206','2029-01-21','present','asdf')";
    echo $sql;
    $data=mysqli_query($conne, $sql);
    echo $data;
    // Check for SQL errors
    // if (mysqli_query($conne, $sql)) {
    //     echo "Record inserted successfully<br>"; // Debugging statement
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conne);
    // }
    
    echo "Reached end of if blocafdsfsadfasfsdfdsafk<br>"; // Debugging statement
}
?>
