<?php include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php 
  $_SESSION['user_id'] = null;
  $expireTime = time()-86400;
  setcookie('settingEmail',null,$expireTime);
  setcookie('settingName',null,$expireTime);
  session_destroy();
  redirect_to('login.php');
?>
