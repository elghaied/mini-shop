<?php
class Addproduct extends Product {
    private $image;
    private $category;
    
    public function __construct(array $post, $image, $category) {
        parent::__construct($post);
        $this->setimage($image);
        $this->setcategory($category);
}

public function getImage() {return $this->_image;}
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


}

?>
