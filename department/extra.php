<?php
    include("connection.php");
    $department = $_GET['department'];
    $level = $_GET['level'];
    $term = $_GET['term'];



    $query = "SELECT *
    FROM course_details
    WHERE department_id='$department' AND Level='$level' AND Term='$term' ";
    
    $data = mysqli_query($conne, $query);

   $result = mysqli_fetch_assoc($data);

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
    <a href="#">Home</a>
    <a href="#">Contact</a>
    <a href="#">Department Info</a>
</div>

<div class="content" id="main">
    <div class="navbar">
        <a href="#" onclick="openNav()">☰</a>
        <a href="http://localhost/department/depart.php">Home</a>  
                <a href="http://localhost/department/regis.php">Registration List</a>  

        <a href="http://localhost/department/">Logout</a>    
    </div>
    
<div class="main">
    <div class="input">
        <div class="input_filed">
            <label for="department">Department</label>
            <select name="department" id="department">
                <option value="1" <?php if ($department == '1') echo "selected"; ?>>CSE</option>
                <option value="2" <?php if ($department == '2') echo "selected"; ?>>EEE</option>
                <option value="3" <?php if ($department == '3') echo "selected"; ?>>ME</option>
                <option value="4" <?php if ($department == '4') echo "selected"; ?>>IPE</option>
                <option value="5" <?php if ($department == '5') echo "selected"; ?>>BBA</option>
                <option value="6" <?php if ($department == '6') echo "selected"; ?>>ENG</option>
            </select>
        </div>

        <div class="input_filed">
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="1" <?php if ($level == '1') echo "selected"; ?>>Level 1</option>
                <option value="2" <?php if ($level == '2') echo "selected"; ?>>Level 2</option>
                <option value="3" <?php if ($level == '3') echo "selected"; ?>>Level 3</option>
                <option value="4" <?php if ($level == '4') echo "selected"; ?>>Level 4</option>
            </select>
        </div>

        <div class="input_filed">
            <label for="term">Term</label>
            <select name="term" id="term">
                <option value="1" <?php if ($term == '1') echo "selected"; ?>>Term 1</option>
                <option value="2" <?php if ($term == '2') echo "selected"; ?>>Term 2</option>
            </select>
        </div>
    </div>

    <form action="#" method="POST">
        <div class="input">
            <div class="input_filed">
                <label for="course_code">Course List</label>
                <select name="course_code">
                    <?php
                    if ($data) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<option value=\"" . $result['course_code'] . "\">" . $result['title'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="input_filed">
                <label for="batch">Batch : </label>
                <select name="batch">
                    <?php for ($i = 1; $i <= 18; $i++) { ?>
                        <option value="<?php echo $i; ?>">Batch <?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input_filed">
                <input type="submit" name="submit" value="Login">
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
include("connection.php");

// Define variables
$department = isset($_GET['department']) ? $_GET['department'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';
$term = isset($_GET['term']) ? $_GET['term'] : '';

$query = "SELECT *
          FROM course_details
          WHERE department_id='$department' AND Level='$level' AND Term='$term'";
$data = mysqli_query($conne, $query);

if (isset($_POST['submit'])) {
    // Form submitted
    $course_code = $_POST['course_code'];
    $batch = $_POST['batch'];

    $query11 = "SELECT teacher_id
                FROM course_details
                WHERE course_code='$course_code' AND department_id='$department'";
    $result11 = mysqli_query($conne, $query11);
    $row = mysqli_fetch_assoc($result11);
    $teacher_id = $row['teacher_id'];

    
    

    

    echo "<h1 style='text-align: center;'>Displaying all students records</h1>";
    ?>
     <form method='post' action=''>
    <table border="2" cellpadding="10" style="border-collapse: collapse; width: 80%; margin: 20px auto;">     
   <tr>
            <th>Student Id</th>
            <th>Name</th>
            <th>Course Code</th>
            <th>Select Student</th>
        </tr>
        <?php

      
        $query1 = "SELECT s.student_id, s.student_name, cd.course_code
        FROM student AS s
            INNER JOIN course_details as cd
            on s.department_id = cd.department_id
            LEFT JOIN
            students_course as sc
            on s.student_id=sc.student_id
        WHERE s.department_id = '$department'
          AND s.batch = '$batch'
          AND cd.Level = '$level'
          AND cd.Term = '$term'
          AND cd.course_code = '$course_code'
          AND sc.student_id IS NULL;
        ";
        $result1 = mysqli_query($conne, $query1);
        $total = mysqli_num_rows($result1);

        $query2 = "SELECT title
                   FROM course_details
                   WHERE course_code='$course_code'";
        $result3 = mysqli_query($conne, $query2);
        $row2 = mysqli_fetch_assoc($result3);
        $title = $row2['title'];

        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($result1)) {
                echo "
                <tr>
                    <td><input type='hidden' name='student_id[]' value='" . $result['student_id'] . "'>" . $result['student_id'] . "</td>
                    <td><input type='hidden' name='student_name[]' value='" . $result['student_name'] . "'>" . $result['student_name'] . "</td>
                    <td><input type='hidden' name='course_code[]' value='" . $result['course_code'] . "'>" . $result['course_code'] . "</td>
                    <td>
                        <input type='checkbox' name='check[" . $result['student_id'] . "]' value='" . $result['student_id'] . "'>
                    </td>
                </tr>";
            
                
            }
        }

        ?>
    </table>
    
   
        <input type='submit' name='insert' value='Insert' style='display: block; margin: 20px auto; padding: 12px 24px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 15%; '  onclick="return confirm('Are you sure you want to submit?');">


        
    </form>

    <?php
}


if (isset($_POST['insert'])) {
    $course_code = $_POST['course_code'];
    $studentIds = $_POST['student_id'];
    $presentStates = $_POST['check']; 

    for($i = 0; $i < count($studentIds); $i++) {
        $studentId = $studentIds[$i];
        $courseCode = $course_code[$i];
        $presentState = (in_array($studentId, $presentStates)) ? $studentId : NULL;
       // echo $studentId." ".$courseCode." ".$presentState;
        if(isset($presentState)) {
            $insert_query = "INSERT INTO students_course (student_id, course_code) VALUES ('$studentId','$courseCode')";
            mysqli_query($conne, $insert_query);
        }
    }
}

?>

