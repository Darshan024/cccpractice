<?php
class StudentInfo{
    public $name;
    public $age;
    public $grade;
    public function displayInfo(){
        echo "Name:$this->name,Age:$this->age,Grade:$this->grade";
    }
}
$student1=new StudentInfo();
$student1->name="Rohan";
$student1->age=18;
$student1->grade="R";
$student1->displayInfo();
?>