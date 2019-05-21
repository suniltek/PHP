<?php 
ob_start();
include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php include_once('includes/db.php');?>
<?php
  if(isset($_POST["submit"])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword= mysqli_real_escape_string($con, $_POST['cpassword']);
    $token = bin2hex(openssl_random_pseudo_bytes(40));

    if(empty($username) && empty($email) && empty($password) && empty($cpassword)){
      $_SESSION["error-message"] = "All Fields must be filled out";
      redirect_to('user-registration.php');
    }elseif ($password!=$cpassword) {
      $_SESSION["error-message"] = "Both Password values must be same";
      redirect_to('user-registration.php');
    }elseif (strlen($password)<4) {
      $_SESSION['error-message'] = "Password should include at least 4 values";
      redirect_to('user-registration.php');
    }elseif(checkEmailExistsOrNot($email)){
      $_SESSION['error-message'] = "Email is already in use";
      redirect_to('user-registration.php');
    }else{
      $hashed_password = password_encryption($password);
      $query = "INSERT into admin_panel (username, email, password, token, active) VALUES ('$username', '$email', '$hashed_password', '$token', 'OFF')";
      $execute = mysqli_query($con,$query);
      if($execute){
        /*$_SESSION['success-message'] = "Data Entered Successfully";
        redirect_to('user-registration.php');*/
        $subject = "Confirm Account";
        $body = "Hi $username. Here is the link to activate your account.\n http://localhost/User_Registration/activate.php?token=$token";
        $headers = "From:sunil-b489f0@inbox.mailtrap.io";
        if(mail($email, $subject, $body, $headers)){
          $_SESSION['success-message'] = "Check Email for Activation";
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
  <title>User Registration</title>
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
    <form action="user-registration.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="email" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn fourth" name="password" placeholder="Password">
      <input type="password" id="cpassword" class="fadeIn fifth" name="cpassword" placeholder="Confirm Password">
      <input type="submit" name="submit" class="fadeIn sixth" value="Register">
    </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="recover-account.php">Forgot Password?</a>
    </div>
  </div>
</div>
</body>
</html>