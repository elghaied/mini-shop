<?php 

class Cart {
    private $id;
    private $user_id;
    private $product_id;
    private $quantity;
    private $price;

   
    


public function __construct(array $donnees) {// Constructeur demandant 1 tableau
    $this->hydrate($donnees);

     }

public function hydrate(array $donnees) // Constructeur demandant 1 tableau

{ 
    foreach($donnees as $key => $value) {

        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method)) {

            $this->$method($value);

        }

                                        
    }



}
// GET

public function getId() { return $this->_id;}
public function getUserId() {return $this->_user_id;}
public function getProductId() {return $this->_product_id;}
public function getPrice() {return $this->_price;}
public function getTotalPrice() {return $this->_total_price;}

public function getQuantity(){return $this->_quantity;}

// SET
public function setid($id){
    $this->_id = $id;
}
public function setuser_id($user_id){
    $this->_user_id = $user_id;
}
public function setproduct_id($product_id){
    $this->_product_id = $product_id;
}

public function setprice($price){
    $price  = (int) $price;
    $this->_price = $price;
}
public function settotalprice($totalprice){
    $totalprice  = (int) $totalprice;
    $this->_total_price = $totalprice;
}
public function setquantity($quantity){
    $quantity = (int)  $quantity;
    $this->_quantity = $quantity;
}




}
?>