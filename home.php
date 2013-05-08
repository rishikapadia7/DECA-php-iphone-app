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

// Create authentication object
$auth = new Auth($db, "login.php", "SeCrEt-kEeP0u+");

//Set time zone for use with date functions
date_default_timezone_set("America/New_York");

// Only allow a teacher to view this page
if(!authenticateUser($auth, "TEACHER"))
{
    exit(); //Stop execution of the script
}





$con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

            mysql_select_db("trillium", $con);

  //The below portion will create a bunch of session variables
            $_SESSION['username'] = getUserName($auth, $db);
            $storedUserName = $_SESSION['username'];

            $selectstoredID = mysql_query("SELECT advisorID as advisorID FROM chapterAdvisor WHERE username = '$storedUserName';");

            //retrieve the current user's ID using the function in util.php
           $storedID = mysql_result($selectstoredID , 0);

           $_SESSION['advisorID'] = $storedID;

           $selectchapterName = mysql_query("SELECT chapterName FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $chapterName = mysql_result($selectchapterName, 0);

           $_SESSION['chapterName'] = $chapterName;

           $selectchapterID = mysql_query("SELECT chapterID FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $chapterID = mysql_result($selectchapterID, 0);

           $_SESSION['chapterID'] = $chapterID;



require_once "home.html.inc";
    ?>
