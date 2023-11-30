<?php

// https://www.php.net/manual/en/function.session-start
session_start();

$_SESSION["user"] = "Freeman";

// Location does redirection
// php.ini contain session record directory
// https://www.php.net/manual/en/function.header
header('Location: session_2.php');
