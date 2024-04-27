<?php
    include("connection.php");
    $credit = $_GET['credit'];


$course_codes = $_GET['course_code'];
$title = $_GET['title'];
$term = $_GET['term'];
$level = $_GET['level'];
$department_id = $_GET['department_id'];


$query = "SELECT *
    FROM teacher
    WHERE department_id='$department_id'";
    
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
    
<div class="container">
    <form id="infoForm" method="post">
        <div class="form-group">
        <label for="department">Department</label>
            <select name="department" id="department" >
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
            <select name="level" id="level" >
                <option value="1" <?php if ($level == '1') echo "selected"; ?>>Level 1</option>
                <option value="2" <?php if ($level == '2') echo "selected"; ?>>Level 2</option>
                <option value="3" <?php if ($level == '3') echo "selected"; ?>>Level 3</option>
                <option value="4" <?php if ($level == '4') echo "selected"; ?>>Level 4</option>
            </select>
        </div>
        <div class="form-group">
        <label for="term">Term</label >
            <select name="term" id="term" >
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
            <input type="text" name="course_code" value="<?php  echo  $course_codes; ?> ">
        </div>

        <div class="form-group">
        <label for="title">Course Title</label>
            <input type="text" name="title" value="<?php  echo  $title; ?> ">
        </div>

        <div class="form-group">
        <label for="credit">Course Credit</label>
            <input type="text" name="credit" value="<?php  echo  $credit; ?> ">
        </div>



        <div class="form-group">
            <button type="submit" name="update" onclick="return confirm('Are you sure you want to Submit?')">Submit</button>
        </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['update'])) {

    $department = $_POST['department'];
    $teacher_id = $_POST['teacher_id']; 
    $course_code = $_POST['course_code'];
    $credit = $_POST['credit'];
    $title = $_POST['title']; 
    $term = $_POST['term'];
    $level = $_POST['level'];

    
    $query = "UPDATE course_details SET title='$title',Level='$level',Term='$term',teacher_id='$teacher_id',department_id='$department' WHERE course_code='$course_codes'";
    $data = mysqli_query($conne, $query);

    if($data){
        echo 'Data is updated in the database';
        
      
        header("Location: http://localhost/admissionSystem/courselist.php");
        exit(); 
    } else {
        echo 'Data is not updated in the database';
    }
}
?>
