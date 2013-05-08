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
        <title>Edit Student Information</title>
        <meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
        <meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>
    <body>


<!--        add navigation elements-->
        <div id="topbar">
	<div id="title">Edit Student Info</div>
                <div id="leftnav">
		<a href="studentGeneral.php">Stud...</a></div>
        </div>



        <div id="content">
            <br/>
            <form name="editStudentGeneral" action="editStudentGeneral.php" method="POST">



                    <!-- Student Number -->
                    <span class="graytitle">Student Number:</span>
                    <ul class="pageitem">
                                   <li class="bigfield"><input type="text" id="studentNumber2" name="studentNumber2" maxlength="45" placeholder="<?php echo $originalStudentNumber ?>"
                                          value="<?php echo $studentNumber2 ?>" />
                                   </li>
                    </ul>

                    <!-- First Name -->
                    <span class="graytitle">First Name:</span>
                    <ul class="pageitem">
                     <li class="bigfield"><input type="text" id="firstName2" name="firstName2" maxlength="45" placeholder="<?php echo $originalFirstName ?>"
                                  value="<?php echo $firstName2 ?>" />
                    </li>
                    </ul>

                    <!-- Last Name -->
                    <span class="graytitle">Last Name:</span>
                    <ul class="pageitem">
                     <li class="bigfield"><input type="text" id="lastName2" name="lastName2" maxlength="45" placeholder="<?php echo $originalLastName ?>"
                                  value="<?php echo $lastName2 ?>" />
                    </li>
                    </ul>


                    <!-- Email Address -->
                    <span class="graytitle">Email Address:</span>
                    <ul class="pageitem">
                      <li class="bigfield"><input type="text" id="emailAddress2" name="emailAddress2" maxlength="100" placeholder="<?php echo $originalEmailAddress ?>"
                                  value="<?php echo $emailAddress2 ?>" />
                           </li>
                    </ul>

                    <!-- Homeroom -->
                    <span class="graytitle">Homeroom:</span>
                    <ul class="pageitem">
                     <li class="bigfield"><input type="text" id="homeroom2" name="homeroom2" maxlength="45" placeholder="<?php echo $originalhomeroom ?>"
                                  value="<?php echo $homeroom2 ?>" />
                    </li>
                    </ul>

                     <!-- Grade -->
                    <span class="graytitle">Grade:</span>
                    <ul class="pageitem">
                     <li class="bigfield"><input type="text" id="grade2" name="grade2" maxlength="45" placeholder="<?php echo $originalGrade ?>"
                                  value="<?php echo $grade2?>" />
                    </li>
                    </ul>

                    <input type="submit" id="submit" name="submit" value="Update" />
               </form>
            <br>

        </div>

        <!-- display errors of why the user cannot create an account-->
  <div class="error" >
        <span class="error"><?php echo $error["studentNumber2"]; ?></span> <br/>
        <span class="error"><?php echo $error["firstName2"]; ?></span> <br/>
        <span class="error"><?php echo $error["lastName2"]; ?></span> <br/>
        <span class="error"><?php echo $error["emailAddress2"]; ?></span> <br/>
        <span class="error"><?php echo $error["homeroom2"]; ?></span> <br/>
        <span class="error"><?php echo $error["grade2"]; ?></span> <br/>

  </div>

    </body>
</html>
