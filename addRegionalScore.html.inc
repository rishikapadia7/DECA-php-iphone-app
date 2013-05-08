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
<title>Add Regional Scores</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>


<body>
<!--Show navigation elements-->
<div id="topbar">
    <div id="title">
		Add Regional Scores
    </div>

        <?php
        echo "<div id='leftnav'>";
        echo "<a href='home.php'><img alt='home' src='images/home.png' /></a>";
        echo "<a href='studentGeneral.php?id=$studentID'>Stud...</a></div>";
        ?>
</div>

<div id="content">
    <br>
        <form name="addRegionalScore" action="addRegionalScore.php" method="POST">

            <ul class="pageitem">
                <!-- Event Name -->
                <li class="bigfield"><input type="text" id="eventName3" name="eventName3" maxlength="45" placeholder="Event"
                                            value="<?php echo $eventName3 ?>" />
                </li>

                <!-- First Oral Score -->
                <li class="bigfield"><input type="text" id="oralOneScore3" name="oralOneScore3" maxlength="45" placeholder="First Oral Presentation Score"
                    value="<?php echo $oralOneScore3 ?>" />
                </li>
                    <!-- Written Score -->
                <li class="bigfield"><input type="text" id="writtenScore3" name="writtenScore3" maxlength="100" placeholder="Written Test or Report Result"
                                            value="<?php echo $writtenScore3 ?>" />
                </li>

                <!-- rank -->
                <li class="bigfield"><input type="text" id="rank3" name="rank3" maxlength="45" placeholder="rank3 in Event"
                                            value="<?php echo $rank3 ?>" />
                </li>

            </ul>


             <input type="submit" id="submit" name="submit" value="Add" />
        </form>
	    
</div>
<!--Show error messages here-->
     <div class="error">
        
        <span class="error"><?php echo $error["eventName3"]; ?></span><br>
        <span class="error"><?php echo $error["oralOneScore3"]; ?></span><br>
        <span class="error"><?php echo $error["writtenScore3"]; ?></span><br>
        <span class="error"><?php echo $error["rank3"]; ?></span><br>

    </div>

</body>

</html>
