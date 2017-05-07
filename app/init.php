<?php
    // add database configuration file
    require_once 'config.php';

    // create DB connection
    $dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // die if error
    if ($dbConn->connect_errno) {
        die('Connection failed: ' . $dbConn->connect_error);
    }