<?php 

class Product {
    private $id;
    private $name;
    private $image;
    private $description;
    private $price;
    private $quantity;
    private $_actif;
   
    


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
public function getName() {return $this->_name;}
public function getImage() {return $this->_image;}
public function getDescription() {return $this->_description;}
public function getPrice() {return $this->_price;}
public function getQuantity(){return $this->_quantity;}
public function getActif(){return $this->__actif;}

// SET
public function setid($id){
    $this->_id = $id;
}
public function setname($name){
    $this->_name = $name;
}
public function setimage($image){
    $this->_image = $image;
}
public function setdescription($description){
    $this->_description = $description;
}

public function setprice($price){
    $this->_price = $price;
}
public function setquantity($quantity){
    $this->_quantity = $quantity;
}
public function set_actif($_actif){
    $this->__actif = $_actif;
}



}
?>