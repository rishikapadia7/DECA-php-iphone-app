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

// Message to display to the user on login screen -- sometimes this is set to show an info message
// or possibly an error
$msg = $_GET['msg'];

// Determine whether login form was submitted to itself.
// If so, try to log the user in.
if (isset($_POST["submit"])) {

    // Validate.
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Ensure username was given.
    if (trim(strlen($login)) == 0) {
        $error["login"] = "Please enter a username.";
    }

    // Ensure password was given.
    if (trim(strlen($password)) == 0) {
        $error["password"] = "Please enter your password.";
    }

    // If no validation errors, log in.
    if (!isset($error)) {

        // Use the login method on the auth object to try logging the user in
        $loginError = $auth->login();

        // If there are no login errors, redirect to the observations page
        if(!isset($loginError))
        {
            redirect("home.php");
            exit();
            //else return an error that there is an invalid username or password combination
        } else {
        $error["status"] = "Invalid username or password combination.";
        }
    } 

}

// Handle a logout, if that was requested
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $auth->logout();

    // Redirect to the logged out system page
    redirect("index.php");
}

// Show the login page
require_once 'login.html.inc';

?>