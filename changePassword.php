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
$auth = new Auth($db, "changePassword.php", "SeCrEt-kEeP0u+");

//Set time zone for use with date functions
date_default_timezone_set("America/New_York");

// Only allow a teacher to view this page
if(!authenticateUser($auth, "TEACHER"))
{
    exit(); //Stop execution of the script
}


// Determine whether form was submitted to itself.
if (isset($_POST['currentPassword'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $newPasswordConfirm = trim($_POST['newPasswordConfirm']);
       
    //verify that the original password was provided
       if (strlen($currentPassword) == 0) {
        $error['currentPassword'] = 'Please enter your current Password.';
    }

    //verify that the current password provided is actually valid
    try {
              // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);


            $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

              //get the advisor's id for this session
              $advisorID = $_SESSION['advisorID'];

                //select the original password hash that is stored in the database
              $selectOriginalPasswordHash = mysql_query("SELECT password from chapterAdvisor where advisorID = '$advisorID';");

              
            //get original password HASH
              $originalPasswordHash = mysql_result($selectOriginalPasswordHash, 0);

              //turn the current password into a hash
              $currentPassword = md5($currentPassword);

              //check to make sure that the hash of the current password is the same as the original password
               if ($currentPasswordHash != $originalPasswordHash) {
                $error['currentPassword'] = 'The current password entered is not valid.';
    }
              

              

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

    // Ensure password and confirmation match.
    if ($newPassword != $newPasswordConfirm) {
        $error['newPassword'] = 'New passwords do not match.';
    } else {
        // Ensure password was given.
        if (strlen($newPassword) == 0) {
            $error['password'] = 'Please enter a new Password.';
        }
        // Ensure password confirmation was given.
        if (strlen($newPasswordConfirm) == 0) {
            $error['passwordConfirm'] = 'Please retype your new Password.';
        }
    }

    // If no validation errors, add a new student.
    if (!isset($error)) {

    // Create MD5 hash of password so we don't keep
        // plaintext password laying around
        // (An MD5 has is a one-way text translator -- transforms plaintext into a cryptographic hash)
        // Google "MD5 hash" for more info!
        $passwordHash = md5($newPassword);
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

           $advisorID = $_SESSION['advisorID'];

           $sql = "UPDATE chapterAdvisor SET password = ' . $passwordHash . ' WHERE advisorID = ' . $advisorID .  '";
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

        // Account creation successful, redirect to advisor info page.
        redirect("advisorInfo.php", "");
        exit();
   

}

}
require_once "changePassword.html.inc";
?>