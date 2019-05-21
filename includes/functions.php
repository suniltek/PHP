<?php include_once('db.php');?>
<?php 
  function redirect_to($newLocation){
    header("Location:" . $newLocation);
    exit;
  }

  function password_encryption($password){
    $blowFish_hash_format = "$2y$10$"; // 2y to tells php to use blowfish
    $salt_length = 22;
    $salt = generate_salt($salt_length);
    $formatting_blowFish_with_salt = $blowFish_hash_format . $salt;
    $hash = crypt($password, $formatting_blowFish_with_salt);
    return $hash;
  }

  function generate_salt($length){
    // Not 100% unique, not 100% random, but good enough for a salt
    // MD5 Algorith returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));
    // valid characters for a salt are [a to z - A to Z 0 to 9 ./ ]

    $base64_string = base64_encode($unique_random_string);
    // but not '+' which is valid in base64 encoding so we remove '+' and replace with '.'
    
    $modified_base64_string = str_replace('+', '.', $base64_string);
    
    // using substr function we truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);
    return $salt;
  }

  function password_check($password, $existing_hash){
    // existing hash contains format and salt at start that we made in our password encryption function.
    $hash = crypt($password, $existing_hash);
    //print_r($hash);
    if($hash === $existing_hash){
      return true;
    } else{
      return false;
    }
  }

  function checkEmailExistsOrNot($email){
    global $con;
    $query = "SELECT * FROM admin_panel WHERE email = '$email' ";
    $execute = mysqli_query($con, $query);
    /*echo "<pre>";
    print_r($execute);
    die();*/
    if(mysqli_num_rows($execute) > 0){
      return true;
    }else{
      return false;
    }
  }

  function login_attempt($email, $password){
    global $con;
    $query = "SELECT * FROM admin_panel WHERE email = '$email' ";
    $execute = mysqli_query($con, $query);
    if($admin = mysqli_fetch_assoc($execute)){
      if(password_check($password, $admin['password'])){
        return $admin;
      }
    }else{
      return null;
    }
  }

  function confirmingAccountActiveStatus(){
    global $con;
    $query = "SELECT * FROM admin_panel WHERE active = 'ON' ";
    $execute = mysqli_query($con, $query);
    if(mysqli_num_rows($execute) > 0){
      return true;
    }else{
      return false;
    }   
  }

  function login(){
    if(isset($_SESSION['user_id']) || isset($_COOKIE['settingEmail'])){
      return true;
    }
  }

  function confirmLogin(){
    if(!login()){
      $_SESSION['error-message'] = "You have to Login";
      redirect_to("login.php");
    }
  }

?>