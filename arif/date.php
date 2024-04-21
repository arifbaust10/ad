<?php
include("connected.php");

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query ="SELECT t.teacher_id,t.teacher_name,t.department_id,d.department_name,td.designation,td.phone,td.email,td.address,td.date_of_birth,td.gender,td.education_qualification,td.areas_of_interest
FROM users_teacher AS ut INNER JOIN 
     teacher as t 
     on t.teacher_id =ut.teacher_id
     INNER JOIN
     teacher_details as td
     on td.teacher_id =t.teacher_id
     INNER JOIN
     department as d
     on d.department_id = t.department_id
     WHERE username='$username'";

    $data = mysqli_query($conne, $query);
    $data1 = mysqli_query($conne, $query);
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

        <a href="http://localhost/arif/attandanceMain.php?username=<?php echo $username; ?>">Attendance</a>
        <a href="http://localhost/arif/check.php?username=<?php echo $username; ?>">Check Attandance</a>

        <a href="http://localhost/arif/index.php">Logout</a>
    </div>
    
    <div class="main">

        <div class="addexam" style="text-align: center;">
            <form method="POST">
                <input type="submit" name="addExamDate" value="Add Exam Schedule" style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px auto; cursor: pointer; border-radius: 10px;">
            </form>
        </div>


        <?php

        if(isset($_POST['addExamDate'])) {
            ?>
            <?php
                $username = $_GET['username'];   
                $query = "SELECT * FROM users_teacher as ut 
                        INNER JOIN teachers_course as tc ON ut.teacher_id=tc.teacher_id
                        INNER JOIN course_details as cd ON tc.course_code=cd.course_code
                        WHERE username='$username'";

                $data = mysqli_query($conne, $query);

            ?>

            <div class="main">

            <div class="addexam" style="text-align: left; width: 300px; font-size:15px">
            <form method="POST">

                <div class="classExamAdd">
                    <label for="course_code" style="margin-bottom: 5px;">Course Name:</label>
                    <select name="course_code" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                        <?php
                        if (isset($data)) {
                            while ($result = mysqli_fetch_assoc($data)) {
                                echo "<option value=\"" . $result['course_code'] . "\">" . $result['course_code'] . ' - ' . $result['title'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="classExamAdd">
                    <label for="examType" style="margin-bottom: 5px;">Exam Type:</label>
                    <select id="examType" name="examType" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                        <option value="ct1">CT 1 (Class Test)</option>
                        <option value="ct2">CT 2 (Class Test)</option>
                        <option value="ct3">CT 3 (Class Test)</option>
                        <option value="mid">Midterm</option>
                        <option value="final">Final</option>
                    </select>
                </div>

                <div class="classExamAdd">
                    <label for="date" style="margin-bottom: 5px;">Exam Date:</label>
                    <input type="date" name="date" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                </div>

                <div class="classExamAdd">
                    <label for="time" style="margin-bottom: 5px;">Exam Time:</label>
                    <input type="time" name="time" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                </div>

                <div class="classExamAdd">
                    <label for="room" style="margin-bottom: 5px;">Room Number:</label>
                    <input type="number" name="room" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                </div>

                <div class="classExamAdd">
                    <label for="topic" style="margin-bottom: 10px;">Exam Topic:</label>
                    <input type="text" name="topic" style="width: 100%; margin-top: 5px; margin-bottom: 15px;">
                </div>

                <div class="classExamAdd" style="text-align: center; margin-top: 10px;">
                    <input type="submit" name="addcourse" value="ADD EXAM" style="background-color: #4CAF50; border: none; color: white; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer; border-radius: 10px;">
                </div>

                </form>

</div>

        </div>

    
    
    <?php
}
?>

    </div>



    <div class="main">
    <?php
    if(isset($_POST['addcourse'])) {
        $course_code = $_POST["course_code"];
        $examType = $_POST["examType"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $room = $_POST["room"];
        $topic = $_POST["topic"];

        $query1 ="SELECT title
        FROM course_details
        WHERE course_code= '$course_code'";
        
        $data1 = mysqli_query($conne, $query1);

        $row = mysqli_fetch_assoc($data1);
        $title = $row['title'];

        $query2 ="INSERT INTO exam_date(course_code, exam_dates, exam_time, exam_type, room_no, topic) VALUES ('$course_code','$date','$time','$examType','$room','$topic')";
        
        $data2 = mysqli_query($conne, $query2);


        ?>
        
<?php
    }
    ?>
    <div>
        <?php
        $query3 ="SELECT teacher_id
        FROM users_teacher
        WHERE username='$username'";

        
        $data3 = mysqli_query($conne, $query3);

        $row = mysqli_fetch_assoc($data3);
        $teacher_id = $row['teacher_id'];


        $query3 ="SELECT ex.course_code,c.title,ex.exam_type,ex.exam_dates,ex.exam_time,ex.room_no,ex.topic
        FROM exam_date as ex
        INNER JOIN course_details as c
        ON ex.course_code=c.course_code
        INNER JOIN
        users_teacher as ust
        ON ust.teacher_id=c.teacher_id
        WHERE c.teacher_id='$teacher_id'";

        
        $data3 = mysqli_query($conne, $query3);

      

        while ($result = mysqli_fetch_assoc($data3)) {
            ?>
            <div class="main">
            <?php
                echo "Course Code: " . $result['course_code'] . "<br>";
                echo "Course Name: " . $result['title']  . "<br>";
                echo "Exam Type: " . $result['exam_type'] . "<br>";
                echo "Date: " .$result['exam_dates']  . "<br>";
                echo "Time: " .$result['exam_time'] . "<br>";
                echo "Room: " . $result['room_no']  . "<br>";
                echo "Topic: " . $result['topic']  . "<br>";
               

                    
              echo "  <a href='updateexam.php?course_code=$result[course_code]&title=$result[title]&topic=$result[topic]&room_no=$result[room_no]&exam_type=$result[exam_type]&exam_date=$result[exam_dates]&exam_time=$result[exam_time]&username=$username' ><input type='submit' value='Update' class='updatebtn' style='background-color: green; padding:4px; color: white; border-radius: 5px;cursor: pointer; '></a>";

              echo "  <a href='deleteexam.php?course_code=$result[course_code]&title=$result[title]&topic=$result[topic]&room_no=$result[room_no]&exam_type=$result[exam_type]&exam_date=$result[exam_dates]&exam_time=$result[exam_time]&username=$username' ><input type='submit' value='Delete' class='updatebtn' style='background-color: red; padding:4px; color: white; border-radius: 5px;cursor: pointer;  ' onclick='return checkdelete();'></a>";


                ?>
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


<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete this record?');
    }
</script>