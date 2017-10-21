<?php 

include('MySQLConnector.class.php');

abstract class Connector_Base
{
    abstract protected function save(PersistentObject $persistentObject);
    abstract protected function get(PersistentObject $persistentObject, array $params);
}

?>