<?php

$n=10;
for($i=1;$i<=$n/2;$i++){
    for($j=1;$j<=$n;$j++){
        if(($j<$i || $j>($n-$i)+1)){
            echo "-";
        }
        else{
            echo $j;
        }
    }
    echo "<br>";
}
for($i=$n/2-1;$i>=1;$i--){
    for($j=1;$j<=$n;$j++){
        if(($j<$i || $j>($n-$i)+1)){
            echo "-";
        }
        else{
            echo $j;
        }
    }
    echo "<br>";
}


echo "<br><br>";
$n=11;
for($i=1;$i<=$n/2+1;$i++){
    for($j=1;$j<=$n;$j++){
        if(($j<$i || $j>($n-$i)+1)){
            echo "-";
        }
        else{
            echo $j;
        }
    }
    echo "<br>";
}
for($i=$n/2-1;$i>=0;$i--){
    for($j=1;$j<=$n;$j++){
        if(($j<$i || $j>($n-$i)+1)){
            echo "-";
        }
        else{
            echo $j;
        }
    }
    echo "<br>";
}

// $n=10;
// $c=$n/2;
// for($i=0;$i<$n;$i++){
//     for($j=1;$j<=$c;$j++){
//         if($j<=$i ){
//             echo "-";
//         }
//         elseif( $j>=($n-$i)+1){
//             echo "-";
//         }
//         else{
//             echo $j;
//         }
//     }
//     for($k=$n/2+1;$k<=$n;$k++){
//         if($k<=$i || $k>($n-$i)){
//             echo "-";
//         }
//         else{
//             echo $k;
//         }
//     }
//     echo "<br>";
// }


?>