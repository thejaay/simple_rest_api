<?php 

class MySQLConnector
{
	private $_db_name = "";
	private $_db_server = "";
	private $_db_user = "";
	private $_db_pwd = "";
	
	private $_handler;
	
	function __construct()
	{
		$_handler = new mysqli($this->_db_server, $this->_db_user, $this->_db_pwd, $this->_db_name);
	}
	
	function save(PersistentObject $persistentObject)
	{
		
	}
	
	function get(PersistentObject $persistentObject, array $params)
	{
		
	}
}

?>