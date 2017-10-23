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

    /* Availables commands */
    private $_commands = array (
                "/^(?P<id>[0-9]+)$/" => 'processSubCmdInfos'
                );
                
    /**
    * {@inheritDoc}
    */                
    public function processCommand($params)
    {
      foreach(array_keys($this->_commands) as $regex)
      {
        $output = "";
        preg_match($regex, $params, $output);
        if(!empty($output))
        {
            $function = $this->_commands[$regex];
            $this->$function($output);
            break;
        }
      }
    }

    /**
     * Process the info subcommand.
     * This will print informations about the song.
     * Subcommand URL : /api/song/{id}
     * @param array $data Associative array containing the song id.
     */
    private function processSubCmdInfos($data)
    {
      	$objectList = PersistentAbstraction::getObject(new SongObject(), array(array('op1' => 'id', 'operator' => '=', 'op2' => $data['id'])));
        if($objectList)
        {
	      	$singleObject = $objectList[0];
	      	$this->printResult($singleObject->printableFormat());
        }
        else
        {
        	$this->printError();
        }
    }
    
}

?>
