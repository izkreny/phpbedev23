<?php

namespace Company;

class Employee
{
    private $name;
    private $surname;
    private $salary;

    public function __construct($name, $surname, $salary)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }

    public function showDetails()
    {
        echo $this->name . " " . $this->surname . " (Salary: " . $this->salary . ")" . PHP_EOL;
    }
}

class Department
{
    private $name;
    private $employees = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function showDetails()
    {
        echo "In {$this->name} department work:" . PHP_EOL;
        foreach ($this->employees as $employee) {
            echo $employee->showDetails();
        }
    }
}

use \Company\Employee as CE;
use \Company\Department as CD;

$zp1 = new CE("John", "Doe", 1001);
$zp2 = new CE("Adam", "Smith", 2002);
$zp3 = new CE("Bruce", "Wills", 3003);

$department = new CD("Finances");
$department->addEmployee($zp1);
$department->addEmployee($zp2);
$department->addEmployee($zp3);

$department->showDetails();
