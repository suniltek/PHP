<?php
$connection = mysqli_connect("localhost","root","","form-system"); // Establishing Connection with Server..

function checkData($post){
  $checkData = array();
  foreach($post as $key => $value){
    if(empty($value) || trim($value) == ''){
      $checkData[] = $key.' should not be empty';
    }
  }
  return $checkData;
}

$errors = checkData($_POST);

if(count($errors) > 0){
  /*echo "<pre>";
  print_r($errors);
  die('gggg');*/
  echo json_encode($error);
}else{
  $fullname = mysqli_real_escape_string($connection, trim($_POST['fullname']));
  $birthdate = mysqli_real_escape_string($connection, trim($_POST['birthdate']));
  $gender = mysqli_real_escape_string($connection, trim($_POST['gender']));
  $email = mysqli_real_escape_string($connection, trim($_POST['email']));
  $mobile = mysqli_real_escape_string($connection, trim($_POST['mobile']));
  $phone = mysqli_real_escape_string($connection, trim($_POST['phone']));
  $state = mysqli_real_escape_string($connection, trim($_POST['state']));
  $city = mysqli_real_escape_string($connection, trim($_POST['city']));
  $street = mysqli_real_escape_string($connection, trim($_POST['street']));
  $landmark = mysqli_real_escape_string($connection, trim($_POST['landmark']));
  $address = mysqli_real_escape_string($connection, trim($_POST['address']));

  $sql = "INSERT INTO user_details(fullname, birthdate, gender, email, mobile, phone, state, city, street, landmark, address) VALUES ('$fullname', '$birthdate', '$gender', '$email', '$mobile', '$phone', '$state', '$city', '$street', '$landmark', '$address')";
  
  $execute = mysqli_query($connection,$sql) or 
  die(json_encode(["error"=>mysqli_error($connection)]));

  if($execute){
    $success = array(
      'status' => 'Success!', 
      'status_code' => 200, 
      'msg' => 'Thank You! You are registered successfully.');
      echo json_encode($success);
  }else {
    $error = array(
      'status' => 'Error!', 
      'status_code' => 404, 
      'msg' => 'Error occoured in submitting the form');
      echo json_encode($error);
  }
}
?>