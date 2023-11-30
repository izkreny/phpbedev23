<?php

// https://www.php.net/manual/en/function.setcookie.php
setcookie('user', 'Freeman', time() + 3600, '/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <pre><?php var_dump($_COOKIE) ?></pre>
</body>
</html>
