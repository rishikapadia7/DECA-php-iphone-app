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

            //retrieve the current username from the session array
           
           $username = $_SESSION['username'];

           //get various advisor info based on the username
           $selectFirstName = mysql_query("SELECT firstName FROM chapterAdvisor WHERE username = '$username';");

           $firstName = mysql_result($selectFirstName, 0);

           $selectLastName = mysql_query("SELECT lastName FROM chapterAdvisor WHERE username = '$username';");

           $lastName = mysql_result($selectLastName, 0);

           $selectEmailAddress = mysql_query("SELECT emailAddress FROM chapterAdvisor WHERE username = '$username';");

           $emailAddress = mysql_result($selectEmailAddress, 0);


require_once "advisorInfo.html.inc";
    ?>
