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

$con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }

            mysql_select_db("trillium", $con);

           //retrieve the current user's ID using the function in util.php
           $storedID = $_SESSION['advisorID'];


           $chapterName = $_SESSION['chapterName'];

           $selectschoolName = mysql_query("SELECT schoolName FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $schoolName = mysql_result($selectschoolName, 0);

           $selectstreetAddress = mysql_query("SELECT streetAddress FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $streetAddress = mysql_result($selectstreetAddress, 0);

           $selectcity = mysql_query("SELECT city FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $city = mysql_result($selectcity, 0);

           $selectpostalCode = mysql_query("SELECT postalCode FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $postalCode = mysql_result($selectpostalCode, 0);

           
           $selectregionID = mysql_query("SELECT region_regionID FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $regionID = mysql_result($selectregionID, 0);

           $selectregion = mysql_query("SELECT regionName FROM region WHERE regionID = '$regionID';");
           $region = mysql_result($selectregion, 0);



           $selectprovinceID = mysql_query("SELECT province_provinceID FROM chapter WHERE chapterAdvisor_advisorID = '$storedID';");

           $provinceID = mysql_result($selectprovinceID, 0);

           $selectprovince = mysql_query("SELECT provinceName FROM province WHERE provinceID = '$provinceID';");

           $province = mysql_result($selectprovince, 0);


           

require_once "chapterinfo.html.inc";
    ?>
