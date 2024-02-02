<?php
class Lib_connection{
    protected $con;
    public function __construct()
    {
        $this->connect();
    }
    public function connect(){
        if(is_null($this->con)){
            $this->con=mysqli_connect("localhost","root","","ccc_practice");
            if($this->con===FALSE){
                die("Error in connection ");
            }
        }
        return $this->con;
    }
    public function exe($sql){
        try{
            if($test=$this->connect()->query($sql));
            // var_dump($this->connect()->error);
            return $test;
        }
        catch(Exception $e){
    		echo $sql;
            var_dump($this->connect()->error);
        }
    }
}
?>