<?php
include("connected.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query ="SELECT t.teacher_id,t.teacher_name,t.department_id,d.department_name,td.designation,td.phone,td.email,td.address,td.date_of_birth,td.gender,td.education_qualification,td.areas_of_interest
FROM users_teacher AS ut INNER JOIN 
     teacher as t 
     on t.teacher_id =ut.teacher_id
     INNER JOIN
     teacher_details as td
     on td.teacher_id =t.teacher_id
     INNER JOIN
     department as d
     on d.department_id = t.department_id
     WHERE username='$username'";

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
        <a href="http://localhost/arif/date.php?username=<?php echo $username; ?>">Exam Schedule</a>

        <a href="http://localhost/arif/attandanceMain.php?username=<?php echo $username; ?>">Attendance</a>
        <a href="http://localhost/arif/index.php">Logout</a>
    </div>
    
    <div class="main">
        <?php
        if (isset($data)) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo '<p>Teacher ID: ' . $result['teacher_id'] . '</p>';
                echo '<p>Teacher Name: ' . $result['teacher_name'] . '</p>';
                echo '<p>Department: ' . $result['department_name'] . '</p>';
                echo '<p>Designation: ' . $result['designation'] . '</p>';
                echo '<p>Phone: ' . $result['phone'] . '</p>';
                echo '<p>Email: ' . $result['email'] . '</p>';
                echo '<p>Address: ' . $result['address'] . '</p>';
                echo '<p>Date of Birth: ' . $result['date_of_birth'] . '</p>';
                echo '<p>Gender: ' . $result['gender'] . '</p>';
                echo '<p>Education Qualification: ' . $result['education_qualification'] . '</p>';
                echo '<p>Areas of Interest: ' . $result['areas_of_interest'] . '</p>';
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

