
<?php
include("connection.php");

if (isset($_GET['username'])) {
    $username = $_GET['username']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Article Example</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
    }
    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    p {
        line-height: 1.6;
        color: #666;
    }
    .author-info {
        margin-top: 30px;
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }
    .author-info p {
        margin: 0;
    }
      
  nav {
    background-color: #e9ecef;
    
    padding: 10px;
  }
  
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
  }
  
  nav li {
    display: inline-block;
    margin: 0 10px;
    padding: 4px;
  }
  
  nav a {
    color: #007bff;
    text-decoration: none;
  }
  
  nav li:hover {
    /* Your hover styling goes here */
    /* For example, change the background color */
    background-color: #ccc;
  }
</style>
</head>
<body>
<nav>
    <ul>
      <li><a href="#">Attendance</a></li>
      <li><a href="#">Exam Date</a></li>
      
      <li><a href="#">Result</a></li>
      <li><a href="studentissue.php?username=<?php echo $username; ?>">Issue Book</a></li>
      <li><a href="http://localhost/Library/studentlogin.php">Log Out</a></li>
      
    </ul>
  </nav>
  

<div class="container">
    <h1>The Benefits of Reading Books</h1>
    <p>Reading is one of the most beneficial activities one can engage in. It not only expands your knowledge but also enhances your cognitive abilities. Here are some of the key benefits of reading:</p>
    <ul>
        <li>Improves vocabulary and language skills</li>
        <li>Enhances concentration and focus</li>
        <li>Reduces stress and promotes relaxation</li>
        <li>Boosts empathy and emotional intelligence</li>
        <li>Stimulates creativity and imagination</li>
    </ul>
    <p>Furthermore, reading can transport you to different worlds, introduce you to new ideas, and inspire you to pursue your dreams.</p>
    
</div>

</body>
</html>
