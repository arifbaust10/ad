<?php
    include("connection.php");
    $id = $_GET['ids'];
    $query = "SELECT a.student_id,s.student_name,s.batch,d.department_name,a.current_job_title,a.office_name,a.office_location,a.graduation_year,stds.phone
    FROM alumni as a LEFT JOIN 
         student as s
         on a.student_id = s.student_id
         INNER join student_details as stds
         on a.student_id=stds.student_id
         INNER JOIN department as d
         on s.department_id = d.department_id
         where a.student_id='$id'";
    $data = mysqli_query($conne,$query);

    $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="mainContainer">
        <div class="title" style="text-align:center;">
            Update Alumni Information           
        </div>
        <form action="#" method="POST">
            <div class="update">
                <label for="studentId">ID</label>
                <input type="number" name="studentID" id="studentId" value="<?php echo $result['student_id']; ?>" readonly >
            </div>

            <div class="update">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $result['student_name']; ?>" readonly >
            </div>

            <div class="update">
                <label for="jobtitle">Job Title</label>
                <input type="text" name="jobtitle" id="jobtitle" value="<?php echo $result['current_job_title']; ?>" >
            </div>

            <div class="update">
                <label for="companyName">Company Name</label>
                <input type="text" name="companyName" id="companyName" value="<?php echo $result['office_name']; ?>" >
            </div>

            <div class="update">
                <label for="location">Office Location</label>
                <input type="text" name="location" id="location" value="<?php echo $result['office_location']; ?>" >
            </div>
            

            <div class="update">
                <label for="number">Contract Number</label>
                <input type="text" name="number" id="number" value="<?php echo $result['phone']; ?>" >
            </div>

            <div class="update">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>
</body>
</html>



<?php
    if($_POST['update']){

        $studentID = $_POST['studentID'];
        $jobtitle = $_POST['jobtitle'];
        $companyName = $_POST['companyName'];
        $location = $_POST['location']; 
        $number = $_POST['number'];
       

       

           $query = "UPDATE alumni SET current_job_title='$jobtitle',office_name='$companyName',office_location='$location' WHERE student_id = $studentID";

           

        $data = mysqli_query($conne,$query);
        if($data){
            echo 'data is inserted into database';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/alumni/display.php" />


            <?php
        }else{
            echo 'data is not inserted into database';
        }


        
    }
?>
