<?php 
ob_start();
include_once('includes/session.php');?>
<?php include_once('includes/functions.php');?>
<?php include_once('includes/db.php');?>
<?php
  if(isset($_POST["submit"])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if(empty($email) || empty($password)){
      $_SESSION["error-message"] = "All Fields must be filled out";
      redirect_to('login.php');
    }else{
      if(confirmingAccountActiveStatus()){
        $found_account = login_attempt($email, $password);
        if($found_account){
          $_SESSION['user_id'] = $found_account['id'];
          $_SESSION['user_name'] = $found_account['username'];
          $_SESSION['user_email'] = $found_account['email'];
          if(isset($_POST['remember'])){ 
            $expireTime = time()+86400;
            setcookie('settingEmail',$email,$expireTime);
            setcookie('settingName',$username,$expireTime);
          }
          redirect_to("welcome.php");
        }else{
          $_SESSION["error-message"] = "Invalid Email / Password";
          redirect_to('login.php');
        }
      }else{
        $_SESSION["error-message"] = "Account Confiramtion Required";
        redirect_to('login.php');   
      }  
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
    <form action="login.php" method="post">
      <input type="email" id="email" class="fadeIn first" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn second" name="password" placeholder="Password"> <br />
      <p class="fadeIn third"><input type="checkbox" name="remember" /> <span style="color:#737373;">Remember Me</span> </p> 
      <input type="submit" name="submit" class="fadeIn fourth" value="Login">
    </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="recover-account.php">Forgot Password?</a> &nbsp;&nbsp; 
    </div>
  </div>
</div>
</body>
</html>