<?php
class Product{
    private $productId;
    private $name;
    private $price;
    public function __construct($productId,$name,$price)
    {
        $this->productId=$productId;
        $this->name=$name;
        $this->price=$price;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getProductName(){
        return $this->name;
    }
}
class Shop{
    private $products=[];

    public function addItem($product){
        $this->products[]=$product;
        // print_r($product);
    }
    public function calTotal(){
        $total=0;
        foreach($this->products as $product){
            $total += $product->getPrice();
    }
        return $total;
    }
    public function displayInfo(){
        echo "Shopping Items<br>";
        foreach($this->products as $product){
            echo $product->getProductName()."<br>";
        }
        echo "Total price: ".$this->calTotal();
    }
}
$product2 = new Product(2, "Smartphone", 400);
$product1=new Product(1,"Laptop",20);
$shop1=new Shop();
$shop1->addItem($product1);
$shop1->addItem($product2);
$shop1->displayInfo();

?>