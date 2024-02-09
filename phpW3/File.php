<?php
class File{
    public $file;
    public $size;
    public function getextension(){
        $parts=explode(".",$this->file);
        return end($parts);
    }
    public function displayInfo(){
        echo "Filename:$this->file<br>Size:$this->size";
    }
}
$f1=new File();
$f1->file="document.txt";
$f1->size="500kb";
// echo $f1->getextension();
echo $f1->displayInfo();
?>