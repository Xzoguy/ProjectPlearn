<?php
session_start();
include ('connect.php');


  $username = $_POST['username'];
  $account_id = $_SESSION['account_id'];
  $password = $_POST['password'];
  
  

  $update = mysqli_query($conn,"UPDATE `account` set `username`='".$username."',
  `password`='".$password."'
  
   WHERE `account_id` = '".$account_id."'");

if($update){
  echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'ChangePassword.php';";
	echo "</script>";
}else {
  echo "<script>alert('data was not update')</script>";
}

mysqli_close($conn);



?>