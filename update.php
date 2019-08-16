<?php
session_start();
include ('connect.php');


  $firstname = $_POST['firstname'];
  $account_id = $_SESSION['account_id'];
  $sirname = $_POST['sirname'];
  
  $address = $_POST['address'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  

  $update = mysqli_query($conn,"UPDATE `account` set `firstname`='".$firstname."',
  `sirname`='".$sirname."',
  
  `address`='".$address."',
  `tel`='".$tel."',
  `email`='".$email."'
   WHERE `account_id` = '".$account_id."'");

if($update){
  echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'personal.php';";
	echo "</script>";
}else {
  echo "<script>alert('data was not update')</script>";
}

mysqli_close($conn);



?>