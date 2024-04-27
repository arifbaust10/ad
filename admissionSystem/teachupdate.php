<?php
     include("connection.php");
    $id = $_GET['ids'];
    $query = "SELECT  *
    FROM 
        teacher AS t
    INNER JOIN 
        teacher_details AS tds ON t.teacher_id= tds.teacher_id
    INNER JOIN 
        users_teacher AS ut ON ut.teacher_id= t.teacher_id
    INNER JOIN 
        department AS d ON d.department_id = t.department_id
        WHERE t.teacher_id='$id'";
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
    <li> <a href="http://localhost/admissionSystem/afterteach.php">Teacher Admission</a></li>
      <li><a href="http://localhost/admissionSystem/">Logout</a></li>
    </ul>
  </nav>

    <div class="maincontain">
       <form  method="POST">

       <div>
            <h2>Registration Form</h2>
        </div>
      
               
        <fieldset>
            <legend>Application Info</legend>
            <div class="form">
                    <div class="input">
                        <label for="teachername">Name</label>
                        <input type="text" id="teachername" name="teachername" value="<?php echo $result['teacher_name']; ?>" >
                    </div>
                    <div class="input">
                        <label for="teacherphone">Phone</label>
                        <input type="text" id="teacherphone" name="teacherphone" value="<?php echo $result['phone']; ?>" >
                    </div>
                    <div class="input">
                        <label for="teacheremail">email</label>
                        <input type="email" id="teacheremail" name="teacheremail" value="<?php echo $result['email']; ?>" >
                    </div>

                    <div class="input">
                        <label for="teacherdob">Date of Birth</label>
                        <input type="date" id="teacherdob" name="teacherdob" value="<?php echo $result['date_of_birth']; ?>"> 
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
                        <label for="teacherdistrict">District </label>
                        <input type="text" id="teacherdistrict" name="teacherdistrict" value="<?php echo $result['address']; ?>" >
                    </div>

                    

                
                
            </div>
        </fieldset>
    

        <fieldset>
            <legend>Education_qualification</legend>
            <div class="form">
                    <div class="input">
                        <label for="qualification">Qualification</label>
                        <input type="text" id="qualification" name="qualification" value="<?php echo $result['education_qualification']; ?>">
                    </div>
                    <div class="input">
                        <label for="areas_of_interest">Areas Of Interest</label>
                        <input type="text" id="areas_of_interest" name="areas_of_interest" value="<?php echo $result['areas_of_interest']; ?>">
                    </div>
                   
            </div>
        </fieldset>


    

         <fieldset>
            <legend>Department</legend>
            <div class="form">
                    <div class="input">
                     <label for="department">Department</label>
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
                    <br>
                      
                        <div class="input">
                            <label for="teacherId">Teacher Id : </label>
                            <input type="number" id="teacherId" name="teacherId" value="<?php echo $result['teacher_id']; ?>">
                        </div>
                       
                        <div class="input">
                            <label for="designation">Designation : </label>
                            <select name="designation">
                                <option value="Professor" <?php if($result['designation']=='Professor') echo "selected"; ?>>Professor</option>
                                <option value="Associate Professor" <?php if($result['designation']=='Associate Professor') echo "selected"; ?>>Associate Professor</option>
                                <option value="Assistant Professor" <?php if($result['designation']=='Assistant Professor') echo "selected"; ?>>Assistant Professor</option>
                                <option value="Lecturer" <?php if($result['designation']=='Lecturer') echo "selected"; ?>>Lecturer</option>
                                <option value="Adjunct Professor" <?php if($result['designation']=='Adjunct Professor') echo "selected"; ?>>Adjunct Professor</option>
                                <option value="Visiting Professor" <?php if($result['designation']=='Visiting Professor') echo "selected"; ?>>Visiting Professor</option>
                                <option value="Research Professor" <?php if($result['designation']=='Research Professor') echo "selected"; ?>>Research Professor</option>
                                <option value="Emeritus Professor" <?php if($result['designation']=='Emeritus Professor') echo "selected"; ?>>Emeritus Professor</option>
                                <option value="Instructor" <?php if($result['designation']=='Instructor') echo "selected"; ?>>Instructor</option>
                                <option value="Teaching Assistant" <?php if($result['designation']=='Teaching Assistant') echo "selected"; ?>>Teaching Assistant</option>
                            </select>
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
       

        

       

        $query1 = "UPDATE teacher
        SET teacher_name='$teacherName',department_id='$department'
        WHERE teacher_id = '$id'";


       
        $data1 = mysqli_query($conne, $query1);


        $query2 = "UPDATE teacher_details 
                SET 
                
                designation='$designation',
                phone='$teacherPhone', email='$teacherEmail', 
                address='$teacherDistrict',
                date_of_birth='$teacherDob',gender='$gender',education_qualification='$qualification',areas_of_interest='$areasOfInterest'
                WHERE teacher_id = '$id'";


$data2 = mysqli_query($conne, $query2);
if ($data2) {


        $query3 = "UPDATE users_teacher 
                SET  username='$username', password='$password' 
                WHERE teacher_id = '$id'";

   
       
        $data3 = mysqli_query($conne, $query3);

           

        
        
        


        
    }


   

}
?>