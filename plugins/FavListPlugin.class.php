<?php

require_once('Plugin_Base.class.php');
require_once('/objects/FavListObject.class.php');

/**
 * Hold favorite list commands processing, including the following :
 * /api/favlist/id_user
 * /api/favlist/id_user/delete/id_song
 * /api/favlist/id_user/add/id_song
 * 
 * @author Jaay
 *
 */
class FavListPlugin extends Plugin_Base
{

    /* Availables commands */
    private $_commands = array (
                /^(?P<id>[0-9]+)$/ => 'processSubCmdFavList',
                /^(?P<id>[0-9]+)\/(?P<subcmd>add)\/(?P<id_song>[0-9]+)$/ => 'processSubCmdAddSong',
                /^(?P<id>[0-9]+)\/(?P<subcmd>delete)\/(?P<id_song>[0-9]+)$/ => 'processSubCmdDeleteSong'
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
     * Process the delete subcommand.
     * Subcommand URL : /api/favlist/{id_user}/delete/{id_song}
     * @param array $data Associative array containing the user id, and song id to delete.
     */
    function processSubCmdDeleteSong($data)
    {
        echo "DELETE CHANSON:<br/>";
        print_r($data);
    }

    /**
     * Process the add subcommand.
     * Subcommand URL : /api/favlist/{id_user}/add/{id_song}
     * @param array $data Associative array containing the user id, and song id to add.
     */    
    function processSubCmdAddSong($data)
    {
      $favListItem = new FavListObject();
      $favListItem->createFromRaw('',$data['id'],$data['id_song']);

      PersistentAbstraction::addObject($favListItem);
    }

    /**
     * Process the favlist info subcommand.
     * It will show the user favorites list
     * Subcommand URL : /api/favlist/{id_user}
     * @param array $data Associative array containing the user id.
     */    
    function processSubCmdFavList($data)
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
