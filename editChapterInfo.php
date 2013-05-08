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

            mysql_select_db("trillium", $con);

            //retrieve the current username from the session array

           $chapterID = $_SESSION['chapterID'];

           //retrieve Chapter Name for placeholder inside form
           $selectChapterName = mysql_query("SELECT chapterName FROM chapter WHERE chapterID = '$chapterID';");

           $originalChapterName = mysql_result($selectChapterName, 0);

           $selectSchoolName = mysql_query("SELECT schoolName FROM chapter WHERE chapterID = '$chapterID';");

           $originalSchoolName = mysql_result($selectSchoolName, 0);

           $selectStreetAddress = mysql_query("SELECT streetAddress FROM chapter WHERE chapterID = '$chapterID';");

           $originalStreetAddress = mysql_result($selectStreetAddress, 0);

           $selectCity = mysql_query("SELECT city FROM chapter WHERE chapterID = '$chapterID';");

           $originalCity = mysql_result($selectCity, 0);

           $selectPostalCode = mysql_query("SELECT postalCode FROM chapter WHERE chapterID = '$chapterID';");

           $originalPostalCode = mysql_result($selectPostalCode, 0);

      


// Determine whether form was submitted to itself.
if (isset($_POST['chapterName'])) {

    // Pull form values out of the $_POST array into more readable variables
    // Trim whitespace on left and right side of each string
    
    $chapterName = trim($_POST['chapterName']);
    $schoolName = trim($_POST['schoolName']);
    $streetAddress = trim($_POST['streetAddress']);
    $city= trim($_POST['city']);
    $postalCode = trim($_POST['postalCode']);

    
        // Ensure chapterName was given.
    if (strlen($chapterName) == 0) {
        $error['chapterName'] = 'Please provide your chapter name.';
    }


     // Ensure schoolName was given.
    if (strlen($schoolName) == 0) {
        $error['schoolName'] = 'Please provide your school name.';
    }


    // Ensure streetAddress was given.
    if (strlen($streetAddress) == 0) {
        $error['streetAddress'] = 'Please provide the street address of your chapter.';
    }

    // Ensure City was given.
    if (strlen($city) == 0) {
        $error['city'] = 'Please provide the name of the city in which your chapter is located.';
    }


    // Ensure postalCode was given.
    if (strlen($postalCode) == 0) {
        $error['postalCode'] = 'Please provide the postal code of your chapter.';
    }

    //Grab the province and region values from the form
    $province = $_POST["province"];
    $region = $_POST["region"];

       // If no validation errors, create the new account.
    if (!isset($error)) {

       

        // Now insert the account data into the database
        try
        {
            // set the error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);


            //execute the UPDATE statement
           mysql_query("UPDATE chapter SET chapterName = '$chapterName', schoolName = '$schoolName', streetAddress = '$streetAddress', city = '$city', postalCode = '$postalCode', province_provinceID = '$province', region_regionID = '$region' WHERE chapterID = '$chapterID';");

           
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
        redirect("chapterInfo.php", "");
        exit();
       
    }

}


// Show the html inc page.
require_once 'editChapterInfo.html.inc';


?>
