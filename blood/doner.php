<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .inputusername,
        .inputpassword {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="donor_regis.php">Donore Registration</a>
    <a href="#">User</a>
</nav>

<div class="container">
    <h2>Student Admission</h2>
    <form action="#" method="post">
        <div class="inputusername">
            <label for="username">Registration_id :</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="inputpassword">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>

</body>
</html>



<?php
 include("connection.php");
     if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM donor_registration WHERE registration_id='$username' AND password='$password'";
        $data = mysqli_query($conne, $query);
        $total = mysqli_num_rows($data);
      
        if($total != 0){
            $result = mysqli_fetch_assoc($data);
            header("Location: afterdonor.php?username=" . urlencode($username));
            exit;  
        }
    }


?>