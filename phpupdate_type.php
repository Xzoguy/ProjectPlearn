<?php
session_start();
include ('connect.php');

  
  $type_name = $_POST['type_name'];
  $type_id = $_POST['type_id'];
  
  

  $update = mysqli_query($conn,"UPDATE `product_type` set `type_name`='".$type_name."'
  
   WHERE `type_id` = '".$type_id."'");

if($update){
  echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'AdminTypeproduct.php';";
	echo "</script>";
}else {
  echo "<script>alert('data was not update')</script>";
}

mysqli_close($conn);



?>