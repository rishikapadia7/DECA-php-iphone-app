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



//connect to the database
$con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

            mysql_select_db("trillium", $con);


$studentID = $_SESSION['studentID'];


//get the regional competition id
$selectregionalCompetitionsID = mysql_query("SELECT regionalCompetitions_regionalCompetitionsID FROM student_has_regionalCompetitions WHERE student_studentID = '$studentID';");

$regionalCompetitionsID = mysql_fetch_row($selectregionalCompetitionsID, 0);

//if there is no data entered, then redirect to add regional score page
if ($regionalCompetitionsID == false ) {
 
    redirect("addRegionalScore.php?id=$studentID", "");
    exit();
}

//get the actual regional competition id

$selectregionalCompetitionsID = mysql_query("SELECT regionalCompetitions_regionalCompetitionsID FROM student_has_regionalCompetitions WHERE student_studentID = '$studentID';");

$regionalCompetitionsID = mysql_result($selectregionalCompetitionsID, 0);


//get various information baed on the regional competitions ID
$selectoralPresentationResultOne = mysql_query("SELECT oralPresentationResultOne FROM regionalCompetitions WHERE regionalCompetitionsID = '$regionalCompetitionsID';");

$oralPresentationResultOne = mysql_result($selectoralPresentationResultOne, 0);

$selectWrittenTestResult = mysql_query("SELECT writtenTestResult FROM regionalCompetitions WHERE regionalCompetitionsID = '$regionalCompetitionsID';");

$writtenTestResult = mysql_result($selectWrittenTestResult, 0);

$selectrank = mysql_query("SELECT rank FROM regionalCompetitions WHERE regionalCompetitionsID = '$regionalCompetitionsID';");

$rank = mysql_result($selectrank, 0);


//get events id

$selecteventsID = mysql_query("SELECT events_eventsID FROM regionalCompetitions_has_events WHERE regionalCompetitions_regionalCompetitionsID = '$regionalCompetitionsID';");

$eventsID = mysql_result($selecteventsID, 0);

//get the events name

$selecteventName = mysql_query("SELECT eventName FROM events WHERE eventsID = '$eventsID';");

$eventName = mysql_result($selecteventName, 0);




require_once "regionals.html.inc";
    ?>
