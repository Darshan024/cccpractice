<?php
phpinfo();
echo"*******1. Array Creation and Initialization:********<br>";
echo "(1)<br>";
$members=array();
$members["FirstName"]="Rahul";
$members["LastName"]="M";
$members["id"]=1001;
print_r ($members);
echo "<br>";
$students=array("Rohan","Tarun","Fenil");
print_r($students);

echo"<br>(2)<br>";
$members1=array("Address"=>"Mumbai","No"=>"xxxxxxxxxx");
print_r (array_merge($members,$members1));

$keys=array(1,2,3);
echo "<br>(3)<br>";
print_r(array_combine($keys,$students));

echo "<br>(4)<br>";
$numbers=array_combine(range(10,15),range(110,115));
print_r($numbers);

echo"<br><br>*********Array Modification:***********<br>";
echo "(5)<br>";
$students=array("Rohan","Tarun","Fenil");
$students[]="Sam";
$students[]="Krinal";
$students[]="Tarun";
array_push($students,"Hiren");
array_push($students,"Ramesh");
array_push($students,"Janak");
print_r($students) ;

echo "<br>(6)<br>";
array_pop($students);
array_pop($students);
print_r($students);

echo "<br>(7)<br>";
array_unshift($students,"Hiren");
array_unshift($students,"Mahesh");
print_r($students);

echo "<br>(8)<br>";
array_shift($students);
array_shift($students);
print_r($students);
 
echo "<br>(9)<br>";
$a=array("Tulsi","Tapan");
array_splice($students,1,3,$a);
array_splice($students,0,1,"Nick");
print_r($students);

echo"<br><br>***********Array Access:********<br>";

echo"(11)<br>";
echo"array count of the students= ".count($students)."<br>";
$cars=array(
   "Volvo"=>array
   (
   "XC60",
   "XC90"
   ),
   "BMW"=>array
   (
   "X3",
   "X5"
   )
   ); 
   echo count($cars)." Normal Count<br>";
   echo count($cars,1)." Recursive Count<br>    ";
echo"array count members= ".count($members)."<br>";
echo"array count members1= ".count($members1)."<br>";

echo "(12)<br>";
echo "Array Size students=  ".sizeof($students)."<br>";
echo "Array Size members=  ".sizeof($members)."<br>";

echo "(13)<br>";
if(array_key_exists("LastName",$members)){
        echo "Key exist!";
}
else{
        echo"Key does not exist";
}
$members2=array("Name"=>"Peter","Age"=>"41","Country"=>"USA");
echo "<br>(14)Array Values <br>";
print_r( array_values($students));
echo"<br>";
print_r(array_values($members));

echo"<br><br>************ Array Sorting:*************<br>";
echo "<br><br>(18)Array sort <br><br>";
sort($members2);
print_r($members2);
echo"<br>";
sort($students);
print_r($students);

echo "<br><br>(19)Array reverse in order <br><br>";
rsort($members2);
print_r($members2);
echo"<br>";
rsort($students);
print_r($students);

echo "<br><br>(20)Sorts an associative array by values <br><br>";
asort($members2);
print_r($members2);
echo"<br>";
asort($students);
print_r($students);

echo "<br><br>(21)Sorting by keys <br><br>";
ksort($members2);
print_r($members2);
echo"<br>";
ksort($students);
print_r($students);

echo "<br><br>(22)Array sorting by value in reverse order <br><br>";
arsort($members2);
print_r($members2);
echo"<br>";
arsort($students);
print_r($students);

echo "<br><br>(19)Array sorting vy keys in reverse order <br><br>";
krsort($members2);
print_r($members2);
echo"<br>";
krsort($students);
print_r($students);

echo"<br><br>*************6.Array Filtering:**************";

echo "<br>(24)<br>";
$fruits = array("apple" => 100, "banana" => 120, "kiwi" => 9, "orange" => 200);
function len($key){
        return (strlen($key>10));
}
$result_of_fruits=array_filter($fruits,"len");
print_r($result_of_fruits);
echo "<br>";
$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
function filtereven($no){
        return ($no%2==0);
}
$result=array_filter($array,"filtereven");
print_r($result);

echo "<br><br>(25)<br>Output of the map function = ";

$lengths =array (64,81,100,121,144,169);
function square($w){
        return $w*$w;
}
$result_of_map=array_map('square',$lengths);
print_r($result_of_map);

echo"<br><br>";

$length =range(10,25);
function check($w1){
        if($w1%5==0){
            return "Can be Divided by 5";
        }
        elseif($w1%5!=0){
            return "Can't divide by 5";
        }
}
$result_of_map=array_map('check',$length);
print_r($result_of_map);



echo "<br><br>Star pattern using the map function<br><br>";

$lengths1=[1,2,3,4,5];
function star($w){
    return str_repeat('*',$w);
}
$re=array_map('star',$lengths1);
for($i=0;$i<sizeof($re);$i++){
    echo $re[$i]."<br>";
}



echo "<br>(26)<br>Output of the reduce function = ";
$reduce_array=array(10,20,5,15,85,4);
function ml($a1,$a2){
        return $a1*=$a2;
}
print_r(array_reduce($reduce_array,"ml",1));
echo"<br>";

$array_to_be=array("hello","world","from","NKl","Harm","Bad");
function ml1($a1,$a2){
    return $a1=$a2.(string)100;
}
print_r(array_reduce($array_to_be,'ml1'));

echo "<br><br>************7. Array Slicing:***************";
echo "<br>(27)<br>";
$array_slice = ['a' => 'apple', 'b' => 'banana', 'c' => 'cherry', 'd' => 'date', 'e' => 'elderberry'];
print_r(array_slice($array_slice,3,-1,true));
// if the true is used then the keys are not change in the result array
echo"<br>";
print_r(array_slice($array_slice,1,3));

echo "<br>(28)<br>";
$a2=array("a"=>"purple","b"=>"orange");
$result_slice= array_splice($array_slice,0,4,$a2);
print_r($array_slice);
echo "<br>";
$array_slice = ['a' => 'apple', 'b' => 'banana', 'c' => 'cherry', 'd' => 'date', 'e' => 'elderberry',"f"=>"Family","g"=>"Germany","h"=>"Hocky"];
$a2=array("ab"=>"purple","ba"=>"orange");
$result_slice= array_splice($array_slice,1,-2,$a2,);
print_r($array_slice);
?>