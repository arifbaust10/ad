
<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addmembers.css">
</head>
<body>
<nav>
    <ul>
    <li><a href="http://localhost/Library/">Home</a></li>
    <li><a href="http://localhost/Library/issubook.php">Issue List</a></li>
      <li><a href="http://localhost/Library/addmembers.php">Add Members</a></li>
      <li><a href="http://localhost/Library/members.php">Members List</a></li>
      <li><a href="#">Borrowed Books</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="http://localhost/Library/">Logout</a></li>
    </ul>
  </nav>


    <div class="alumni">
        <div class="seletionForm">
            <form action="#" method="POST">
              
                <div class="form">
                    <div class="input">
                        <label for="department">Department:</label>
                        <select id="department" name="department">
                            <option value="1">CSE</option>
                            <option value="2">EEE</option>
                            <option value="3">ME</option>
                            <option value="4">IPE</option>
                            <option value="5">BBA</option>
                            <option value="6">ENG</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="batch">Batch:</label>
                        <select id="batch" name="batch">
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
                            <option value="15">Batch 15</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="section">Section:</label>
                        <select id="section" name="section">
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
                        </select>
                    </div>
                    <div class="input">
                        <input type="submit" value="Click" name="submit1" id="submit1" >
                    </div>
                </div>
            </form>
        </div>


<?php

        if (isset($_POST['submit1'])) {

            $department = $_POST['department'];
            $batch = $_POST['batch'];
            $section = $_POST['section'];




            $query = "SELECT s.student_id
            FROM student AS s
            INNER JOIN student_details AS stds ON s.student_id = stds.student_id
            LEFT JOIN library AS l ON s.student_id = l.student_id
            WHERE s.batch='$batch' AND s.section='$section' and s.department_id= '$department'";
            
            $data = mysqli_query($conne, $query);



        } 
        
        
 


?>




        <div class="mainForm" id="mainForm">
            <form action="#" method="POST">
                <div class="form">
                    <div class="input">
                        <label for="studentid">Student Id</label>
                        <select  name="student_id">
                            <?php
                            if (isset($data)) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<option value=\"" . $result['student_id'] . "\">" . $result['student_id'] ."</option>";
                                }
                            }else {
                                echo "<option value=\"\">No data available</option>";
                            }
                            ?>
                        </select>
                    </div>


<?php
$query1 = "SELECT * FROM `books`";

$data1 = mysqli_query($conne, $query1);
?>
                    
                    <div class="input">
                    <label for="books">Book List</label>
                        <select  name="books">
                            <?php
                            if (isset($data)) {
                                while ($result = mysqli_fetch_assoc($data1)) {
                                    echo "<option value=\"" . $result['book_id'] . "\">" . $result['book_name'] ."</option>";
                                }
                            }else {
                                echo "<option value=\"\">No data available</option>";
                            }
                            ?>
                        </select>
                      
                    </div><br>
                    
                    <div class="input">
                        <input type="submit" value="Submit" name="submit" onclick="return con();">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
    <p>&copy; 2024 University Management Systems <?php echo date("Y"); ?></p>
  </footer>
    
</body>
</html>


<?php
if (isset($_POST['submit'])) {
    
    $student_id = $_POST['student_id']; 
    $books = $_POST['books'];
    $issue_date = date('Y-m-d');
    
  
    $sql = "INSERT INTO student_books (student_id, book_id, issue_date) 
             VALUES ('$student_id', '$books', '$issue_date')";


    $data = mysqli_query($conne, $sql);
    if($data){
        
    }else{
        
    }
}
?>


<script>
    function con(){
        return confirm("Are you sure you went to submit");
    }
</script>