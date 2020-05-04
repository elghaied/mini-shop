<?php 

class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $name;
    private $surname;
    private $privilege;
    private $active;
   
    


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

public function getId() { return $this->id;}
public function getUsername() { return $this->username;}
public function getPassword() { return $this->password;}
public function getEmail() { return $this->email;}
public function getName() {return $this->name;}
public function getSurname() {return $this->surname;}
public function getPrivilege() {return $this->privilege;}
public function getActive(){return $this->active;}

// SET
public function setId($id){
    $this->id = $id;
}
public function setUsername($username){
    $this->username = $username;
}
public function setPassword($password){
    $this->password = $password;
}
public function setName($name){
    $this->name = $name;
}
public function setSurname($surname){
    $this->surname = $surname;
}

public function setEmail($email){
    $this->email = $email;
}
public function setPrivilege($privilege){
 
    $this->privilege = $privilege;

}

public function setActive($active){
 
    $this->active = $active;

}



}
?>