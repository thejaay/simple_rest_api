<?php
abstract class PersistentObject
{
	abstract protected function getEntityName();
	abstract protected function createObject($params);
	abstract protected function getDataArray();
	abstract protected function printableFormat();
}

?>