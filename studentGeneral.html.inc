<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title><?php echo $lastName . ', ' . $firstName?></title>
	<link rel="stylesheet" href="UiUIKit_stylesheets/iphone.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<script type="text/javascript" charset="utf-8">
		window.onload = function() {
		  setTimeout(function(){window.scrollTo(0, 1);}, 100);
		}
	</script>
        <script src="javascript/functions.js" type="text/javascript"></script>
	
	
</head>

<body>

	<div id="topbar">
	<div id="title"><?php echo "$lastName, $firstName" ?></div>
 <div id="leftnav">
		<a href="home.php"><img alt="home" src="images/home.png" /></a>
                <a href="students.php">Students</a></div>
            <div id="rightnav">
		<a href="editStudentGeneral.php">Edit</a></div>
        </div>

<div id="infopage">


<ul class="field">
    <li class="arrow"><h3>Student Number</h3><?php echo "$studentNumber" ?></li>
    <li class="arrow"><h3>First Name</h3><?php echo "$firstName" ?></li>
    <li class="arrow"><h3>Last Name</h3><?php echo "$lastName" ?></li>
    <li class="arrow"><h3>Homeroom</h3><a><?php echo "$homeroom" ?></a></li>
    <li class="arrow"><h3>Grade</h3><a>
    <?php
    if ($grade != 0)
        {echo "$grade";}
        ?></a></li>
    <li><h3>Email</h3> <a href="mailto:<?php echo "$emailAddress" ?>"><?php echo "$emailAddress" ?></a></li>
</ul>

</div>

    <div id="content">
	<ul class="pageitem"><?php
		echo "<li class='menu'><a href=regionals.php?id=$studentID><span class='name'>Regionals</span><span class='arrow'></span></a></li>";
                echo "<li class='menu'><a href=provincials.php?id=$studentID><span class='name'>Provincials</span><span class='arrow'></span></a></li>";
		echo "<li class='menu'><a href=ICDC.php?id=$studentID><span class='name'>ICDC</span><span class='arrow'></span></a></li>";
                ?>
        </ul>

    </div>
</body>
</html>