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
    <li> <a href="http://localhost/admissionSystem/aftercourse.php">Home</a></li>
    <li> <a href="http://localhost/admissionSystem/addcourse.php">Add Course</a></li>
      
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
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $level = $_POST['level'];
    $term =  $_POST['term'];

    // echo $department." " .$section." ".$batch; 

    $query = "SELECT cd.course_code,cd.title,cd.Level,cd.Term,cd.credit,d.department_name,t.teacher_name,t.teacher_id,d.department_id
    FROM 
        course_details AS cd
    LEFT JOIN 
        teacher AS t ON cd.teacher_id = t.teacher_id
    INNER JOIN 
        department AS d ON cd.department_id = d.department_id
    
       WHERE d.department_id='$department'";
    $data = mysqli_query($conne, $query);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        ?>
        <br><br><br>
        <table border="2" cellpadding="10">
            <tr>
                <th>Course Code</th>
                <th>Title</th>
                <th>Teacher</th>
                <th>Department</th>
                <th>Level</th>
                <th>Term</th>
                <th>Credit</th>
                <th>Operations</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>".$result['course_code']."</td>
                    <td>".$result['title']."</td>
                    <td>".$result['teacher_name']."</td>
                    <td>".$result['department_name']."</td>
                    <td>".$result['Level']."</td>
                    <td>".$result['Term']."</td>
                    <td>".$result['credit']."</td>
                    <td>
                        <a href='updatecourse.php?credit={$result['credit']}&course_code={$result['course_code']}&title={$result['title']}&Level={$result['Term']}&Level={$result['Level']}&department_id={$result['department_id']}'><input type='button' value='Update' class='updatebtn' style='background-color: green; color: white; border-radius: 5px; padding: 5px; cursor: pointer; width:40%'></a>
                        <a href='deletecourse.php?ids={$result['teacher_id']}&course_code={$result['course_code']}'><input type='button' value='Delete' class='deletebtn' style='background-color: red; color: white; border-radius: 5px; cursor: pointer; padding: 5px; width:40%' onclick='return checkdelete();'></a>
                       
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