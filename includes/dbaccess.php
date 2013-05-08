<?php

// try to make the connection to the database
try
{
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION);
}
// handle a connection error
catch (PDOException $e)
{
  error_log('Error in '.$e->getFile().
      ' Line: '.$e->getLine().
      ' Error: '.$e->getMessage()
  );
  // redirect to error display page and show the problem
  header('Location: http://localhost/4u-f10-skills-example-app/error.php?err=Database Error&msg=' . $e->getMessage());
  exit();
}

?>
