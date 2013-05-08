<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Feedback</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar">
    	<div id="title">
		Feedback</div>

<!--    add navigation elements-->
	<div id="leftnav">
		<a href="home.html"><img alt="home" src="images/home.png" /></a></div>
	<div id="rightnav">
		<a href="#">Logout</a></div>
</div>


<div id="content">
	<ul class="pageitem">
		<li class="textbox"><span class="header" >Forms</span> Here you can submit any feedback you have about the application. You may also ask for assistance and a reply will be sent to your email. Please fill out the fields below correctly.</li>
	</ul>

    <form name="feedback" action="feedback.php" method="POST">

<!--    input for subject
    explain the reason for the feedback-->
                <fieldset><span class="graytitle">Subject</span>
		<ul class="pageitem">

                    <li class="bigfield"><input type="text" id="chapterName" name="subject" maxlength="45" placeholder="Subject"
                                  value="<?php echo $subject ?>" /></li>
		</ul>

<!--input field for the comment, feedback or information about errors and problems-->
	        <span class="graytitle">Insert Feedback in the Field Below</span>
		<ul class="pageitem">
			<li class="textbox"><span class="header"></span><textarea rows="4" name="textArea">
                            </textarea></li>
		</ul>
		</fieldset>
                <input type="submit" id="submit" name="submit" value="Submit" />
        
    </form>

    <!--Submit button-->

</div>

<div class="error" >
        <span class="error"><?php echo $error["subject"]; ?></span><br>
        <span class="error"><?php echo $error["textArea"]; ?></span><br>
        
    </div>
   
</body>

</html>
