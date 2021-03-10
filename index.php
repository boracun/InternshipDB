<?php 
session_start();

$_SESSION;

?>

<html lang="en">
<meta charset="UTF-8">
<title>Internship</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="styles.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400&amp;family=Poppins:wght@300&amp;display=swap" rel="stylesheet">

<body>
    <div class="main-div">
        <div class="main-background"></div>
        <h2>Internship Application System</h2>
        <form id="survey-form">
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

            <button type="submit">Log in</button>
        </form>
    </div>

</body>
</html>