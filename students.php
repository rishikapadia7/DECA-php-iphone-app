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

//get chapterID from the session array
$chapterID = $_SESSION['chapterID'];

//get student ID
$selectstudentID = mysql_query("SELECT studentID FROM student WHERE chapter_chapterID = '$chapterID';");

$studentID = mysql_fetch_row($selectstudentID, 0);

if ($studentID == false) {

    redirect("addStudent.php", "");
    exit();
}


//build a query to select the first and last name of students in an alphabetical order
$selectFirstLastID = mysql_query("SELECT lastName, firstName, studentID FROM student WHERE chapter_chapterID = '$chapterID' ORDER BY lastName;") or die(mysql_error());


require_once "students.html.inc";
    ?>
