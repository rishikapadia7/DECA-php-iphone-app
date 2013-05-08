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

// Determine whether form was submitted to itself.
if (isset($_POST['username'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    $username = trim($_POST['username']);
    $username2 = "$username";
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $emailAddress = trim($_POST['emailAddress']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['passwordConfirm']);
    $chapterName = trim($_POST['chapterName']);
    $schoolName = trim($_POST['schoolName']);
    $streetAddress = trim($_POST['streetAddress']);
    $city= trim($_POST['city']);
    $postalCode = trim($_POST['postalCode']);

    // Verify that a username was provided
    if (strlen($username) == 0) {
        $error['username'] = 'Please enter a username.';
    }

    // Get the table and column names used for logins with this database
    $cfg = parse_ini_file('classes/access_control.ini', TRUE);
    $user_table = $cfg['account_table']['table'];
    $user_login = $cfg['account_table']['col_login'];
    $user_pass = $cfg['account_table']['col_password'];
    $user_first_name = $cfg['account_table']['col_name_first'];
    $user_last_name = $cfg['account_table']['col_name_last'];
    $user_email = $cfg['account_table']['col_email'];

    // Verify that username has not already been selected
    try
    {
        // Build and prepare the query
        $sql = "SELECT COUNT(" . $user_login . ") AS number_of_usernames " .
                "FROM " . $user_table . " " .
                "WHERE " . $user_login . " = :username";
        $stmt = $db->prepare($sql);

        // Load the username provided in the form into the query
        $stmt->bindParam(":username", $username);

        // Run the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if($row["number_of_usernames"] != 0)
        {
            $error["name"] = "This username already exists. Please select another one.";
        }
    }
    catch(PDOException $e)
    {
        error_log('Error in '.$e->getFile().
                  ' Line: '.$e->getLine().
                  ' Error: '.$e->getMessage());
    }

    // Verify that chapterName has not already been selected
    try
    {
        // Build and prepare the query
        $sql = "SELECT COUNT(" . $chapterName . ") AS number_of_chapterNames " .
                "FROM  chapter " .
                "WHERE chapterName = :chapterName";
        $stmt = $db->prepare($sql);

        // Load the username provided in the form into the query
        $stmt->bindParam(":chapterName", $chapterName);

        // Run the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row["number_of_chapterNames"] != 0)
        {
            $error["chapterName"] = "This Chapter Name already exists. Please select another one.";
        }
    }
    catch(PDOException $e)
    {
        error_log('Error in '.$e->getFile().
                  ' Line: '.$e->getLine().
                  ' Error: '.$e->getMessage());
    }


    // Ensure password and confirmation match.
    if ($password != $passwordConfirm) {
        $error['password'] = 'Password does not match the confirmation value.';
    } else {
        // Ensure password was given.
        if (strlen($password) == 0) {
            $error['password'] = 'Please enter your password.';
        }
        // Ensure password confirmation was given.
        if (strlen($passwordConfirm) == 0) {
            $error['passwordConfirm'] = 'Please retype your password.';
        }
    }

    // Ensure firstName was given.
    if (strlen($firstName) == 0) {
        $error['firstName'] = 'Please provide your first name.';
    }

    // Ensure lastName was given.
    if (strlen($lastName) == 0) {
        $error['lastName'] = 'Please provide your last name.';
    }

     // Ensure chapterName was given.
    if (strlen($chapterName) == 0) {
        $error['chapterName'] = 'Please provide your chapter name.';
    }


     // Ensure schoolName was given.
    if (strlen($schoolName) == 0) {
        $error['schoolName'] = 'Please provide your school name.';
    }


    // Ensure street address was given.
    if (strlen($streetAddress) == 0) {
        $error['streetAddress'] = 'Please provide the street address of your chapter.';
    }

    // Ensure a city name was given.
    if (strlen($city) == 0) {
        $error['city'] = 'Please provide the name of the city in which your chapter is located.';
    }


    // Ensure a postal code was given.
    if (strlen($postalCode) == 0) {
        $error['postalCode'] = 'Please provide the postal code of your chapter.';
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

    $province = $_POST["province"];
    $region = $_POST["region"];
    // TO DO NOTE: Should also add a check here with a regular expression to be sure the email address
    // has the correct format.  Google for the regular expresssion to use (it's kinda nasty / hard to write from scratch).



    // If no validation errors, create the new account.
    if (!isset($error)) {

        // Create MD5 hash of password so we don't keep
        // plaintext password laying around
        // (An MD5 has is a one-way text translator -- transforms plaintext into a cryptographic hash)
        // Google "MD5 hash" for more info!
        $passwordHash = md5($password);

        // Now insert the account data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO " . $user_table . " (" .
                                         $user_login . ", " .
                                         $user_pass . ", " .
                                         $user_first_name . ", " .
                                         $user_last_name . ", " .
                                         $user_email . ") " .
                                   " VALUES (:username, " .
                                            ":password, " .
                                            ":firstName, " .
                                            ":lastName, " .
                                            ":emailAddress); ";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':emailAddress', $emailAddress);

            $stmt->execute();

            $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

            mysql_select_db("trillium", $con);

           $select = mysql_query("SELECT advisorID as advisorID FROM chapterAdvisor WHERE username = '$username2';");
           //mysql_query($select);

//           $stmt = $db->prepare($select);
//           $stmt->execute();

           $advisorID = mysql_result($select, 0);
           //$advisorID = ($_POST['advisorID']);

           $sql = "INSERT INTO chapter (chapterName, schoolName, streetAddress, city, postalCode, province_provinceID, chapterAdvisor_advisorID, region_regionID)
                VALUES ('$chapterName','$schoolName','$streetAddress','$city','$postalCode','$province','$advisorID','$region')";
           $stmt = $db->prepare($sql);
           $stmt->execute();
// set the error mode to exception
//            $db->setAttribute(PDO::ATTR_ERRMODE,
//                              PDO::ERRMODE_EXCEPTION);
//
//            $sql = "INSERT INTO " . chapter . " (" .
//                                         chapterName . ", " .
//                                         schoolName . ", " .
//                                         streetAddress . ", " .
//                                         city . ", " .
//                                         postalCode . ", " .
//                                         province_provinceID . ", " .
//                                         chapterAdvisor_advisorID . ", " .
//                                         region_regionID . ") " .
//                                   " VALUES (:chapterName, " .
//                                            ":schoolName, " .
//                                            ":streetAddress, " .
//                                            ":city, " .
//                                            ":postalCode, " .
//                                            ":province, " .
//                                            ":advisorID, " .
//                                            ":region); ";
//            $stmt = $db->prepare($sql);
//            $stmt->bindParam(':chapterName', $chapterName);
//            $stmt->bindParam(':schoolName', $schoolName);
//            $stmt->bindParam(':streetAddress', $streetAddress);
//            $stmt->bindParam(':city', $city);
//            $stmt->bindParam(':postalCode', $postalCode);
//            $stmt->bindParam(':province', $province);
//            $stmt->bindParam(':advisorID', $advisorID);
//            $stmt->bindParam(':region', $region);
//
//
//           $stmt->execute();

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
        redirect("accountCreated.php", "");
        exit();

    }

}


// Show the login page.
require_once 'createAccount.html.inc';


?>
