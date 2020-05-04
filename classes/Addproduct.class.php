<?php
class Addproduct extends Product {
    private $image;
    private $category;
    private $user_id;
    
    public function __construct(array $post, $image, $category,$id) {
        parent::__construct($post);
        $this->setimage($image);
        $this->setcategory($category);
        $this->setUser_id($id);
}

public function getImage() {return $this->_image;}
public function getUser_id() {return $this->_user_id;}
public function getCategory() {return $this->_category;}


public function setimage($image) {
    if($image===""){
        $this->_image = "default.jpg";
    }else {
    $this->_image = $image;
    }
}

public function setcategory($category){
    $this->_category = $category;
}

public function setuser_id($user_id){
    $this->_user_id = $user_id;
}


}

?>
