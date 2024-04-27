
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<nav>
    <ul>
      <li><a href="http://localhost/admissionSystem/login.php">Student Admission</a></li>
      <li><a href="#">Result</a></li>
      <li><a href="#">Attendance</a></li>
      <li><a href="#">Exam Date</a></li>
      <li><a href="#">Alumni</a></li>
    </ul>
  </nav>
  <form method="POST">

  <div class="contain">
        <h2 style>Course Management</h2>
        <div class="inputusername">
            <label for="username">Username :</label>
            <input type="text" name="username">
        </div>
        <div class="inputpassword">
            <label for="password">Password :</label>
            <input type="password" name="password">
        </div>
        <div class="submit">
            <input type="submit" name="submit" Value="Login">
        </div>
    </div>

  </form>
    
</body>
</html>

<?php
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

      
      
        if($username=='course' && $password=='course'){
            header("Location: http://localhost/admissionSystem/aftercourse.php");
            exit();
        }
    }
?>

