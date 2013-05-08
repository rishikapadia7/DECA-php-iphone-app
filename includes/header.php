<!-- use this file to store the HTML / PHP req'd for a universal header -->
<div style="float:left;">

  <!-- Login or Create Account / Logout -->
    <?php

        // Set a variable that contains the current page URL being loaded
        $pageURL = $_SERVER["PHP_SELF"];

        // Re-add GET form variables to the page URL, if any were present
        if(isset($_GET))
        {
            $pageURL .= "?";
            foreach($_GET as $varname=>$varvalue)
            {
                $pageURL .= $varname . "=" . $varvalue;
                $pageURL .= "&";
            }
        }

        // links to display if the user is logged in
        if($auth->isLoggedIn())
        {
            switch($auth->session->get("user_type"))
            {
                case "ADMINISTRATOR":
                    printLink("Manage Site", "manageSite.php", "", true);
                    echo "&nbsp;|&nbsp;";
                    break;
                case "TEACHER":
                    break;
                default:
                    break;
            }

            printLink("Modify Account Details",  "modifyAccount.php", "", true);

            echo "&nbsp;|&nbsp;";

            printLink("Logout", "login.php", "action=logout&redirect" .
                                 $pageURL, true);
        }
        //Links to display if the user is not logged in
        else
        {
            printLink("Login", "login.php", "redirect=" .
                                 $pageURL, true);

            echo "&nbsp;|&nbsp;";

            $header .= printLink("Create an Account", "createAccount.php", "", true);
        }
    ?>
</div>
<div style="float:right;">
  <!-- Home | About | Privacy Policy | Contact Us -->
  <a href="index.php">Home</a>&nbsp;|&nbsp;<a href="about.php">About</a>&nbsp;|&nbsp;<a href="privacyPolicy.php">Privacy Policy</a>&nbsp;|&nbsp;<a href="contactUs.php">Contact Us</a>
</div>