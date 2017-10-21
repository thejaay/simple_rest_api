<?php

include('Connectors/Connector_Base.class.php');
include('../Objects/PersistentObject.class.php');

static class PersistentAbstraction
{
	private static Connector_Base $_connector;
	
	public static function setConnector(Connector_Base $connector)
	{
		$this->_connector = $connector;
	}
	
	public static function saveObject(PersistentObject $persistentObject)
	{
		$this->_connector->save($persistentObject);
	}
	
	public static function getObject(PersistentObject $persistentObjectClass, array $params)
	{
		return $this->_connector->get($persistentObject);
	}	
}

?>