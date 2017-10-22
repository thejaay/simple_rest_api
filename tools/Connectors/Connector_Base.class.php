<?php 

include('MySQLConnector.class.php');

abstract class Connector_Base
{
    abstract protected function get(PersistentObject $persistentObject, array $params);
    abstract protected function delete(PersistentObject $persistentObject, array $params);
    abstract protected function add(PersistentObject $persistentObject);
}

?>