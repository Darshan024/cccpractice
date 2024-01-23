<?php
function bubblesort($array){
    $len=count($array);
    for($i=0;$i<$len;$i++){
        for($j=$i+1;$j<$len;$j++){
            if($array[$j]<$array[$i]){
                $swap=$array[$j];
                $array[$j]=$array[$i];
                $array[$i]=$swap;
            }
        }
    }
    return $array;
}
$a1=array(64,34,25,12,22,11,90);
$a2=bubblesort($a1);
print_r($a2);

?>