<?php

require_once('Plugin_Base.class.php');

/**
 * Hold song commands processing, including the following :
 * /api/song/id
 * 
 * @author Jaay
 *
 */
class Song extends Plugin_Base
{
    /** Parameters for that command in the correct order
     * http://....../api/song/id/(subcmd) */
    private $_parameters_array = array ('id', 'subcmd');

    function processCommand($params)
    {
      $data = explode("/", $params);
      $data = Utils::combineParameters($data, $this->_parameters_array);
      switch($data['subcmd'])
      {
        default : 
            $this->processSubCmdInfos($data);break;
      }
    }

    /**
     * Process the info subcommand.
     * This is the default subcommand for /song/ command
     * @param array $data Associative array containing the user id
     */
    function processSubCmdInfos($data)
    {
      if($data['id'])
      {
        echo "INFOS CHANSON:<br/>";
        print_r($data);
      }
    }
    
}

?>
