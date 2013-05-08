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

//get student id from session variable
$studentID = $_SESSION['studentID'];

//select provincial competition id for reference
$selectprovincialCompetitionsID = mysql_query("SELECT provincialCompetitions_provincialCompetitionsID FROM student_has_provincialCompetitions WHERE student_studentID = '$studentID';");

$provincialCompetitionsID = mysql_fetch_row($selectprovincialCompetitionsID, 0);

//if there is no provincial competition id, then redirect to add provincial score page
if ($provincialCompetitionsID == false ) {

    redirect("addProvincialScore.php?id=$studentID", "");
    exit();
}

//select the actual provincial competition id
$selectprovincialCompetitionsID = mysql_query("SELECT provincialCompetitions_provincialCompetitionsID FROM student_has_provincialCompetitions WHERE student_studentID = '$studentID';");

$provincialCompetitionsID = mysql_result($selectprovincialCompetitionsID, 0);


//display various results based on the provincial competition id
$selectoralPresentationResultOne = mysql_query("SELECT oralPresentationResultOne FROM provincialCompetitions WHERE provincialCompetitionsID = '$provincialCompetitionsID';");

$oralPresentationResultOne = mysql_result($selectoralPresentationResultOne, 0);

$selectoralPresentationResultTwo = mysql_query("SELECT oralPresentationResultTwo FROM provincialCompetitions WHERE provincialCompetitionsID = '$provincialCompetitionsID';");

$oralPresentationResultTwo = mysql_result($selectoralPresentationResultTwo, 0);

$selectWrittenTestResult = mysql_query("SELECT writtenTestResult FROM provincialCompetitions WHERE provincialCompetitionsID = '$provincialCompetitionsID';");

$writtenTestResult = mysql_result($selectWrittenTestResult, 0);

$selectrank = mysql_query("SELECT rank FROM provincialCompetitions WHERE provincialCompetitionsID = '$provincialCompetitionsID';");

$rank = mysql_result($selectrank, 0);


//get events id

$selecteventsID = mysql_query("SELECT events_eventsID FROM provincialCompetitions_has_events WHERE provincialCompetitions_provincialCompetitionsID = '$provincialCompetitionsID';");

$eventsID = mysql_result($selecteventsID, 0);

//get the event's name
$selecteventName = mysql_query("SELECT eventName FROM events WHERE eventsID = '$eventsID';");

$eventName = mysql_result($selecteventName, 0);




require_once "provincials.html.inc";
    ?>
