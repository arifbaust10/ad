<?php
	include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="display.css">

</head>
<body>
<nav>
    <ul>
      <li><a href="http://localhost/alumni/home.php">Home</a></li>
      <li><a href="alumniform.php">Add Alumni</a></li>
      <li><a href="http://localhost/Library/">Log Out</a></li>
    </ul>
  </nav>


<div class="seletionForm">
            <form action="#" method="POST">
                <h2>Alumni Information</h2>
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

			$query = "SELECT a.student_id,s.student_name,s.batch,d.department_name,a.current_job_title,a.office_name,a.office_location,a.graduation_year,stds.phone
			FROM alumni as a LEFT JOIN 
				 student as s
				 on a.student_id = s.student_id
				 INNER join student_details as stds
				 on a.student_id=stds.student_id
				 INNER JOIN department as d
				 on s.department_id = d.department_id
				 WHERE s.department_id='$department' AND s.batch='$batch' AND s.section='$section'";
			$data = mysqli_query($conne,$query);

        }    
 
?>
<?php
	$total = mysqli_num_rows($data);
	

	if($total!=0){


?>
<div class="afterClick">


<table border=2 cellpadding="10">
	<tr>
		<th>ID</th>
		<th>Name</th>
        <th>Department</th>
        <th>Batch</th>
		<th>Job Title</th>
		<th>Company Name</th>
		<th>Office Location</th>
		<th>Graduation Year</th>
		<th>Contract Number</th>
		<th>Operations</th>
	</tr>

<?php


	while($result = mysqli_fetch_assoc($data)){


		echo "<tr>
				<td>".$result['student_id']."</td>
				<td>".$result['student_name']."</td>
				<td>".$result['department_name']."</td>
                <td>".$result['batch']."</td>
				<td>".$result['current_job_title']."</td>
				<td>".$result['office_name']."</td>
				<td>".$result['office_location']."</td>
				<td>".$result['graduation_year']."</td>
                <td>".$result['phone']."</td>
				<td><a href='update.php?ids=$result[student_id]'><input type='submit' value='Update' class='updatebtn' style='background-color: green; color: white; border-radius: 5px;cursor: pointer; width:40%'></a>

					<a href='delete.php?ids=$result[student_id]'><input type='submit' value='Delete' class='deletebtn' style='background-color: red; color: white; border-radius: 5px;cursor: pointer; width:40%'></a>

				</td>
			</tr>";
	}
	

?>


</div>

<?php

	}
?>

    
<body>
</table>

