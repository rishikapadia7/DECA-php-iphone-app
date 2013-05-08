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

//retrieve the id of the student whos information was being viewed
$studentID = $_SESSION['studentID'];

//retrieve student's ICDC competition ID
$selecticdcID = mysql_query("SELECT icdcCompetitions_icdcID FROM student_has_icdcCompetitions WHERE student_studentID = '$studentID';");

$icdcID = mysql_fetch_row($selecticdcID, 0);

//If there is no icdc score for a student, then the advisor is redirected to another page in order to add the data
if ($icdcID == false ) {
 
    redirect("addICDCScore.php?id=$studentID", "");
    exit();
}
//Find and retrieve values from the database
//These values are displayed in the ICDC.html.inc page
//These variables rely on the $studentID and then the ICDC ID and only return values for the corresponding student
//The variable names desscribe what field in the HTML INC page they will refer to
$selecticdcID = mysql_query("SELECT icdcCompetitions_icdcID FROM student_has_icdcCompetitions WHERE student_studentID = '$studentID';");

$icdcID = mysql_result($selecticdcID, 0);

$selectoralPresentationResultOne = mysql_query("SELECT oralPresentationResultOne FROM icdcCompetitions WHERE icdcID = '$icdcID';");

$oralPresentationResultOne = mysql_result($selectoralPresentationResultOne, 0);

$selectoralPresentationResultTwo = mysql_query("SELECT oralPresentationResultTwo FROM icdcCompetitions WHERE icdcID = '$icdcID';");

$oralPresentationResultTwo = mysql_result($selectoralPresentationResultTwo, 0);

$selectWrittenTestResult = mysql_query("SELECT writtenTestResult FROM icdcCompetitions WHERE icdcID = '$icdcID';");

$writtenTestResult = mysql_result($selectWrittenTestResult, 0);

$selectrank = mysql_query("SELECT rank FROM icdcCompetitions WHERE icdcID = '$icdcID';");

$rank = mysql_result($selectrank, 0);

$selecteventsID = mysql_query("SELECT events_eventsID FROM icdcCompetitions_has_events WHERE icdcCompetitions_icdcID = '$icdcID';");

$eventsID = mysql_result($selecteventsID, 0);

$selecteventName = mysql_query("SELECT eventName FROM events WHERE eventsID = '$eventsID';");

$eventName = mysql_result($selecteventName, 0);



//show the HTML INC page associated with this php file
require_once "ICDC.html.inc";
    ?>
