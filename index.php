<?php

include('tools/Utils.class.php');

Utils::loadClasses();
PersistentAbstraction::setConnector(new MySQLConnector());

/* List of all authorized plugins */
$authorized_plugins = array
(
/* 'api_command' => ClassName */
 'user' => UserPlugin,
 'song' => SongPlugin,
 'favlist' => FavListPlugin
);

$params = $_GET;
//@TODO sanitize $_GET

/* This should always be a 'cmd' parameter thanks to .htaccess configuration. */
if(in_array($params['cmd'], array_keys($authorized_plugins)))
{
	/* Instantiate plugin based on command name */
    $cmdClass = new $authorized_plugins[$params['cmd']];
    $cmdClass->processCommand($params['params']);
}
/* If there is no 'cmd' parameter, user is doing something nasty. */
else
{

}

/**
 * Autoload plugins in 'class' folder
 * 
 * @param String $ClassName Name of the class to be loaded
 */
function __autoload($ClassName) {
    include('plugins/'.$ClassName.'.class.php');
}

?>
