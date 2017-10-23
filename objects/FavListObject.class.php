<?php 

/**
 * Represent a favorites list oject.
 *
 * @author Jaay
 *
 */
class FavListObject extends PersistentObject
{
	private $_entity_name = "favorite_songs";
	
	private $_id;
	private $_id_user;
	private $_id_song;
	
	/**
    * Instantiate the object with raw data and not an array.
    */
	public function createFromRaw($id, $id_user, $id_song)
	{
		$this->_id = $id;
		$this->_id_user = $id_user;
		$this->_id_song = $id_song;
	}
	
    /**
    * {@inheritDoc}
    */	
	public function createObject($params)
	{
		$this->_id = $params['id'];
		$this->_id_user = $params['id_user'];
		$this->_id_song = $params['id_song'];
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
		return array('id_user' => $this->_id_user, 'id_song' => $this->_id_song);
	}
	
    /**
    * {@inheritDoc}
    */	
	public function printableFormat()
	{
		return array(
		'id' => $this->_id,
		'id_user' => $this->_id_user,
		'id_song' => $this->_id_song,
		);
	}
}

?>