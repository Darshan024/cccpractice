<?php
$a = [-10, -5, -7, -1000, -20, -30, -40];
$max = $a[0];
$max = null;
for ($i = 0; $i < 3; $i++) {
    if ($max < $a[$i]) {
        $max = $a[$i];
    }
}
// echo $max;

for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {
        echo $i * $j;
    }
    echo '<br>';
}

?>