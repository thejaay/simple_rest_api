<?php

/**
 * Every object must extends this base.
 * Represents the object on the persistent layer.
 * 
 * @author Jaay
 *
 */
abstract class PersistentObject
{
    /**
    * Get the name of that object.
    * @return String a string representing the entity.
    */
	abstract public function getEntityName();
	
    /**
    * Get the object ID.
    * @return String a string representing the object identification.
    */
    abstract public function getId();
    	
	/**
	* Create a new object.
	* @param $params An associative array with object member and their value to be set.
	*/
	abstract public function createObject($params);
	
    /**
    * Get an array with all the object data.
    * @return Array an associative array with members and their data.
    */	
	abstract public function getDataArray();
	
	/**
	* Get a printable format of this object (as an array).
	* @return Array an associative array with all members and their data.
	*/
	abstract public function printableFormat();
}

?>