<?php
$sentence = "The quick brown fox jumps over the lazy dog";

echo "Position of the of fox in the string = ".strpos($sentence,"fox")."<br><br>";
if(stristr($sentence,"cat")){
    echo "Cat Present in the sentence";
}
else{
    echo "Cat Not Present";
}

echo "<br><br>First 20 Characters of the string = ".substr($sentence,0,19);
?>