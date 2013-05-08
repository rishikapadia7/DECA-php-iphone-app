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
        <title>Create Account</title>
        <meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
        <meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>
    <body>
    <!--add navigation elements-->
        <div id="topbar">
	<div id="title">Create Account</div>
                <div id="leftnav">
		<a href="login.php">Login</a>
                </div>
        </div>


       <div id="content">
            <br/>
<!--        Form for entering information required to create the advisor account-->
            <form name="createAccount" action="CreateAccount.php" method="POST">
                <fieldset><span class="graytitle">User Information:</span>
                <table cellspacing="10px" cellpadding="10px">

                   <ul class="pageitem">
                            <!-- Username -->
                           <li class="bigfield"><input type="text" id="username" name="username" maxlength="45" placeholder="Username"
                                  value="<?php echo $username ?>" /></li>

                           <!-- First Name -->
                           <li class="bigfield"><input type="text" id="firstName" name="firstName" maxlength="45" placeholder="First Name"
                                  value="<?php echo $firstName ?>" /></li>

                           <!-- Last Name -->
                           <li class="bigfield"><input type="text" id="lastName" name="lastName" maxlength="45" placeholder="Last Name"
                                  value="<?php echo $lastName ?>" /></li>

                           <!-- Email Address -->
                            <li class="bigfield"><input type="text" id="emailAddress" name="emailAddress" maxlength="100" placeholder="Email Address"
                                  value="<?php echo $emailAddress ?>" /></li>

                           <!-- Password -->
                            <li class="bigfield"><input type="password" id="password" name="password" maxlength="45" placeholder="Password"
                                  value="<?php echo $password ?>" /></li>

                           <!-- Password Confirmation -->
                            <li class="bigfield"><input type="password" id="passwordConfirm" name="passwordConfirm" maxlength="45" placeholder="Retype Password"
                                  value="<?php echo $passwordConfirm ?>" /></li>

                   </ul>
                </table>
<!--Information fields for information about the chapter-->
                    <span class="graytitle">Chapter Information:</span>
                    <table cellspacing="10px" cellpadding="10px">
                    <!-- Chapter name -->
                   <ul class="pageitem">
                    <!--Chapter Name-->
                       <li class="bigfield"><input type="text" id="chapterName" name="chapterName" maxlength="45" placeholder="Chapter Name"
                                      value="<?php echo $chapterName ?>" />
                       </li>

                       <!--School Name-->
                       <li class="bigfield"><input type="text" id="schoolName" name="schoolName" maxlength="45" placeholder="School Name"
                                      value="<?php echo $schoolName ?>" />
                       </li>

                        <!--Street Address-->
                       <li class="bigfield"><input type="text" id="streetAddress" name="streetAddress" maxlength="45" placeholder="Street Address"
                                      value="<?php echo $streetAddress ?>" />
                       </li>

                       <!--City-->
                       <li class="bigfield"><input type="text" id="city" name="city" maxlength="45" placeholder="City"
                                      value="<?php echo $city ?>" />
                       </li>

                       <!--Postal Code -->
                       <li class="bigfield"><input type="text" id="postalCode" name="postalCode" maxlength="45" placeholder="Postal Code"
                                      value="<?php echo $postalCode ?>" />
                       </li>
                   </ul>
                    </table>
<!--Drop-down to select province and region in which the chapter is located-->
                    <span class="graytitle">Province or Territory:</span>
                   <table cellspacing="10px" cellpadding="10px">
                    <ul class="pageitem">
                   <li class="bigfield"">
                       <select name="province" class="dropdown">
                        <option selected="true" value="1">Ontario</option>
                        <option value="2">British Columbia</option>
                        <option value="3">Alberta</option>
                        <option value="4">Saskatchewan</option>
                        <option value="5">Manitoba</option>
                        <option value="6">Quebec</option>
                        <option value="7">Nova Scotia</option>
                        <option value="8">New Brunswick</option>
                        <option value="9">P.E.I</option>
                        <option value="10">Newfoundland and Labrador</option>
                        <option value="11">Yukon</option>
                        <option value="12">North West Territories</option>
                        <option value="13">Nunavut</option>
                    </select>
                   </li>
                   </ul>
                </table>

                    <span class="graytitle">Region:</span>
                   <table cellspacing="10px" cellpadding="10px">
                    <ul class="pageitem">
                   <li class="bigfield"">
                       <select name="region" class="dropdown">
                        <option value="1">North Eastern</option>
                        <option value="2">Hamilton</option>
                        <option selected="true" value="3">Peel</option>
                        <option value="4">Toronto</option>
                        <option value="5">Waterloo</option>
                        <option value="6">York</option>
                    </select>
                   </li>
                   </ul>
                    </table>
            <input type="submit" id="submit" name="submit" value="Create" />
                   </form>
            <br>



        </div>
  <!-- display errors of why the user cannot create an account-->
  <div class="error" >
        <span class="error"><?php echo $error["username"]; ?></span>
        <span class="error"><?php echo $error["name"]; ?></span> <br/>
        <span class="error"><?php echo $error["firstName"]; ?></span> <br/>
        <span class="error"><?php echo $error["lastName"]; ?></span> <br/>
        <span class="error"><?php echo $error["emailAddress"]; ?></span> <br/>
        <span class="error"><?php echo $error["password"]; ?></span> <br/>
        <span class="error"><?php echo $error["passwordConfirm"]; ?></span> <br/>
        <span class="error"><?php echo $error["chapterName"]; ?></span> <br/>
        <span class="error"><?php echo $error["schoolName"]; ?></span> <br/>
        <span class="error"><?php echo $error["streetAddress"]; ?></span> <br/>
        <span class="error"><?php echo $error["city"]; ?></span> <br/>
        <span class="error"><?php echo $error["postalCode"]; ?></span> <br/>
  </div>

    </body>
</html>
