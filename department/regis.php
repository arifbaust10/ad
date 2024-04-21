<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $level = $_POST['level'];
    $term = $_POST['term'];

    $query = "SELECT *
    FROM course_details
    WHERE department_id='$department' AND Level='$level' AND Term='$term' ";
    
    $data = mysqli_query($conne, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Management System</title>
<link rel="stylesheet" href="styles.css">
<style>
    select, button ,input{
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
  
  box-sizing: border-box;
}
</style>
<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="http://localhost/department/">Logout</a>
</div>

<div class="content" id="main">
    <div class="navbar">
        <a href="#" onclick="openNav()">☰</a>
                <a href="http://localhost/department/depart.php">Home</a>  

      <a href="http://localhost/department/depart.php">Add Course</a>    

        <a href="http://localhost/department/">Logout</a>    
    </div>
    
    <div class="main">
        <form action="#" method="post">
            <div class="input">
                <div class="input_filed">
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

                <div class="input_filed">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select> 
                </div>

                <div class="input_filed">
                    <label for="term">Term</label>
                    <select name="term" id="term">
                        <option value="1">Term 1</option>
                        <option value="2">Term 2</option>
                    </select> 
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
       

        if (isset($_POST['submit'])) {
            
            $department = $_POST['department'];
            $level = $_POST['level'];
            $term = $_POST['term'];

            echo $department." ".$level." ".$term;

            header("Location: afterRegis.php?department=$department&level=$level&term=$term");
            exit(); 
        }
?>