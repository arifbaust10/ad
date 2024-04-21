<?php
include("connected.php");


$username = $_GET['username'];
$course_code = $_GET['course_code'];
$title = $_GET['title'];
$topic = $_GET['topic'];
$room_no = $_GET['room_no'];
$exam_type = $_GET['exam_type'];
$exam_date = $_GET['exam_date'];
$exam_time = $_GET['exam_time'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Exam Information</title>
</head>
<body>
  <h2>Update Exam Information</h2>
  <form method="POST">
    <label for="course_code">Course Code:</label>
    <input type="text" id="course_code" name="course_code" value="<?php echo $course_code; ?>" readonly><br><br>

    <label for="topic">Topic:</label>
    <input type="text" id="topic" name="topic" value="<?php echo $topic; ?>"><br><br>

    <label for="room_no">Room No:</label>
    <input type="text" id="room_no" name="room_no" value="<?php echo $room_no; ?>"><br><br>

    <label for="examType" style="margin-bottom: 5px;">Exam Type:</label>
    <select id="examType" name="exam_type">
        <option value="ct1" <?php if ($exam_type == 'ct1') echo 'selected="selected"'; ?>>CT 1 (Class Test)</option>
        <option value="ct2" <?php if ($exam_type == 'ct2') echo 'selected="selected"'; ?>>CT 2 (Class Test)</option>
        <option value="ct3" <?php if ($exam_type == 'ct3') echo 'selected="selected"'; ?>>CT 3 (Class Test)</option>
        <option value="mid" <?php if ($exam_type == 'mid') echo 'selected="selected"'; ?>>Midterm</option>
        <option value="final" <?php if ($exam_type == 'final') echo 'selected="selected"'; ?>>Final</option>
    </select><br><br>

    <label for="exam_date">Exam Date:</label>
    <input type="date" id="exam_date" name="exam_date" value="<?php echo $exam_date; ?>"><br><br>

    <label for="exam_time">Exam Time:</label>
    <input type="time" id="exam_time" name="exam_time" value="<?php echo $exam_time; ?>"><br><br>

    <input type="submit" name="Update" value="Update">
  </form>
</body>
</html>

<?php
if (isset($_POST['Update'])) {
    $course_code = $_POST['course_code']; // Assuming course code shouldn't be updated
    $topic = $_POST['topic'];
    $room_no = $_POST['room_no'];
    $exam_type = $_POST['exam_type'];
    $exam_dates = $_POST['exam_date'];
    $exam_times = $_POST['exam_time'];

    echo $exam_date." ".$exam_dates;
    // Update Query Here
    $sql = "UPDATE exam_date 
            SET topic='$topic',
                room_no='$room_no',
                exam_type='$exam_type',
                exam_dates='$exam_dates',
                exam_time='$exam_times'
            WHERE course_code='$course_code' 
            AND exam_dates='$exam_date'  AND exam_time='$exam_time'";

    if (mysqli_query($conne, $sql)) {
        echo "Exam information updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    header("Location: date.php?username=$username");
}
?>
