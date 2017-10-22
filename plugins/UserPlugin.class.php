<?php

require_once('Plugin_Base.class.php');
require_once('/objects/UserObject.class.php');
require_once('/objects/FavListObject.class.php');

/**
 * Hold user commands processing, including the following :
 * /api/user/id
 * /api/user/id/favlist
 * 
 * @author Jaay
 *
 */
class UserPlugin extends Plugin_Base
{
    /** Parameters for that command in the correct order
     * http://....../api/user/id/(subcmd) */
    private $_parameters_array = array ('id', 'subcmd');

    function processCommand($params)
    {
      $data = explode("/", $params);
      $data = Utils::combineParameters($data, $this->_parameters_array);
      if(isset($data['subcmd']))
      {
	      switch($data['subcmd'])
	      {
	        case 'favlist' : 
	            $this->processSubCmdFavSongs($data);break;
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
     * Subcommand URL : /api/user/id
     * @param array $data Associative array containing the user id
     */
    function processSubCmdInfos($data)
    {
      	$objectList = PersistentAbstraction::getObject(new UserObject(), array(array('op1' => 'id', 'operator' => '=', 'op2' => $data['id'])));
        if($objectList)
        {
	      	$singleObject = $objectList[0];
	      	$this->printResult($singleObject->printableFormat());
        }
    }
    
    /**
     * Process the favorite songs subcommand.
     * Subcommand URL : /api/user/id/favlist
     * @param array $data Associative array containing the user id
     */    
    function processSubCmdFavSongs($data)
    {
    	$objectList = PersistentAbstraction::getObject(new FavListObject(), array(array('op1' => 'id_user', 'operator' => '=', 'op2' => $data['id'])));
        if($objectList)
        {
        	$songList = array();
	      	foreach ($objectList as $singleObject)
	      	{
	      		$songList[] = $singleObject->printableFormat();
	      	}
	      	$this->printResult($songList);	
        }
    }
}

?>
