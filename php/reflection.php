<?php


class A
{
    public $one = '';
    public $two = '';
    
    //Constructor
    public function __construct()
    {
        //Constructor
    }
    
    //print variable one
    public function echoOne()
    {
        echo $this->one."\n";
    }

    //print variable two    
    public function echoTwo()
    {
        echo $this->two."\n";
    }
}

//Instantiate the object
$a = new A();

//Instantiate the reflection object
$reflector = new ReflectionClass('A');

var_dump($reflector);

// var_dump($reflector->getModifierNames());
//Now get all the properties from class A in to $properties array
$properties = $reflector->getProperties();

$i =1;
//Now go through the $properties array and populate each property
foreach($properties as $property)
{
    //Populating properties
    $a->{$property->getName()}=$i;
    //Invoking the method to print what was populated
    $a->{"echo".ucfirst($property->getName())}()."\n";
    $i++;
}



//

