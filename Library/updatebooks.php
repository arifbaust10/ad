<?php
    include("connection.php");
    $id = $_GET['ids'];
    $book_id = $_GET['book_id'];
    $book_name = $_GET['book_name'];
    $issue_date = $_GET['issue_date'];


    $query = "SELECT * FROM `student_books` WHERE student_id='$id'  AND book_id='$book_id' AND issue_date='$issue_date'";
    $data = mysqli_query($conne,$query);

    $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="updatemember.css">
</head>
<body>
    <div class="mainContainer">
        <div class="title" style="text-align:center;">
            Update Member Information           
        </div>
        <form action="#" method="POST">
            <div class="update">
                <label for="student_id">ID</label>
                <input type="number" name="student_id" id="student_id" value="<?php echo $result['student_id']; ?>" readonly >
            </div>

<?php
$query1 = "SELECT * FROM `books`";

$data1 = mysqli_query($conne, $query1);
?>


            <div class="update">
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
            </div>

            <div class="update">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>
</body>
</html>



<?php
    if($_POST['update']){

        $student_id = $_POST['student_id']; 
         $books = $_POST['books'];
        $issue_date = date('Y-m-d');
       
           $query = "UPDATE `student_books` SET `book_id`='$books',`issue_date`='$issue_date' WHERE student_id='$student_id'";

           

        $data = mysqli_query($conne,$query);
        if($data){
            echo 'data is inserted into database';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/Library/issubook.php" />


            <?php
        }else{
            echo 'data is not inserted into database';
        }


        
    }
?>
