<?php 
if(isset($_SESSION['account_id'])){ ?>
      <div class="w3-top">
        <div class="w3-bar w3-pale-red">
          
          <a href="Product.php" class="w3-bar-item w3-button w3-hover-pink"><b>Home </b><i class="fas fa-home"></i></a>
          <a href="Customermap.php" class="w3-bar-item w3-button w3-hover-pink"><i class="fas fa-map-marked-alt"></i> <b>แผนที่ร้าน</b></a>
          <a href="basket.php" class="w3-bar-item w3-button w3-hover-pink"><b>ตระกร้าสินค้า</b> <i class="fas fa-shopping-cart"></i></a>
          <div class="w3-dropdown-hover w3-right w3-hover-pink">
            <b><button class="w3-button ">ยินดีต้อนรับ คุณ <?php echo $_SESSION['firstname']; ?></button></b>
              <div class="w3-dropdown-content w3-bar-block w3-card-4">
              <a href="personal.php" class="w3-bar-item w3-button"><b>ข้อมูลส่วนตัว</b></a>
              <a href="ChangePassword.php" class="w3-bar-item w3-button"><b>เปลี่ยนรหัสผ่าน</b></a>
              <a href="logout.php" class="w3-bar-item w3-button"><b>ออกจากระบบ</b></a>
              </div>
          </div>
          
          <a href="OrderCustomer.php" class="w3-bar-item w3-button w3-right w3-hover-pink"><b>การสั่งซื้อสินค้า</b></a>
          
         
        </div>
      </div>
  <?php }else { ?>
      <div class="w3-top">
        <div class="w3-bar w3-pale-red">
          <a href="login.php" class="w3-bar-item w3-button w3-right">login</a>
        </div>
      </div>
zend_logo_guid
  <?php }  ?>