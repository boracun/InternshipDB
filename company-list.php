<?php
session_start();
    require_once('connection.php');

    $pass = $_SESSION['sid'];

    //check if the student has 3 internships
    $query = "SELECT *
              FROM (SELECT COUNT(*) AS num_of_rows
                    FROM apply
                    WHERE sid = '21000001') AS num
               WHERE num_of_rows IN (3);";

    $response = @mysqli_query($con, $query);
    $no_of_companies = mysqli_fetch_assoc($response);

    if ($no_of_companies['num_of_rows'] >= '3')
    {
        header("Location: 3-company-error.php");
    }


    $query = "SELECT cid, cname, quota 
              FROM company 
              WHERE (cid NOT IN (SELECT cid
                                 FROM apply
                                 WHERE sid = '$pass'))
                    AND
                    quota <> 0;";

    $response = @mysqli_query($con, $query);

    if ($response)
    {
        echo '<table style="margin: 20% 0% 0% 35%;" align="left" cellspacing="5" cellpadding="8">

        <tr><td align="left"><b>Company ID</b></td>
        <td align="left"><b>Company Name</b></td>
        <td align="left"><b>Quota</b></td></tr>';

        while($row = mysqli_fetch_array($response))
        {
            echo '<tr><td align="left">' .
            $row['cid'] . '</td><td align="left">' .
            $row['cname'] . '</td><td align="left">' .
            $row['quota'] . '</td>';

            echo '</tr>';
        }

        echo '</table>';

        //register the company
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $company_id = $_POST['company-id'];
            $query = "SELECT COUNT(*)
                      FROM company NATURAL JOIN apply 
                      WHERE sid = '$pass';";
            $no_of_companies = @mysqli_query($con, $query); //gets the number of companies

            if($no_of_companies < 3)
            {
                $query = "INSERT INTO apply VALUES ('$pass', '$company_id');";
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    header("Location: student-internships.php");    //go back to student page
                }
            }

            else
            {
                header("Location: student-internships.php");
            }


        }

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
    <body>
        <form id="survey-form" method="post">
            <label for="company-id" id="company-id">
                Name<br />
                <input type="text" id="company-id" name="company-id" placeholder="Company ID" required />
                <br />
            </label>

            <input type="submit" value="Apply"></button>
        </form>
    </body>
</body>
</html>