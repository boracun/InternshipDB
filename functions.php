<?php 
    function check_login($con)
    {
        if (isset($_SESSION['user']))
        {
            $studentid = $_SESSION['user'];
            $query = "SELECT * FROM student WHERE sid = '$studentid'";

            $result = mysqli_query($con, $query);   //result gets the student
            
            if($result && mysqli_num_rows($result) > 0)
                return $mysqli_fetch_assoc($result);
        }
        else
        {
            header("Location: index.php");
            die;
        }
    }

?>