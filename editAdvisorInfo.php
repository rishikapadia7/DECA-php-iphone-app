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
            //connect to trillium database
              
            mysql_select_db("trillium", $con);

            //retrieve the current username from the session array

           $username = $_SESSION['username'];

           //retrieve first name for placeholder inside form

           $selectFirstName = mysql_query("SELECT firstName FROM chapterAdvisor WHERE username = '$username';");

           $originalFirstName = mysql_result($selectFirstName, 0);

           //retrieve last name for placeholder inside form

           $selectLastName = mysql_query("SELECT lastName FROM chapterAdvisor WHERE username = '$username';");

           $originalLastName = mysql_result($selectLastName, 0);

            //retrieve email address for placeholder inside form

           $selectEmailAddress = mysql_query("SELECT emailAddress FROM chapterAdvisor WHERE username = '$username';");

           $originalEmailAddress = mysql_result($selectEmailAddress, 0);

// Determine whether form was submitted to itself.
if (isset($_POST['firstName'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $emailAddress = trim($_POST['emailAddress']);
    
    

    // Get the table and column names used for logins with this database
    $cfg = parse_ini_file('classes/access_control.ini', TRUE);
    $user_table = $cfg['account_table']['table'];
    $user_login = $cfg['account_table']['col_login'];
    $user_pass = $cfg['account_table']['col_password'];
    $user_first_name = $cfg['account_table']['col_name_first'];
    $user_last_name = $cfg['account_table']['col_name_last'];
    $user_email = $cfg['account_table']['col_email'];


    // Ensure first name was given.
    if (strlen($firstName) == 0) {
        $error['firstName'] = 'Please provide your first name.';
    }

    // Ensure last name was given.
    if (strlen($lastName) == 0) {
        $error['lastName'] = 'Please provide your last name.';
    }

    $sanitizedEmailAddress = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
    // Ensure that an email address was provided
    if (strlen($emailAddress) == 0) {
        $error['emailAddress'] = 'Please provide your email address.';

        //Ensure that a valid email address was provided
    } elseif (filter_var($sanitizedEmailAddress, FILTER_VALIDATE_EMAIL)) {
    } else {
    $error['emailAddress'] = 'Please provide a valid email address.';
    }

    //get the advisor ID from the session variable
    $advisorID = $_SESSION['advisorID'];
    // If no validation errors, create the new account.
    if (!isset($error)) {

       

        // Now insert the account data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);


            //execute the UPDATE statement
           mysql_query("UPDATE chapterAdvisor SET firstname = '$firstName', lastName = '$lastName', emailAddress = '$emailAddress' WHERE advisorID = '$advisorID';");

           
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
        // Advisor information edited successfully, redirect to login page.
        redirect("advisorInfo.php", "");
        exit();
       
    }

}


// Show the html inc page.
require_once 'editAdvisorInfo.html.inc';


?>
