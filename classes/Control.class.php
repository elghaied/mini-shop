<?php
class Control 
{
	private $_db; 

	public function __construct($db)  {
		$this->setDb($db);
	}
	
	public function getRayon($cat)  {
		$royan = array();
		
		$request = $this->_db->query("SELECT * FROM `ce_product` AS P JOIN `product_category` AS PC ON `P`.`id` = `PC`.`product_id` JOIN `ce_category` AS `C` ON `PC`.`category_id` = `C`.`id` WHERE `C`.`name`='$cat' ");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $royan = new Product($donnees);
            echo '
              <article class="product-item">
                <img src="' . $royan->getImage() . '" alt="" />
                <h3>' . $royan->getName() . '</h3>
                <p> '. $royan->getPrice() . '</p>
              </article>';
		}
		return $royan;
    }
    
	// public function add(Personnage $perso)  {

	// 	$q = $this->_db->prepare("INSERT INTO personnages (nom) VALUES (:nom)");
	
	// 	$q->bindValue(':nom', $perso->getNom()); 

	// 	$q->execute();
	// }

	// public function delete(Personnage $perso)  {
	// 	$this->_db->query("DELETE FROM personnage WHERE id=".$perso->id());
	// }

	// public function get($id)  {
	// 	$id = (int) $id;
	// 	$q = $this->_db->query("SELECT * FROM personnage WHERE id=".$id);
	// 	$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
	// 	return new Personnage($donnees);
	// }

	
	// public function getName($name)  {
	// 	$name = (string) $name;
	// 	$q = $this->_db->query("SELECT * FROM personnage WHERE nom=".$name);
	// 	$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
	// 	return new Personnage($donnees);
	// }
	// public function getList()  {
	// 	$persos = array();
		
	// 	$q = $this->_db->query("SELECT * FROM personnage order BY id");
	// 	while($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	// 		$persos[] = new Personnage($donnees);
	// 	}
	// 	return $persos;
		
	// }

	// public function update(Personnage $perso)  {
	// 	$q = $this->_db->prepare("UPDATE personnage set nom=:nom, forcePerso=:forcePerso, degats=:degats, niveau=:niveau, experience=:experience 
	// 	WHERE id=:id");
		
	// 	$q->bindValue(':nom', $perso->getNom()); // ON UTILISE LE SETTERS CAR LE PARAMETRE EST UN OBJET
	// 	$q->bindValue(':forcePerso', $perso->getForcePerso(), PDO::PARAM_INT);
	// 	$q->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
	// 	$q->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
	// 	$q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
	// 	$q->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
		
	// 	$q->execute();		
	// }

	public function setDb($db)  {
		$this->_db = $db;
	}

}

?>
