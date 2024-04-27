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
    <li> <a href="http://localhost/admissionSystem/home.php">Home</a></li>
    <li> <a href="http://localhost/admissionSystem/afterteach.php">Teacher Admission</a></li>

      <li><a href="http://localhost/admissionSystem/display.php">Student List</a></li>

      
      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

    <div class="maincontain">
       <form action="#" method="POST">

       <div>
            <h2>Students Registration Form</h2>
        </div>
        <!-- <fieldset>
            <legend>Program Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="studentNumber">
                    </div>

                

                <div class="input">
                            <input type="radio" id="engi" name="ProgramStatus" value="engineer" />
                            <label for="engi"> Engineering</label>
                           <input type="radio" name="ProgramStatus" id="nonenginner" value="nonenginner" />
                           <label for="nonenginner">Non Engineering</label>
                </div>
                
            </div>
        </fieldset> -->
        <fieldset>
            <legend>Application Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="studentName">
                    </div>
                    <div class="input">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="studentPhone">
                    </div>
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" id="email" name="studentEmail">
                    </div>

                    <div class="input">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="studentDob">
                    </div>

                    <div class="gender">
                       
                        <label for="gender">Gender</label>
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                    </div>

                    <div class="input">
                        <label for="district">District </label>
                        <input type="text" id="district" name="stuentDistrict">
                    </div>

                    

                
                
            </div>
        </fieldset>


        <fieldset>
            <legend>Father's Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="fname">Father's Name</label>
                        <input type="text" id="fname" name="fatherName">
                    </div>
                    <div class="input">
                        <label for="fphone">Father’s Mobile No </label>
                        <input type="text" id="fphone" name="fatherNumber">
                    </div>

                    <div class="input">
                        <label for="foccupation">Father’s Occupation</label>
                        <input type="text" id="foccupation" name="fatherOccupation">
                </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Mother's Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="mname">Mother's Name</label>
                        <input type="text" id="mname" name="motherName">
                    </div>
                    <div class="input">
                        <label for="mphone">Mother's Mobile No </label>
                        <input type="text" id="mphone" name="motherNumber">
                    </div>

                    <div class="input">
                        <label for="moccupation">Mother's Occupation</label>
                        <input type="text" id="moccupation" name="motherOccupation">
                </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Academic Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="sscschool">SSC School Name</label>
                        <input type="text" id="sscschool" name="sscSchooleName" >
                    </div>
                    <div class="input">
                        <label for="sscresult">SSC Result</label>
                        <input type="text" id="sscresult" name="sscResult">
                    </div>
                    <div class="input">
                        <label for="sscpassyear">SSC Passing Year</label>
                        <input type="number" id="sscpassyear" name="sscpassyear">
                    </div>
                    <br><br>
                    <div class="input">
                        <label for="hscschool">HSC Collage Name</label>
                        <input type="text" id="hscschool" name="hscCollageName">
                    </div>
                    <div class="input">
                        <label for="hscresult">HSC Result</label>
                        <input type="text" id="hscresult" name="hscResult">
                    </div>
                    <div class="input">
                        <label for="hscpassyear">HSC Passing Year</label>
                        <input type="number" id="hscpassyear" name="hscpassyear">
                    </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Department</legend>
            <div class="form">
                    <div class="input">
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
                    <div class="input">
                        
                        <br>
                        <div class="input">
                            <label for="section">Section : </label>
                            <select name="section">
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            
                            </select>
                        </div>
                        
                        <br>
                        <div class="input">
                            <label for="batch">Batch : </label>
                            <select name="batch">
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
                        <br>
                        <div class="input">
                            <label for="studentid">Student Id : </label>
                            <input type="number" id="studentid" name="studentId">
                        </div>
                       
                    </div>
                    
            </div>
        </fieldset>
        <fieldset>
            <legend>User</legend>
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
    

    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Fetch form data
        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $department = $_POST['department'];
        $batch = $_POST['batch'];
        $section = $_POST['section'];
        $studentPhone = $_POST['studentPhone'];
        $studentEmail = $_POST['studentEmail'];
        $studentDistrict = $_POST['stuentDistrict'];
        $studentDob = $_POST['studentDob'];
        $gender = $_POST['gender'];
        $fatherName = $_POST['fatherName'];
        $fatherNumber = $_POST['fatherNumber'];
        $fatherOccupation = $_POST['fatherOccupation'];
        $motherName = $_POST['motherName'];
        $motherNumber = $_POST['motherNumber'];
        $motherOccupation = $_POST['motherOccupation'];
        $sscSchoolName = $_POST['sscSchooleName'];
        $sscPassYear = $_POST['sscpassyear'];
        $sscResult = $_POST['sscResult'];
        $hscCollegeName = $_POST['hscCollageName'];
        $hscPassYear = $_POST['hscpassyear'];
        $hscResult = $_POST['hscResult'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Insert into student table
        $query1 = "INSERT INTO student (student_id, student_name, department_id, batch, section) 
                   VALUES ('$studentId', '$studentName', '$department', '$batch', '$section')";
        $result1 = mysqli_query($conne, $query1);



        $query2 = "INSERT INTO student_details (student_id, phone, email, address, date_of_birth, gender, father_name, father_number, father_occupation, mother_name, mother_number, mother_occupation, ssc_school_name, ssc_passing_year, ssc_result, hsc_college_name, hsc_passing_year, hsc_result) 
                   VALUES ('$studentId','$studentPhone', '$studentEmail', '$studentDistrict', '$studentDob', '$gender', '$fatherName', '$fatherNumber', '$fatherOccupation', '$motherName', '$motherNumber', '$motherOccupation', '$sscSchoolName', '$sscPassYear', '$sscResult', '$hscCollegeName', '$hscPassYear', '$hscResult')";
        $result2 = mysqli_query($conne, $query2);


        
      
        $query3 = "INSERT INTO users_student (student_id, username, password) 
                   VALUES ('$studentId', '$username', '$password')";
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
