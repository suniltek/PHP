<?php include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php include_once('includes/db.php');?>
<?php
  if(isset($_GET['token'])){
    $tokenFromUrl = $_GET['token'];
    $query = "UPDATE admin_panel SET active = 'ON' WHERE token = '$tokenFromUrl' ";
    $execute = mysqli_query($con, $query);
    mysqli_close($con);
    if($execute){
      $_SESSION['success-message'] = "Account Activated Succesfully";
      redirect_to('login.php');
    }else{
      $_SESSION['error-message'] = "Something went wrong. Try Again";
      redirect_to('user-registration.php');
    }
  }
?>