<?php
$i=2;
function check_prime($n){
    for($i=2;$i<$n;$i++){
        if($n%$i==0){
            return "Not a prime number";
        }
    }
    return "It is prime number";
}
echo (check_prime(7))."<br>";
echo (check_prime(33))."<br>";
echo (check_prime(37));

?>