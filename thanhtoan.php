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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="sk_dk.js"></script>
  <style>
    body {
      background-color: #F5F5F5;
    }
    #menu {
      background-color: black;
    }
    .have {
      margin-top: 15px;
      text-align: right;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
    }
    .cover-table {
      border: 1px solid lightgrey;
      background-color: white;
      padding: 5px 15px 25px 20px;
      margin-top: 25px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .cover {
      border-bottom: 2px solid #F5F5F5;
      margin-bottom: 25px;
      margin-top: 25px;
    }
    #cost {
      margin-right: 30px;
      text-align: right;
    }
    table {
      border-bottom: 1px solid lightgray;
    }
    td {
      height: 200px;
      width: 400px;
    }
    .zoom {
      transition: transform .2s;
    }
    .active {
      margin-left: 10px;
      margin-right: 10px;
    }
    .zoom:hover {
      -ms-transform: scale(1.05);
      -webkit-transform: scale(1.05);
      transform: scale(1.05);
      background-color: #FFCC33;
    }
    .nak {
      background-color: #00BFFF;
    }
    .place2 {
      margin-top: 20px;
    }
    .place1 {
      border-top: 2px solid grey;
      margin: 30px 20px 30px 20px;
      padding-top: 25px;
    }
    .place3 {
      margin: 15px 20px 15px 20px;
      padding-top: 15px;
    }
    .place {
      margin: 30px 20px 40px 20px;
    }
    .but {
      width: 200px;
      height: 50px;
      padding-top: 10px;
    }
    .tien {
      color: red;
      font-weight: bold;
      font-size: 18px;
    }
    .tien1 {
      color: red;
      font-weight: bold;
      font-size: 20px;
    }
    .timkiem {
      margin-right: 20px;
    }
  </style>
