<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Change Password</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/login.css" type="text/css" media="screen" />
  </head>


     <div id="topbar">
	<div id="title">
		Change Password</div>
         <div id="leftnav">
             <a href="home.php"><img alt="home" src="images/home.png" /></a>
                <a href="advisorInfo.php">Advis...</a></div>
         </div>
    <div id="rightnav">
    <a href="logout.php">Logout</a>
</div>

      <div id="body">
            <br/>            
                       
            <form id="changePassword" name="changePassword" action="changePassword.php" method="POST">
                <fieldset><span class="graytitle">Current Password</span>
		<ul class="pageitem">
			<li class="bigfield"><input value="<?php echo $currentPassword ?>" type="password" id="currentPassword" name="currentPassword" placeholder="Current Password"></li>
		</ul>
		<fieldset><span class="graytitle">New Password</span>
		<ul class="pageitem">
			
			<!-- Enter new password -->
			
			<li class="bigfield"><input type="password" id="newPassword" name="newPassword" maxlength="45" placeholder="New Password"
                                  value="<?php echo $newPassword ?>"</li>
			
			<li class="bigfield"><input type="password" id="newPasswordConfirm" name="newPasswordConfirm" maxlength="45" placeholder="Retype New Password"
                                  value="<?php echo $newPasswordConfirm ?>" />

		</ul>
              
                <input type="submit" id="submit" name="submit" value="Change Password" />
                
            </form>

       </div>

      <!-- display errors of why the user cannot create an account-->
  <div class="error" >

        <span class="error"><?php echo $error["currentPassword"]; ?></span> <br/>
        <span class="error"><?php echo $error["newPassword"]; ?></span> <br/>
        <span class="error"><?php echo $error["newPasswordConfirm"]; ?></span> <br/>
  </div>

  </body>
</html>
