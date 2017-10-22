<?php 

class FavListObject extends PersistentObject
{
	private $_entity_name = "favorite_songs";
	
	private $_id;
	private $_id_user;
	private $_id_song;

	public function __constructor(){}
	
	public function createFromRaw($id, $id_user, $id_song)
	{
		$this->_id = $id;
		$this->_id_user = $id_user;
		$this->_id_song = $id_song;
	}
	
	public function createObject($params)
	{
		$this->_id = $params['id'];
		$this->_id_user = $params['id_user'];
		$this->_id_song = $params['id_song'];
		return $this;
	}
	
	public function getEntityName()
	{
		return $this->_entity_name;
	}
	
	public function getDataArray()
	{
		return array('id_user' => $this->_id_user, 'id_song' => $this->_id_song);
	}
	
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