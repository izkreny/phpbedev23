<?php

$weekdayNumber = date('N');

echo "Danas je $weekdayNumber. dan u tjednu aka ";

switch ($weekdayNumber) {
    case 1:
        echo "Ponedjeljak!" . PHP_EOL;
        break;
    case 2:
        echo "Utorak!" . PHP_EOL;
        break;
    case 3:
        echo "Srijeda!" . PHP_EOL;
        break;
    case 4:
        echo "Četvrtak!" . PHP_EOL;
        break;
    case 5:
        echo "Petak!" . PHP_EOL;
        break;
    case 6:
        echo "Subota!" . PHP_EOL;
        break;
    case 7:
        echo "Nedjelja!" . PHP_EOL;
        break;
    default:
        echo "NEPOSTOJEĆI!!" . PHP_EOL;
        break;
}
