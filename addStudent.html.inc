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
<title>Add Student</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>


<body>

    <div id="topbar">
        <div id="title">
		Add Student</div>

        <div id='leftnav'>
        	<a href="home.php"><img alt="home" src="images/home.png" /></a>
                <a href="students.php">Stud...</a></div>
    </div>


<div id="content">
    <br>
	<form name="addStudent" action="addStudent.php" method="POST">
	 <table cellspacing="10px" cellpadding="10px">
            
                   <ul class="pageitem">
                       		<!-- Student Number -->
                           <li class="bigfield"><input type="text" id="studentNumber" name="studentNumber" maxlength="45" placeholder="Student Number*"
                                  value="<?php echo $studentNumber ?>" />
                           </li>

                    <!-- First Name -->
                           <li class="bigfield"><input type="text" id="firstName" name="firstName" maxlength="45" placeholder="First Name*"
                                  value="<?php echo $firstName ?>" />
                           </li>

                    <!-- Last Name -->
                     <li class="bigfield"><input type="text" id="lastName" name="lastName" maxlength="45" placeholder="Last Name*"
                                  value="<?php echo $lastName ?>" />
                      </li>
                    <!-- Email Address -->
                      <li class="bigfield"><input type="text" id="emailAddress" name="emailAddress" maxlength="100" placeholder="Email Address"
                                  value="<?php echo $emailAddress ?>" />
                       </li>

                       <!-- Homeroom -->
                      <li class="bigfield"><input type="text" id="homeroom" name="homeroom" maxlength="45" placeholder="Homeroom"
                                  value="<?php echo $homeroom ?>" />
                      </li>

                      <!-- Grade -->
                      <li class="bigfield"><input type="" id="grade" name="grade" maxlength="45" placeholder="grade"
                                  value="<?php echo $grade ?>" />
                      </li>

                   </ul>
                </table>

              <input type="submit" id="submit" name="submit" value="Add" />
          </form>
    
</div>
<!--Show error messages here-->
     <div class="error" >
        <span class="error"><?php echo $error["studentNumber"]; ?></span><br>
        <span class="error"><?php echo $error["firstName"]; ?></span><br>
        <span class="error"><?php echo $error["lastName"]; ?></span><br>
        <span class="error"><?php echo $error["emailAddress"]; ?></span><br>
        <span class="error"><?php echo $error["homeroom"]; ?></span><br>
        <span class="error"><?php echo $error["grade"]; ?></span><br>

    </div>

</body>

</html>
