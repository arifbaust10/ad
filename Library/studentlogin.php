<?php
    include("connection.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM library WHERE username='$username' AND password='$password'";
        $data = mysqli_query($conne, $query);
        $total = mysqli_num_rows($data);
      
        if($total != 0){
            $result = mysqli_fetch_assoc($data);
            header("Location: student.php?username=" . $result['username']);
            exit();
        }
    }
?>

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
      <li><a href="http://localhost/Library/login.php">Library</a></li>
      <li><a href="http://localhost/alumni/login.php">Alumni</a></li>
    </ul>
  </nav>
  
  <main>
    <form method="POST" class="login-form">
      <div class="contain">
        <h2>Student Login For Library </h2>
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






