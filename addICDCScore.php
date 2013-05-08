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

//Get the id of the student whose information was being viewed
//The score will be added based on this ID
$studentID = $_SESSION['studentID'];

// Determine whether form was submitted to itself.
if (isset($_POST['eventName'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $eventName = trim($_POST['eventName']);
    $oralOneScore = trim($_POST['oralOneScore']);
    $oralTwoScore = trim($_POST['oralTwoScore']);
    $writtenScore = trim($_POST['writtenScore']);
    $totalScore = trim($_POST['totalScore']);
    $rank = trim($_POST['rank']);

    
    // Verify that a oralOneScore was provided
    if (strlen($oralOneScore) == 0) {
        $error['oralOneScore'] = 'Please enter a First Oral Presentation Score.';
    }

    //Verify that the value provided is a number
    if (is_numeric($oralOneScore)) {

    //If the value is not numeric, an error is displayed
    } else {
        $error['oralOneScore'] = 'Please enter a valid First Oral Presentation Score.';
    }
/*//  Oral two value is not necessary according to database
    // Verify that a oralTwoScore was provided
    if (strlen($oralTwoScore) == 0) {
        $error['oralTwoScore'] = 'Please enter a Second Oral Presentation Score.';
    }

    //verify that the value provided is a number
    if (is_numeric($oralTwoScore)) {

    } else {
        $error['oralTwoScore'] = 'Please enter a valid Second Oral Presentation Score.';
    }
*/
    // Verify that a writtenScore was provided
    if (strlen($writtenScore) == 0) {
        $error['writtenScore'] = 'Please enter a Written Test or Report Result.';
    }

    //verify that the value provided is a number
    if (is_numeric($writtenScore)) {

    } else {
        $error['writtenScore'] = 'Please enter a valid Written Test or Report Result.';
    }

   
    // Verify that a rank was provided
    if (strlen($rank) == 0) {
        $error['rank'] = 'Please enter a Rank.';
    }

    //verify that the value provided is a number
    if (is_numeric($rank)) {

    } else {
        $error['rank'] = 'Please enter a valid Rank.';
    }

    // Ensure event name was given.
    if (strlen($eventName) == 0) {
        $error['eventName'] = 'Please provide an Event name.';
    }

    // If no validation errors, add a new competition record.
    if (!isset($error)) {


        // Now insert the data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);

            //Connect to the database
            $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

           mysql_select_db('trillium', $con);

           //Data is entered into the database
           //Information is entered into appropriate tables

           //store in icdcCompetitions table
           $sql = mysql_query("INSERT INTO icdcCompetitions (oralPresentationResultOne, oralPresentationResultTwo, writtenTestResult, rank)
           VALUES ('$oralOneScore','$oralTwoScore','$writtenScore','$rank');");
           
           //retrieve the competition's ID by grabbing the id of the last autoincrement insert value
           $icdcID = mysql_insert_id();

           //store values in the student_has_icdcCompetitions table
           $sql = mysql_query("INSERT INTO student_has_icdcCompetitions (student_studentID, icdcCompetitions_icdcID)
           VALUES ('$studentID','$icdcID');");
           

           //insert into Events the value that was given
           $sql = mysql_query("INSERT INTO events (eventName)
           VALUES ('$eventName')");
           
           //retrieve the event's ID by grabbing the id of the last autoincrement insert value
           $eventsID = mysql_insert_id();

           //insert into the icdcCompetitions_has_events table
           $sql = mysql_query("INSERT INTO icdcCompetitions_has_events (icdcCompetitions_icdcID, events_eventsID)
           VALUES ('$icdcID','$eventsID')");
           


        }
        catch (PDOException $e)
        {
            echo 'PDO Exception Caught.  ';
            echo 'Error with the database: <br />';
            echo 'SQL Query: ', $sql;
            echo 'Error: ' . $e->getMessage();

            // NOTE: If we're in this block of code...
            // we should probably redirect to an the error page
            // and show the user a friendly error message
        }

        // Account creation successful, redirect to ICDC page.
        redirect("ICDC.php", "");
        exit();

    }

}


require_once "addICDCScore.html.inc";
    ?>
