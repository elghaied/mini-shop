<?php 
session_start() ;
// echo "<pre>";
// echo "user name " . $_SESSION['username'] . "<br>";
// echo "user id " .$_SESSION['user_id'] . "<br>";
// echo "user email " .$_SESSION['email'] . "<br>";
// echo "user privilege " .$_SESSION['privilege']. "<br>";
// echo "user name " .$_SESSION['name']. "<br>";
// echo "</pre>";
$_SESSION['alert'] = "";
if(isset($_GET['royan'])){
    $_SESSION['royan']=$_GET['royan'];
};   

if(isset($_SESSION['username']) AND $_SESSION['username'] !== ""){

}else {

    $_SESSION['username']= "";
    $_SESSION['user_id'] = "";
    $_SESSION['email'] ="";
    $_SESSION['privilege'] = "";
    $_SESSION['name'] = "";


}



function my_autoloader($class) {
    include './classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');


if(isset($_POST['add-product'])){
    $id = $_SESSION['user_id'];
    // image 
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/'.$_FILES["image"]["name"]);
    $image=$_FILES['image']['name'];
    $category = $_POST['category'];
    // echo "the post catogory" .  $category;

    // the connection 

    $connect = new Control();
    $product = new Addproduct($_POST,$image,$category,$id);
    // $product = new Product($_POST);
    
    var_dump($product);

    // echo "<pre>";
    // echo "getName" .$product->getName() . "<br>"; 
    // echo "getDescription" .$product->getDescription(). "<br>";
    // echo "getPrice" . $product->getPrice(). "<br>";
    // echo "getCategory" . $product->getCategory(). "<br>";
    // echo  "getQuantity" .$product->getQuantity(). "<br>";
    // echo  "getImage" .$product->getImage(). "<br>";
    // echo "getActif" .$product->getActif(). "<br>";
    // echo "</pre>";
    $connect->addProduct($product);
   
}


// ==========LOGIN===========================
// ==========================================

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $login = new Verifyuser();
    $login->login($username,$password);

}


// Update profile 

if(isset($_POST['save-name'])){
    $userid = $_SESSION['user_id'];
    $login = new Verifyuser();
    // var_dump($_POST);
    $login->updateName($_POST,$userid);
}

if(isset($_POST['update-pass'])){
    $userid = $_SESSION['user_id'];
    $oldpass = hash('sha256', $_POST['old-pass']);
    $newpass = hash('sha256', $_POST['new-pass']);
    var_dump($newpass);
    if($_POST['re-pass'] === $_POST['new-pass']){
        $login = new Verifyuser();
        $login->updatePassword($newpass,$userid,$oldpass);
    }else {
        $_SESSION['alert'] = "the password ain't Identical please try again";
    }
}
    if(isset($_POST['update-email'])){
        $userid = $_SESSION['user_id'];
        $oldemail =  $_POST['old-email'];
        $newemail =  $_POST['new-email'];
        
        if($_POST['new-email'] === $_POST['re-email']){
            $login = new Verifyuser();
            $login->updateEmail($newemail,$userid,$oldemail);
        }else {
            $_SESSION['alert'] = "the e-mail ain't Identical please try again";
        }
    }

    // ADD TO Cart

    if(isset($_POST['addToCart'])){
        $mycart = New Cartmanager();
        $mycart->addtocart($_POST);

    }

    if(isset($_GET['delete'])){
        $itemId = $_GET['delete'];
        $deleteitem = New Cartmanager();
        $deleteitem->deletecart($itemId);
    }

    if(isset($_GET['up'])){
        $itemId = $_GET['up'];
        $deleteitem = New Cartmanager();
        $deleteitem->upquantity($itemId);
    }
    if(isset($_GET['down'])){
        $itemId = $_GET['down'];
        $deleteitem = New Cartmanager();
        $deleteitem->downquantity($itemId);
    }

    if(isset($_GET['action'])){
        if($_GET['action']== "delete" ){
            $prod = $_GET['product'];
            $delet = new Control();
            $delet->deleteprod($prod);
        }
    }

    // ADD ADDRESS ============================
    //=========================================

    if(isset($_POST['add-adress'])){
        $id = $_SESSION['user_id'];
        $addingaddress = new Addressmanager();
        $addingaddress->AddAddress($id);
    }
?>