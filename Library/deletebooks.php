<?php
    include("connection.php");
    $id = $_GET['ids'];
    $book_id = $_GET['book_id'];
    $book_name = $_GET['book_name'];
    $issue_date = $_GET['issue_date'];

    $query = "delete from student_books where student_id='$id' and book_id='$book_id' and issue_date='$issue_date'";
    $data = mysqli_query($conne,$query);

    if($data){
            echo 'data is deleted';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/Library/issubook.php" />


            <?php
        }
?>