<?php
    include("connection.php");
    $ids = mysqli_real_escape_string($conne, $_GET['ids']); 
    $course = mysqli_real_escape_string($conne, $_GET['course']); 
    $query = "SELECT s.student_id,s.student_name,cd.course_code,cd.title
              FROM student s
              JOIN students_course sc ON s.student_id = sc.student_id
              JOIN course_details cd ON sc.course_code = cd.course_code
              WHERE s.student_id= '$ids' 
              AND cd.course_code = '$course'";

    $result = mysqli_query($conne, $query);
    $row = mysqli_fetch_assoc($result); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>

    
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="title">
                Update Student Details            
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="id">Student Id : </label>
                    <input type="text" id="id" value="<?php echo $row['student_id']; ?>" class="input" name="id" required>
                </div> 
                <div class="input_field">
                    <label for="name">Name : </label>
                    <input type="text" id="name" value="<?php echo $row['student_name']; ?>" class="input" name="name" required>
                </div> 
                <div class="input_field">
                    <label for="course">Course Code : </label>
                    <input type="text" id="course" value="<?php echo $row['course_code']; ?>" class="input" name="course" required>
                </div> 
                <div class="input_field">
                    <input type="submit" value="Update Details" class="btn" name="update">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    $id = $_POST['id']; 
    $name = $_POST['name']; 
    $coursess = $_POST['course'];


    $query = "UPDATE students_course SET course_code='$coursess' WHERE student_id='$id'";
    $data = mysqli_query($conne, $query);

    if($data){
        echo 'Data is updated in the database';
        
      
        header("Location: http://localhost/department/regis.php");
        exit(); 
    } else {
        echo 'Data is not updated in the database';
    }
}
?>
