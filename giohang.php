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
    .cover-table {
      border: 1px solid lightgrey;
      background-color: white;
      padding: 5px 15px 25px 20px;
      margin-top: 25px;
      border-radius: 10px;
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
      width: 600px;
      font-size: 22px;
      background-color: #F5F5F5;
      color: #288ad6;
      border: 1px solid #288ad6;
    }
    .timkiem {
      margin-right: 20px;
    }
    .tim {
      background-color: green;
      color: white;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
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
              <a class='nav-link dropdown-toggle zoom'  id='navbarDropdown' style='color:white;' >$_tenkh<span class='sr-only'>(current)</span></a>
              <div class='dropdown-content'>       
              <a class='dropdown-item' href='lichsumua.php' style='font-weight:bold;color:#555555;'>Lịch sử mua hàng</a>
              <a class='dropdown-item' href='capnhat_tt.php' style='font-weight:bold;color:#555555;'>Thông tin cá nhân</a>
              <a class='dropdown-item' href='xuly_dx.php' style='font-weight:bold;color:#555555;'>Đăng xuất</a>
               </div>
              </li>";
          } ?>
          </li>
        </ul>
        <span class="timkiem">
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" autocomplete="off" name="search" id="search" placeholder="Tìm sản phẩm" aria-label="Search">
            <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-search"></i></button>
          </form>
        </span>
        <div class="row justify-content-center">
          <div class="col-md-5" style="position:absolute;margin-top:20px;margin-right:15px; z-index:1;">
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
  <!--Modal-->
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
  <!--Live search -->
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
  <!--Ket thuc livesearch-->
 <!--Ket thuc menu-->

  <!--Hien thi cac san pham da mua-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <?php
        if (!isset($_SESSION['makh'])) {
          echo '<script language="javascript">alert("Vui lòng đăng nhập để sử dụng tính năng này");window.location="index.php";</script>';
        }
        $idkh = $_SESSION['makh'];
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select * from giohang where makhachhang='$idkh'";
        $result = $con->query($sql);
        $tongtien = 0;
        $tongsanpham = "";
        $tong_khong_dinh_dang = 0;
        $i = 1;
        echo "<div class='have'>";
        echo "Có " . $result->num_rows . " laptop trong giỏ hàng:";
        echo "</div>";
        if ($result->num_rows == 0) {
          echo "<div class='row inform justify-content-center'>
             <a href='index.php'><img src='img/giohang2.png' style='width: 300px;height:300px;'></a>
            </div>   ";
          echo "<div class='row info justify-content-center'>
             <p style='font-size:19px;'> Không có sản phẩm nào trong giỏ hàng</p>
            </div>";
          echo "<div class='row comback justify-content-center'>
              <a style='button;color:#288ad6;' href='index.php' class='btn btn-success comback1' >Về trang chủ</a>
            </div>
            ";
        } else {
          echo "<div class='cover-table'>";
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $malap_hientai = $row['malaptop'];
              $sqll = "SELECT * FROM laptop where malaptop ='$malap_hientai'";
              $result2 = $con->query($sqll);
              echo "<table>";
              if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                  $tien = $row['soluonglap'] * $row2['giatien'];
                  $tien_ko_dinh_dang = $row['soluonglap'] * $row2['giatien'];
                  $tongsanpham = $tongsanpham . ' ' . $row['soluonglap'] . ' x ' . $row2['tenlaptop'];
                  $format_number_tien_lap = number_format($tien);
                  echo "              
                     <tr>                
                       <td style='width: 330px;'><img src='admin/" . $row2['hinhlaptop'] . "' class='zoom' style='max-width: 200px; max-height: 150px; width: auto; height: auto;' /></td>
                       <td style='font-weight:bold;'>" . $row2['tenlaptop'] . " - 
                           " . $row2['cpu'] . " - 
                           " . $row2['ram'] . " - 
                           " . $row2['dohoa'] . " 
                       </td>
                       <td style='width: 200px;text-align:right;padding-left:30px;'>
                       <form>
                        <a href='giam.php?id=" . $row['magiohang'] . "'><input type='button' value='-' style='width:25px;'/></a>
                         <input type='text' id='number' value='" . $row['soluonglap'] . "' style='width: 40px;text-align:center;'/>
                          <a href='tang.php?id=" . $row['magiohang'] . "'> <input type='button' value='+' style='width:25px;' /></a>
                          </form>
                       </td>
                       <td style='text-align:center;'>
                         <a style='color:red;padding-left:40px; margin-right:70px;font-weight:bold;font-size:17px;'> $format_number_tien_lap đ </a>
                         <a href='xoa_giohang.php?id=" . $row['magiohang'] . "'><img src='img/trashbin.png' class='zoom-in' width=25px height=25px/></a> 
                       </td>
                     </tr>  
                   ";
                  $i = $i + 1;
                  $tongtien = $tongtien + $tien;
                  $tong_khong_dinh_dang = $tong_khong_dinh_dang + $tien_ko_dinh_dang;
                }
                echo "</table>";
              }
            }
          }
          $format_number_tien_tong = number_format($tongtien);
          echo "<div class='row' style='margin-top:30px;margin-bottom:15px;'>
      <div class='col-md-6'>     
      <a style='text-dercoration:none;color:black;font-weight:bold;font-size:18px;'>Tổng cộng:</a>
      </div>
      <div class='col-md-6'>
       <div style='text-align:right;color:red;font-weight:bold;font-size:20px;'>
            $format_number_tien_tong đ     
      </div>
     </div>
     </div>
     <div class='row justify-content-center' style='margin-bottom:15px;'>
     <a href='thanhtoan.php?idkh=" . $idkh . "&tong=$tong_khong_dinh_dang&mathang=$tongsanpham' style='font-weight:bold;'><button type='button' class='btn btn-warning' style='font-weight:bold;'>Đặt hàng </button></a>
     </div>
     ";
          echo "</div>";
          echo "<div class='row justify-content-center' style='margin-top:20px;'>
           <p>Bằng cách nhấn vào đặt hàng, bạn đã đồng ý với chính sách của chúng tôi</p>
           </div>";
        }
        $con->close()
        ?>
      </div>
    </div>
  </div>
  <!--Ket thuc hien thi -->
  <script>
  </script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>
</html>