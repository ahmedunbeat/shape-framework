<?php
declare(strict_types=1);

interface CalculatedShapeInterface {
    public function getArea() : float;
    public function getPerimeter() : float;
}

abstract class Shape implements CalculatedShapeInterface {
    public function __construct(public string $name) {}
}

class Circle extends Shape {
    public function __construct(string $name, public float $radius) {
        parent::__construct($name);
    }
    #[Override]
    public function getArea(): float
    {
        return pi() * pow($this->radius, 2);
    }
    #[Override]
    public function getPerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}

class Rectangle extends Shape {
    public function __construct(string $name, public float $width, public float $height) {
        parent::__construct($name);
    }
    #[Override]
    public function getArea(): float
    {
        return $this->width * $this->height;
    }
    #[Override]
    public function getPerimeter(): float
    {
        return 2 * ($this->width * $this->height);
    }
}

class Triangle extends Shape {
    public function __construct(string $name, public float $sideA, public float $sideB, public float $sideC) {
        parent::__construct($name);
    }
    #[Override]
    public function getArea(): float
    {
        // Heron's Formula
        $s = $this->getPerimeter() / 2;
        return sqrt($s * ($s - $this->sideA) * ($s - $this->sideB) * ($s - $this->sideC));
    }
    #[Override]
    public function getPerimeter(): float
    {
        return $this->sideA + $this->sideB + $this->sideC;
    }
}

$shapesList = [
    new Circle("Circle A", 6.0),
    new Rectangle("Rectangle B", 10.0, 5.0),
    new Triangle("Triangle C", 6.0, 8.0, 10.0),
];

foreach ($shapesList as $shape) {
    echo "Shape Name: {$shape->name} . <br>";
    echo " - Area: " . round($shape->getArea(), 2) . "<br>";
    echo " - Perimeter: " . round($shape->getPerimeter(), 2) . "<br><br>";
}



?>