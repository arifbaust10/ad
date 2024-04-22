<?php
include("connection.php");


    $id = $_GET['username'];

    // Fetch donor ID from the database
    $query1 = "SELECT *
    FROM donor_registration d
    INNER JOIN donors as ds ON d.donor_id=ds.donor_id
    WHERE d.registration_id = '$id'";
    $data1 = mysqli_query($conne, $query1);
    $row = mysqli_fetch_assoc($data1);
    $ids = $row['donor_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Donation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      text-align: center;
      color: #333;
    }
    
    form {
      margin-top: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }
    
    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #d9534f;
      color: #fff;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #c9302c;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Blood Donation</h1>
    <form method="post">
      
      <label for="lastDonated">Donated Date:</label>
      <input type="date" id="lastDonated" name="lastDonated" required><br><br>
      
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</body>
</html>


<?php
     if(isset($_POST['submit'])){
        
        $lastDonated = $_POST['lastDonated'];
      


   

        $query = "INSERT INTO donation_records(donor_id, donation_date) VALUES ('$ids','$lastDonated ')";
        $data = mysqli_query($conne, $query);
        $total = mysqli_num_rows($data);
      
        if($total != 0){
            echo "insert into database";
        }
    }
?>
