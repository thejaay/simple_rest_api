<?php

require_once('Plugin_Base.class.php');
require_once('/objects/SongObject.class.php');

/**
 * Hold song commands processing, including the following :
 * /api/song/id
 * 
 * @author Jaay
 *
 */
class SongPlugin extends Plugin_Base
{
    /** Parameters for that command in the correct order
     * http://....../api/song/id/(subcmd) */
    private $_parameters_array = array ('id', 'subcmd');

    function processCommand($params)
    {
      $data = explode("/", $params);
      $data = Utils::combineParameters($data, $this->_parameters_array);
      if(isset($data['subcmd']))
      {
	      switch($data['subcmd'])
	      {
	        default : 
	            $this->processSubCmdInfos($data);break;
	      }
      }
      else
      {
      	$this->processSubCmdInfos($data);
      }      
    }

    /**
     * Process the info subcommand.
     * This is the default subcommand for /song/ command
     * @param array $data Associative array containing the user id
     */
    function processSubCmdInfos($data)
    {
      	$objectList = PersistentAbstraction::getObject(new SongObject(), array(array('op1' => 'id', 'operator' => '=', 'op2' => $data['id'])));
        if($objectList)
        {
	      	$singleObject = $objectList[0];
	      	$this->printResult($singleObject->printableFormat());
        }
    }
    
}

?>
