<?php
class Shape{

}
class Circle extends Shape{
    public $radius;
    public function calculateArea(){
        return pi()*pow($this->radius,2);
    }
    public function calculatePerimeter(){
         return 2*pi()*$this->radius;
    }
}
class Rectangle extends Shape{
    public $length;
    public $width;
    public function calArea(){
        return $this->length*$this->width;
    }
    public function calPerimeter(){
        return 2*($this->length+$this->width);
    }
}
$c1=new Circle();
$c1->radius=5;
$r1=new Rectangle();
$r1->length=4;
$r1->width=6;
echo "Circle Area: " . $c1->calculateArea() . "<br>";
echo "Rectangle Perimeter: " . $r1->calPerimeter();

?>