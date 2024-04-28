<?php
include("connected.php");

if (isset($_GET['username'])) {
    $username = $_GET['username']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Management System</title>
<link rel="stylesheet" href="demo.css">
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

        <a href="http://localhost/student/attandance.php?username=<?php echo $username; ?>">Check Attandance</a>

        <a href="http://localhost/arif/index.php">Logout</a>
    </div>
    
    




    
    <div>
        <?php
        $query3 ="SELECT student_id
        FROM users_student
        WHERE username='$username'";

        
        $data3 = mysqli_query($conne, $query3);

        $row = mysqli_fetch_assoc($data3);
        $student_id = $row['student_id'];


        $query3 ="SELECT *
        FROM students_course as sc
             INNER JOIN 
             exam_date as exd
             on sc.course_code=exd.course_code
             INNER JOIN course_details as css
             on css.course_code=sc.course_code
             
             WHERE sc.student_id='$student_id'";

        
        $data3 = mysqli_query($conne, $query3);

        $checkstotals = mysqli_num_rows($data3);

                
       
            if($checkstotals==0){
                ?>
                <div>
                    <article style="text-align: center; font-weight: bold; color: red;">Present taken for today </article>
                </div>

            <?php
            
             } else {
                ?>
                <div style="margin: 20px;">
                    <table style="border-collapse: collapse; width: 100%;">
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Course Code</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Title</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Exam Type</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Exam Date</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Exam Time</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Room No.</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Topic</th>
                        </tr>
                        <?php
                        while ($result = mysqli_fetch_assoc($data3)) {
                            ?>
                            <tr style="border: 1px solid #dddddd;">
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['course_code']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['title']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['exam_type']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['exam_dates']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['exam_time']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['room_no']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $result['topic']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
            
            ?>
            


    </div>

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


