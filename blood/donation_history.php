<?php
    include("connection.php");
    $id = $_GET['username'];


    $query1 = "SELECT *
    FROM donor_registration d
    INNER JOIN donors as ds ON d.donor_id=ds.donor_id
    WHERE d.registration_id = '$id'";
    $data1 = mysqli_query($conne, $query1);
    $row = mysqli_fetch_assoc($data1);
    $ids = $row['donor_id'];

$query11 = "SELECT *
FROM donation_records
WHERE donor_id= '$ids'";
    $data11 = mysqli_query($conne, $query11);
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .inputusername,
        .inputpassword {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav>

    <a href="#">Home</a>
    <a href="blood_donation.php?username=<?php echo urlencode($id); ?>">Blood Donation</a>
    <a href="http://localhost/blood/">Log Out</a>

</nav>

<div class="container">

<table style="border: 1px solid black;">
    <tr>
        <th style="border: 1px solid black; padding: 5px;">Donor Date</th>
    </tr>
    <?php
    while($result = mysqli_fetch_assoc($data11)){
        echo "<tr>
                <td style='border: 1px solid black; padding: 5px;'>".$result['donation_date']."</td>
            </tr>";
    }
    ?>
</table>


</div>

</body>
</html>


