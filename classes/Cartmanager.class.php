<?php
class Cartmanager extends Bdd
{
	private $_db; 
	
	
	public function __construct()  {
		$this->setDb(parent::__construct());
	}
	
	public function setDb($db)  {
		$this->_db = $db;
	}

	public function addtocart($post){
		$myproduct = new Cart($post);
		
		
		$request = $this->_db->query("SELECT `C`.`id` FROM `cart` AS C  WHERE `C`.`product_id`=" . $myproduct->getProductId() . " AND `C`.`user_id` = ". $myproduct->getUserId() );
		$exist = $request->fetch(PDO::FETCH_ASSOC);

		////
		if($exist){
			$request = $this->_db->prepare("UPDATE cart SET quantity = quantity +". $myproduct->getQuantity() . ", total_price = total_price + price ". $myproduct->getQuantity() ." WHERE product_id = :id ");
			$request->bindValue(':id', $myproduct->getProductId()); 
		
			$request->execute();
		}else {

		$q = $this->_db->prepare("INSERT INTO `cart` (user_id,product_id,quantity,price,total_price) VALUES (:user_id,:product_id,:quantity,:price,:totalprice)");
	
		$q->bindValue(':user_id', $myproduct->getUserId()); 
		$q->bindValue(':product_id', $myproduct->getProductId()); 
		$q->bindValue(':quantity', $myproduct->getQuantity()); 
		$q->bindValue(':price', $myproduct->getPrice()); 
		$q->bindValue(':totalprice', $myproduct->getPrice() * $myproduct->getQuantity()); 


		$q->execute();

		}
		// =========== INSIDE FUNCTION 
		// $this->addtooreder($myproduct->getUserId());
		$_SESSION['alert'] = "the items was added to cart";
	}

	

	public function addtooreder($userID){
		
		$q = $this->_db->prepare("INSERT INTO `order` (user_id,total_price) SELECT user_id,total_price FROM `cart` where user_id=:user_id");
		$q->bindValue(':user_id', $userID); 

		$q->execute();
	}
	public function showcart($id){
		
		
		$request = $this->_db->query("SELECT `C`.`total_price`,`C`.`id`,`C`.`user_id`,`C`.`product_id`,`C`.`quantity`,`C`.`price`,`P`.`image`,`P`.`name`,`P`.`description` FROM `cart` AS C  JOIN  `ce_product` AS P ON `P`.`id` = `C`.`product_id` WHERE `C`.`user_id`='$id'");
		while($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
           



			echo '<article> <img src="uploads/'. basename("{$donnees['image']}") . '" alt="item photo" /> <section class="item-details"> <a href="'.basename("/produit?article=") . $donnees['product_id'] .PHP_EOL . '">'. $donnees['name'] . '</a>
	<p> Price per unit : '. $donnees['price'] .'</p> <p> Price total :'. $donnees['total_price'] .' </p> <div class="quantity">
	<a href="'.basename("/panier?up=") . $donnees['id'] .PHP_EOL . '">➕</a>
	<p>'. $donnees['quantity'] .'</p>
	<a href="'.basename("/panier?down=") . $donnees['id'] .PHP_EOL . '">➖</a>
	</div>
		</section>
		<section>
		  <a href="'.basename("/panier?delete=") . $donnees['id'] .PHP_EOL . '">❌</a>
		</section>
	  </article>';

	}
	return ;
}

public function getOrder($id){
	$order = $this->_db->prepare("SELECT sum(total_price) as total ,count(id) as items FROM `cart` WHERE user_id= :id");
	$order->bindValue(':id', $id); 
	$order->execute();
	while($myorder = $order->fetch(PDO::FETCH_ASSOC)) {
		echo "<p> total :" . $myorder["total"] . " </p>  <p> you have " . $myorder['items'] . " items </p>";

		return ;
	} 


}

public function deletecart($id){
	$request = $this->_db->prepare("DELETE FROM cart WHERE id=:id");
	
	$request->bindValue(':id', $id); 

	$request->execute();
}


public function upquantity($id){
	$request = $this->_db->prepare("UPDATE cart SET quantity = quantity + 1, total_price = total_price + price WHERE id = :id ");
	$request->bindValue(':id', $id); 

	$request->execute();
}


public function downquantity($id){
	$request = $this->_db->prepare("UPDATE cart SET quantity = quantity - 1, total_price = total_price - price WHERE id = :id ");
	$request->bindValue(':id', $id); 

	$request->execute();
}


public function updateproduct($id){
	$request = $this->_db->prepare("UPDATE ce_product SET quantity = quantity - 1 WHERE id = :id ");
	$request->bindValue(':id', $id); 

	$request->execute();
}

}
?>
