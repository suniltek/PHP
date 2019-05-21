<?php 
ob_start();
include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php include_once('includes/db.php');?>
<?php
  if(isset($_POST["submit"])){
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if(empty($email)){
      $_SESSION["error-message"] = "Email Required";
      redirect_to('recover-account.php');
    }elseif(!checkEmailExistsOrNot($email)){
      $_SESSION['error-message'] = "Email not found";
      redirect_to('user-registration.php');
    }else{
      $query = "SELECT * FROM admin_panel WHERE email = '$email' ";
      $execute = mysqli_query($con,$query);
      if($admin = mysqli_fetch_array($execute)){
        $admin['username'];
        $admin['token'];
        $subject = "Reset password";
        $body = "Hi ". $admin['username']. ",\n Here is the link to reset your password.\n http://localhost/User_Registration/reset-password.php?token=". $admin['token'];
        $headers = "From:sunil-b489f0@inbox.mailtrap.io";
        if(mail($email, $subject, $body, $headers)){
          $_SESSION['success-message'] = "Check Email for Resetting password";
          redirect_to('login.php');
        }else{
          $_SESSION['error-message'] = "Something went wrong. Try again";
          redirect_to('user-registration.php.php');
        }
      }else{
        $_SESSION['error-message'] = "Something Went Wrong Try Again!";
        redirect_to('user-registration.php');
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot Password</title>
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
    <form action="recover-account.php" method="post">
      <input type="email" id="email" class="fadeIn first" name="email" placeholder="Email">
      <input type="submit" name="submit" class="fadeIn second" value="Submit">
    </form>
  </div>
</div>
</body>
</html>