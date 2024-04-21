<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Management Systems</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>

  <nav>
    <ul>
    <li><a href="http://localhost/Library/">Home</a></li>
      <li><a href="#">Admission</a></li>
      <li><a href="#">Attendance</a></li>
      <li><a href="#">Exam Date</a></li>
      <li><a href="#">Result</a></li>
    </ul>
  </nav>
  
  <main>
    <form method="POST" class="login-form">
      <div class="contain">
        <h2>Admin Login</h2>
        <div class="input-group">
          <label for="username">Username :</label>
          <input type="text" name="username" id="username">
        </div>
        <div class="input-group">
          <label for="password">Password :</label>
          <input type="password" name="password" id="password">
        </div>
        <div class="submit">
          <input type="submit" name="submit" value="Login">
        </div>
      </div>
    </form>
  </main>
  
  <footer>
    <p>&copy; 2024 University Management Systems</p>
  </footer>

</body>
</html>



<?php
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

      
      
        if($username=='admin' && $password=='admin'){
            header("Location: http://localhost/alumni/home.php");
            exit();
        }
    }
?>

