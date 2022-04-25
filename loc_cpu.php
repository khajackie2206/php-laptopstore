<!DOCTYPE html>
<html>

<head>
  <title>
    Laptop sinh viên
  </title>
  <meta charset="utf8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="icon" href="img/iconlaptop.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
  <?php
  $cpu = $_GET['u'];
  $con = mysqli_connect("localhost", "root", "", "banlaptop");
  $con->set_charset("utf8");
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if ($cpu == 1) {
    $sql = "select * from laptop where cpu like '%core%' order by tenlaptop";
    $result = $con->query($sql);
  } else if ($cpu == 2) {
    $sql = "select * from laptop where cpu like '%Ryzen%' order by tenlaptop";
    $result = $con->query($sql);
  } else {
    $sql = "select * from laptop where cpu like '%Apple M%' order by tenlaptop";
    $result = $con->query($sql);
  }
  if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
      $format_number_tien = number_format($row['giatien']);
      echo " <div class='col-md-4 col-sm-6 col-12 zoom1'>
                  <div class='card card-product mb-3'>
                  <div class='row justify-content-center'>
                 <img class='card-img-top img_product' src='admin/" . $row['hinhlaptop'] . "' style='width: 300px; height: 170px;' alt='Card image cap'>
                 </div>
                 <div class='card-body'>         
                 <div class='row justify-content-center'>   
                 <h4 class='card-title'>" . $row['tenlaptop'] . "</h4>  
                 </div>  
                 <div class='row justify-content-center' style='margin-bottom:10px;margin-top:10px;'>               
                 <p><h5 class='card-text cost'>" . $format_number_tien . " đ</h5></p>
                 </div>  
                 <p class='card-text' style='font-size:18px;font-weight:bold;'><span class='info'></span><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-cpu' viewBox='0 0 16 16'>
                 <path d='M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 
                 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z'/>
               </svg> &nbsp;" . $row['cpu'] . "</p>
                 <p class='card-text' style='font-size:18px;font-weight:bold;'><span class='info'><i class='fas fa-microchip'></i> &nbsp;</span>" . $row['ram'] . "</p>
                 <p class='card-text' style='font-size:18px;font-weight:bold;'><span class='info'><i class='fas fa-desktop'></i> &nbsp;</span>" . $row['manhinh'] . "</p>              
              <div class='row'>
                <a class='btn btn-warning' href='xulythem_sp.php?u=" . $row['malaptop'] . "' style='margin-left:10px;'>Thêm vào giỏ &nbsp;<i class='fas fa-shopping-cart'></i></a>
                 <a href='xemsanpham.php?select=" . $row['malaptop'] . "' class='btn btn-primary details'>Xem chi tiết</a>
               </div>
              </div>
               </div>
               </div>     
              ";
    }
    echo "</div>";
  } else {
    echo "
          <div class='col-md-12'>
          <div class='row justify-content-center'>Không tìm thấy sản phẩm yêu cầu</div>
          </div>
          ";
  }
  $con->close();
  ?>
</body>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

</html>