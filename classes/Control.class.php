<?php
class Control extends Bdd
{
	private $_db; 
	
	
	public function __construct()  {
		$this->setDb(parent::__construct());
	}
	
	public function getRayon($cat)  {
		$royan = array();
		
		$request = $this->_db->query("SELECT `P`.`id`,`P`.`image`, `P`.`name`, `P`.`price` FROM `ce_product` AS P JOIN `product_category` AS PC ON `P`.`id` = `PC`.`product_id` JOIN `ce_category` AS `C` ON `PC`.`category_id` = `C`.`id` WHERE `C`.`name`='$cat' ");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $royan = new Product($donnees);
			echo '<a href="'.basename("/produit?article=") . $royan->getId() .PHP_EOL . '">
              <article class="product-item">
                <img src="'.  "uploads/" . basename("{$royan->getImage()}") . '" alt="" />
                <h3>' . $royan->getName() . '</h3>
                <p> '. $royan->getPrice() . '</p>
              </article> </a>';
		}
		return $royan;
    }
	
	public function getTopTopics($cat)  {
		$royan = array();
		
		$request = $this->_db->query("SELECT `P`.`id`,`P`.`image`,`P`.`name`,`P`.`description` FROM `ce_product` AS P  JOIN  `product_category` AS PC ON `P`.`id` = `PC`.`product_id` JOIN `ce_category` AS `C` ON `PC`.`category_id` = `C`.`id` WHERE `C`.`name`='$cat' ORDER BY `P`.id DESC LIMIT 5 ");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $royan = new Product($donnees);
     
			  
			  echo '
			  <article>
			  <img src="'.  "uploads/" . basename("{$royan->getImage()}") .'" alt="" class="article-image" />
			  <aside>
			  <a href="'.basename("/produit?article=") . $royan->getId() .PHP_EOL . '">
				' . $royan->getName() . '
				</a>
				<p>' . $royan->getDescription() . '</p>
			  </aside>
			</article> 
			  ';
		}
		return $royan;
	}
	
	public function getAllproducts()  {
		$royan = array();
		
		$request = $this->_db->query("SELECT * FROM ce_product order by id DESC ");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product($donnees);
     
			  
			  echo '
			  <div class="prods">
			 
			  <img src="'.  "uploads/" . basename("{$product->getImage()}") .'" alt="" class="article-image" />
			  <div class="prod-container">
			  <a href="'.basename("/produit?article=") . $product->getId() .PHP_EOL . '">
				' . $product->getName() . '
				</a>
				<p>' . $product->getDescription() . '</p>
				

			  </div>
			  <a href="?action=delete&product=' . $product->getId() . '" > ❌ </a>

			</div> 
			  ';
		}
		return $product;
	}

	public function getMyproducts($id)  {
	
		
		$request = $this->_db->prepare("SELECT * FROM ce_product Where user_id=:id order by id DESC ");
		$request->bindValue(':id', $id); 
		$request->execute();
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
			$product = new Product($donnees);
		
			if($product==NULL){
			$_SESSION['alert'] = "No content";
			return $_SESSION['alert'];
				
			
			}else {
			
		
			  echo '
			  <div class="prods">
			 
			  <img src="'.  "uploads/" . basename("{$product->getImage()}") .'" alt="" class="article-image" />
			  <div class="prod-container">
			  <a href="'.basename("/produit?article=") . $product->getId() .PHP_EOL . '">
				' . $product->getName() . '
				</a>
				<p>' . $product->getDescription() . '</p>
				

			  </div>
			  <a href="?action=delete&product=' . $product->getId() . '" > ❌ </a>

			</div> 
			  ';

			
		}
	}return $product;
	}
	public function getArticle($id)  {
			$id = (int) $id;
			$q = $this->_db->query("SELECT * FROM `ce_product` AS `P` WHERE `P`.id=".$id);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			
			return new Product($donnees);
	}

	public function getRating($id) {
		$id = (int) $id;
		
		$q = $this->_db->query("SELECT floor(AVG(`R`.`score`)) AS score FROM rating AS `R` JOIN `ce_product` AS `P` ON `R`.`product_id` = `P`.`id` WHERE `P`.id=".$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		$myRating = new Rating($donnees);
		
		
		return $myRating ;
	}

	public function getCategory(){
		$category = array();
		
		$request = $this->_db->query("SELECT * FROM `ce_category` ");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $category = new Category($donnees);
      
			  echo '
			  <option value="'. $category->getID() .'">'. $category->getName() .'</option>
			  ';
			 

		}
		return $category;
	}

		public function addProduct($product)  {

		$q = $this->_db->prepare("INSERT INTO `ce_product` (name,price,quantity,image,description,`user_id`,_actif) VALUES (:name,:price,:quantity,:image,:description,:user_id,:_actif)");
	
		$q->bindValue(':name', $product->getName()); 
		$q->bindValue(':price', $product->getPrice()); 
		$q->bindValue(':quantity', $product->getQuantity()); 
		$q->bindValue(':description', $product->getDescription()); 
		$q->bindValue(':image', $product->getImage()); 
		$q->bindValue(':user_id', $product->getUser_id()); 
		$q->bindValue(':_actif', $product->getActif()); 

		$q->execute();
	
		// adding to the relation table 

		$sql = "INSERT INTO product_category (product_id,category_id) VALUES ( (select max(id) from ce_product), '{$product->getCategory()}'  )";
		echo $sql;

		$this->_db->exec($sql);

		

		echo "insert done ";
		


	}


	public function deleteprod($id){
		$order = $this->_db->prepare("SELECT `image` FROM `ce_product` WHERE id = :id");
		$order->bindValue(':id', $id); 
		$order->execute();
		$myimage = $order->fetch(PDO::FETCH_ASSOC);
		var_dump($myimage['image']);
	
		$filePath = "uploads/". $myimage['image'];
		if(file_exists($filePath)){
			unlink($filePath);
			$_SESSION['alert'] = "the csv has been deleted";
		}
		$request = $this->_db->prepare("DELETE FROM ce_product WHERE id=:id");
		
		$request->bindValue(':id', $id); 
	
		$request->execute();
		
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
