<?php
include("connection.php");

// First form submission handler
if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $level = $_POST['level'];
    $term = $_POST['term'];

    $query = "SELECT *
    FROM course_details
    WHERE department_id='$department' AND Level='$level' AND Term='$term' ";
    
    $courseData = mysqli_query($conne, $query);
}

// Second form submission handler
if (isset($_POST['submit1'])) {
    $department = $_POST['department']; 
    $courseCode = $_POST['course_code'];
    $batch = $_POST['batch'];

    $query = "SELECT student_id, student_name
    FROM student
    WHERE batch='$batch'";
    
    $studentData = mysqli_query($conne, $query);
}

// Third form submission handler
if(isset($_POST['Submit2'])){
    $student_id = $_POST['student_id'];

    echo $student_id." ".$courseCode."  ".$department." ".$batch;

    // $query = "SELECT teacher_id
    //           FROM course_details
    //           WHERE course_code='$courseCode'  AND department_id='$department'";
    // $result = mysqli_query($conne, $query);
    // $row = mysqli_fetch_assoc($result);
    // $teacher_id = $row['teacher_id'];

    // echo $student_id." ".$courseCode." ".$teacher_id." ".$department." ".$batch;

    // $insert_query = "INSERT INTO students_course(student_id, course_code, teacher_id, department_id, batch) 
    //                  VALUES ('$student_id', '$courseCode', '$teacher_id', '$department', '$batch')";
    // $insert_result = mysqli_query($conne, $insert_query);
    // if ($insert_result) {
    //     echo "Data inserted successfully!";
    // } else {
    //     echo "Error inserting data: " . mysqli_error($conne);
    // }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- First Form -->
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
            
            
            </form>

    <!-- Second Form -->
    <form action="#" method="post">
    <div class="input">
                <div class="input_filed">
                    <label for="course_code">Course List</label>
                    <select  name="course_code">
                        <?php
                        if (isset($data)) {
                            while ($result = mysqli_fetch_assoc($data)) {
                                echo "<option value=\"" . $result['course_code'] . "\">" . $result['title'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="input">
                    <label for="batch">Batch : </label>
                    <select name="batch">
                                <option value="1" <?php if ($result['batch'] == '1') { echo "selected"; } ?>>Batch 1</option>
                                <option value="2" <?php if ($result['batch'] == '2') { echo "selected"; } ?>>Batch 2</option>
                                <option value="3" <?php if ($result['batch'] == '3') { echo "selected"; } ?>>Batch 3</option>
                                <option value="4" <?php if ($result['batch'] == '4') { echo "selected"; } ?>>Batch 4</option>
                                <option value="5" <?php if ($result['batch'] == '5') { echo "selected"; } ?>>Batch 5</option>
                                <option value="6" <?php if ($result['batch'] == '6') { echo "selected"; } ?>>Batch 6</option>
                                <option value="7" <?php if ($result['batch'] == '7') { echo "selected"; } ?>>Batch 7</option>
                                <option value="8" <?php if ($result['batch'] == '8') { echo "selected"; } ?>>Batch 8</option>
                                <option value="9" <?php if ($result['batch'] == '9') { echo "selected"; } ?>>Batch 9</option>
                                <option value="10" <?php if ($result['batch'] == '10') { echo "selected"; } ?>>Batch 10</option>
                                <option value="11" <?php if ($result['batch'] == '11') { echo "selected"; } ?>>Batch 11</option>
                                <option value="12" <?php if ($result['batch'] == '12') { echo "selected"; } ?>>Batch 12</option>
                                <option value="13" <?php if ($result['batch'] == '13') { echo "selected"; } ?>>Batch 13</option>
                                <option value="14" <?php if ($result['batch'] == '14') { echo "selected"; } ?>>Batch 14</option>
                                <option value="15" <?php if ($result['batch'] == '15') { echo "selected"; } ?>>Batch 15</option>
                                <option value="16" <?php if ($result['batch'] == '16') { echo "selected"; } ?>>Batch 16</option>
                                <option value="17" <?php if ($result['batch'] == '17') { echo "selected"; } ?>>Batch 17</option>
                                <option value="18" <?php if ($result['batch'] == '18') { echo "selected"; } ?>>Batch 18</option>

                            </select>
                </div>

                <div class="input_filed">
                    <input type="submit" id="submit1" name="submit1" value="Submit"> 
                </div>
            
            </form>

    <!-- Third Form -->
    <form action="#" method="post">

    <div class="input">
                <label for="studentid">Student Id</label>
                <select  name="student_id">
                    <?php
                    if (isset($data)) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<option value=\"" . $result['student_id'] . "\">" . $result['student_id'] ."</option>";
                        }
                    } else {
                        echo "<option value=\"\">No data available</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input">
                <input type="submit" value="Submit2" name="Submit2">
            </div>
    </form>

</body>
</html>
