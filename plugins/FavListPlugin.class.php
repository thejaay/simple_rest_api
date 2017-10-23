<?php

require_once('Plugin_Base.class.php');
require_once('/objects/FavListObject.class.php');
require_once('/objects/SongObject.class.php');

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
                "/^(?P<id>[0-9]+)$/" => 'processSubCmdFavList',
                "/^(?P<id>[0-9]+)\/(?P<subcmd>add)\/(?P<id_song>[0-9]+)$/" => 'processSubCmdAddSong',
                "/^(?P<id>[0-9]+)\/(?P<subcmd>delete)\/(?P<id_song>[0-9]+)$/" => 'processSubCmdDeleteSong'
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
     * Process the delete subcommand.
     * Subcommand URL : /api/favlist/{id_user}/delete/{id_song}
     * @param array $data Associative array containing the user id, and song id to delete.
     */
    private function processSubCmdDeleteSong($data)
    {
        $objectList = PersistentAbstraction::getObject(new FavListObject(), array(
            array('op1' => 'id_user', 'operator' => '=', 'op2' => $data['id']),
            array('op1' => 'id_song', 'operator' => '=', 'op2' => $data['id_song'])
        ));
        if($objectList)
        {
            $singleObject = $objectList[0];
            PersistentAbstraction::deleteObject($singleObject);
        }
        else
        {
        	$this->printError();
        }
    }

    /**
     * Process the add subcommand.
     * Subcommand URL : /api/favlist/{id_user}/add/{id_song}
     * @param array $data Associative array containing the user id, and song id to add.
     */    
    private function processSubCmdAddSong($data)
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
    private function processSubCmdFavList($data)
    {
        $objectList = PersistentAbstraction::getObject(
        		new FavListObject(), array(array('op1' => 'id_user', 'operator' => '=', 'op2' => $data['id'])));
        if($objectList)
        {
            $songList = array();
            $songs_id = "";
            foreach ($objectList as $singleObject)
            {
            	$songs_id .= $singleObject->printableFormat()['id_song'].",";
            }
            /* Remove trailing ',' */
			$songs_id = substr($songs_id, 0, -1);
			$songObjectList = PersistentAbstraction::getObject(
					new SongObject(), array(array('op1' => 'id', 'operator' => 'in', 'op2' => $songs_id)));
            $songList = array();
            foreach ($songObjectList as $song)
            {
                $songList[] = $song->printableFormat();
            }
            $this->printResult($songList);  
        }
        else
        {
        	$this->printError();
        }        
    }
}

?>
