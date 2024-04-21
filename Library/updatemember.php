<?php
    include("connection.php");
    $id = $_GET['ids'];
    $query = "SELECT `student_id`, `username`, `password` FROM `library` WHERE student_id='$id'";
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
                <label for="studentId">ID</label>
                <input type="number" name="studentID" id="studentId" value="<?php echo $result['student_id']; ?>" readonly >
            </div>

            <div class="update">
            <label for="username">Username :</label>
          <input type="text" name="username" id="username" value="<?php echo $result['username']; ?>">
            </div>
            <div class="update">
            <label for="password">Password :</label>
          <input type="password" name="password" id="password" value="<?php echo $result['password']; ?>">
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

        $username = $_POST['username'];
        $password = $_POST['password'];
       

       

           $query = "UPDATE `library` SET `username`='$username',`password`='$password' WHERE student_id='$id'";

           

        $data = mysqli_query($conne,$query);
        if($data){
            echo 'data is inserted into database';
            ?>

                  <meta http-equiv = "refresh" content = "0; url = http://localhost/Library/members.php" />


            <?php
        }else{
            echo 'data is not inserted into database';
        }


        
    }
?>
