<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #8b0000;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        h1 {
            margin: 0;
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
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
        }
        .cta-button {
            display: inline-block;
            background-color: #8b0000;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
        }
        .cta-button:hover {
            background-color: #6b0000;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Blood Bank Project</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="donor_regis.php">Donore Registration</a>
        <a href="doner.php">Donor</a>
        <a href="#">User</a>
    </nav>
    <div class="container">
        <h2>About Us</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et justo vitae felis fermentum fermentum. 
            Vivamus ac tristique turpis. Donec tempus turpis et neque aliquet, sit amet accumsan dui fermentum. 
            Fusce tincidunt ultricies orci, eu consequat magna dapibus et. Duis eleifend mauris vel pharetra vestibulum. 
            Nulla facilisi. Nullam scelerisque orci vel ligula hendrerit suscipit. 
        </p>
        <a href="#" class="cta-button">Donate Now</a>
    </div>
    <footer>
        <p>&copy; 2024 Blood Bank Project</p>
    </footer>
</body>
</html>
