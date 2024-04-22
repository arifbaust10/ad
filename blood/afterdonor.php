<?php
    include("connection.php");
    $id = $_GET['username'];
   
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
    <a href="donation_history.php?username=<?php echo urlencode($id); ?>">Donation History</a>

    <a href="blood_donation.php?username=<?php echo urlencode($id); ?>">Blood Donation</a>
    <a href="http://localhost/blood/">Log Out</a>
</nav>

<div class="container">
<article>
        <h2>Why Donate Blood?</h2>
        <p>Every year, millions of lives are saved through blood transfusions. Blood donation is a noble act that helps those in need, including accident victims, patients undergoing surgeries, and individuals with medical conditions like anemia and cancer.</p>
        <p>By donating blood, you can make a significant difference in someone's life. It's a simple yet powerful way to contribute to your community and help save lives.</p>
        <h2>Who Can Donate?</h2>
        <p>Most healthy adults are eligible to donate blood. Generally, donors must:</p>
        <ul>
            <li>Be at least 17 years old (16 with parental consent in some areas)</li>
            <li>Weigh at least 110 pounds</li>
            <li>Be in good health</li>
            <li>Meet other specific requirements set by blood donation centers</li>
        </ul>
        <p>If you meet these criteria, consider donating blood today and become a hero for someone in need.</p>
        <h2>How to Donate</h2>
        <p>Donating blood is a simple process that typically takes about an hour. You can donate at your local blood donation center or during blood drives organized by various organizations.</p>
        <p>Before donating, make sure to:</p>
        <ul>
            <li>Get a good night's sleep</li>
            <li>Eat a healthy meal</li>
            <li>Hydrate by drinking plenty of water</li>
        </ul>
        <p>After donation, you'll be provided with refreshments to help replenish your fluids.</p>
        <p>Remember, your blood donation can save lives. Schedule your donation appointment today!</p>
    </article>
</div>

</body>
</html>


