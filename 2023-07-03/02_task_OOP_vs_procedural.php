<?php

$grades = [1, 2, 3, 4, 5];
$gradesSum = 0;
$gradesCount = 0;

// Let's calculate average grade via procedural way of doing
foreach ($grades as $grade) { 
    $gradesSum += $grade;
    $gradesCount += 1;
}
echo "Average grade is (procedural way): " . $gradesSum / $gradesCount . PHP_EOL;

// OOP way of doing
class Grades
{
    public $grades;

    public function average()
    {
        $gradesCount = count($this->grades);
        $gradesSum = array_sum($this->grades);
        $gradesAverage = $gradesSum / $gradesCount;

        return $gradesAverage;
    }
}

$grades = new Grades();
$grades->grades = [1, 2, 3, 4, 5];
$average = $grades->average();

echo "Average grade is (OOP way): " . $average . PHP_EOL;
