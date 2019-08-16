<?php
session_start();
if(!$_SESSION["account_id"]){
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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: 'itimregular', cursive;}
body {background-color: #A3E7D8;}
</style>
<head>
</head>
<body>
<?php include('navcus.php');?>
  <?php
 
include ('connect.php');
$id = $_GET['id'];

$id1 = isset($_POST['order_id']) ? $_POST['order_id'] : '';

if(isset($_POST['submit'])){
    
   
    $img = $_FILES["fileToUpload"]["name"];
   
   

    $update = mysqli_query($conn,"UPDATE `tb_order` 
    set `payment_img`='".$img."', `order_status` = 'ชำระแล้ว' 
    WHERE `order_id` = ".$id);
    


 
  $target_dir = "img/slip/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $uploadOk = 1;
          echo "<script>";
            echo "alert(\"อัพโหลดสำเร็จ\");";
            echo "window.location = 'ordercustomer.php';"; //ไปหน้า addmin_pro
            echo "</script>";

      } else {
        echo "<script>";
        echo "alert(\"อัพโหลดไม่สำเร็จ\");";
        echo "window.location = 'ordercustomer.php';"; //ไปหน้า addmin_pro
        echo "</script>";
          
          $uploadOk = 0;
      }
 
}
    
  }

  ?>
<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>อัพโหลดรูปการชำระเงิน</center></h1><br>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden"value="<?php echo "$id"; ?>" name="order_id">
            
              กรุณาเลือกรูปภาพสินค้า:
              <input type="file" name="fileToUpload" onchange="readURL(this);"/>
              <img id="blah" width="50%"/>
      
          <input type="submit" value="Submit" name="submit" class="w3-margin w3-button w3-blue w3-hover-black w3-round-large">
          <a href="ordercustomer.php" class="w3-button w3-red w3-hover-black w3-round-large">Cancel</a>
      </form>

</div>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
