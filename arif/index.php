<?php
    include("connected.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Management System</title>
<link rel="stylesheet" href="index.css">


</head>
<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">Home</a>
    <a href="#">Teachers</a>
    <a href="#">Attendance</a>
    <a href="#">Reports</a>
</div>

<div class="content" id="main">
    <div class="navbar">
        <a href="#" onclick="openNav()">☰</a>
       
        <a href="http://localhost/department/">Department</a>
        
        <a href="http://localhost/student/">Student</a>
        
        <a href="http://localhost/arif/login.php">Teacher</a>
    </div>
    
    <div class="container">
        <h1>Why BAUST Needs a Dedicated System</h1>
        <p>In any educational institution, managing attendance is a critical task that impacts various aspects of academic performance, administrative efficiency, and overall student welfare. Bangladesh Army University of Science and Technology (BAUST), Saidpur, being a leading institution in the region, requires a robust attendance management system to ensure smooth operations and foster a conducive learning environment. Let's delve into why such a system is indispensable for BAUST Saidpur:</p>

        <h2>1. Accuracy and Efficiency:</h2>
        <p>Attendance management systems eliminate the inaccuracies associated with manual methods. By automating the process, BAUST can ensure precise tracking of student attendance without the errors that may arise from manual entry. This enhances the overall efficiency of administrative tasks, freeing up time and resources for other essential activities.</p>

        <h2>2. Real-time Monitoring:</h2>
        <p>With a dedicated attendance management system, BAUST administrators and faculty members can monitor attendance in real-time. This allows for timely interventions in cases of irregular attendance, enabling proactive measures to support students who may be struggling academically or facing personal challenges.</p>       
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
</html>
