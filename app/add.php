<?php
    // connect to database
    require_once 'init.php';

    function get_post($db, $str) {
        if (get_magic_quotes_gpc()) $str = stripslashes($str);
        return $db->real_escape_string($str);
    }

    if (isset($_POST['item_value'])) {
        $itemValue = get_post($dbConn, strip_tags(trim($_POST['item_value'])));

        if (!empty($itemValue)) {
            $sqlQuery = "INSERT INTO items (value, done, created) VALUES ('$itemValue', 0, NOW())";

            // die on failure
            if (!$result = $dbConn->query($sqlQuery)) 
                die('Fatal error: ' . $dbConn->error);
        }
    }

    header('Location: ../index.php');