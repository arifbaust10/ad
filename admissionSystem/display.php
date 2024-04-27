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
    <li> <a href="http://localhost/admissionSystem/home.php">Home</a></li>
    <li> <a href="http://localhost/admissionSystem/afterteach.php">Teacher Admission</a></li>

    <li> <a href="http://localhost/admissionSystem/home.php">Student Admission</a></li>
      
      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

<div class="container">
    <form id="infoForm" method="post">
        <div class="form-group">
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
        <div class="form-group">
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
                <option value="11">Batch 11</option>
                <option value="12">Batch 12</option>
                <option value="13">Batch 13</option>
                <option value="14">Batch 14</option>
                <option value="15">Batch 15</option>
                <option value="16">Batch 16</option>
                <option value="17">Batch 17</option>
                <option value="18">Batch 18</option>
            </select>
        </div>
        <div class="form-group">
            <label for="section">Section:</label>
            <select id="section" name="section">
                <option value="A">Section A</option>
                <option value="B">Section B</option>
                <option value="C">Section C</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Load</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $section = $_POST['section'];
    $batch =  $_POST['batch'];

    // echo $department." " .$section." ".$batch; 

    $query = "SELECT *
                FROM 
                    student AS s 
                LEFT JOIN 
                    student_details AS stds ON s.student_id = stds.student_id 
                INNER JOIN 
                    users_student AS us ON us.student_id = s.student_id 
                INNER JOIN 
                    department AS d ON d.department_id = s.department_id
                   WHERE d.department_id='$department' AND s.batch='$batch' AND s.section= '$section'";
    $data = mysqli_query($conne, $query);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        ?>
        <br><br><br>
        <table border="2" cellpadding="10">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Department</th>
                <th>Batch</th>
                <th>Section</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Operations</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>".$result['student_id']."</td>
                    <td>".$result['student_name']."</td>
                    <td>".$result['department_name']."</td>
                    <td>".$result['batch']."</td>
                    <td>".$result['section']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['date_of_birth']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['address']."</td>
                    <td>
                        <a href='update.php?ids={$result['student_id']}'><input type='button' value='Update' class='updatebtn' style='background-color: green; color: white; border-radius: 5px; padding: 5px; cursor: pointer; width:40%'></a>
                        <a href='delete.php?ids={$result['student_id']}'><input type='button' value='Delete' class='deletebtn' style='background-color: red; color: white; border-radius: 5px; cursor: pointer; padding: 5px; width:40%' onclick='return checkdelete();'>
                        </a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <?php
    }
}
?>
</body>
</html>

<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete this record?');
    }
</script>