<?php
include("connected.php"); 
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    
    $query3 ="SELECT student_id
        FROM users_student
        WHERE username='$username'";

        
        $data3 = mysqli_query($conne, $query3);

        $row = mysqli_fetch_assoc($data3);
        $student_id = $row['student_id'];


    $query = "SELECT sc.course_code,cd.title
    FROM students_course as sc
    INNER JOIN
	course_details as cd
    ON sc.course_code=cd.course_code
    where student_id='$student_id'";

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
            <a href="http://localhost/student/examdate.php?username=<?php echo $username; ?>">Exam Schedule</a>

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
                        

                       

                        <div class="searchbtn">
                            <input type="submit" name="searchbtn" value="Load Student">
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['searchbtn'])) {
                $course_code = $_POST['course_code'];
               
                $query = "SELECT *
                FROM attendance as a INNER JOIN
                student as s
                on a.student_id=s.student_id
                WHERE course_code='$course_code' AND s.student_id='$student_id'"; 
                $data = mysqli_query($conne, $query);
                $total = mysqli_num_rows($data);
                if ($total != 0) {
                    ?>
                   
                        <table>
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Course Code</th>
                                    <th>Date</th>
                                    <th>Present State</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($result = mysqli_fetch_assoc($data)) {
                                    ?>
                                    <tr>
                                        <td><input type='hidden' value='<?php echo $result['student_id']; ?>'><?php echo $result['student_id']; ?></td>
                                        <td><input type='hidden' value='<?php echo $result['student_name']; ?>'><?php echo $result['student_name']; ?></td>
                                        <td><input type='hidden' value='<?php echo $result['course_code']; ?>'><?php echo $result['course_code']; ?></td>                                                                      
                                        <td><input type='hidden' value='<?php echo $result['date']; ?>'><?php echo $result['date']; ?></td>                                                                      
                                        <td><input type='hidden' value='<?php echo $result['present_state']; ?>'><?php echo $result['present_state']; ?></td>                                                                      

                                     

                                    </tr>
                                    <?php
                                }
                                ?>




                            </tbody>
                        </table>


                        

                    
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

