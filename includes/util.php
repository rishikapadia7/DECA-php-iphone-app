<?php

/*
 * This file is used to store custom "utility" functions that may
 * be useful in various places throughout the system.
 */

/*
 * authenticateUser
 *
 * Takes care of verifying that a user has logged in and has at least
 * $minUserType permissions
 *
 * By default, if a user does not have appropriate permissions, they are
 * re-directed to the main "index" page of the site, where they can log in;
 * however, this can be overridden if the user provides a third argument when
 * calling this function.
 */
function authenticateUser($authObj, $minUserType, $failedAuthRedirect = "index.php")
{
    // if user is not logged in, redirect to the login page
    if(!$authObj->isLoggedIn())
    {
        redirect("login.php","redirect=" . $_SERVER['PHP_SELF']);
        return false;
    }

    // take different actions depending on the type of user
    switch($minUserType)
    {
        case "TEACHER":
            // nothing to do; a logged in user must at least be a teacher
            return true;
            break;
        case "ADMINISTRATOR":
            // only permit administrators to access this page
            if($authObj->session->get("user_type") != "ADMINISTRATOR")
            {
                redirect($failedAuthRedirect,"");
                return false;
            }
            return true;
            break;
        default:
            break;
    }
}

/* 
 * Creates the HTML code for a hyperlink.
 */
function printLink($text, $url, $querystring, $print)
{
    $htmlCode = "<a href='";
    $htmlCode .= $url;

    if(strlen($querystring) > 0)
    {
        $htmlCode .= '?' . $querystring;
    }
    
    $htmlCode .= "'>";
    $htmlCode .= $text;
    $htmlCode .= "</a>";

    if($print)
    {
        echo $htmlCode;
        return;
    }

    return $htmlCode;
}

/* 
 * Redirect to the page that provided the link to the current page.
 * Otherwise redirect to the main site index page.
 */
function redirectToReferer()
{
    if(isset($_GET["redirect"]) && $_GET["redirect"] != "")
    {
        header("Location: " . $_GET["redirect"], true);
    }
    else
    {
        header("Location: index.php", true);
    }
}

/* 
 * Redirect to a location, along with a querystring if needed.
 */
function redirect($location, $querystring = "")
{
    if(strlen($querystring) > 0)
    {
        header("Location: " . $location . "?" . $querystring, true);
    }
    else
    {
        header("Location: " . $location, true);
    }
}

/* 
 * Determine whether a time that was entered is valid or not (e.g.: 12:35PM)
 */
function isValidTime($time)
{
    $regex = "/([0][1-9]|[1][0-2])\:[0-5][0-9][A|P][M]/";
    
    if(preg_match($regex, $time) == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

/* 
 * Convert a time like 12:35AM to a MySQL time (HH:MM)
 * if the time in the original format is valid
 */
function convertTime($time)
{
    // must be done to use some PHP time functions
    date_default_timezone_set("America/New_York");

    if(isValidTime($time))
    {
        return strftime("%H:%M",strtotime($time));
    }
    else
    {
        return false;
    }
}

/*
 * Returns the current user's account ID.
 * Needed to do most queries in the system.
 */
function getAccountID($auth,$db) {

    // Retrieve the account ID from the session object (it might be empty)
    $currentAccountID = trim($auth->session->get("account_id"));
    
    // Get the account ID, if it hasn't been set
    if (strlen($currentAccountID) == 0)
    {

        // Get the names of the database table used for logins
        $cfg = parse_ini_file('classes/access_control.ini', TRUE);
        $user_table = $cfg['account_table']['table'];
        $user_id = $cfg['account_table']['col_id'];
        $user_login = $cfg['account_table']['col_login'];
        $user_pass = $cfg['account_table']['col_password'];

        try
        {
          // Query to get the current user's account ID
          $sql = "SELECT " . $user_id . " as account_id " .
              "FROM " . $user_table . " WHERE " .
              $user_login . "=:login AND " .
              $user_pass . "=:pass";
    
          // prepare the statement based on SQL given
          $stmt = $db->prepare($sql);
    
          // bind the user input
          $stmt->bindParam(':login', $auth->session->get("login"));
          $stmt->bindParam(':pass', $auth->session->get("password"));
          
          // execute the SQL statement
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            // record the error in the error log
            error_log('Error in '.$e->getFile().
              ' Line: '.$e->getLine().
              ' Error: '.$e->getMessage()
          );
    
          // show a friendly error page to the user
          redirect("error.php", "Internal system error.");
        }
        
        // set the account ID
        $currentAccountID = $row['account_id'];
                
    }

    return $currentAccountID;

}

function getUserName($auth,$db) {

    // Retrieve the account ID from the session object (it might be empty)
    $currentUserName = trim($auth->session->get("UserName"));

    // Get the account ID, if it hasn't been set
    if (strlen($currentUserName) == 0)
    {

        // Get the names of the database table used for logins
        $cfg = parse_ini_file('classes/access_control.ini', TRUE);
        $user_table = $cfg['account_table']['table'];
        $user_id = $cfg['account_table']['col_id'];
        $user_login = $cfg['account_table']['col_login'];
        $user_pass = $cfg['account_table']['col_password'];

        try
        {
          // Query to get the current user's account ID
          $sql = "SELECT " . $user_login . " as UserName " .
              "FROM " . $user_table . " WHERE " .
              $user_login . "=:login AND " .
              $user_pass . "=:pass";

          // prepare the statement based on SQL given
          $stmt = $db->prepare($sql);

          // bind the user input
          $stmt->bindParam(':login', $auth->session->get("login"));
          $stmt->bindParam(':pass', $auth->session->get("password"));

          // execute the SQL statement
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            // record the error in the error log
            error_log('Error in '.$e->getFile().
              ' Line: '.$e->getLine().
              ' Error: '.$e->getMessage()
          );

          // show a friendly error page to the user
          redirect("error.php", "Internal system error.");
        }

        $currentUserName = $row['UserName'];

    }

    return $currentUserName;

}
 
?>
