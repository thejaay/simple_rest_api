<?php 

class UserObject extends PersistentObject
{
	private $_entity_name = "users";
	
	private $_id;
	private $_name;
	private $_mail;

	public function createObject($params)
	{
		$this->_id = $params['id'];
		$this->_name = $params['name'];
		$this->_mail = $params['mail'];
		return $this;
	}
	
	public function getEntityName()
	{
		return $this->_entity_name;
	}
	
	public function getDataArray()
	{
		return array(
				'name' => $this->_name, 
				'mail' => $this->_mail);
	}
	
	public function printableFormat()
	{
		return array(
		'id' => $this->_id,
		'name' => $this->_name,
		'mail' => $this->_mail,
		);
	}
}

?>