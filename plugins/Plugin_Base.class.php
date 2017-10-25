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
    abstract public function processCommand($params);
    
    /**
    * Show the result in JSON format.
    * @param $data An array containing the data to be displayed.
    */
    function printResult($data)
    {
      header("Content-type:application/json");
      echo json_encode($data);
    }
    
    /**
    * Display an error message in JSON format.
    */
    function printError($message = "Requested item doesn't exists")
    {
      header("Content-type:application/json");
      echo json_encode(array("error" => $message));
    }    
    
    /**
    * Display an error message in JSON format if the URL if incorrect.
    */
    function printCmdError()
    {
      header("Content-type:application/json");
      echo json_encode(array("error" => "Malformed URL"));
    }    
    
    /**
    * Display a success message in JSON format.
    */
    function printSuccess($message)
    {
      header("Content-type:application/json");
      echo json_encode(array("success" => $message));
    }      
}

?>
