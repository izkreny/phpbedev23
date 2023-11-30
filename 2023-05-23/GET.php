<?php

if ($_GET) {
    $name = $_GET["username"];
    $pass = $_GET["pass"];
    
    echo "Dear " . $name . ", welcome to the script with the password:  " . $pass;
} else {
    echo "ERROR!";
}
