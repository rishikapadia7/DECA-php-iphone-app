<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Edit Advisor Info</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>
    <body>

        <div id="topbar">
	<div id="title">Edit Advisor Info</div>
                <div id="leftnav">
		<a href="login.php">Login</a></div>
        </div>



        <div id="content">
            <br/>
            <form name="editAdvisorInfo" action="editAdvisorInfo.php" method="POST">
                
                
                   
                    <!-- First Name -->
                    <span class="graytitle">First Name:</span>
                    <ul class="pageitem">
                                   <li class="bigfield"><input type="text" id="firstName" name="firstName" maxlength="45" placeholder="<?php echo $originalFirstName ?>"
                                          value="<?php echo $firstName ?>" />
                                   </li>
                    </ul>

                    <!-- Last Name -->
                    <span class="graytitle">Last Name:</span>
                    <ul class="pageitem">
                     <li class="bigfield"><input type="text" id="lastName" name="lastName" maxlength="45" placeholder="<?php echo $originalLastName ?>"
                                  value="<?php echo $lastName ?>" />
                    </li>
                    </ul>

                    <!-- Email Address -->
                    <span class="graytitle">Email Address:</span>
                    <ul class="pageitem">
                      <li class="bigfield"><input type="text" id="emailAddress" name="emailAddress" maxlength="100" placeholder="<?php echo $originalEmailAddress ?>"
                                  value="<?php echo $emailAddress ?>" />
                           </li>
                    </ul>
               
                    <input type="submit" id="submit" name="submit" value="Update" />
               </form>
            <br>

        </div>

        <!-- display errors of why the user cannot create an account-->
  <div class="error" >
        <span class="error"><?php echo $error["firstName"]; ?></span> <br/>
        <span class="error"><?php echo $error["lastName"]; ?></span> <br/>
        <span class="error"><?php echo $error["emailAddress"]; ?></span> <br/>

        
  </div>

    </body>
</html>
