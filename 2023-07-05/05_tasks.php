<?php

/*** FIRST ***/
class Person
{
    private $name;
    private $surname;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function printName()
    {
        return $this->name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getSurname()
    {
        return $this->surname;
    }
}

$person = new Person();
$person->setName("John");
$person->setSurname("Doe");
echo "Name: " . $person->printName() . PHP_EOL;
echo "Surname: " . $person->getSurname() . PHP_EOL;

/*** SECOND ***/
class Shape
{
    protected $numberOfSides;
    protected $color;

    public function showDetails()
    {
        echo "Number of sides: " . $this->numberOfSides . PHP_EOL;
        echo "Color: " . $this->color . PHP_EOL;
    }
}

class Square extends Shape
{
    public function __construct()
    {
        $this->numberOfSides = 4;
        $this->color = "Red";
    }
}

$square = new Square();
$square->showDetails();


/*** THIRD ***/
abstract class Fruit
{
    protected $name;
    abstract public function printName();
}

class Apple extends Fruit
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function printName()
    {
        echo $this->name . PHP_EOL;
    }
}

$apple = new Apple("Fuji");
$apple->printName();

/*** FOURTH ***/
class Book {
    private $title;
    private $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function __destruct()
    {
        echo "Book $this->title written by $this->author is BURNED!" . PHP_EOL;
    }

    public function showDetails()
    {
        echo "Title: " . $this->title . PHP_EOL;
        echo "Author: " . $this->author . PHP_EOL;
    }
}

$book = new Book("Bible", "God");
$book->showDetails();
// unset($book);
