<?php 

include('MySQLConnector.class.php');

/**
 * All Connector must inherit that class.
 * This will define the common action that must be available for every connector.
 *
 * @author Jaay
 *
 */
abstract class Connector_Base
{
    /**
    * Retrieve a list of object from the persistent layer.
    * @param $persistentObject a new instance of the class to be retrieved.
    * @param $params a new instance of the class to be retrieved.
    * @return Array an array that contain all object that match $params requirements.
    */
    abstract protected function get(PersistentObject $persistentObject, array $params);
    
    /**
    * Delete an object from the database.
    * @param $persistentObject the object to be deleted.
    */
    abstract protected function delete(PersistentObject $persistentObject);
    
    /**
    * Add an object from the database.
    * @param $persistentObject the object to be added.
    */    
    abstract protected function add(PersistentObject $persistentObject);
}

?>