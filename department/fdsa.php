<?php
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="main">
        <form action="#" method="post">
            <div class="input">
                <div class="input_filed">
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

                <div class="input_filed">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select> 
                </div>

                <div class="input_filed">
                    <label for="term">Term</label>
                    <select name="term" id="term">
                        <option value="1">Term 1</option>
                        <option value="2">Term 2</option>
                    </select> 
                </div>
                
                <div class="input_filed">
                    <input type="submit" id="submit" name="submit" value="Login"> 
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>


<?php
       

        if (isset($_POST['submit'])) {
            
            $department = $_POST['department'];
            $level = $_POST['level'];
            $term = $_POST['term'];

            echo $department." ".$level." ".$term;

            header("Location: nexts.php?department=$department&level=$level&term=$term");
            exit(); 
        }
?>
