<?php 

/**
 * Represents an user object.
 *
 * @author Jaay
 *
 */
class UserObject extends PersistentObject
{
	private $_entity_name = "users";
	
	private $_id;
	private $_name;
	private $_mail;

    /**
    * {@inheritDoc}
    */
	public function createObject($params)
	{
		$this->_id = $params['id'];
		$this->_name = $params['name'];
		$this->_mail = $params['mail'];
		return $this;
	}
	
    /**
    * {@inheritDoc}
    */	
	public function getEntityName()
	{
		return $this->_entity_name;
	}
	
	/**
    * {@inheritDoc}
    */  
    public function getId()
    {
        return $this->_id;
    }
    
    /**
    * {@inheritDoc}
    */	
	public function getDataArray()
	{
		return array(
				'name' => $this->_name, 
				'mail' => $this->_mail);
	}
	
    /**
    * {@inheritDoc}
    */	
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