<?php 

class Cart {
    private $id;
    private $name;
    private $street;
    private $city;
    private $region;
    private $zip;
    private $phone;
    private $more;
    private $user_id;
    private $priority;

   
    


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
public function getUser_id() { return $this->_user_id;}
public function getName() {return $this->_name;}
public function getStreet() {return $this->_street;}
public function getCity() {return $this->_city;}
public function getRegion() {return $this->_region;}
public function getPhone(){return $this->_phone;}
public function getZip() {return $this->_zip;}
public function getMore() {return $this->_more;}
public function getPriority() {return $this->_priority;}



// SET

public function setid($id){
    $this->_id = $id;
}
public function setuser_id($user_id){
    $this->_user_id = $user_id;
}
public function setname($name){
    $this->_name = $name;
}
public function setstreet($street){
    $this->_street = $street;
}

public function setcity($city){
    
    $this->_city = $city;
}
public function setregion($region){

    $this->_region = $region;
}
public function setzip($zip){
    
    $this->_zip = $zip;
}
public function setphone($phone){
    
    $this->_phone = $phone;
}
public function setmore($more){
    
    $this->_more = $more;
}
public function setpriority($priority){
    
    $this->priority = $priority;
}






}
?>