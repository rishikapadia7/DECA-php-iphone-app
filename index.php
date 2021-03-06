<?php 

// Include Session class - used for storing "system-wide" variables
require_once "classes/Session.class.php";
// Include Auth class - used for handling logins
require_once "classes/Auth.class.php";
// Include Util functions - provides useful utility functions
require_once "includes/util.php";
// Include the DB access credentials
require_once "includes/dbcred.php";
// Try to establish a database connection
require_once "includes/dbaccess.php";

//Create authentication object
$auth = new Auth($db, "Index.php", "SeCrEt-kEeP0u+");

// Set time zone for use with date functions 
date_default_timezone_set("America/New_York");

require_once "Index.html.inc";
?>