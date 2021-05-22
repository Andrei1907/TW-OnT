<?php

    $dbhost = "eu-cdbr-west-01.cleardb.com";
    $dbuser = "bfd8475ba5810d";
    $dbpass = "48ccd211";
    $dbname = "heroku_ccfb2a59b2eb248";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
    {
        die("Could not connect to the database!");
    }

?>