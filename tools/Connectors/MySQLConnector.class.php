<?php 

class MySQLConnector extends Connector_Base
{

	private $_db_name = "api_test";
	private $_db_server = "localhost";
	private $_db_user = "root";
	private $_db_pwd = "";
	
	private $_handler;
	
	function __construct()
	{
		$this->_handler = new mysqli($this->_db_server, $this->_db_user, $this->_db_pwd, $this->_db_name);
	}

	function get(PersistentObject $persistentObject, array $params)
	{
		$where_clause = "1=1 AND ";
		foreach ($params as $clause)
		{
			$where_clause .= $clause['op1']." ".$clause['operator']." ".$clause['op2']." AND ";
		}
		$where_clause .= "1=1";
		$result = $this->_handler->query("SELECT * FROM ".$persistentObject->getEntityName()." WHERE ".$where_clause);
		$objects = array();
		while($row = $result->fetch_assoc())
		{
			$objects[] = clone($persistentObject->createObject($row));
		}
		return $objects;
	}
	
	function delete(PersistentObject $persistentObject, array $params)
	{
		$where_clause = "1=1 AND ";
		foreach ($params as $clause)
		{
			$where_clause .= $clause['op1']." ".$clause['operator']." ".$clause['op2']." AND ";
		}
		$where_clause .= "1=1";
		$result = $this->_handler->query("DELETE * FROM ".$persistentObject->getEntityName()." WHERE ".$where_clause);
		return $result;
	}

	function add(PersistentObject $persistentObject)
	{
		$columns = "";
		$values = "";
		$data = $persistentObject->getDataArray();
		foreach (array_keys($data) as $key)
		{
			$columns .= $key.",";
			$values .= $data[$key].",";
		}
		if($columns !== "" && $values !== "")
		{
			$columns = substr($columns, 0, -1);
			$values = substr($values, 0, -1);
			echo "INSERT INTO ".$persistentObject->getEntityName()."(".$columns.") VALUES (".$values.")";
			$result = $this->_handler->query("INSERT INTO ".$persistentObject->getEntityName()."(".$columns.") VALUES (".$values.")");
			return $result;			
		}
		return false;
	}
}

?>