<?php 
session_start();
if($_SESSION["status"]!="admin"){
	Header("location: login.php");
}?>
<!DOCTYPE html>
<html>
<title>Plern Plern</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="font/stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.css">
<style>
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: 'itimregular', cursive;}
body {background-color: #A3E7D8;}
</style>
<head>
</head>
<body>
<?php include('navadmin.php');?>

<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>รายการสั่งสินค้า</center></h1><br>
  <table class="w3-table-all w3-margin">
   
    <thead>
      <tr class="w3-blue">
        <th>No.ออเดอร์</th>
        <th>ชื่อลูกค้า</th>
        <th>วันที่สั่งซื้อ</th>
        <th>สถานะการชำระเงิน</th>
        
        <th>ราคารวม</th>
        <th>ใส่รหัส EMS</th>
        <th>รายละเอียด</th>
        <th>รูปสลิป</th>
       

      </tr>
    </thead>
    <?php 
    include 'connect.php';
    $query = $conn->query("SELECT * FROM tb_order ORDER BY order_id desc");
   


  
    if($query){
      while($row = mysqli_fetch_assoc($query)){
        echo '
    <tr class="w3-hover-light-grey">
      <td>'.$row['order_id'].'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['order_date'].'</td>
      <td>'.$row['order_status'].'</td>
      <td>'.$row['sum'].'</td>
      <td><a href="ems.php?id='.$row['order_id'].'" class="w3-button w3-yellow w3-border w3-round-large w3-hover-black">กรอก EMS</a></td>
      <td> <a href="AdminOrderdetail.php?id='.$row['order_id'].'" class="w3-button w3-green w3-border w3-round-large w3-hover-black">Detail</a> </td>
      <td><a href="slip.php?id='.$row['order_id'].'" class="w3-button w3-red w3-border w3-round-large w3-hover-black">Slip</a></td>


    </tr>';
    ?>
    <?php }
  }else{ ?>
   <p>Not found...</p>
  <?php } ?>
    </table>
</div>



<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
