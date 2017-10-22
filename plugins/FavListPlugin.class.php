<?php

require_once('Plugin_Base.class.php');
require_once('/objects/FavListObject.class.php');

/**
 * Hold favorite list commands processing, including the following :
 * /api/favlist/id/delete/id_song
 * /api/favlist/id/add/id_song
 * 
 * @author Jaay
 *
 */
class FavListPlugin extends Plugin_Base
{
    /** Parameters for that command in the correct order
     * http://....../api/favlist/id/subcmd/id_song */
    private $_parameters_array = array ('id', 'subcmd', 'id_song');

    function processCommand($params)
    {
      $data = explode("/", $params);
      $data = Utils::combineParameters($data, $this->_parameters_array);
      switch($data['subcmd'])
      {
      	case 'delete' : 
            $this->processSubCmdDeleteSong($data);break;
      	case 'add' : 
            $this->processSubCmdAddSong($data);break;
      }
    }

    function processSubCmdDeleteSong($data)
    {
      if($data['id'])
      {
        echo "DELETE CHANSON:<br/>";
        print_r($data);
      }
    }
    
    function processSubCmdAddSong($data)
    {
      $favListItem = new FavListObject();
      $favListItem->createFromRaw('',$data['id'],$data['id_song']);

      PersistentAbstraction::addObject($favListItem);
    }
}

?>
