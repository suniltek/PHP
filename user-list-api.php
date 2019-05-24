<?php
  $connection = mysqli_connect("localhost","root","","form-system");
  $sql = "SELECT * FROM user_details ORDER BY id desc";
  $arr =[];
  $result = mysqli_query($connection,$sql);
  while($row = mysqli_fetch_assoc($result)){
    array_push($arr,$row);
  }
  echo json_encode($arr);
?>