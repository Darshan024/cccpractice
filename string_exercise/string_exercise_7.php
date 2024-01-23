<?php
function fizzbuzz($a){
    if($a%3==0 && $a%5==0){
        return "FizzBuzz";
    }
    elseif($a%3==0){
        return "Fizz";
    }
    elseif($a%5==0){
        return "Buzz";
    }
    else{
        return $a;
    }
}
function result($n1,$n2){
    $result_array=range($n1,$n2);
    $result_array_map=array_map('fizzbuzz',$result_array);
    // print_r($result_array_map);
    // print_r(array_values($result_array_map));
    for($i=0;$i<sizeof($result_array_map);$i++){
        echo $result_array_map[$i]." ";
    }
}
result(1,100);
?>