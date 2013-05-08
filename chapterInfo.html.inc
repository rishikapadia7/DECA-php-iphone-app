<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>Chapter Information</title>
	<link rel="stylesheet" href="UiUIKit_stylesheets/iphone.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<script type="text/javascript" charset="utf-8">
		window.onload = function() {
		  setTimeout(function(){window.scrollTo(0, 1);}, 100);
		}
	</script>
	<!-- for profile image -->
	<style type="text/css" media="screen">
		li.picture { background: #fff url(images/gallery/image05.jpg) no-repeat !important; }
	</style>
	<!-- end line customization -->
</head>

<body>
    
<!--	add the navigation elements-->
	<div id="topbar">
	<div id="title">
		Chapter Info</div>
        <div id="leftnav">
		<a href="home.php"><img alt="home" src="images/home.png" /></a></div>

        </div>
        <div id="rightnav">
		<a href="editChapterInfo.php">Edit</a></div>
<div id="infopage">

<ul class="data">
	<li><p>This is your, chapter's information. This information will not be distributed or sold under any circumstances.</p></li>
</ul>

<!--chapter name is displayed-->
<h1 class="smallfield">Chapter Name</h1>
<ul class="field">
	<li><?php echo $chapterName ?></li>
</ul>


<!--school name is displayed-->
<h1 class="smallfield">School Name</h1>
<ul class="field">
	<li><?php echo $schoolName ?></li>
</ul>


<h1>Street Address</h1>
<ul class="field">
	<li><?php echo $streetAddress ?></li>
</ul>

<h1 class="bigfield">City</h1>
<ul class="field">
	<li><?php echo $city ?></li>
</ul>

<h1 class="bigfield">Postal Code</h1>
<ul class="field">
	<li><?php echo $postalCode ?></li>
</ul>


<h1>Region</h1>
<ul class="field">
	<li><?php echo $region ?></li>
</ul>


<h1>Province</h1>
<ul class="field">
	<li><?php echo $province ?></li>
</ul>


    </div>
</body>
</html>