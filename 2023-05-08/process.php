<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POST exercise</title>
</head>
<body>
    <pre><?php

    if (isset($_POST["name"]) AND isset($_POST["surname"])) {
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        echo $name . " " . $surname . PHP_EOL;
    } else {
        echo "No data to process!";
    }
    
    ?></pre>
</body>
</html>