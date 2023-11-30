<?php

session_start();
echo "GREETINGS, {$_SESSION['user']}!";
