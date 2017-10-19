<?php
abstract class Plugin_Base
{
    abstract protected function processCommand($params);

    function printResult($data)
    {
      echo "PLUGIN_BASE_".$data;
    }
}

?>
