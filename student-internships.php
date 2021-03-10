<?php
    require_once('connection.php');

    $query = "SELECT cid, cname, quota FROM company NATURAL JOIN apply WHERE sid = '21000001';";

    $response = @mysqli_query($con, $query);

    if ($response)
    {
        echo '<table align="left" cellspacing="5" cellpadding="8">

        <tr><td align="left"><b>Company ID</b></td>
        <td align="left"><b>Company Name</b></td>
        <td align="left"><b>Quota</b></td></tr>';

        while($row = mysqli_fetch_array($response))
        {
            echo '<tr><td align="left">' .
            $row['cid'] . '</td><td align="left">' .
            $row['cname'] . '</td><td align="left">' .
            $row['quota'] . '</td><td align="left">';

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