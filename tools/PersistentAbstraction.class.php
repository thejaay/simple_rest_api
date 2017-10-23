<?php

include('Connectors/Connector_Base.class.php');
include('/objects/PersistentObject.class.php');

/**
 * Abstraction of the persistent layer of the application.
 * This class contains only static members and act as a singleton.
 *
 * @author Jaay
 *
 */
class PersistentAbstraction
{
	public static $connector;
	
	/**
	* Set the persistence connector.
	*/
	public static function setConnector(Connector_Base $connec)
	{
		PersistentAbstraction::$connector = $connec;
	}
	
	/**
	* Get the current connector.
	* @return Connector_Base the current connector.
	*/
	public static function getConnector()
	{
		return PersistentAbstraction::$connector;
	}
	
	/**
	* Perform a query to retrieve a stored object.
	* @param $persistentObjectClass New instance of the class to be retrieved.
	* @param $params The parameter to discriminate wich object to get, the syntax is an array of array containing
	* 'op1', 'operator' and 'op2' (for example the array 'op1' => 'id', 'operator' => '=', 'op2' => '10' will
	* retrieve the object wich id is equal '10' ).
	* @return Array an array containing all the object matching the criteras.
	*/
	public static function getObject(PersistentObject $persistentObjectClass, array $params)
	{
		return PersistentAbstraction::getConnector()->get($persistentObjectClass, $params);
	}	

    /**
    * Save an object.
    * @param $persistentObject The object to be added.
    */
	public static function addObject(PersistentObject $persistentObject)
	{
		return PersistentAbstraction::getConnector()->add($persistentObject);
	}	
	
    /**
    * Delete an object.
    * @param $persistentObject The object to be deleted.
    */
	public static function deleteObject(PersistentObject $persistentObject)
	{
		return PersistentAbstraction::getConnector()->delete($persistentObject, $params);
	}	
}

?>