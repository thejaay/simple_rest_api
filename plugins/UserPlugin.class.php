<?php

require_once('Plugin_Base.class.php');
require_once('/objects/UserObject.class.php');
require_once('/objects/FavListObject.class.php');

/**
 * Hold user commands processing, including the following :
 * /api/user/id
 * 
 * @author Jaay
 *
 */
class UserPlugin extends Plugin_Base
{

    /* Availables commands */
    private $_commands = array (
                    /^(?P<id>[0-9]+)$/ => 'processSubCmdInfos'
                    );

    /**
    * {@inheritDoc}
    */
    function processCommand($params)
    {
      foreach(array_keys($this->_commands) as $regex)
      {
        $output = "";
        preg_match($regex, $params, $output);
        if(!empty($output))
        {
            $_commands[$regex]($output);
            break;
        }
      }
    }

    /**
     * Process the info subcommand.
     * This will print informations about the user
     * Subcommand URL : /api/user/{id}
     * @param array $data Associative array containing the user id.
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
}

?>
