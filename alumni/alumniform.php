<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="alumni.css">
</head>
<body>
<nav>
    <ul>
      <li><a href="http://localhost/alumni/home.php">Home</a></li>
      <li><a href="display.php">Alumni List</a></li>
      <li><a href="http://localhost/Library/">Log Out</a></li>
    </ul>
  </nav>


    <div class="alumni">
        <div class="seletionForm">
            <form action="#" method="POST">
              
                <div class="form">
                    <div class="input">
                        <label for="department">Department:</label>
                        <select id="department" name="department">
                            <option value="1">CSE</option>
                            <option value="2">EEE</option>
                            <option value="3">ME</option>
                            <option value="4">IPE</option>
                            <option value="5">BBA</option>
                            <option value="6">ENG</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="batch">Batch:</label>
                        <select id="batch" name="batch">
                            <option value="1">Batch 1</option>
                            <option value="2">Batch 2</option>
                            <option value="3">Batch 3</option>
                            <option value="4">Batch 4</option>
                            <option value="5">Batch 5</option>
                            <option value="6">Batch 6</option>
                            <option value="7">Batch 7</option>
                            <option value="8">Batch 8</option>
                            <option value="9">Batch 9</option>
                            <option value="10">Batch 10</option>
                            <option value="15">Batch 15</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="section">Section:</label>
                        <select id="section" name="section">
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
                        </select>
                    </div>
                    <div class="input">
                        <input type="submit" value="Click" name="submit1" id="submit1">
                    </div>
                </div>
            </form>
        </div>


<?php

        if (isset($_POST['submit1'])) {

            $department = $_POST['department'];
            $batch = $_POST['batch'];
            $section = $_POST['section'];




            $query = "SELECT s.student_id
            FROM student AS s
            INNER JOIN student_details AS stds ON s.student_id = stds.student_id
            LEFT JOIN alumni AS a ON s.student_id = a.student_id
            WHERE a.student_id IS NULL AND s.batch='$batch' AND s.section='$section' and s.department_id= '$department'";
            
            $data = mysqli_query($conne, $query);



        } 
        
        
 


?>




        <div class="mainForm" id="mainForm">
            <form action="#" method="POST">
                <div class="form">
                    <div class="input">
                        <label for="studentid">Student Id</label>
                        <select  name="student_id">
                            <?php
                            if (isset($data)) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<option value=\"" . $result['student_id'] . "\">" . $result['student_id'] ."</option>";
                                }
                            }else {
                                echo "<option value=\"\">No data available</option>";
                            }
                            ?>
                        </select>
                    </div>



                    <div class="input">
                        <label for="jobtitle">Current Job Title</label>
                        <input type="text" id="jobtitle" name="jobtitle">
                    </div>
                    <div class="input">
                        <label for="officename">Office Name</label>
                        <input type="text" id="officename" name="officename">
                    </div>
                    <div class="input">
                        <label for="officelocation">Office Location</label>
                        <input type="text" id="officelocation" name="officelocation">
                    </div>
                    <div class="input">
                        <label for="graduationyear">Graduation Year</label>
                        <input type="number" id="graduationyear" name="graduationyear">
                    </div>
                    <div class="input">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
    <p>&copy; BAUST Alumni Association <?php echo date("Y"); ?></p>
  </footer>
    
</body>
</html>


<?php
if (isset($_POST['submit'])) {
    
    $student_id = $_POST['student_id']; 
    $jobtitle = $_POST['jobtitle'];
    $officename = $_POST['officename'];
    $officelocation = $_POST['officelocation'];
    $graduationyear = $_POST['graduationyear'];


    $sql = "INSERT INTO alumni (student_id, current_job_title, office_name, office_location, graduation_year) 
             VALUES ('$student_id', '$jobtitle', '$officename', '$officelocation', '$graduationyear')";


    $data = mysqli_query($conne, $sql);
    if($data){
        echo "insert into database";
    }else{
        
    }
}
?>
