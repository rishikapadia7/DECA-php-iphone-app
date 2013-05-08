<?php
$title = isset($_GET['err']) ? $_GET['err'] : 'Error';
$msg = isset($_GET['msg']) ? $_GET['msg'] : 'An error has occured';
?>

<!DOCTYPE html public "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php echo $title ?></title>
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/system.css" type="text/css" media="screen" />
  </head>
  <body>
    <h1><?php echo $title ?></h1>
    <p>We apologize for this problem. Please contact the site administrator(s).</p>
    <p>Error message: "<?php echo $msg ?>"</p>
  </body>
</html>