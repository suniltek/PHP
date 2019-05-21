<!DOCTYPE>
<html>
  <head>
    <title>
      User Login
    </title>
  </head>
  <body>
    <?php 
      $password = "Sunil@123";
      $blowfish_has_format = "$2y$12$";
      $salt = "ThisismypasswordHashAlogorithm";
      echo "Length: " .strlen($salt);
      $formatting_blowfish_with_salt = $blowfish_has_format.$salt;
      echo "<br>";
      echo "Concat => ". $formatting_blowfish_with_salt;
      $hash = crypt($password, $formatting_blowfish_with_salt);
      echo "<br>";
      echo "Incrypted Password =>". $hash;
    ?>
  </body>
</html>