</head>
<body>
  <!--menu-->
  <nav class="navbar navbar-expand-lg navbar-light nak">
    <div class="container">
      <a class="navbar-brand" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
          <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </svg></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
          session_start();
          if (!isset($_SESSION['makh'])) {
            echo "<li class='nav-item active'>
                <a class='nav-link zoom'  style='color:#FF9900;'>ADMIN <span class='sr-only'>(current)</span></a>
              </li>";
          } else {
            $makh = $_SESSION['makh'];
            $con = mysqli_connect("localhost", "root", "", "banlaptop");
            $con->set_charset("utf8");
            $sql = "SELECT * FROM khachhang WHERE makh='$makh'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              $row = mysqli_fetch_array($result);
              $_tenkh = $row['tenkh'];
              $_hinh = $row['hinhkh'];
              echo "<li class='nav-item active'>
                <img src='" . $_hinh . "' id='daidien' style='width:45px;height:45px; margin-left:20px;border-radius:50%;'>
                </li>";
            }
            echo "<li class='nav-item dropdown'>                       
              <a class='nav-link dropdown-toggle'  id='navbarDropdown' style='color:white;cursor: pointer;' >$_tenkh<span class='sr-only'>(current)</span></a>
              <div class='dropdown-content'>     
              <a class='dropdown-item' href='lichsumua.php' style='font-weight:bold;color:#555555;'>Lịch sử mua hàng</a>
              <a class='dropdown-item' href='capnhat_tt.php' style='font-weight:bold;color:#555555;'>Thông tin cá nhân</a>
              <a class='dropdown-item' href='xuly_dx.php' style='font-weight:bold;color:#555555;'>Đăng xuất</a>
               </div>
              </li>";
          }
          ?>
          </li>
        </ul>
        <span class="timkiem">
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" autocomplete="off" name="search" id="search" placeholder="Tìm sản phẩm" aria-label="Search">
            <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-search"></i></button>
          </form>
        </span>
        <div class="row justify-content-center">
          <div class="col-md-5" style="position:absolute;margin-top:20px;margin-right:85px; z-index:1;">
            <div class="list-group" id="show-list">
            </div>
          </div>
        </div>
        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" id="login">Đăng nhập</button>
   <!--Gio hang-->
        <button type="button" class="btn btn-warning" id="card">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg> &nbsp;<a href="giohang.php" style="text-decoration:none; color:white">Giỏ hàng</a>
        </button>
   <!--Ket thuc gio hang-->
      </div>
    </div>
  </nav>

  <!--Live search-->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#search").keyup(function() {
        var searchText = $(this).val();
        if (searchText != '') {
          $.ajax({
            url: 'action.php',
            method: 'post',
            data: {
              query: searchText
            },
            success: function(response) {
              $("#show-list").html(response);
            }
          });
        } else {
          $("#show-list").html('');
        }
      });
      $(document).on('click', 'a', function() {
        $("#search").val($(this).text());
        $("#show-list").html('');
      });
    });
  </script>
  <!--Ket thuc live search -->

  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Đăng nhập</h4>
          <form action="xuly_dn.php" method="POST" enctype="multipart/form-data">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
          </div>
          <!--end modal body-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> <a href="form_dk.php" style="color: aliceblue; text-decoration: none;"> tạo tài khoản mới</a></button>
          <button type="submit" class="btn btn-primary">
            Đăng nhập
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--Ket thuc thanh menu -->

  <!--Chi tiet thanh toan-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <?php
        $tongmathang = $_GET['mathang'];
        $idkhach = $_GET['idkh'];
        $tientong = $_GET['tong'];
        $tientong = (int)$tientong;
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select * from khachhang where makh=$idkhach";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="cover-table">
          <form action="lichsu.php?idkh=<?php echo $idkhach; ?>&tong=<?php echo $tientong ?>&mathang=<?php echo $tongmathang ?>" method="POST" enctype="multipart/form-data" onsubmit="return kiemtra1()">
            <div class="form-group">
              <div class="row place justify-content-center">
                <h2>Xác nhận đặt hàng</h2>
              </div>
              <div class="row place">
                <div class="col">
                  <label>Tên khách hàng</label>
                  <input type="text" class="form-control" value="<?php echo $row['tenkh']; ?>">
                </div>
                <div class="col">
                  <label>Tỉnh thành</label>
                  <input type="text" class="form-control" value="<?php echo $row['diachi']; ?>">
                </div>
              </div>
              <div class="row place">
                <div class="col">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" value="<?php echo $row['sdt']; ?>">
                </div>
                <div class="col">
                  <label>Giới tính</label>
                  <input type="text" class="form-control" value="<?php echo $row['gioitinh']; ?>">
                </div>
              </div>
              <div class="row place">
                <div class="col">
                  <label>Nhập địa chỉ giao hàng</label>
                  <input type="text" class="form-control" placeholder="Địa chỉ giao hàng" require name="diachi" id="diachi">
                  <div id="diachi2" style="color:red;margin-top:15px;"></div>
                </div>
                <div class="col">
                  <label>Mô tả chi tiết</label>
                  <textarea name="description" class="form-control" value="<?php echo $tongmathang; ?>" rows="3" col="20"><?php echo $tongmathang; ?> </textarea>
                </div>
              </div>
              <div class="row place3">
                <div class="col">
                  Tổng tiền:
                </div>
                <div class="col" style="text-align:right;">
                  <?php
                  $tientong_dd = number_format($tientong);
                  echo "<div class='tien'>$tientong_dd VNĐ</div>";
                  ?>
                </div>
              </div>
              <div class="row place3">
                <div class="col">
                  Phí giao hàng:
                </div>
                <div class="col" style="text-align:right;">
                  <?php
                  $phigiaohang = 30000;
                  $phigiaohang = number_format(30000);
                  $tientong = $tientong + 30000;
                  echo "<div class='tien'>$phigiaohang VNĐ</div>";
                  ?>
                </div>
              </div>
              <div class="row place1">
                <div class="col">
                  Tổng tiền thanh toán:
                </div>
                <div class="col" style="text-align:right;">
                  <?php
                  $tientong_dd = number_format($tientong);
                  echo "<div class='tien1'>$tientong_dd VNĐ</div>";
                  ?>
                </div>
              </div>
              <div class="row place2 justify-content-center">
                <button type="submit" class="btn btn-warning but" style="font-weight:bold;">Thanh toán</button>
              </div>
            </div>
          </form>
        </div>
        <div class="row justify-content-center" style="margin-top:15px;">
          <p>Nhận hàng trong vòng 3 - 7 ngày trừ các ngày lễ tết</p>
        </div>
      </div>
    </div>
  </div>
 <!--Ket thuc thanh toan-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>
</html>