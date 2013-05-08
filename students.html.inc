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
<title>Students
</title>
<link href="pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<!--Navigation Elements-->
<div id="topbar">
	<div id="title">
		Students</div>
	<div id="leftnav">
		<a href="home.php"><img alt="home" src="images/home.png" /></a>
        </div>

        </div>
        <div id="rightnav">
		<a href="addStudent.php">Add</a></div>

<div id="content">
    <ul class="pageitem">
<?php
session_start();

//generate a list of students that are entered into the database by this user
//each time iterated a result will be shown if possible for a student, and it does with the list items tag
while($row = mysql_fetch_array($selectFirstLastID)){
    $studentID = $row['studentID'];
    
    echo "<li class='menu'><a href=studentGeneral.php?id=$studentID><span class='name'>";
    echo $row['lastName']. ", ". $row['firstName'];
    echo "</span><span class='arrow'></a></li>";

    
    
}

?>
    </ul>
</div>
</body>
</html>
