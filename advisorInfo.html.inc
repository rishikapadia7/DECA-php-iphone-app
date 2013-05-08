<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>Advisor Info</title>
	<link rel="stylesheet" href="UiUIKit_stylesheets/iphone.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<script type="text/javascript" charset="utf-8">
		window.onload = function() {
		  setTimeout(function(){window.scrollTo(0, 1);}, 100);
		}
	</script>
        <script src="javascript/functions.js" type="text/javascript"></script>
	<!-- for profile image -->
	<style type="text/css" media="screen">
		li.picture { background: #fff url(images/gallery/image05.jpg) no-repeat !important; }
	</style>
	<!-- end line customization -->
</head>

<body>

	<div id="topbar">
	<div id="title">
		Advisor Info</div>
 <div id="leftnav">
		<a href="home.php"><img alt="home" src="images/home.png" /></a>
                <a href="home.php">Home</a></div>
            <div id="rightnav">
		<a href="editAdvisorInfo.php">Edit</a></div>
        </div>

<div id="infopage">

    <span class="graytitle"><h3>Advisor Information</h3></span>


<ul class="data">
	<li><p>This is your, advisor information. This information will not be distributed or sold under any circumstances.</p></li>
</ul>

<!--            Fields to display the advisor's information which is stored in the database
            PHP variables from advisorInfo.php return values which are displayed here-->

<ul class="field">
	<li class="arrow"><h3>Username</h3> <a href="#"><?php echo $username ?></a></li>
	<li class="arrow"><h3>First Name</h3> <a href="#"><?php echo $firstName ?></a></li>
	<li class="arrow"><h3>Last Name</h3> <a href="#"><?php echo $lastName ?></a></li>
	<li class="arrow"><h3>Email Address</h3> <a href="#"><?php echo $emailAddress ?></a></li>
	
</ul>
</body>
</html>