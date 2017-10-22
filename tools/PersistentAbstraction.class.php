<?php

include('Connectors/Connector_Base.class.php');
include('/objects/PersistentObject.class.php');

class PersistentAbstraction
{
	public static $connector;
	
	public static function setConnector(Connector_Base $connec)
	{
		PersistentAbstraction::$connector = $connec;
	}
	
	public static function getConnector()
	{
		return PersistentAbstraction::$connector;
	}
	
	public static function getObject(PersistentObject $persistentObjectClass, array $params)
	{
		return PersistentAbstraction::getConnector()->get($persistentObjectClass, $params);
	}	

	public static function addObject(PersistentObject $persistentObjectClass)
	{
		return PersistentAbstraction::getConnector()->add($persistentObjectClass);
	}	
	
	public static function deleteObject(PersistentObject $persistentObjectClass, array $params)
	{
		return PersistentAbstraction::getConnector()->delete($persistentObjectClass, $params);
	}	
}

?>