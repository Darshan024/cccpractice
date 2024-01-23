<?php
function percentage_cal($a){
    $Lower_percenrage=(100*$a)/(100+$a);
    return $Lower_percenrage;
}
echo percentage_cal(10);
?>
