<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <link rel="stylesheet" href="admission_style.css">
</head>
<body>

<nav>
    <ul>
    <li> <a href="http://localhost/admissionSystem/home.php">Student Admission</a></li>

      <li><a href="http://localhost/admissionSystem/teachList.php">Leacher List</a></li>
      
      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

    <div class="maincontain">
       <form action="#" method="POST">

       <div>
            <h2>Teacher Registration Form</h2>
        </div>
       
        <fieldset>
            <legend>Application Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="teachername">Name</label>
                        <input type="text" id="teachername" name="teachername">
                    </div>
                    <div class="input">
                        <label for="teacherphone">Phone</label>
                        <input type="text" id="teacherphone" name="teacherphone">
                    </div>
                    <div class="input">
                        <label for="teacheremail">email</label>
                        <input type="email" id="teacheremail" name="teacheremail">
                    </div>

                    <div class="input">
                        <label for="teacherdob">Date of Birth</label>
                        <input type="date" id="teacherdob" name="teacherdob">
                    </div>

                    <div class="gender">
                       
                        <label for="gender">Gender</label><br>
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div><br>

                    <div class="input">
                        <label for="teacherdistrict">District </label>
                        <input type="text" id="teacherdistrict" name="teacherdistrict">
                    </div>     
                
            </div>
        </fieldset>


       

       

        <fieldset>
            <legend>Education_qualification</legend>
            <div class="form">
                    <div class="input">
                        <label for="qualification">Qualification</label>
                        <input type="text" id="qualification" name="qualification" >
                    </div>
                    <div class="input">
                        <label for="areas_of_interest">areas_of_interest</label>
                        <input type="text" id="areas_of_interest" name="areas_of_interest">
                    </div>
                    
            </div>
        </fieldset>
        <fieldset>
            <legend>Department Info</legend>
            <div class="form">
                    <div class="input">
                         <label for="department">Teacher Department</label>
                        <select name="department" id="department">
                            <option value="1">CSE</option>
                            <option value="2">EEE</option>
                            <option value="3">ME</option>
                            <option value="4">IPE</option>
                            <option value="5">BBA</option>
                            <option value="6">ENG</option>
                        </select>
                    </div>
                    <div class="input">
                        
                        <br>
                       
                        <br>
                        <div class="input">
                            <label for="teacherId">Teacher Id : </label>
                            <input type="number" id="teacherId" name="teacherId">
                        </div>
                        <div class="input">
                                <label for="designation">Designation : </label>
                                <select name="designation">
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Lecturer">Lecturer</option>
                                <option value="Adjunct Professor">Adjunct Professor</option>
                                <option value="Visiting Professor">Visiting Professor</option>
                                <option value="Research Professor">Research Professor</option>
                                <option value="Emeritus Professor">Emeritus Professor</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Teaching Assistant">Teaching Assistant</option>
                            </select>
                        </div>
                    </div>
                    
            </div>
        </fieldset>
        <fieldset>
            <legend>User Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="username" >Username</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="input">
                        <label for="password" >Password</label>
                        <input type="password" id="password" name="password">
                    </div>

                    
            </div>
        </fieldset>


        <div class="submit">
            <input type="submit" name="submit" id="submit" onclick="return submitted();">
        </div>
       </form>

    </div>
    
</body>
</html>

<script>
    function submitted(){
        return confirm("Are you sure you want to submit?");
    }
</script>


<?php
    
    if(isset($_POST['submit'])) {
        
        $teacherName = $_POST['teachername'];
        $department = $_POST['department'];
        $teacherPhone = $_POST['teacherphone'];
        $teacherEmail = $_POST['teacheremail'];
        $teacherDistrict = $_POST['teacherdistrict'];
        $teacherDob = $_POST['teacherdob'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $areasOfInterest = $_POST['areas_of_interest'];
        $teacherId = $_POST['teacherId'];
        $designation = $_POST['designation'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query1 = "INSERT INTO teacher (teacher_id, teacher_name, department_id) 
                   VALUES ('$teacherId', '$teacherName', '$department')";
        $result1 = mysqli_query($conne, $query1);



        $query2 = "INSERT INTO teacher_details (teacher_id,designation, phone, email, address, date_of_birth, gender,education_qualification,areas_of_interest) 
                   VALUES ('$teacherId','$designation','$teacherPhone', '$teacherEmail', '$teacherDistrict', '$teacherDob', '$gender', '$qualification', '$areasOfInterest')";
        $result2 = mysqli_query($conne, $query2);

      
        $query3 = "INSERT INTO users_teacher (teacher_id, username, password) 
                   VALUES ('$teacherId', '$username', '$password')";
        $result3 = mysqli_query($conne, $query3);

        
        if ($result1 && $result2 && $result3) {
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
