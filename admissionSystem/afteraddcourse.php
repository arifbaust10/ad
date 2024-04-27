<?php
    include("connection.php");
    $department = $_GET['department'];
    $level = $_GET['level'];
    $term = $_GET['term'];



    $query = "SELECT *
    FROM teacher
    WHERE department_id='$department'";
    
    $data = mysqli_query($conne, $query);


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
            <select name="department" id="department" disabled>
                <option value="1" <?php if ($department == '1') echo "selected"; ?>  >CSE</option>
                <option value="2" <?php if ($department == '2') echo "selected"; ?> >EEE</option>
                <option value="3" <?php if ($department == '3') echo "selected"; ?>>ME</option>
                <option value="4" <?php if ($department == '4') echo "selected"; ?>>IPE</option>
                <option value="5" <?php if ($department == '5') echo "selected"; ?>>BBA</option>
                <option value="6" <?php if ($department == '6') echo "selected"; ?>>ENG</option>
            </select>
        </div>
        <div class="form-group">
        <label for="level">Level</label>
            <select name="level" id="level" disabled>
                <option value="1" <?php if ($level == '1') echo "selected"; ?>>Level 1</option>
                <option value="2" <?php if ($level == '2') echo "selected"; ?>>Level 2</option>
                <option value="3" <?php if ($level == '3') echo "selected"; ?>>Level 3</option>
                <option value="4" <?php if ($level == '4') echo "selected"; ?>>Level 4</option>
            </select>
        </div>
        <div class="form-group">
        <label for="term">Term</label disabled>
            <select name="term" id="term" disabled>
                <option value="1" <?php if ($term == '1') echo "selected"; ?>>Term 1</option>
                <option value="2" <?php if ($term == '2') echo "selected"; ?>>Term 2</option>
            </select>
        </div>

       

        <div class="form-group">
        <label for="teacher_id">Teacher List</label>
                <select name="teacher_id">
                    <?php
                    if ($data) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<option value=\"" . $result['teacher_id'] . "\">" . $result['teacher_id'] ." ". $result['teacher_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
        </div>

        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code">
        </div>

        <div class="form-group">
        <label for="title">Course Title</label>
            <input type="text" name="title">
        </div>

        <div class="form-group">
        <label for="credit">Course Credit</label>
            <input type="number" name="credit">
        </div>



        <div class="form-group">
            <button type="submit" name="submit" onclick="return confirm('Are you sure you want to Submit?')">Submit</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
  
    $teacher_id = $_POST['teacher_id'];
    $course_code = $_POST['course_code'];
    $title = $_POST['title'];
    $credit = $_POST['credit'];



    $query1 = "INSERT INTO course_details (course_code, title, Level, Term, credit,department_id,teacher_id) 
                   VALUES ('$course_code', '$title', '$level', '$term', '$credit','$department','$teacher_id')";
        
        
    $result1 = mysqli_query($conne, $query1);



    if($result1){
       ?>
            <p style="color: green; font-weight: bold; ">Submitted</p>
       <?php
    }else{
        ?>
        <p style="color: red; font-weight: bold; ">Not Submitted</p>
   <?php
    }
    


    }

?>
</body>
</html>



