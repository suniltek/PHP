<?php include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php confirmLogin(); ?>
<!DOCTYPE>
<html>
  <head>
    <title>
      Welcome
    </title>
  </head>
  <body>
    <?php
      if(isset($_SESSION['user_id'])){
        echo "My Id is " .$_SESSION['user_id']. " with the name of " .$_SESSION['user_name']. " with the email " .$_SESSION['user_email'];
        echo "<br />";
        echo "<h1>Welcome " .$_SESSION['user_name'] ."</h1>";
      }  
      if(isset($_COOKIE['settingName'])){
        echo "<h1> Welcome {$_COOKIE["settingName"]} </h1>";
      }
    ?>

    <a href="logout.php">Logout Now</a>
  </body>
</html>