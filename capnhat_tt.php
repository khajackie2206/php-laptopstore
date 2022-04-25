<!DOCTYPE html>
<html>
<head>
  <title>
    Lịch sử mua hàng
  </title>
  <meta charset="utf8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="icon" href="img/iconlaptop.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <style>
    body {
      background-color: #F5F5F5;
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
      border-radius: 5px;
    }
    .zoom1 {
      transition: transform .2s;
    }
    .zoom1:hover {
      -ms-transform: scale(1.05);
      -webkit-transform: scale(1.05);
      transform: scale(1.05);
    }
    .ikon {
      margin-left: 36px;
      margin-right: 36px;
      transition: transform .2s;
    }
    .ikon:hover {
      -ms-transform: scale(1.2);
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
    }
    #daidien {
      border: #f5f5f5;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
    }
    .info {
      font-weight: bold;
    }
    .timkiem {
      margin-right: 20px;
    }
    #no_result {
      text-align: center;
      left: 200px;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
    }
    .history {
      margin-top: 30px;
    }
    th {
      text-align: left;
      border-bottom: 3px solid black;
      padding: 15px 27px 15px 27px;
      font-size: 17px;
      color: grey;
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: #000;
    }
    .inform {
      margin-top: 80px;
    }
    .info {
      margin-top: 20px;
    }
    .comback {
      margin-top: 20px;
    }
    .comback1 {
      width: 400px;
      font-size: 22px;
      border: 1px solid #288ad6;
    }
    .cover-table {
      border: 1px solid lightgrey;
      background-color: white;
      padding: 5px 15px 35px 20px;
      margin-top: 10px;
      border-radius: 10px;
    }
    .header {
      text-align: center;
      padding-top: 7px;
      padding-bottom: 2px;
      margin-top: -20px;
      border-radius: 5px;
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: white;
    }
    #bang {
      margin-left: 0px;
      margin-top: 30px;
    }

    .hang {
      margin: 20px;
    }
    .hinhkh {
      border: 3px solid #0099FF;
    }
    .picture {
      width: 335px;
    }
    .capnhat {
      width: 350px;
      padding-top: 15px;
    }
    .but {
      width: 180px;
      border-radius: 15px;
      height: 40px;
    }
  </style>
  <?php session_start() ?>
</head>
<body>
  <!--Bắt đầu thanh menu -->
  <nav class="navbar navbar-expand-lg navbar-light bar">
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
          if (!isset($_SESSION['makh'])) {
            echo "<li class='nav-item active'>
                <a class='nav-link zoom'  style='color:#000;'>ADMIN <span class='sr-only'></span></a>
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
              <a class='nav-link dropdown-toggle'  id='navbarDropdown' style='color:#000;cursor: pointer;' >$_tenkh<span class='sr-only'>(current)</span></a>
              <div class='dropdown-content'>  
              <a class='dropdown-item' href='lichsumua.php' style='font-weight:bold;color:#555555;'>Lịch sử mua hàng</a>
              <a class='dropdown-item' href='capnhat_tt.php' style='font-weight:bold;color:#555555;'>Thông tin cá nhân</a>
              <a class='dropdown-item' href='xuly_dx.php' style='font-weight:bold;color:#555555;'>Đăng xuất</a>
               </div>
              </li>";
          }
          ?>
          <li class="nav-item dropdown">
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
        <button type="button" class="btn btn-primary" id="card">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg> &nbsp;<a href="giohang.php" style="text-decoration:none; color:white">Giỏ hàng
            <?php if (isset($_SESSION['makh'])) {
              $idkh = $_SESSION['makh'];
              $con = mysqli_connect("localhost", "root", "", "banlaptop");
              $con->set_charset("utf8");
              if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
              }
              $sql = "select * from giohang where makhachhang='$idkh'";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>" . $result->num_rows . "<span class='visually-hidden'></span>
            </span>";
              }
            }
            ?>
          </a>
        </button>
        <!--Kết thúc giỏ hàng -->
      </div>
    </div>
  </nav>
  <!--Modal đăng nhập-->
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
  <!--Kết thúc model đăng nhập -->
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
  <!--Kết thúc live search -->
  <!--Cập nhật thông tin cá nhân -->
  <div class="container history">
    <div class="header" style="background-color:#0099FF;text-align:center;">
      <h2>THÔNG TIN CÁ NHÂN</h2>
    </div>
    <?php
    $idkh = $_SESSION['makh'];
    $con = mysqli_connect("localhost", "root", "", "banlaptop");
    $con->set_charset("utf8");
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "select * from khachhang where makh=$idkh";
    $result = $con->query($sql);
    $tongtien = 0;
    if ($result->num_rows > 0) {
    ?>
      <div class="cover-table">
        <form action="update_tt.php?idkh=<?php echo $idkh; ?>" method="POST" enctype="multipart/form-data" onsubmit="return kiemtra1()">
          <div class="form-group">
            <div class="row justify-content-center">
              <table id="bang">
                <tr>
                  <td rowspan="4" class="picture"><img src="<?php echo $row['hinhkh']; ?>" class="hinhkh" style="width:200px;height:200px; margin-right:20px;border-radius:50%;"></td>
                </tr>
                <tr>
                  <td class="capnhat"> <label>Họ và tên</label>
                    <input type="text" class="form-control" name="tenkh" value="<?php echo $row['tenkh']; ?>">
                  </td>
                </tr>
                <tr>
                  <td class="capnhat">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" value="<?php echo $row['sdt']; ?>">
                  </td>
                </tr>
                <tr>
                  <td class="capnhat">
                    <label>Giới tính</label>
                    <input type="text" class="form-control" name="gioitinh" value="<?php echo $row['gioitinh']; ?>">
                  </td>
                </tr>
                <tr>
                  <td><input type="file" name="filename"></td>
                  <td class="capnhat">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" value="<?php echo $row['diachi']; ?>">
                  </td>
                </tr>
              </table>
            </div>
            <div class="form-group" style="margin-top: 45px;">
              <div class="row justify-content-center">
                <button type="submit" class="btn btn-success but" style="font-weight:bold;">Cập nhật</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php
    }
    ?>
  </div>
  <!--Kết thúc cập nhật thông tin cá nhân -->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>
</html>