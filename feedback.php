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


// Determine whether form was submitted to itself.
if (isset($_POST['textArea'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $subject = trim($_POST['subject']);
    $textArea = trim($_POST['textArea']);

   

    // Ensure subject was given.
    if (strlen($subject) == 0) {
        $error['subject'] = 'Please provide a first name.';
    }

    // Ensure lastName was given.
    if (strlen(textArea) == 0) {
        $error['textArea'] = 'Please provide a description of the problem or suggestion.';
    }
    // If no validation errors, add a new student.
    if (!isset($error)) {


        // Now insert the data into the database
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

           //retrieve the advisor's ID
           $advisorID = $_SESSION['advisorID'];

           $sql = "INSERT INTO feedback VALUES ('','$subject','$textArea','$advisorID')";
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

      
    }
      // Feedback successful, redirect to home page.
        redirect("feedbackSent.php", "");
        exit();

}


require_once "feedback.html.inc";

?>