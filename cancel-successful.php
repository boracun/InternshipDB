<?php 
session_start();
    require_once('connection.php');

    $pass = $_SESSION['sid'];

    $course = $_GET['course'];

    $query = "DELETE FROM apply
              WHERE sid = '$pass' AND cid = '$course';";

    $response = @mysqli_query($con, $query);



?>

<html lang="en">
<meta charset="UTF-8">
<title>Internship</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="styles.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400&amp;family=Poppins:wght@300&amp;display=swap" rel="stylesheet">

<head>
<body>
    <header>
        <h1>Internship Application System</h1>
    </header>

    <main>
        You have successfully cancelled your application.
        <a href="student-internships.php">
        <button id="new-internship-button">Back to Welcome page</button>
        </a>
    </main>

    <footer>
        
    </footer>   
</body>
</html>