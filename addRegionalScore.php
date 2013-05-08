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

$studentID = $_SESSION['studentID'];

// Determine whether form was submitted to itself.
if (isset($_POST['eventName3'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    
    $eventName3 = trim($_POST['eventName3']);
    $oralOneScore3 = trim($_POST['oralOneScore3']);
    $writtenScore3 = trim($_POST['writtenScore3']);
    $totalScore = trim($_POST['totalScore']);
    $rank3 = trim($_POST['rank3']);

    

  
        // Verify that a oralOneScore3 was provided
    if (strlen($oralOneScore3) == 0) {
        $error['oralOneScore3'] = 'Please enter a First Oral Presentation Score.';
    }

    //verify that the value provided is a number
    if (is_numeric($oralOneScore3)) {

    } else {
        $error['oralOneScore3'] = 'Please enter a valid First Oral Presentation Score.';
    }


        // Verify that a writtenScore was provided
    if (strlen($writtenScore3) == 0) {
        $error['writtenScore3'] = 'Please enter a Written Test or Report Result.';
    }

    //verify that the value provided is a number
    if (is_numeric($writtenScore3)) {

    } else {
        $error['writtenScore3'] = 'Please enter a valid Written Test or Report Result.';
    }

   

        // Verify that a rank was provided
    if (strlen($rank3) == 0) {
        $error['rank3'] = 'Please enter a rank.';
    }

    //verify that the value provided is a number
    if (is_numeric($rank3)) {

    } else {
        $error['rank3'] = 'Please enter a valid rank.';
    }

    // Ensure event name was given.
    if (strlen($eventName3) == 0) {
        $error['eventName3'] = 'Please provide an Event name.';
    }

    // If no validation errors, add a new competition record.
    if (!isset($error)) {


        // Now insert the data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);

            //connect to the database
            $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

           mysql_select_db('trillium', $con);


//           INSERT INTO regionalCompetitions table
$sql = mysql_query("INSERT INTO regionalCompetitions (regionalCompetitionsID, oralPresentationResultOne, writtenTestResult, rank) 
VALUES ('','$oralOneScore3','$writtenScore3','$rank3')");

//retrieve the competition's ID by grabbing the id of the last autoincrement insert value
$regionalCompetitionsID3 = mysql_insert_id();

//           INSERT INTO student_has_regionalCompetitions table
$sql = mysql_query("INSERT INTO student_has_regionalCompetitions (student_studentID, regionalCompetitions_regionalCompetitionsID)
VALUES ('$studentID','$regionalCompetitionsID3')");
           
           //insert into Events the value that was given
$sql = mysql_query("INSERT INTO events (eventName)
VALUES ('$eventName3')");
           
//retrieve the event's ID by grabbing the id of the last autoincrement insert value
$eventsID3 = mysql_insert_id();

//INSERT INTO regionalCompetitions_has_events table
$sql = mysql_query("INSERT INTO regionalCompetitions_has_events (regionalCompetitions_regionalCompetitionsID, events_eventsID)
VALUES ('$regionalCompetitionsID3','$eventsID3')");
           


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

        // Account creation successful, redirect to login page.
        redirect("regionals.php", "");
        exit();

    }

}


require_once "addRegionalScore.html.inc";
    ?>
