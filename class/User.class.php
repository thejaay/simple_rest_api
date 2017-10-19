<?php

require_once('Plugin_Base.class.php');

class User extends Plugin_Base
{
    private $_parameters_array = array ('id', 'subcmd');

    function processCommand($params)
    {
        $data = explode("/", $params);
        $data = Utils::combineParameters($data, $this->_parameters_array);
        switch($data['subcmd'])
        {
          default: $this->processSubCmdInfos($data);break;
        }
    }

    function processSubCmdInfos($data)
    {
      echo "INFOS UTILISATEUR:<br/>";
      print_r($data);
    }
}

?>
