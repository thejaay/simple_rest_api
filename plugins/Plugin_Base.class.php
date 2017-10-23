<?php

/**
 * Every plugins must extends this base.
 * 
 * @author Jaay
 *
 */
abstract class Plugin_Base
{
	/**
	 * Process the command.
	 * @param String $params Parameters separated with '/' as given in the URL.
	 */
    abstract protected function processCommand($params);
    
    /**
    * Show the result in JSON format.
    * @param $data An array containing the data to be displayed.
    */
    function printResult($data)
    {
      header("Content-type:application/json");
      echo json_encode($data);
    }
}

?>
