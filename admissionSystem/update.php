<?php
     include("connection.php");
    $id = $_GET['ids'];
    $query = "SELECT *
    FROM 
        student AS s 
    LEFT JOIN 
        student_details AS stds ON s.student_id = stds.student_id 
    INNER JOIN 
        users_student AS us ON us.student_id = s.student_id 
    INNER JOIN 
        department AS d ON d.department_id = s.department_id
           WHERE s.student_id='$id'";
    $data = mysqli_query($conne,$query);

    $result = mysqli_fetch_assoc($data);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="admission_style.css">
</head>
<body>
    
<nav>
    <ul>
    <li> <a href="http://localhost/admissionSystem/home.php">Admission</a></li>
    <li><a href="http://localhost/admissionSystem/display.php">Admission List</a></li>

      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

    <div class="maincontain">
       <form action="#" method="POST">

       <div>
            <h2>Update Information</h2>
        </div>
      
               
        <fieldset>
            <legend>Application Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="studentName" value="<?php echo $result['student_name']; ?>" >
                    </div>
                    <div class="input">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="studentPhone" value="<?php echo $result['phone']; ?>" >
                    </div>
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" id="email" name="studentEmail" value="<?php echo $result['email']; ?>" >
                    </div>

                    <div class="input">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="studentDob" value="<?php echo $result['date_of_birth']; ?>"> 
                    </div>

                    <div class="gender">
                       
                        <label for="gender">Gender</label>
                        <select name="gender">
                        <option value="Male" 
                            <?php
                                if($result['gender']=='male'){
                                    echo "selected";
                                }
                            ?>
                            >Male</option>
                            <option value="Female" 
                            <?php
                                if($result['gender']=='Female'){
                                    echo "selected";
                                }
                            ?>
                            >Female</option>
                        </select>

                    </div>

                    <div class="input">
                        <label for="district">District </label>
                        <input type="text" id="district" name="stuentDistrict" value="<?php echo $result['address']; ?>" >
                    </div>

                    

                
                
            </div>
        </fieldset>


        <fieldset>
            <legend>Father's Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="fname">Father's Name</label>
                        <input type="text" id="fname" name="fatherName" value="<?php echo $result['father_name']; ?>">
                    </div>
                    <div class="input">
                        <label for="fphone">Father’s Mobile No </label>
                        <input type="text" id="fphone" name="fatherNumber" value="<?php echo $result['father_number']; ?>">
                    </div>

                    <div class="input">
                        <label for="foccupation">Father’s Occupation</label>
                        <input type="text" id="foccupation" name="fatherOccupation" value="<?php echo $result['father_occupation']; ?>">
                </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Mother's Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="mname">Mother's Name</label>
                        <input type="text" id="mname" name="motherName" value="<?php echo $result['mother_name']; ?>">
                    </div>
                    <div class="input">
                        <label for="mphone">Mother's Mobile No </label>
                        <input type="text" id="mphone" name="motherNumber" value="<?php echo $result['mother_number']; ?>">
                    </div>

                    <div class="input">
                        <label for="moccupation">Mother's Occupation</label>
                        <input type="text" id="moccupation" name="motherOccupation" value="<?php echo $result['mother_occupation']; ?>">
                </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Academic Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="sscschool">SSC School Name</label>
                        <input type="text" id="sscschool" name="sscSchooleName" value="<?php echo $result['ssc_school_name']; ?>">
                    </div>
                    <div class="input">
                        <label for="sscresult">SSC Result</label>
                        <input type="text" id="sscresult" name="sscResult" value="<?php echo $result['ssc_result']; ?>">
                    </div>
                    <div class="input">
                        <label for="sscpassyear">SSC Passing Year</label>
                        <input type="number" id="sscpassyear" name="sscpassyear" value="<?php echo $result['ssc_passing_year']; ?>">
                    </div>
                    <br><br>
                    <div class="input">
                        <label for="hscschool">HSC Collage Name</label>
                        <input type="text" id="hscschool" name="hscCollageName" value="<?php echo $result['hsc_college_name']; ?>">
                    </div>
                    <div class="input">
                        <label for="hscresult">HSC Result</label>
                        <input type="text" id="hscresult" name="hscResult" value="<?php echo $result['hsc_passing_year']; ?>">
                    </div>
                    <div class="input">
                        <label for="hscpassyear">HSC Passing Year</label>
                        <input type="number" id="hscpassyear" name="hscpassyear" value="<?php echo $result['hsc_result']; ?>">
                    </div>
            </div>
        </fieldset>
         <fieldset>
            <legend>Department</legend>
            <div class="form">
                    <div class="input">
                    ` <label for="department">Department</label>
                        <select name="department" id="department">
                            <option value="1" 
                            <?php
                                if($result['department']=='1'){
                                    echo "selected";
                                }
                            ?>
                            >CSE</option>
                            <option value="2" 
                            <?php
                                if($result['department']=='2'){
                                    echo "selected";
                                }
                            ?>
                            >EEE</option>
                            <option value="3" 
                            <?php
                                if($result['department']=='3'){
                                    echo "selected";
                                }
                            ?>
                            >ME</option>
                            <option value="4" 
                            <?php
                                if($result['department']=='4'){
                                    echo "selected";
                                }
                            ?>
                            >IPE</option>
                            <option value="5" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >BBA</option>
                            <option value="6" 
                            <?php
                                if($result['department']=='6'){
                                    echo "selected";
                                }
                            ?>
                            >ENG</option>
                        </select>
                    </div>
                    <div class="input">
                        
                        <br>
                        <div class="input">
                            <label for="section">Section : </label>
                            <select name="section">
                                <option value="A" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >Section A</option>
                                <option value="B" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >Section B</option>
                                <option value="C" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >Section C</option>
                                <option value="D" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >Section D</option>
                                <option value="E" 
                            <?php
                                if($result['department']=='5'){
                                    echo "selected";
                                }
                            ?>
                            >Section E</option>
                            </select>
                        </div><br>
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
                        </div><br>
                        <div class="input">
                            <label for="studentid">Student Id : </label>
                            <input type="number" id="studentid" name="studentId" value="<?php echo $result['student_id']; ?>">
                        </div>
                       
                    </div>
                    
            </div>
        </fieldset>
        <fieldset>
            <legend>User</legend>
            <div class="form">
                    <div class="input">
                        <label for="username" >Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $result['username']; ?>">
                    </div>
                    <div class="input">
                        <label for="password" >Password</label>
                        <input type="password" id="password" name="password" value="<?php echo $result['password']; ?>">
                    </div>

                    
            </div>
        </fieldset> 


        <div class="submit">
            <input type="submit" name="update" id="update" value="Update">
        </div>
       </form>

    </div>
    
</body>
</html>

<?php
    if($_POST['update']){

   


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

        
       

        $query1 = "UPDATE student
        SET student_name='$studentName', department_id='$department', batch='$batch', section='$section' 
        WHERE student_id = '$studentId'";





        $query2 = "UPDATE student_details 
                SET 
                phone='$studentPhone', email='$studentEmail', 
                address='$studentDistrict',
                date_of_birth='$studentDob', father_name='$fatherName', father_number='$fatherNumber', father_occupation='$fatherOccupation', mother_name='$motherName', mother_number='$motherNumber',
                mother_occupation='$motherOccupation', 
                ssc_school_name='$sscSchoolName',
                ssc_passing_year='$sscPassYear', ssc_result='$sscResult', hsc_college_name='$hscCollegeName', hsc_passing_year='$hscPassYear', hsc_result='$hscResult', gender='$gender' 
                WHERE student_id = '$studentId'";


$data2 = mysqli_query($conne, $query2);
if (!$data2) {
    echo "Error updating student_details: " . mysqli_error($conne);
    // You may want to add further error handling or debugging steps here.
}


        $query3 = "UPDATE users_student 
                SET  username='$username', password='$password' 
                WHERE student_id = '$studentId'";

   

        $data1 = mysqli_query($conne, $query1);
        $data2 = mysqli_query($conne, $query2);
        $data3 = mysqli_query($conne, $query3);

           

        
        if($data1 && $data2 && $data3){
            echo 'data is inserted into database';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/admissionSystem/display.php" />


            <?php
        }else{
            echo 'data is not inserted into database';
        }
        


        
    }
?>