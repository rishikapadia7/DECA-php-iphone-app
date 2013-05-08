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
<title>Login</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/login.css" type="text/css" media="screen" />
  </head>


    <!-- Onload value causes the cursor to be placed in the login field when the page loads -->
  <body onload="document.loginForm.login.focus();">
<!--Navigation Elements-->
     <div id="topbar">
	<div id="title">
		Login</div>
    <div id="rightnav">
		<a href="createAccount.php">Create Account</a></div>
</div>

      <div id="body">
            <br/>            
                       
            <form id="loginForm" name="loginForm" action="login.php" method="POST">
                <fieldset><span class="graytitle">Enter Login Information</span>
		<ul class="pageitem">
			<li class="bigfield"><input placeholder="Username" type="text" id="login" name="login" value="<?php echo $login; ?>"/></li>
			<li class="bigfield"><input placeholder="Password" type="password" id="password" name="password" value="<?php echo $_POST['password']; ?>"/></li>

		</ul>
              
                <input type="submit" id="submit" name="submit" value="Login" />
                
            </form>

                <?php

                    // All errors shown here
                    if(isset($error) || isset($loginError))
                    {
                        echo "<br />";
                        echo "<div id='loginError'>";

                        if(isset($_GET["msg"]))
                        {
                            echo $_GET["msg"];
                        }
                        else if(isset($error["login"]))
                        {
                            echo $error["login"];
                        }
                        else if(isset($error["password"]))
                        {
                            echo $error["password"];
                        }
                        else if(isset($error["status"]))
                        {
                            echo $error["status"];
                        }
                        else
                        {
                            echo $loginError;
                        }

                        echo "</div>";
                    }
                 ?>
                
                
            </div>
      </div>

      

  </body>
</html>
