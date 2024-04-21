<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Library Management System</title>
  <style>


body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  nav {
    background-color: #e9ecef;
    color: #fff;
    padding: 10px 0;
  }
  
  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
  }
  
  nav ul li {
    display: inline;
    margin-right: 20px;
  }
  
  nav ul li a {
    color: #007bff;
    text-decoration: none;
  }

  nav li:hover {
    /* Your hover styling goes here */
    /* For example, change the background color */
    background-color: #ccc;
  }
  
  main {
    margin: 20px;
  }
  
  .contain {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  h2 {
    text-align: center;
  }
  
  .input-group {
    margin-bottom: 20px;
  }
  
  .input-group label {
    display: block;
    margin-bottom: 5px;
  }
  
  .input-group input {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  
  .submit input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    background-color: green;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  
  .submit input:hover {
    background-color: #555;
  }
  
  footer {
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    background-color: #e9ecef;
    color: #007bff;
    position: fixed;

    bottom: 0;
    left: 0;
    right: 0;
  }
  h1 {
            color: #333;
        }
        p {
            color: #666;
        }
  
  </style>
</head>
<body>
  
  <nav>
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="http://localhost/Library/books.php">Books</a></li>
      <li><a href="http://localhost/Library/issubook.php">Issue List</a></li>
      <li><a href="http://localhost/Library/addmembers.php">Add Members</a></li>
      <li><a href="http://localhost/Library/members.php">Members List</a></li>
      <li><a href="#">Borrowed Books</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="http://localhost/Library/">Log Out</a></li>
    </ul>
  </nav>
  
  <main>
  <article>
        <p>As a prestigious institution committed to academic excellence, the University of BAUST recognizes the importance of efficient library management systems (LMS) to support teaching, learning, and research endeavors. Our library system is equipped with state-of-the-art technology to streamline operations and enhance user experiences.</p>

        <h2>Key Features of Our Library Management Systems</h2>
        <ul>
            <li><strong>Comprehensive Cataloging:</strong> Our LMS allows for comprehensive cataloging of diverse materials, including books, journals, e-resources, and multimedia items, ensuring easy access to the university's extensive collection.</li>
            <li><strong>Efficient Circulation:</strong> Students and faculty members can efficiently borrow and return materials using our LMS, which tracks due dates, manages renewals, and handles fines seamlessly.</li>
            <li><strong>Advanced Resource Management:</strong> Our LMS facilitates efficient management of physical and digital resources, from acquisition and subscription to inventory control and preservation.</li>
            <li><strong>User-Friendly Interface:</strong> With a user-friendly interface and intuitive search functionality, our LMS empowers users to find relevant resources quickly and navigate the library's offerings with ease.</li>
            <li><strong>Customized Patron Services:</strong> We offer personalized patron services through our LMS, including user accounts, holds, interlibrary loans, and access to digital repositories.</li>
            <li><strong>Robust Reporting:</strong> Our LMS provides robust reporting and analytics capabilities, enabling data-driven decision-making, collection assessment, and performance evaluation.</li>
        </ul>

        <h2>Benefits of Our Library Management Systems</h2>
        <p>Implementing our LMS at the University of BAUST offers numerous benefits:</p>
        <ul>
            <li><strong>Enhanced Learning Experience:</strong> Our LMS enhances the learning experience by providing seamless access to resources and supporting academic research and coursework.</li>
            <li><strong>Optimized Resource Utilization:</strong> By efficiently managing resources, our LMS ensures optimal resource utilization, cost-effectiveness, and sustainability.</li>
            <li><strong>Support for Research:</strong> Our LMS supports research activities by providing access to scholarly literature, research databases, and specialized collections.</li>
            <li><strong>Improved Library Services:</strong> With streamlined workflows and personalized services, our LMS enhances library services, fostering a culture of innovation and excellence.</li>
            <li><strong>Alignment with Institutional Goals:</strong> Our LMS aligns with the University of BAUST's strategic goals of promoting academic excellence, research, and lifelong learning.</li>
        </ul>

    </article>
  </main>
  
  <footer>
    <p>&copy; <?php echo date('Y'); ?> University Management Systems</p>
  </footer>

</body>
</html>
