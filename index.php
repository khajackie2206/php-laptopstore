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
  <script src="sk_dk.js"></script>
  <style>
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
      background-color: white;
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

    .card {
      margin: 5px;
      height: 507px;
      padding: 10px;
      border-radius: 10px;
    }

    .card:hover {
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    #daidien {
      border: #f5f5f5;
    }

    .dropdown-item {
      border-bottom: 1px solid white;
    }

    .details {
      margin-left: 10px;
      background-color: white;
      color: #3366CC;
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
  </style>
</head>

<body>
  <!--Thanh tieu de-->
  <nav class="navbar navbar-expand-lg navbar-light bar">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="margin-left: 2px;"><i class="fas fa-house-user"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
          session_start();
          if (!isset($_SESSION['makh'])) {

            echo "<li class='nav-item active'>
                <a class='nav-link zoom'  style='color:#000;'>ADMIN<span class='sr-only'></span></a>
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
          <li class="nav-item active">
            <span class="nav-link zoom" new="2021" onclick='newly(this)' style="color:#000;font-weight:bold;cursor: pointer;">MỚI RA MẮT<span class="sr-only"></span></span>
          </li>
        </ul>
        <!--Live search -->
        <span class="timkiem">
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" autocomplete="off" name="search" id="search" placeholder="Tìm sản phẩm" aria-label="Search">
            <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-search"></i></button>
          </form>
        </span>
        <div class="row justify-content-center">
          <div class="col-md-5" style="position:absolute;margin-top:20px;margin-right:45px; z-index:1;">
            <div class="list-group" id="show-list">
            </div>
          </div>
        </div>
        <!--end live search -->
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
            } ?>
          </a>
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
          <form action="xuly_dn.php" method="POST" enctype="multipart/form-data" onsubmit="return test()">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id="user">
            <div id="tendn" style="color:red;margin-top:15px;"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="pass_dn">
            <div id="matkhau" style="color:red;margin-top:15px;"></div>
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
  <!--Ket thuc Model-->
  <!--end menu-->
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
  <!--Ket thuc thanh tieu de-->

  <!--slide show-->

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div id="carouselExampleIndicators" class="carousel slide" style="height:350px;width:1115px;margin-top:14px;right:5px;" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="xemsanpham.php?select=21"><img class="d-block w-100" src="img/banner_mac1.jpg" style="height:350px;" alt="First slide"></a>
          </div>
          <div class="carousel-item">
            <a href="xemsanpham.php?select=9"><img class="d-block w-100" src="img/banner_asus.jpg" style="height:350px;" alt="Second slide"></a>
          </div>
          <div class="carousel-item">
            <a href="xemsanpham.php?select=13"><img class="d-block w-100" src="img/banner_dell.jpg" style="height:350px;" alt="Third slide"></a>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <!--Ket thuc slide show-->
  <!--Loai laptop-->
  <div class="container">
    <div class="col-md-12" id="loai">
      <a><img src="img/macbook.png" class="ikon" id_hieu="1" onclick='brand(this)' style="max-width: 120px; max-height: 100px; width: auto; height: auto;cursor: pointer;"></a>
      <a><img src="img/dell-logo.jpg" class="ikon" id_hieu="6" onclick='brand(this)' style="max-width: 100px; max-height: 50px; width: auto; height: auto;cursor: pointer;"></a>
      <a><img src="img/asus.png" class="ikon" id_hieu="7" onclick='brand(this)' style="max-width: 120px; max-height: 50px; width: auto; height: auto;cursor: pointer;"></a>
      <a><img src="img/acer.svg" class="ikon" id_hieu="8" onclick='brand(this)' style="max-width: 120px; max-height: 40px; width: auto; height: auto;cursor: pointer;"></a>
      <a><img src="img/hp.png" class="ikon" id_hieu="9" onclick='brand(this)' style="max-width: 120px; max-height: 40px; width: auto; height: auto;cursor: pointer;"></a>
      <a><img src="img/lenovo.png" class="ikon" id_hieu="10" onclick='brand(this)' style="max-width: 120px; max-height: 50px; width: auto; height: auto;cursor: pointer;"></a>
    </div>
  </div>
  <!-- Phân loại laptop-->
  <div class="container sorting">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link">Ưu tiên xem:</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link sort" href="#" id="navbarDropdown">
          Theo mức giá
        </a>
        <div class="dropdown-content">
          <span class="dropdown-item" gia="20" onclick='cost(this)' style="cursor: pointer;border-bottom: 1px solid white;">Dưới 20 triệu</span>
          <span class="dropdown-item" gia="25" onclick='cost(this)' style="cursor: pointer;border-bottom: 1px solid white;">Từ 20 đến 30 triệu</span>
          <span class="dropdown-item" gia="30" onclick='cost(this)' style="cursor: pointer;border-bottom: 1px solid white;">Trên 30 triệu</span>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link sort" href="#" id="navbarDropdown">
          Cấu hình thiết bị
        </a>
        <div class="dropdown-content">
          <span class="dropdown-item" machip="1" onclick='chip(this)' style="cursor: pointer;border-bottom: 1px solid white;">Chip Intel</span>
          <span class="dropdown-item" machip="2" onclick='chip(this)' style="cursor: pointer;border-bottom: 1px solid white;">Chip AMD</span>
          <span class="dropdown-item" machip="3" onclick='chip(this)' style="cursor: pointer;border-bottom: 1px solid white;">Chip Apple M</span>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link sort" href="#">Hãng sản xuất</a>
        <div class="dropdown-content">
          <span class="dropdown-item" id_hieu="1" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">Macbook</span>
          <span class="dropdown-item" id_hieu="6" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">Dell</span>
          <span class="dropdown-item" id_hieu="7" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">Asus</span>
          <span class="dropdown-item" id_hieu="8" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">Acer</span>
          <span class="dropdown-item" id_hieu="9" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">HP</span>
          <span class="dropdown-item" id_hieu="10" onclick='brand(this)' style="cursor: pointer;border-bottom: 1px solid white;">Lenovo</span>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link sort" href="#">Năm ra mắt</a>
        <div class="dropdown-content">
          <span class="dropdown-item" nam="2021" onclick='year(this)' style="cursor: pointer;border-bottom: 1px solid white;">2021</span>
          <span class="dropdown-item" nam="2020" onclick='year(this)' style="cursor: pointer;border-bottom: 1px solid white;">2020</span>
          <span class="dropdown-item" nam="2019" onclick='year(this)' style="cursor: pointer;border-bottom: 1px solid white;">2019</span>
          <span class="dropdown-item" nam="2018" onclick='year(this)' style="cursor: pointer;border-bottom: 1px solid white;">Cũ hơn</span>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link sort" href="#" id="navbarDropdown">
          Nhu cầu sử dụng
        </a>
        <div class="dropdown-content">
          <span class="dropdown-item" id="2" onclick='details(this)' style="cursor: pointer;border-bottom: 1px solid white;">Văn phòng</span>
          <span class="dropdown-item" id="1" onclick='details(this)' style="cursor: pointer;border-bottom: 1px solid white;">Gaming đồ họa</span>
          <span class="dropdown-item" id="3" onclick='details(this)' style="cursor: pointer;border-bottom: 1px solid white;">Sinh viên</span>
          <span class="dropdown-item" id="4" onclick='details(this)' style="cursor: pointer;border-bottom: 1px solid white;">Mỏng nhẹ</span>
        </div>
      </li>
    </ul>
  </div>
  <!--ENd phân loại laptop-->
  <!--Sản phẩm-->
  <!--Xuat card-->
  <div class="container">
    <div class="row mt-4">
    </div>
    <div class="product-group">
      <div class='row' id="card_sp">
        <?php
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select * from laptop LIMIT 15";
        $result = $con->query($sql);
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
          echo "o result";
        }
        $con->close();
        ?>
      </div>
    </div>
    <!--END sản phẩm-->
    <!--Footer trang web-->
    <footer class="footer-distribute footer">
      <div class="row">
        <div class="col-md-4">
          <h5>Nguyen Minh Kha <span> | Webstore</span></h5>
          <p>Designed by Kha &copy; 2021</p>
          <p>Home | Blog | About | Fag | Contact</p>
        </div>
        <div class="col-md-4">
          <div class="row">
            <h5>Information | Address</h5>
          </div>
          <div class="row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg> &nbsp; Ấp 10, xã Trinh Phú, huyện Kế Sách, tỉnh Sóc Trăng
          </div>
          <div class="row">
            <br>
          </div>
          <div class="row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg> &nbsp; 0911603179 | 0918876124
          </div>
          <div class="row">
            <br>
          </div>
          <div class="row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
            </svg> &nbsp; khab1809242@student.ctu.edu.vn
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <p><span>
                <h5>About this website</h5>
              </span><br>
            </p>
          </div>
          <div class="row">
            <p>If you want more information about myself please
              <br> contact me follow:
            </p>
          </div>
          <div class="row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg>
            &nbsp; &nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
            &nbsp; &nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </svg>
            &nbsp; &nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
              <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
            </svg>
          </div>
        </div>
      </div>
    </footer>
    <!--Hết Footer trang web-->

    <!--script loc theo nhu cau -->
    <script>
      function details(str) {
        let attribute = str.getAttribute("id");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_nhucau.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }

      function brand(str) {
        let attribute = str.getAttribute("id_hieu");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_hieu.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }

      function year(str) {
        let attribute = str.getAttribute("nam");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_nam.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }

      function cost(str) {
        let attribute = str.getAttribute("gia");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_gia.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }

      function chip(str) {
        let attribute = str.getAttribute("machip");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_cpu.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }

      function newly(str) {
        let attribute = str.getAttribute("new");
        if (str == "") {
          document.getElementById("card_sp").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("card_sp").style.display = 'none';
              document.getElementById("card_sp").innerHTML = this.responseText;
            }
          }
          xmlhttp.open("GET", "loc_new.php?u=" + attribute, true);
          xmlhttp.send();
        }
      }
    </script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>