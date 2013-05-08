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
<title>Add ICDC Scores</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
        <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
    </head>


<body>
<!--Show navigation Elements-->
<div id="topbar">
    	<div id="title">
		Add ICDC Scores</div>
	
    <?php echo "<div id='leftnav'>";
		echo "<a href='home.php'><img alt='home' src='images/home.png' /></a>";
                echo "<a href='studentGeneral.php?id=$studentID'>Stud...</a></div>";
    ?>
        
</div>

<div id="content">
    <br>
<!--    Display Form-->
	<form name="addICDCScore" action="addICDCScore.php" method="POST">
	      <ul class="pageitem">

                  <!-- Event Name -->
                    <li class="bigfield"><input type="text" id="eventName" name="eventName" maxlength="45" placeholder="Event"
                                  value="<?php echo $eventName ?>" />
                    </li>
                    <!-- First Oral Score -->
                     <li class="bigfield"><input type="text" id="oralOneScore" name="oralOneScore" maxlength="45" placeholder="First Oral Presentation Score"
                                  value="<?php echo $oralOneScore ?>" />
                     </li>
			<!--Second Oral Score -->
                     <li class="bigfield"><input type="text" id="oralTwoScore" name="oralTwoScore" maxlength="45" placeholder="Second Oral Presentation Score"
                                  value="<?php echo $oralTwoScore ?>" />
                    </li>
                    <!-- Written Score -->
                      <li class="bigfield"><input type="text" id="writtenScore" name="writtenScore" maxlength="100" placeholder="Written Test or Report Result"
                                  value="<?php echo $writtenScore ?>" />
                       </li>

                       <!-- Rank -->
                      <li class="bigfield"><input type="text" id="rank" name="rank" maxlength="45" placeholder="Rank in Event"
                                  value="<?php echo $rank ?>" />
                      </li>

              </ul>
                <!--Submit Button-->
                 <input type="submit" id="submit" name="submit" value="Add" />
            </form>
		
    
</div>
<!--Show any errors that may result-->
     <div class="error">
        
        <span class="error"><?php echo $error["eventName"]; ?></span><br>
        <span class="error"><?php echo $error["oralOneScore"]; ?></span><br>
<!--        <span class="error"><?php echo $error["oralTwoScore"]; ?></span><br>-->
        <span class="error"><?php echo $error["writtenScore"]; ?></span><br>
        <span class="error"><?php echo $error["rank"]; ?></span><br>

    </div>

</body>

</html>
