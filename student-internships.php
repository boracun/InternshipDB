<?php
session_start();
    require_once('connection.php');

    $pass = $_SESSION['sid'];

    $query = "SELECT cid, cname, quota FROM company NATURAL JOIN apply WHERE sid = '$pass';";

    $response = @mysqli_query($con, $query);

    if ($response)
    {
        echo '<table style="margin: 10% 0% 0% 35%;" align="left" cellspacing="5" cellpadding="8">

        <tr>
        <td align="left"><b>Company ID</b></td>
        <td align="left"><b>Company Name</b></td>
        <td align="left"><b>Quota</b></td></tr>';

        while($row = mysqli_fetch_array($response))
        {
            echo '<tr>
            <td align="left">' .
            $row['cid'] . '</td><td align="left">' .
            $row['cname'] . '</td><td align="left">' .
            $row['quota'] . '</td><td align="left">
            <a href="cancel-successful.php?company=' . $row['cid'] . '"><button style="width: fit-content;">Cancel</button></a>
            </td>';

            echo '</tr>';
        }

        echo '</table>';
    }

    else 
    {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($con);
    }

    mysqli_close($con);
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
    <a href="logout.php">
        <button style="position: absolute;
                       margin: 10% 0% 0% 0%;
                       width: fit-content;
                       height: fit-content;" class="logout-button">Log out</button>
        </a>
    <footer>
        <a href="company-list.php">
        <button style="margin: 5% 0% 0% 0%;" id="new-internship-button">Apply for a new internship!</button>
        </a>
        
    </footer>   
</body>
</html>