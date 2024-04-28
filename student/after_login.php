<?php
include("connected.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query ="SELECT *
    FROM users_student as us INNER JOIN
         student as s
         on us.student_id=s.student_id
         INNER JOIN 
         student_details as stds 
         on stds.student_id=s.student_id
         INNER JOIN 
         department as d
         on d.department_id=s.department_id
         WHERE us.username='$username'";

    $data = mysqli_query($conne, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Management System</title>
<link rel="stylesheet" href="demo.css">
<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">Home</a>
    <a href="#">Students</a>
    <a href="#">Teachers</a>
    <a href="#">Attendance</a>
    <a href="#">Reports</a>
</div>

<div class="content" id="main">
    <div class="navbar">
        <a href="#" onclick="openNav()">☰</a>
        <a href="http://localhost/student/examdate.php?username=<?php echo $username; ?>">Exam Schedule</a>

        <a href="http://localhost/student/attandance.php?username=<?php echo $username; ?>">Attendance</a>
        <a href="http://localhost/arif/index.php">Logout</a>
    </div>
    
    <div class="main" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
    <?php
    if (isset($data)) {
        while ($result = mysqli_fetch_assoc($data)) {
           
            echo '<p style="margin: 5px 0;">Student id: ' . $result['student_id'] . '</p>';
            echo '<p style="margin: 5px 0;">Student Name: ' . $result['student_name'] . '</p>';
            echo '<p style="margin: 5px 0;">Department: ' . $result['department_name'] . '</p>';
            echo '<p style="margin: 5px 0;">Batch: ' . $result['batch'] . '</p>';
            echo '<p style="margin: 5px 0;">Section: ' . $result['section'] . '</p>';
            echo '<p style="margin: 5px 0;">Phone: ' . $result['phone'] . '</p>';
            echo '<p style="margin: 5px 0;">Email: ' . $result['email'] . '</p>';
            echo '<p style="margin: 5px 0;">Address: ' . $result['address'] . '</p>';
            echo '<p style="margin: 5px 0;">Date of Birth: ' . $result['date_of_birth'] . '</p>';
            echo '<p style="margin: 5px 0;">Gender: ' . $result['gender'] . '</p>';
            
        }
    }
    ?>
</div>

</div>

<script>
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>

</body>
</html

