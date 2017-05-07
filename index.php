<?php
    require_once 'app/init.php';

    $sqlQuery = "SELECT * FROM items";

    if (!$result = $dbConn->query($sqlQuery)) 
        die('Fatal error: ' . $dbConn->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple ToDo List</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1 class="header">Simple Todo List (<?php echo $result->num_rows ?> items)</h1>
        <ul class="items">
        <?php
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
                    $isDone = $item['done'] ? 'done' : '';
                    echo '<li><span class="' . $isDone . '">' . $item['value'] . '</span>';

                    if (!$isDone) {
                        echo '&nbsp;<a href="app/mark.php?item=' . $item['itemid'] . '" class="btn">Mark as done</a>';
                    }
                
                    echo '&nbsp;<a href="app/delete.php?item=' . $item['itemid'] . '" class="btn">Delete</a></li>'; 
                }
            } else {
                echo "<p>Your list is empty.</p>";
            }

            $result->close();
        ?>               
        </ul>

        <form action="app/add.php" method="post">
            <input type="text" name="item_value" placeholder="Type a new item here" class="input" autocomplete="off" required>
            <input type="submit" value="Add new item" class="submit">
        </form>
    </div>
</body>
</html>