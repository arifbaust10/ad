

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login</title>
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
        
        
        <a href="http://localhost/arif/login.php">Teacher</a>
    </div>
    
    <div class="main">
        <form action="#" method="post">
            <div class="user_login_hader">
                <label for="hader">Login Form</label>
            </div>
            <div class="input">
                <div class="input_filed">
                    <label for="username">User Id</label>
                    <input type="text" id="username" name="username"> 
                </div>
    
                <div class="input_filed">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"> 
                </div>
                
                <div class="input_filed">
                    <input type="submit" id="submit" name="submit" value="Login"> 
                </div>
            </div>
        </form>
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


<?php
    include("connected.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users_student WHERE username='$username' AND password='$password'";
        $data = mysqli_query($conne, $query);
        $total = mysqli_num_rows($data);
      
        if($total != 0){
            $result = mysqli_fetch_assoc($data);
            header("Location: after_login.php?username=" . $result['username']);
            exit();
        }
    }
?>
