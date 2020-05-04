<?php 

class Rating {
    private $id;
    private $score;
    private $product_id;
    private $user_id;

   
    


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
public function getScore() {return $this->_score;}


// SET
public function setid($id){
    $this->_id = $id;
}
public function setscore($score){
    $score = (int) $score;
    if($score == null){
        $this->_score = 0;
    }else {
    $this->_score = $score;
    }
}
public function setproduct_id($product_id){
    $this->_product_id = $product_id;
}
public function setuser_id($user_id){
    $this->_user_id = $user_id;
}



}
?>