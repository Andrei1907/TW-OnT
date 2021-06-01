<?php

    $dbhost = "eu-cdbr-west-01.cleardb.com";
    $dbuser = "bfd8475ba5810d";
    $dbpass = "48ccd211";
    $dbname = "heroku_ccfb2a59b2eb248";
    
    $charset = 'utf8';
    $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$charset";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
    {
        die("Could not connect to the database!");
    }

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => TRUE
    ];

?>