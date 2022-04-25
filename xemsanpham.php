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
    .cover {
      margin-bottom: 100px;
      margin-top: -35px;
    }
    .title {
      margin-top: 20px;
      border-bottom: 1px solid lightgrey;
    }
    #name_lap {
      border: 1px solid black;
    }
    .technical td {
      border: 1px solid lightgray;
      padding: 10px 100px 10px 15px;
    }
    .technical th {
      border: none;
      padding: 20px;
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
      background-color: white;
    }
    .cover-table {
      border: 1px solid lightgrey;
      padding-top: 20px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    #thongso {
      margin-bottom: 20px;
    }
    .technical tr:nth-child(odd) {
      background-color: #eee;
    }
    .technical tr:nth-child(even) {
      background-color: white;
    }
    #add {
      background-color: white;
    }
    .pic {
      transition: transform .2s;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .pic:hover {
      -ms-transform: scale(1.05);
      -webkit-transform: scale(1.05);
      transform: scale(1.05);
    }
    .gia {
      font-weight: 500;
      color: #cb1c22;
    }
    .bread {
      background-color: white;
    }
    .cover-bread {
      background-color: #f5f5f5;
      padding-bottom: 0px;
    }
    .timkiem {
      margin-right: 20px;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
    }
  </style>
</head>
<body>
  <!--menu-->
  <nav class="navbar navbar-expand-lg navbar-light bar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fas fa-house-user"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
          session_start();
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
          <div class="col-md-5" style="position:absolute;margin-top:20px;margin-right:85px; z-index:1;">
            <div class="list-group" id="show-list">
            </div>
          </div>
        </div>
        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" id="login">Đăng nhập</button>
        <button type="button" class="btn btn-primary" id="card">
          <!--Gio hang-->
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
      </div>
    </div>
  </nav>
  <!--Ket thuc menu -->


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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> <a href="form_dk.html" style="color: aliceblue; text-decoration: none;"> tạo tài khoản mới</a></button>
          <button type="submit" class="btn btn-primary">
            Đăng nhập
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--Ket thuc model -->

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
  <!--Ket thuc Live Seach -->


<!--Chi tiết sản phẩm-->
  <div class="container">
    <div class="row">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bread">
          <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none; color:F5F5F5;">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Xem sản phẩm</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="container cover">
    <?php
    $idlap = $_GET['select'];
    $con = mysqli_connect("localhost", "root", "", "banlaptop");
    $con->set_charset("utf8");
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "select * from laptop where malaptop='$idlap'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $format_number_tien = number_format($row['giatien']);
        echo "
            <div class='row'>
            <div class='col-md-6'>
            <div class='row title'>      
            <h3 class='card-title' style='padding-left:15px;'>" . $row['tenlaptop'] . "</h3>     
            </div>
            <img src='admin/" . $row['hinhlaptop'] . "' class='pic' style='max-width:500px; max-height: 350px; width:auto;height:auto'>
            <p>&nbsp;</p>
            <p><img src='img/1nam.png' width=35px height=25px>&nbsp; Hàng chính hãng - bảo hành 12 tháng &nbsp <img src='img/xe.png' width=30px height=30px>&nbsp; Giao hàng toàn quốc</p>
            <p> &nbsp;<img src='img/bao-tri.png' width=25px height=25px>&nbsp; Đổi trả hàng trong vòng 1 tháng nếu có lỗi </p>
            </div>
            <div class='col-md-6'>
                   <p><h4 class='card-text gia'>" . $format_number_tien . " đ</h4></p>
                   <div class='cover-table'>
                   <div class='row justify-content-center'>
                   <table class='technical'>
                      <tr><h4 id='thongso'>Thông số kỹ thuật</h4></tr>
                      <tr>
                         <td>CPU</td>
                         <td>" . $row['cpu'] . "</td>
                      </tr>
                      <tr>
                         <td>RAM</td>
                         <td>" . $row['ram'] . "</td>
                      </tr>
                      <tr>
                         <td>Màn hình</td>
                         <td>" . $row['manhinh'] . "</td>
                      </tr>
                      <tr>
                         <td>Đồ họa</td>
                         <td>" . $row['dohoa'] . "</td>
                      </tr>
                      <tr>
                         <td>Ổ cứng</td>
                         <td>" . $row['ocung'] . "</td>
                      </tr>
                      <tr>
                         <td>Xuất xứ</td>
                         <td>" . $row['xuatxu'] . "</td>
                      </tr>
                      <tr>
                      <td>Năm ra mắt</td>
                      <td>" . $row['namramat'] . "</td>
                   </tr>
                   <tr id='add'>
                   <th colspan='2'>
                   <div class='row justify-content-center'>
                   <a href='xulythem_sp.php?u=" . $row['malaptop'] . "' class='btn btn-primary'>Thêm vào giỏ hàng</a>
                   </th>
                   </div>
                   </tr>
                   </table>  
                </div>              
                 </div> 
                 <div class='row justify-content-center tuvan'> 
                 <p>&nbsp;&nbsp;&nbsp;&nbsp; Gọi &nbsp;<p style='color:red'> 1800-6601 </p> &nbsp; để được tư vấn mua hàng (Miễn phí)</p>
                 </div>
            </div>
            </div>
            ";
      }
    }
    ?>
  </div>
 <!--Ket thuc chi tiet san pham-->


 <!--Footer trang web -->
  <footer class="footer-distribute footer" style="margin-top: 100px;">
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
<!--Ket thuc chan trang-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>