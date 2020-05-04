<?php 

class Bdd {
    private $host;
    private $user;
    private $port;
    private $password;
    private $dbname;
    private $charset;
    protected $bdd;
    
    protected function __construct(){

        $this->host = "localhost";
        $this->user = "root";
        $this->password = "root";
        $this->port = "3306";
        $this->dbname = "mini";
        $this->charset = "utf8mb4";

        TRY {

            $dsn = "mysql:host=".$this->host . ";port=" . $this->port . ";dbname=" .$this->dbname . ";charset=" . $this->charset;
            $this->bdd = new PDO($dsn , $this->user , $this->password);
            $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
            return   $this->bdd;
        }

        catch(Exception $e)
        {
             die('Erreur : '.$e->getMessage());
        }

        

        
    }
}
?>