<?php 

class UserObject extends PersistentObject
{
	private $_id;
	private $_name;
	private $_mail;

	public createObject($params)
	{
		$this->_id = $params['id'];
		$this->_name = $params['name'];
		$this->_mail = $params['mail'];
		return $this;
	}
}

?>