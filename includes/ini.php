<?php 
session_start() ;
if(isset($_GET['royan'])){
    $_SESSION['royan']=$_GET['royan'];
}    


echo $_SESSION['royan'];
function my_autoloader($class) {
    include './classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

?>