<?php 

/**
 * Represent a song object.
 *
 * @author Jaay
 *
 */
class SongObject extends PersistentObject
{
	private $_entity_name = "songs";
	
	private $_id;
	private $_title;
	private $_artist;
	private $_length;

    /**
    * {@inheritDoc}
    */
	public function createObject($params)
	{
		$this->_id = $params['id'];
		$this->_title = $params['title'];
		$this->_artist = $params['artist'];
		$this->_length = $params['length'];
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
				'title' => $this->_title, 
				'artist' => $this->_artist,
				'length' => $this->_length);
	}
	
    /**
    * {@inheritDoc}
    */	
	public function printableFormat()
	{
		return array(
		'id' => $this->_id,
		'title' => $this->_title,
		'artist' => $this->_artist,
		'length' => $this->_length,
		);
	}
}

?>