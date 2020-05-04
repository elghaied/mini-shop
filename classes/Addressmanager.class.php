<?php
class Addressmanager extends Bdd
{
	private $_db; 
	
	
	public function __construct()  {
		$this->setDb(parent::__construct());
	}
	
	public function setDb($db)  {
		$this->_db = $db;
	}


	public function Addressform($id){
		$rq = $this->_db->prepare("SELECT * FROM `address` WHERE user_id= :id");
	$rq->bindValue(':id', $id); 
	$rq->execute();
	if($rq==null){
	while($myorder = $rq->fetch(PDO::FETCH_ASSOC)) {
		
			$myadress = new Adress($myorder);

				echo '<form  action="" method="post" id="adress">
		<input type="hidden" name="id" value="'. $myadress->getUser_id() .'" />
		<label for="">Name</label>
		<input type="text" name="name" id="" value="'. $myadress->getName() .'" />
		<label for="">Street</label>
		<input type="text" name="street" id="" value="'. $myadress->getStreet() .'" />
		<label for="">city</label>
		<input type="text" name="city" id="" value="'. $myadress->getCity() .'" />

		<label for="">region</label>
		<input type="text" name="region" id="" value="'. $myadress->getRegion() .'" />

		<label for="">zip</label>
		<input type="text" name="zip" id="" value="'. $myadress->getZip() .'" />

		<label for="">phone</label>
		<input type="text" name="phone" id="" value="'. $myadress->getPhone() .'" />

		<label for="">more</label>
		<input type="text" name="more" id="" value="'. $myadress->getMore() .'" />

		<label for="">type</label>
		<input type="checkbox" name="priority" id="'. $myadress->getPriority() .'" />
		<input type="submit" value="Update" name="update-adress" />
	</form>';
	} return $myadress;
} 	else {
		
	
	echo "create new adress";
	echo '<form  action="" method="post" id="adress">
	<input type="hidden" name="id" value="" />
	<label for="">Name</label>
	<input type="text" name="name" id="" value="" />
	<label for="">Street</label>
	<input type="text" name="street" id="" value="" />
	<label for="">city</label>
	<input type="text" name="city" id="" value="" />

	<label for="">region</label>
	<input type="text" name="region" id="" value="" />

	<label for="">zip</label>
	<input type="text" name="zip" id="" value="" />

	<label for="">phone</label>
	<input type="text" name="phone" id="" value="" />

	<label for="">more</label>
	<input type="text" name="more" id="" value="" />

	<label for="">type</label>
	<input type="checkbox" name="priority" id="" />
	<input type="submit" value="Save" name="add-adress" />
  </form>';
}

}
public function AddAddress($id){
	$_SESSION['alert'] = "adress added";
return ;
}


}
?>
