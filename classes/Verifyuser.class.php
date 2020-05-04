<?php
class Verifyuser extends Bdd
{
	private $_db; 
	
	
	public function __construct()  {
		$this->setDb(parent::__construct());
	}
	
	public function login($username,$password){

    
		$loginsys = $this->_db->query('SELECT * FROM user where 1 and username="' . $username . '"' . 'AND password="' . $password . '"');
		$logindata = $loginsys->fetch();

		$_SESSION['logged'] = new User($logindata);
		// var_dump($logindata);
		// var_dump($logged);
		$_SESSION['username'] = $logindata['username'];
		$_SESSION['user_id'] = $logindata['id'];
		$_SESSION['email'] = $logindata['email'];
		$_SESSION['privilege'] = $logindata['privilege'];
		$_SESSION['name'] = $logindata['name'];
	
		
	
		$loginsys->closeCursor();
		return $logindata;
		// header("location : control.php");  // TODO 
	}

	public function selectuser($userid){

    
	$loginsys = $this->_db->query('SELECT * FROM user where id='. $userid);
	
		$logindata = $loginsys->fetch();
		$profile = new User($logindata);
		$loginsys->closeCursor();
		return $profile;
	}


	public function updateName($post,$user){
		$myform = new User($post);
		$q = $this->_db->prepare("UPDATE user set name=:name, surname=:surname
		WHERE id=:id");
		
	
		$q->bindValue(':name', $myform->getName()); // ON UTILISE LE SETTERS CAR LE PARAMETRE EST UN OBJET
		$q->bindValue(':surname', $myform->getSurname());
		$q->bindValue(':id', $user, PDO::PARAM_INT);
		
		$q->execute();		


	}
	public function updatePassword($newpass,$user,$oldpass){
		
		$q = $this->_db->prepare("UPDATE user set password=:password
		WHERE id=:id AND password=:oldpass");
		
	
		$q->bindValue(':password', $newpass); // ON UTILISE LE SETTERS CAR LE PARAMETRE EST UN OBJET
		$q->bindValue(':id', $user, PDO::PARAM_INT);
		$q->bindValue(':oldpass', $oldpass);
		$q->execute();		
		
		$_SESSION['alert'] = "password has been updated";


	}

	public function updateEmail($newemail,$user,$oldemail){
		
		$q = $this->_db->prepare("UPDATE user set email=:newemail
		WHERE id=:id AND email=:oldemail");
		
	
		$q->bindValue(':newemail', $newemail); // ON UTILISE LE SETTERS CAR LE PARAMETRE EST UN OBJET
		$q->bindValue(':id', $user, PDO::PARAM_INT);
		$q->bindValue(':oldemail', $oldemail);
		$q->execute();		
		
		$_SESSION['alert'] = "email has been updated";


	}
	public function setDb($db)  {
		$this->_db = $db;
	}


}

?>
