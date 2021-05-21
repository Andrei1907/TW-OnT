<?php

function isLoggedIn($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $queryResult = mysqli_query($con, $query);
        
        if($queryResult && mysqli_num_rows($queryResult) > 0)
        {
            $user_data = mysqli_fetch_assoc($queryResult);
            return $user_data;
        }
    }

    //redirect to login if necessary on certain pages
    header("Location: login.php");
    die;
}

function genRand($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $new_length = rand(4, $length);

    for ($i = 0; $i < $new_length ; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}

?>