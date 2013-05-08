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


session_start();

// Determine whether form was submitted to itself.
if (isset($_POST['studentNumber'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $studentNumber = trim($_POST['studentNumber']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $emailAddress = trim($_POST['emailAddress']);
    $homeroom = trim($_POST['homeroom']);
    $grade = trim($_POST['grade']);
    

    // Verify that a student number was provided
    if (strlen($studentNumber) == 0) {
        $error['studentNumber'] = 'Please enter a Student Number.';
    }
    // Verify that the student number is numeric
    if (is_numeric($studentNumber)) {

    } else {
        $error['studentNumber'] = 'Please enter a valid Student Number.';
    }

    // Ensure firstName was given.
    if (strlen($firstName) == 0) {
        $error['firstName'] = 'Please provide a first name.';
    }

    // Ensure lastName was given.
    if (strlen($lastName) == 0) {
        $error['lastName'] = 'Please provide a last name.';
    }

    $sanitizedEmailAddress = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
    // Ensure that a valid email address was provided if provided
    if (strlen($emailAddress) != 0) {
        if (filter_var($sanitizedEmailAddress, FILTER_VALIDATE_EMAIL)) {
    } else {
    $error['emailAddress'] = 'Please provide a valid email address.';
    }
    }

    // If no validation errors, add a new student.
    if (!isset($error)) {

        
        // Now insert the account data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);

        
            $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

           mysql_select_db('trillium', $con);

           $chapterID = $_SESSION['chapterID'];
           
           $sql = "INSERT INTO student (studentNumber, firstName, lastName, emailAddress, homeroom, grade, chapter_chapterID)
                VALUES ('$studentNumber','$firstName','$lastName','$emailAddress','$homeroom','$grade','$chapterID')";
           $stmt = $db->prepare($sql);
           $stmt->execute();

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

        // Student creation successful, redirect to login page.
        redirect("students.php", "");
        exit();

    }

}


require_once "addStudent.html.inc";
?>
