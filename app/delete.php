<?php
    // connect to database
    require_once 'init.php';

    if (isset($_GET['item'])) {
        $itemID = (int)$_GET['item'];

        if (!empty($itemID)) {
            $sqlQuery = "DELETE FROM items WHERE itemid='$itemID'";

            // die on failure
            if (!$result = $dbConn->query($sqlQuery))
                die('Fatal error: ' . $dbConn->error);
        }
    }

    header('Location: ../index.php');