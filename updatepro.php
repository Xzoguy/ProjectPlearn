<?php
session_start();
include ('connect.php');

  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_detail = $_POST['product_detail'];
  $product_price = $_POST['product_price'];
  $amount_pro = $_POST['amount_pro'];

  
  

  $update = mysqli_query($conn,"UPDATE `product_type` set `type_name`='".$type_name."'
  
   WHERE `typeid` = '".$type_id."'");

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