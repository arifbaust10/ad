<?php

include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"], input[type="date"] ,input[type="number"],input[type="donor_id"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Donor Registration</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >
            <label for="donor_id">Donor Id:</label>
            <input type="text" id="donor_id" name="donor_id" >
            <label for="blood_group">Blood Group:</label>
            <input type="text" id="blood_group" name="blood_group" >
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" >
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" >
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" >
            <label for="id">Registeration id :</label>
            <input type="number" id="id" name="id" >
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >
        
            <input type="submit" name="Register" value="Register">
        </form>
    </div>
</body>
</html>



<?php
    if(isset($_POST['Register'])){

        $name = $_POST['name'];
        $blood_group = $_POST['blood_group'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $donor_id = $_POST['donor_id'];
        $id = $_POST['id'];
        $password = $_POST['password'];

    


        $query = "INSERT INTO `donors`(`donor_id`, `name`, `blood_group`, `contact_number`, `email`, `address`) VALUES ('$donor_id','$name','$blood_group','$contact_number','$email','$address')";
        $data = mysqli_query($conne, $query);

        // Insert into donor_registration table
        $query1 = "INSERT INTO `donor_registration`(`registration_id`, `PASSWORD`, `donor_id`, `registration_date`) VALUES ('$id','$password','$donor_id',now())";
        $data1 = mysqli_query($conne, $query1);

        // Check if data is inserted successfully
        if($data && $data1){
            echo "Data inserted successfully!";

            
        } else {
            echo "Error: " . mysqli_error($conne);
        }



    
       

        
    }
?>

