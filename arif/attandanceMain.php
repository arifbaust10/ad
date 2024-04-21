<?php
include("connected.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];   
    $query = "SELECT * FROM users_teacher as ut 
              INNER JOIN teachers_course as tc ON ut.teacher_id=tc.teacher_id
              INNER JOIN course_details as cd ON tc.course_code=cd.course_code
              WHERE username='$username'";

    $data = mysqli_query($conne, $query);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="attandanceStyle.css">
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Home</a>
        <a href="#">Students</a>
        <a href="#">Teachers</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
    </div>

    <div class="content" id="main">
        <div class="navbar">
            <a href="#" onclick="openNav()">☰</a>
           
            <?php

    $username = $_GET['username'];   
    $query1 = "SELECT * FROM users_teacher as ut 
              INNER JOIN teachers_course as tc ON ut.teacher_id=tc.teacher_id
              INNER JOIN course_details as cd ON tc.course_code=cd.course_code
              WHERE username='$username'";

    $data1 = mysqli_query($conne, $query1);
    $result1 = mysqli_fetch_assoc($data1)
    
?>
        <a href="http://localhost/arif/date.php?username=<?php echo $username; ?>">Exam Schedule</a>

        <a href="http://localhost/arif/check.php?username=<?php echo $username; ?>">Check Attandance</a>
            <a href="http://localhost/arif/index.php">Logout</a>
        </div>
        
        <div class="page">             
            <div class="student_batch_select_section">
                <div class="label-area">
                    <label>Course Code With Course Name</label>
                </div>
                <form method="POST">
                    <div class="dropdown-area">
                        <select name="course_code">
                            <?php
                            if (isset($data)) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<option value=\"" . $result['course_code'] . "\">" . $result['course_code'] . ' - ' . $result['title'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="classDate">
                            <label for="classDate">Date: </label>
                            <input type="date" id="currentDate" name="classDate" readonly>
                        </div>

                        <script>
                            var currentDate = new Date();
                            var day = currentDate.getDate();
                            var month = currentDate.getMonth() + 1;
                            var year = currentDate.getFullYear();

                            if (month < 10) month = '0' + month;
                            if (day < 10) day = '0' + day;

                            var formattedDate = year + '-' + month + '-' + day;

                            document.getElementById('currentDate').value = formattedDate;
                        </script>

                        <div class="searchbtn">
                            <input type="submit" name="searchbtn" value="Load Student">
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['searchbtn'])) {
                $course_code = $_POST['course_code'];
                $date = $_POST['classDate'];
                $query = "SELECT sc.student_id,s.student_name,sc.course_code
                FROM students_course as sc INNER JOIN
                     student as s
                     on s.student_id=sc.student_id
                     WHERE course_code='$course_code'and sc.State='incomplete'"; 
                $data = mysqli_query($conne, $query);
                $total = mysqli_num_rows($data);
                if ($total != 0) {
                    ?>
                    <form method="POST" action="#">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Course Code</th>
                                    <th>Present State</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                        <tr>
                                            <td><input type='hidden' name='student_id[]' value='" . $result['student_id'] . "'>" . $result['student_id'] . "</td>
                                            <td><input type='hidden' name='student_name[]' value='" . $result['student_name'] . "'>" . $result['student_name'] . "</td>
                                            
                                            <td><input type='hidden' name='course_code[]' value='" . $result['course_code'] . "'>" . $result['course_code'] . "</td>
                                            <td>
                                                <input type='checkbox' name='check[]' value='" . $result['student_id'] . "'> 
                                            </td>
                                        </tr>";
                                    }
                                    ?>

                            </tbody>
                        </table>
                        <input type="hidden" name="classDate" value="<?php echo $date; ?>">
                        <div class="searchbtn" >
                             <input type="submit" name="Update" value="Submit" style="margin: 0 auto;" onclick="return confirm('Are you sure you went to submit?'); ">
                        </div>
                    </form>

                    
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</body>
</html>


 
<?php

if(isset($_POST['Update'])) {
    $classDate = $_POST['classDate'];
    $studentIds = $_POST['student_id'];
    $courseCodes = $_POST['course_code'];
    $presentStates = isset($_POST['check']) ? $_POST['check'] : array(); 

    for($i = 0; $i < count($studentIds); $i++) {
        $studentId = $studentIds[$i];
        $courseCode = $courseCodes[$i];
        
        $presentState = (in_array($studentId, $presentStates)) ? 'present' : 'absent';

        $query = "INSERT INTO `attendance`(`student_id`, `course_code`, `date`, `present_state`) 
                  VALUES ('$studentId', '$courseCode', '$classDate', '$presentState')";

        mysqli_query($conne, $query);
    }
    // Redirect to success page or do something else after insertion
    //header("Location: success.php?username=$username");
    // exit();
}
?>
