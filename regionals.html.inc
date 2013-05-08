<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>ICDC</title>
	<link rel="stylesheet" href="UiUIKit_stylesheets/iphone.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<script type="text/javascript" charset="utf-8">
		window.onload = function() {
		  setTimeout(function(){window.scrollTo(0, 1);}, 100);
		}
	</script>
        <script src="javascript/functions.js" type="text/javascript"></script>
	
	<!-- end line customization -->
</head>

<body>
<!--Navigation elements-->
	<div id="topbar">
	<div id="title">
		ICDC</div>
 <?php echo "<div id='leftnav'>";
		echo "<a href='home.php'><img alt='home' src='images/home.png' /></a>";
                echo "<a href='studentGeneral.php?id=$studentID'>Stud...</a></div>";
?>
            <div id="rightnav">
		<a href="#">Edit</a></div>
        </div>

<div id="infopage">

    <span class="graytitle"><h3>ICDC Scores</h3></span>
<!--Show information about regionals-->
<ul class="field">
	<li class="arrow"><h3>Event</h3><a><?php echo $eventName ?></a></li>
	<li class="arrow"><h3>First Oral Presentation Score</h3><?php echo $oralPresentationResultOne ?></li>
	<li class="arrow"><h3>Second Oral Presentation Score</h3><?php echo $oralPresentationResultTwo ?></li>
	<li class="arrow"><h3>Written Test or Report Result</h3><?php echo $writtenTestResult ?></li>
	<li class="arrow"><h3>Rank</h3><?php echo $rank ?></li>

</ul>
    </div>
</body>
</html>