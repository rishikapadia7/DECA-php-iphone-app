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

//Create authentication object
$auth = new Auth($db, "createAccount.php", "SeCrEt-kEeP0u+");

//Set time zone for use with date functions
date_default_timezone_set("America/New_York");

// Only allow a teacher to view this page
if(!authenticateUser($auth, "TEACHER"))
{
    exit(); //Stop execution of the script
}

//connect to the mysql database
$con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }
            //connect to the trillium database
            mysql_select_db("trillium", $con);

            //retrieve the current username from the session array

           $studentID = $_SESSION['studentID'];

           //retrieve Student Number for placeholder inside form
           $selectStudentNumber = mysql_query("SELECT studentNumber FROM student WHERE studentID = '$studentID';");

           $originalStudentNumber = mysql_result($selectStudentNumber, 0);

           //retrieve the first name for placeholder inside form
           $selectFirstName = mysql_query("SELECT firstName FROM student WHERE studentID = '$studentID';");

           $originalFirstName = mysql_result($selectFirstName, 0);

           //retrieve the last name for placeholder inside form
           $selectLastName = mysql_query("SELECT lastName FROM student WHERE studentID = '$studentID';");

           $originalLastName = mysql_result($selectLastName, 0);

           //retrieve the email address for placeholder inside form
           $selectEmailAddress = mysql_query("SELECT emailAddress FROM student WHERE studentID = '$studentID';");

           $originalEmailAddress = mysql_result($selectEmailAddress, 0);

           //retrieve the homeroom for placeholder inside form
           $selectHomeroom = mysql_query("SELECT homeroom FROM student WHERE studentID = '$studentID';");

           $originalHomeroom = mysql_result($selectHomeroom, 0);

           //retrieve the grade for placeholder inside form
           $selectGrade = mysql_query("SELECT grade FROM student WHERE studentID = '$studentID';");

           $originalGrade = mysql_result($selectGrade, 0);
           


// Determine whether form was submitted to itself.
if (isset($_POST['studentNumber2'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    
  // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $studentNumber2 = trim($_POST['studentNumber2']);
    $firstName2 = trim($_POST['firstName2']);
    $lastName2 = trim($_POST['lastName2']);
    $emailAddress2 = trim($_POST['emailAddress2']);
    $homeroom2 = trim($_POST['homeroom2']);
    $grade2 = trim($_POST['grade2']);
    
       // Verify that a student Number was provided
    if (strlen($studentNumber2) == 0) {
        $error['studentNumber2'] = 'Please enter a Student Number.';
    }
    //verify the value given was numberic
    if (is_numeric($studentNumber2)) {

    } else {
        $error['studentNumber2'] = 'Please enter a valid Student Number.';
    }



    // Ensure firstName2 was given.
    if (strlen($firstName2) == 0) {
        $error['firstName2'] = 'Please provide a first name.';
    }

    // Ensure lastName2 was given.
    if (strlen($lastName2) == 0) {
        $error['lastName2'] = 'Please provide a last name.';
    }

    $sanitizedEmailAddress = filter_var($emailAddress2, FILTER_SANITIZE_EMAIL);
    // Ensure that a valid email address was provided if provided
    if (strlen($emailAddress2) != 0) {
        if (filter_var($sanitizedEmailAddress, FILTER_VALIDATE_EMAIL)) {
    } else {
    $error['emailAddress2'] = 'Please provide a valid email address.';
    }
    }

       // If no validation errors, create the new account.
    if (!isset($error)) {

       

        // Now insert the account data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);


            //execute the UPDATE statement
           mysql_query("UPDATE student SET studentNumber = '$studentNumber2', firstName = '$firstName2', lastName = '$lastName2', emailAddress = '$emailAddress2', homeroom = '$homeroom2', grade = '$grade2' WHERE studentID = '$studentID';");

           
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
        redirect("studentGeneral.php", "");
        exit();
       
    }

}


// Show the html inc page.
require_once 'editStudentGeneral.html.inc';


?>
