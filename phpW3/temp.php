<?php

// class Call{
//     public function __call($methodName, $arguments) 
//     {
//         echo "Method does not exist.";
//         print_r($arguments);
//     }
//     public function display($a){
//         echo $a;
//     }
// }

// $student1 = new Call();
// $student1->create("Rohan", 1024);
// $student1->display("Rohan");

// class callStatic{
//     public static function __callStatic($name, $arguments)
//     {
//         echo "method doest not exsit";
//     }
// }
// $student2=new Student1();
// callStatic::create("Rohan",1024);


class Student{
    private $data = array();
    // public $phone=123456;
    public function __isset($name) 
    {
        if(isset($this->data[$name])){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function __unset($name)
    {
        if (isset($this->data[$name])) {
            unset($this->data[$name]);
        }
    }
    public function __set($name,$value){
        $this->data[$name]=$value;
    }
}

$objStudent = new Student();
// $objStudent->phone = '123-456-7890';

// Check if 'phone' property is set
// echo isset($objStudent->phone); // Output: true

// Unset 'phone' property
// unset($objStudent->phone);

// Check if 'phone' property is set after unset
// echo isset($objStudent->phone); // Output: false


class Person {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // public function __debugInfo() {
    //     return [
    //         'name' => $this->name,
    //         'age' => $this->age,
    //         'info' => 'This is a person object.'
    //     ];
    // }
}

// Create a Person object
// $person = new Person('John Doe', 30);

// Use var_dump to display debugging information
// var_dump($person);

class Connection
{
    protected $link;
    public $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    

    public function __serialize()
    {
        return [
          'name' => $this->dsn,
          'username' => $this->username,
          'password' => $this->password,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->dsn = $data['dsn'];
        $this->username = $data['username'];
        $this->password = $data['password'];

        // $this->connect();
    }
}
$con=new Connection("ma","Dhruvit","000");
$serilized=serialize($con);
echo $serilized."<br><br>";
$unserialize=unserialize('dsn');
echo $unserialize;
// Class Student_School {
// }
// class Student123 {
//     public $name;
//     public $email;
//     private $object_student_school;
//     public function __construct($name,$email)
//     {
        // $this->object_student_school = new Student_School();
//         $this->name=$name;
//         $this->email=$email;
//     }
//     public function __clone()
//     {
//         echo "Hello";
//     }
// }
// $person1 = new Student123("Dhuvit","123@gmail.com");
// $objStudentTwo = clone $person1;
// echo $objStudentTwo->name;

?>

