<?php
Class Point{
    public $x;
    public $y;
    public function calculateDistance($point2){
        return sqrt(pow($this->x-$point2->x,2)+pow($this->y-$point2->y,2));
    }
}
$point1=new Point();
$point1->x=1;
$point1->y=2;

$point2=new Point();
$point2->x=4;
$point2->y=6;

echo $point1->calculateDistance($point2);


?>