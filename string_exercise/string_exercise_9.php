<?php
function Fibonacci($n){
    if($n<=1){
        return $n;
    }
    return Fibonacci($n-1)+Fibonacci($n-2);
}
echo Fibonacci(15)." ";
echo Fibonacci(16);
?>                                                                                                    