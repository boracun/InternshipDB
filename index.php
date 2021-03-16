<?php 
session_start();
    $_SESSION;

    include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        //both are filled because of the requirements

        //login
        $query = "SELECT * FROM student WHERE sid = '$pass' AND sname = '$user';";
        $response = mysqli_query($con, $query);

        if ($response)
        {
            $data = mysqli_fetch_assoc($response);

            if (@(strtolower($data['sname']) == strtolower($user) && $data['sid'] === $pass))
            {
                $_SESSION['sid'] = $data['sid'];
    
    
                header("Location: student-internships.php");
                die;
            }
            
        }
        echo "Wrong login info!";
        

       // header("Location: wrong-login.php");
       // die;

        
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internship</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400&amp;family=Poppins:wght@300&amp;display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-div">
        <div class="main-background"></div>
        <h2>Internship Application System</h2>
        <form id="survey-form" method="post">
            <label for="name" id="name-label">
                Name<br />
                <input type="text" id="user" name="user" placeholder="Username" required />
                <br />
            </label>

            <label for="password" id="pass-label">
                <!--Dont forget the validation thing-->
                Password<br />
                <input type="password" id="pass" name="pass" placeholder="Password" required />
            </label>

            <button type="submit" value="Login">Log in</button>
        </form>
    </div>

</body>
</html>