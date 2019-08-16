<?php
include 'connect.php';


  $year_start = $_POST['year_start'];
  $year_end = $_POST['year_end'];
  $month_start = $_POST['month_start'];
  $month_end = $_POST['month_end'];
 

$query = "SELECT tb_order,  from booking WHERE MONTH(`order_date`)>=$month_start AND MONTH(`order_date`)<=$month_end AND YEAR(`order_date`)>=$year_start AND YEAR(`order_date`)<=$year_end group by programname";
$res = mysqli_query($connect,$query)



// SELECT programname, sum(numbers) FROM `booking` WHERE MONTH(`booking_date`)>=month_start AND MONTH(`booking_date`)<=month_end AND YEAR(`booking_date`)=2019
?>

<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../animate/animate.min.css" rel="stylesheet">
  <link href="../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['program', 'numbers'],
          
          <?php 

          while($row=$res->fetch_assoc())
          {
            echo "['".$row['programname']."',".$row['sum(numbers)']."],";
          }

          ?>

        ]);

        var options = {
          title: 'สถิติการจองโปรแกรมท่องเที่ยว'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body><br>
  <div class="container"><a href="show.php"><i class="fas fa-chevron-left"></i> กลับ</a>
  </div>
  <form class="form-group row col-md-2 offset-4" method="post" action="report.php">
      <div class="form-inline row mx-sm-3 mb-2">
          <div class="form-inline">ช่วงปี</div>&nbsp;&nbsp;&nbsp;
              <select class="form-control" name="year_start">
                <option value="<?php echo $year_start;?>">
                <?php
                if($year_start == 2020){
                  echo '2563';
                } if($year_start == 2019){
                  echo '2562';
                } if($year_start == 2018){
                  echo '2561';
                }
                ?>
                </option>
                
              </select>
            </div>

          
            <div class="form-inline row mx-sm-3 mb-2">
          <div class="form-inline">ถึง</div>&nbsp;&nbsp;&nbsp;
              <select class="form-control" name="year_end">
              <option value="<?php echo $year_end;?>">
              <?php
                if($year_end == 2020){
                  echo '2563';
                } if($year_end == 2019){
                  echo '2562';
                } if($year_end == 2018){
                  echo '2561';
                }
                ?>
                </option>
                
              </select>
            </div>

            
            <div class="form-inline row mx-sm-6 mb-2">
          <div class="form-inline">ช่วงเดือน</div>&nbsp;&nbsp;&nbsp;
              <select class="form-control" name="month_start">
                <option value="<?php echo $month_start;?>">
                <?php 
                $var = $month_start;
               
                if ($var == 1) {
                  echo "มกราคม";
              } if ($var == 2) {
                  echo "กุมภาพันธ์";
              } if ($var == 3) {
                   echo "มีนาคม";
              } if ($var == 4) {
                  echo "เมษายน";
              } if ($var == 5) {
                  echo "พฤษภาคม";
              } if ($var == 6) {
                  echo "มิถุนายน";
              } if ($var == 7) {
                   echo "กรกฎาคม";
              } if ($var == 8) {
                   echo "สิงหาคม";
               } if ($var == 9) {
                  echo "กันยายน";
                } if ($var == 10) {
                    echo "ตุลาคม";
                }  if ($var == 11) {
                  echo "พฤศจิกายน";
              }  if ($var == 12) {
                echo "ธันวาคม";
            }?>
                </option>
                
              </select>
            </div>
          
            <div class="form-inline row mx-sm-3 mb-2">
          <div class="form-inline">ถึง</div>&nbsp;&nbsp;&nbsp;
              <select class="form-control" name="month_end">
              <option value="<?php echo $month_end;?>">
              <?php 
                $var_end = $month_end;
              
                if ($var_end == 1) {
                  echo "มกราคม";
              } if ($var_end == 2) {
                  echo "กุมภาพันธ์";
              } if ($var_end == 3) {
                   echo "มีนาคม";
              } if ($var_end == 4) {
                  echo "เมษายน";
              } if ($var_end == 5) {
                  echo "พฤษภาคม";
              } if ($var_end == 6) {
                  echo "มิถุนายน";
              } if ($var_end == 7) {
                   echo "กรกฎาคม";
              } if ($var_end == 8) {
                   echo "สิงหาคม";
               } if ($var_end == 9) {
                  echo "กันยายน";
                } if ($var_end == 10) {
                    echo "ตุลาคม";
                }  if ($var_end == 11) {
                  echo "พฤศจิกายน";
              }  if ($var_end == 12) {
                echo "ธันวาคม";
            }?>
              </option>
                
              </select>
            </div>
            </form><br>

            <!-- chart -->
            
    <div id="piechart" style="width: 900px; height: 500px;"></div>
      


      
  </body>
</html>
