<?php

if ($_POST) {
    $name = $_POST["username"];
    $pass = $_POST["pass"];
    
    echo "Dear " . $name . ", welcome to the script with the password:  " . $pass;
} else {
    echo "ERROR!";
}
