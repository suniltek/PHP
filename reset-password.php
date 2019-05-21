<?php 
ob_start();
include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php include_once('includes/db.php');?>
<?php
  if(isset($_GET['token'])){
    $tokenFromUrl = $_GET['token'];
    if(isset($_POST["submit"])){
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $cpassword= mysqli_real_escape_string($con, $_POST['cpassword']);

      if(empty($password) || empty($cpassword)){
        $_SESSION["error-message"] = "All Fields must be filled out";
      }elseif ($password!=$cpassword) {
        $_SESSION["error-message"] = "Both Password values must be same";
      }elseif (strlen($password)<4) {
        $_SESSION['error-message'] = "Password should include at least 4 values";
      }else{
        $hashed_password = password_encryption($password);
        $query = "UPDATE admin_panel SET password = '$hashed_password' WHERE token = '$tokenFromUrl' ";
        $execute = mysqli_query($con, $query);
        if($execute){
          $_SESSION['success-message'] = "Password Changed Successfully";
          redirect_to('login.php');
        }else{
          $_SESSION['error-message'] = "Something went wrong. Try Again!";
          redirect_to('login.php');
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create New Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div>
      <?php echo errorMessage(); ?>
      <?php echo successMessage(); ?>
    </div>
    <div class="fadeIn first">
      <img src="assets/images/administrator-male.png" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
    <form action="reset-password.php?token=<?php echo $tokenFromUrl; ?>" method="post">
      <input type="password" id="password" class="fadeIn fourth" name="password" placeholder="New Password">
      <input type="password" id="cpassword" class="fadeIn fifth" name="cpassword" placeholder="Confirm Password">
      <input type="submit" name="submit" class="fadeIn sixth" value="Submit">
    </form>
  </div>
</div>
</body>
</html>