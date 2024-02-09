<?php
class Calculator{
    public function add($a,$b){
        return $a+$b;
    }
    public function substract($a,$b){
        return $a-$b;
    }
    public function multiply($a,$b){
        return $a*$b;
    }
    public function divide($a,$b){
        if($b==0){
            return "Cannot divide by zero";
        }
        else{
            return $a/$b;
        }
    }
}
$cal1= new Calculator();
echo $cal1->divide(10,0);
echo $cal1->divide(0,10);
?>