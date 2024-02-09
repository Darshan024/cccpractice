<?php
class Employee{
    public $name;
    public $position;
    public $salary;
    public function calculateBonus(){
        return $this->salary*0.1;
}
}
$employee1=new Employee();
$employee1->name="Alice";
$employee1->position="Manager";
$employee1->salary=50000;
echo $employee1->calculateBonus();
?>