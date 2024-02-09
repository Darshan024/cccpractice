<?php
class Bank{
    private $accNumber;
    private $accHolder;
    private $accBalance;
    public function __construct($accNumber,$accHolder,$accBalance){
        $this->accNumber=$accNumber;
        $this->accHolder=$accHolder;
        $this->accBalance=$accBalance;
    }
    public function deposit($amount){
        $this->accBalance += $amount;
    }
    public function withdraw($amount){
        if($amount<=$this->accBalance){
            $this->accBalance -= $amount;
        }
        else{
            echo "Insufficient Balance";
        }
    }
    public function displayInfo(){
        echo "Account Number:$this->accNumber<br>Account Holder:$this->accHolder<br>Account Balance:$this->accBalance USD";
    }

}
$account1=new Bank(12345,"Rohan",5000);
$account1->displayInfo();
?>