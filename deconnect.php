<?php 
session_start() ;
session_destroy() ;

session_start() ;
$_SESSION["username"] = "";

// log file

//Redirection
header("Location: index.php");
?>