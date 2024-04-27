<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="diplay.css">
</head>
<body>
<nav>
    <ul>
    <li><a href="http://localhost/admissionSystem/aftercourse.php">Home</a></li>
      <li><a href="http://localhost/admissionSystem/courselist.php">Course List</a></li>
      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

<div class="container">
    <form id="infoForm" method="post">
        <div class="form-group">
        <label for="department">Department</label>
                    <select name="department" id="department">
                        <option value="1">CSE</option>
                        <option value="2">EEE</option>
                        <option value="3">ME</option>
                        <option value="4">IPE</option>
                        <option value="5">BBA</option>
                        <option value="6">ENG</option>
                    </select> 
        </div>
        <div class="form-group">
        <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select> 
        </div>
        <div class="form-group">
        <label for="term">Term</label>
                    <select name="term" id="term">
                        <option value="1">Term 1</option>
                        <option value="2">Term 2</option>
                    </select> 
        </div>

        



        <div class="form-group">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $term = $_POST['term'];
    $level =  $_POST['level'];

    header("Location: afteraddcourse.php?department=$department&level=$level&term=$term");
    exit(); 

    // echo $department." " .$section." ".$batch; 

    }

?>
</body>
</html>

