<?php

// Enter grades until zero cancel the script.
// Print number of grades entered.

$counter = 0; // Integer
echo "Enter a grade (1-5) and press ENTER (0 is for EXIT): ";
$grade = trim(fgets(STDIN)); // String

// https://www.php.net/manual/en/features.commandline.io-streams.php
while ($grade != 0) {
    if ($grade >= 1 and $grade <= 5) {
        $counter++;
    } else {
        echo "Grade $grade is not a valid grade and therefore is not counted!" . PHP_EOL;
    }
    echo "Enter a grade (1-5) and press ENTER (0 is for EXIT): ";
    $grade = trim(fgets(STDIN)); // String
}

echo "Number of grades entered: " . $counter . PHP_EOL;
