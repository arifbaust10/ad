<?php
include("connection.php");

if (isset($_GET['username'])) {
    $username = $_GET['username']; 

    $query ="SELECT *
    FROM library
    WHERE username='$username'";

        
    $data = mysqli_query($conne, $query);

    $row = mysqli_fetch_assoc($data);
        $student_id = $row['student_id'];
}

$query1 ="SELECT 
s.student_id,
s.book_id,
s.issue_date,
b.book_name,
b.author,
DATE_ADD(s.issue_date, INTERVAL 15 DAY) AS due_date
FROM 
student_books AS s
INNER JOIN
books AS b
ON 
b.book_id = s.book_id
WHERE 
s.student_id = '$student_id'";

    
$data1 = mysqli_query($conne, $query1);

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
    background-color: #ccc;
  }
  .main {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.main p {
    margin: 10px 0;
    line-height: 1.5;
}
.main p:first-child {
    font-weight: bold;
}

</style>
</head>
<body>
<nav>
    <ul>
    <li><a href="http://localhost/Library/student.php?username=<?php echo $username; ?>">Home</a></li>

      <li><a href="#">Attendance</a></li>
      <li><a href="#">Exam Date</a></li>
      
      <li><a href="#">Result</a></li>

      <li><a href="http://localhost/Library/">Log Out</a></li>
      
    </ul>
  </nav>
  

<div class="container">

<?php

            while ($result = mysqli_fetch_assoc($data1)) {
                ?>
                <div class="main">
                <?php
                    echo "Book Name: " . $result['book_name'] . "<br>";
                    echo "Author Name: " . $result['author']  . "<br>";
                    echo "Issue Date: " . $result['issue_date'] . "<br>";
                    echo "Due Date: " .$result['due_date']  . "<br>";

?>

</div> 
  <?php              

            }
            ?>
                
    
</div>

</body>
</html>
