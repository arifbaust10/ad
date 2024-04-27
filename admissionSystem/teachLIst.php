<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Teacher Admission</title>
    <link rel="stylesheet" href="diplay.css">
</head>
<body>
<nav>
    <ul>
    <li> <a href="http://localhost/admissionSystem/home.php">Student Admission</a></li>

    <li> <a href="http://localhost/admissionSystem/afterteach.php">Teacher Admission</a></li>
      
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
            <button type="submit" name="submit">Load</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $department = $_POST['department'];

    $query = "SELECT  *
    FROM 
        teacher AS t
    INNER JOIN 
        teacher_details AS tds ON t.teacher_id= tds.teacher_id
    INNER JOIN 
        users_teacher AS ut ON ut.teacher_id= t.teacher_id
    INNER JOIN 
        department AS d ON d.department_id = t.department_id
    WHERE d.department_id = '$department'
    ORDER BY FIELD(designation,
                  'Professor',
                  'Associate Professor',
                  'Assistant Professor',
                  'Lecturer',
                  'Adjunct Professor',
                  'Visiting Professor',
                  'Research Professor',
                  'Emeritus Professor',
                  'Instructor',
                  'Teaching Assistant')";
    $data = mysqli_query($conne, $query);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        ?>
        <br><br><br>
        <table border="2" cellpadding="10">
            <tr>
                <th>Teachers ID</th>
                <th>Teachers Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Operations</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>".$result['teacher_id']."</td>
                    <td>".$result['teacher_name']."</td>
                    <td>".$result['department_name']."</td>
                    <td>".$result['designation']."</td>
                  
        
                    <td>".$result['phone']."</td>
                    <td>".$result['email']."</td>
                   
                  
                    <td>
                        <a href='teachupdate.php?ids={$result['teacher_id']}'><input type='button' value='Update' class='updatebtn' style='background-color: green; color: white; border-radius: 5px; padding: 5px; cursor: pointer; width:40%'></a>
                        <a href='teacherDelete.php?ids={$result['teacher_id']}'><input type='button' value='Delete' class='deletebtn' style='background-color: red; color: white; border-radius: 5px; cursor: pointer; padding: 5px; width:40%' onclick='return checkdelete();'>
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