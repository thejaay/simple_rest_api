<?php

require_once('Plugin_Base.class.php');

/**
 * Hold user commands processing, including the following :
 * /api/user/id
 * /api/user/id/favlist
 * 
 * @author Jaay
 *
 */
class User extends Plugin_Base
{
    /** Parameters for that command in the correct order
     * http://....../api/user/id/(subcmd) */
    private $_parameters_array = array ('id', 'subcmd');

    function processCommand($params)
    {
      $data = explode("/", $params);
      $data = Utils::combineParameters($data, $this->_parameters_array);
      switch($data['subcmd'])
      {
        case 'favlist' : 
            $this->processSubCmdFavSongs($data);break;
        default : 
            $this->processSubCmdInfos($data);break;
      }
    }

    /**
     * Process the info subcommand.
     * This is the default subcommand for /user/ command
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
    
    function processSubCmdFavSongs($data)
    {
      echo "CHANSONS FAVORIS:<br/>";
      print_r($data);
    }
}

?>
