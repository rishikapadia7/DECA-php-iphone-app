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




//get the ID of the student
$_SESSION['studentID'] = $_GET['id'];

$studentID = $_SESSION['studentID'];



//get the following information based on the student ID
$selectstudentNumber = mysql_query("SELECT studentNumber FROM student WHERE studentID = '$studentID';");

$studentNumber = mysql_result($selectstudentNumber, 0);

$selectfirstName = mysql_query("SELECT firstName FROM student WHERE studentID = '$studentID';");

$firstName = mysql_result($selectfirstName, 0);

$selectlastName = mysql_query("SELECT lastName FROM student WHERE studentID = '$studentID';");

$lastName = mysql_result($selectlastName, 0);

$selectemailAddress = mysql_query("SELECT emailAddress FROM student WHERE studentID = '$studentID';");

$emailAddress = mysql_result($selectemailAddress, 0);

$selecthomeroom = mysql_query("SELECT homeroom FROM student WHERE studentID = '$studentID';");

$homeroom = mysql_result($selecthomeroom, 0);


$selectgrade = mysql_query("SELECT grade FROM student WHERE studentID = '$studentID';");

$grade = mysql_result($selectgrade, 0);



require_once "studentGeneral.html.inc";
    ?>
