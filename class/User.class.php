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
     * Subcommand URL : /api/user/id
     * @param array $data Associative array containing the user id
     */
    function processSubCmdInfos($data)
    {
      if($data['id'])
      {
        echo "INFOS USER:<br/>";
        print_r($data);
      }
    }
    
    /**
     * Process the favorite songs subcommand.
     * Subcommand URL : /api/user/id/favlist
     * @param array $data Associative array containing the user id
     */    
    function processSubCmdFavSongs($data)
    {
      if($data['id'])
      {
        echo "INFOS USER:<br/>";
        print_r($data);
      }
    }
}

?>
