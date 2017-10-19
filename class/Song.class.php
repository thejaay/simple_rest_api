<?php

require_once('Plugin_Base.class.php');

class Song extends Plugin_Base
{
    function processCommand($params)
    {
        echo "HELLO from song";
    }

}

?>
