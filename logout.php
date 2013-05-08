<?php
//start session
session_start();

//retrieve the entire session array
$_SESSION = array();

//destroy the session
session_destroy();


require_once "logout.html.inc";

?>
