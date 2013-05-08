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
        <title>Edit Chapter Information</title>
        <meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
        <meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>
    <body>

        <div id="topbar">
	<div id="title">Edit Chapter Info</div>
                <div id="leftnav">
		<a href="login.php">Login</a></div>
        </div>



        <div id="content">
            <br/>
            <form name="editChapterInfo" action="editChapterInfo.php" method="POST">
                
                
                   
            <!-- Chapter Name -->
            <span class="graytitle">Chapter Name:</span>
            <ul class="pageitem">
                           <li class="bigfield"><input type="text" id="chapterName" name="chapterName" maxlength="45" placeholder="<?php echo $originalChapterName ?>"
                                  value="<?php echo $chapterName ?>" />
                           </li>
            </ul>

            <!-- School Name -->
            <span class="graytitle">School Name:</span>
            <ul class="pageitem">
                           <li class="bigfield"><input type="text" id="schoolName" name="schoolName" maxlength="45" placeholder="<?php echo $originalSchoolName ?>"
                                  value="<?php echo $schoolName ?>" />
                           </li>
            </ul>

            <!-- Street Address -->
            <span class="graytitle">Street Address:</span>
            <ul class="pageitem">
                           <li class="bigfield"><input type="text" id="streetAddress" name="streetAddress" maxlength="45" placeholder="<?php echo $originalStreetAddress ?>"
                                  value="<?php echo $streetAddress ?>" />
                           </li>
            </ul>

            <!-- City -->
            <span class="graytitle">City:</span>
            <ul class="pageitem">
                           <li class="bigfield"><input type="text" id="city" name="city" maxlength="45" placeholder="<?php echo $originalCity ?>"
                                  value="<?php echo $city ?>" />
                           </li>
            </ul>

            <!-- Postal Code -->
            <span class="graytitle">Postal Code:</span>
            <ul class="pageitem">
                           <li class="bigfield"><input type="text" id="postalCode" name="postalCode" maxlength="45" placeholder="<?php echo $originalPostalCode ?>"
                                  value="<?php echo $postalCode ?>" />
                           </li>
            </ul>

            <!-- Drop down to reselect the province in which the chapter is located -->
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
<!-- Drop down to reselect the region in which the chapter is located -->
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
                    <input type="submit" id="submit" name="submit" value="Update" />
               </form>
            <br>

        </div>

        <!-- display errors of why the user cannot create an account-->
  <div class="error" >
        <span class="error"><?php echo $error["chapterName"]; ?></span> <br/>
        <span class="error"><?php echo $error["schoolName"]; ?></span> <br/>
        <span class="error"><?php echo $error["chapterAdvisorName"]; ?></span> <br/>
        <span class="error"><?php echo $error["streetAddress"]; ?></span> <br/>
        <span class="error"><?php echo $error["city"]; ?></span> <br/>
        <span class="error"><?php echo $error["postalCode"]; ?></span> <br/>
        

        
  </div>

    </body>
</html>
