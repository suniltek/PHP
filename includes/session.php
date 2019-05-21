<?php 
  session_start();

  function errorMessage(){
    if(isset($_SESSION["error-message"])){
      $output = "<div class=\"error-message\">";
      $output .= htmlentities($_SESSION["error-message"]);
      $output .= "</div>";
      $_SESSION["error-message"] = null; 
      return $output;
    }
  }
  function successMessage(){
    if(isset($_SESSION["success-message"])){
      $output = "<div class=\"success-message\">";
      $output .= htmlentities($_SESSION["success-message"]);
      $output .= "</div>";
      $_SESSION["success-message"] = null; 
      return $output;
    }
  }
?>