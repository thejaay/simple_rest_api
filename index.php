<?php
include('tools/Utils.class.php');
//@TODO => AUTOLOAD !!!
include('class/User.class.php');
include('class/Song.class.php');

/* List of all authorized plugins */
$authorized_plugins = array
(
/* 'api_item' => ClassName*/
 'user' => User,
 'song' => Song
);

$params = $_GET;
//@TODO sanitize $_GET

/* This should always be a 'cmd' parameter thanks to .htaccess configuration. */
if(in_array($params['cmd'], array_keys($authorized_plugins)))
{
    $cmdClass = new $authorized_plugins[$params['cmd']];
    $cmdClass->processCommand($params['params']);
}
/* If there is no 'cmd' parameter, user is doing something nasty. */
else
{

}
?>
