<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Quản trị website
  </title>
  <meta charset="utf8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="quantri.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="icon" href="img/iconlaptop.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <style>
    table {
      border: 1px solid lightgray;
      border-top: 2px solid #0099FF;
      border-collapse: collapse;
      border-radius: 2px;
    }
    td {
      border-top: 1px solid lightgrey;
      padding: 7px 25px 7px 25px;
      border-bottom: 1px solid lightgrey;
      border-collapse: collapse;
      text-align: left;
    }
    #cover-table {
      background-color: white;
    }
    .cover-table {
      background-color: white;
      padding: 5px 15px 25px 20px;
      margin-top: 25px;
      margin-bottom: 30px;
      padding-bottom: 25px;
      border-radius: 10px;
    }
    .zoom {
      transition: transform .2s;
    }
    .zoom:hover {
      -ms-transform: scale(1.3);
      -webkit-transform: scale(1.3);
      transform: scale(1.3);
      border-radius: 2px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .zoom-in {
      transition: transform .2s;
    }
    .zoom-in:hover {
      -ms-transform: scale(1.3);
      -webkit-transform: scale(1.3);
      transform: scale(1.3);
      border-radius: 2px;
    }
    .ikon {
      transition: transform .2s;
    }
    .ikon:hover {
      -ms-transform: scale(1.1);
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
    .zoom2 {
      transition: transform .2s;
    }
    .active {
      margin-left: 10px;
      margin-right: 10px;
    }
    .zoom2:hover {
      -ms-transform: scale(1.05);
      -webkit-transform: scale(1.05);
      transform: scale(1.05);
      background-color: #FFCC33;
    }
    th {
      text-align: left;
      border: 2px solid #0099FF;
      padding: 12px 25px 12px 25px;
      font-size: 17px;
      background-color: #0099FF;
      color: white;
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
    }
    table {
      margin: auto;
    }
    a {
      color: black;
    }
    .name_lap {
      background-color: black;
      color: white;
      border-radius: 5px;
      padding: 4px;
      font-weight: bold;
    }
    .cost {
      background-color: red;
      color: white;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .cpu {
      background-color: #0099FF;
      color: white;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .monitor {
      background-color: #FF66FF;
      color: white;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .ram {
      background-color: #FF9900;
      color: white;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .gpu {
      background-color: #00BB00;
      color: white;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .accept {
      background-color: yellow;
      color: black;
      padding: 6px;
      border-radius: 5px;
      font-weight: bold;
    }
    .history {
      margin-top: 30px;
    }
    .client {
      padding: 15px;
      width: 200px;
      text-align: left;
    }
    .sum {
      font-weight: bold;
      font-size: 20px;
    }
    .cost1 {
      font-size: 20px;
      font-weight: bold;
      color: red;
    }
    .control {
      margin-top: 30px;
    }
    .page-item {
      margin-left: 5px;
      margin-right: 5px;
    }
    .timkiem {
      margin-right: 20px;
    }
    .dropdown-item {
      border-bottom: 1px solid white;
    }
    .liveSearch {
      margin-bottom: 30px;
    }
    .have {
      margin-right: 15px;
      margin-top: 35px;
      text-align: right;
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: #000;
    }
    .header_lap {
      margin-bottom: 45px;
      margin-top: 45px;
      font-family: 'Oswald', sans-serif;
    }
    .nav-link {
      color: white;
    }
    .equip {
      background-color: black;
      color: white;
    }
    h3 {
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: #000;
    }
    h2 {
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: #000;
      margin-bottom: 25px;
    }
    label {
      font-family: Courier New, Courier, monospace;
      font-weight: bold;
      color: #000;
    }
    #new_account {
      margin-right: 10px;
    }
    #logout {
      margin-right: 30px;
    }
  </style>
</head>
<body>
  <!--Bắt đầu menu -->
  <nav class="navbar navbar-expand-lg navbar-light bar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php
        if (!isset($_SESSION['ID'])) {
          echo "<li class='nav-item active'>
                <a class='nav-link zoom2'  style='color:#000;'>ADMIN <span class='sr-only'>(current)</span></a>
              </li>";
        } else {
          $makh = $_SESSION['ID'];
          $con = mysqli_connect("localhost", "root", "", "banlaptop");
          $con->set_charset("utf8");
          $sql = "SELECT * FROM admin WHERE ID='$makh'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $_tenkh = $row['hotenqtv'];
            $_hinh = $row['hinhanh'];
            echo "<li class='nav-item active'>
                <img src='" . $_hinh . "' id='daidien' style='max-width:45px;max-height:45px;width:auto;height:auto; margin-left:20px;border-radius:50%;'>
                </li>";
          }
          echo "<li class='nav-item'>                       
              <a class='nav-link dropdown-toggle'  id='navbarDropdown' style='color:#000;cursor: pointer;' >$_tenkh<span class='sr-only'>(current)</span></a>
              </li>";
        }
        ?>
      </ul>
      <a href='xuly_dx.php'><button class="btn btn-danger" id="logout">Đăng xuất</button></a>
    </div>
  </nav>
 <!--Kết thúc menu -->

 <!--Bắt đầu thanh tùy chọn -->
  <div class="container-fluid equip">
    <div class="row justify-content-center">
      <ul class="nav nav-pills" id="myPill" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="addlap" data-toggle="tab" href="#themlaptop" role="tab" aria-controls="content-javascript" aria-selected="false">
            <i class="fa fa-plus" aria-hidden="true"></i> THÊM LAPTOP
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="changelap" data-toggle="tab" href="#sualaptop" role="tab" aria-controls="content-css" aria-selected="false">
            <i class="fa fa-laptop" aria-hidden="true"></i> QUẢN LÍ LAPTOP
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="customer" data-toggle="tab" href="#khachhang" role="tab" aria-controls="content-bootstrap" aria-selected="false">
            <i class="fa fa-user" aria-hidden="true"></i> QUẢN LÍ KHÁCH HÀNG
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="check" data-toggle="tab" href="#thongke" role="tab" aria-controls="content-bootstrap" aria-selected="false">
            <i class="fa fa-receipt" aria-hidden="true"></i> &nbsp;QUẢN LÍ ĐƠN HÀNG</a>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!--Kết thúc thanh tùy chọn -->

  <!--Script reload ko phải load lại tab -->
  <script>
    $(document).ready(function() {
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if (activeTab) {
        $('#myPill a[href="' + activeTab + '"]').tab('show');
      }
    });
  </script>

  <!--kết thúc script -->



  <!--Bắt đầu tab content -->
  <div class="tab-content" id="myPillContent">
    <div class="tab-pane fade show laptop_content active" id="themlaptop" role="tabpanel" aria-labelledby="tab-javascript">
      <!--Thêm laptop-->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 addlap">
            <form action="xulythemlap.php" method="POST" id="form" enctype="multipart/form-data">
              <div class="form-group">
                <div class="row justify-content-center">
                  <h2>Thêm laptop mới</h2>
                </div>
                <div class="row">
                  <div class="col">
                    <label>Tên laptop</label>
                    <input type="text" class="form-control" placeholder="" required name="tenlap">
                  </div>
                  <div class="col">
                    <label>Giá tiền</label>
                    <input type="text" class="form-control" placeholder="" required name="gia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Cấu hình cpu</label>
                <input type="text" class="form-control" placeholder="" required name="cpu">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label>Màn hình</label>
                    <select class="form-control" name="monitor">
                      <option selected>Loại màn hình</option>
                      <option>720p - 60hz</option>
                      <option>1080p - 60hz</option>
                      <option>1080p - 120hz</option>
                      <option>1080p - 144hz</option>
                      <option>2k - 60hz</option>
                      <option>2k - 120hz</option>
                    </select>
                  </div>
                  <div class="col">
                    <label>Ram</label>
                    <select class="form-control" name="ram">
                      <option selected>Loại ram</option>
                      <option>4G</option>
                      <option>8G</option>
                      <option>16G</option>
                      <option>32G</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Đồ họa</label>
                <input type="text" class="form-control" placeholder="" required name="dohoa">
              </div>
              <div class="form-group">
                <label>Ổ cứng</label>
                <input type="text" class="form-control" placeholder="" required name="ocung">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label>Xuất xứ</label>
                    <input type="text" class="form-control" placeholder="" required name="xuatxu">
                  </div>
                  <div class="col">
                    <label>Nhu cầu</label>
                    <select class="form-control" name="nhucau">
                      <?php
                      // Lay du lieu ve
                      // Lam viec voi CSDL
                      $con = new mysqli("localhost", "root", "", "banlaptop");
                      $con->set_charset("utf8");
                      $sql = "SELECT * FROM  nhucausd";

                      $result = $con->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        echo " <option value='" . $row['manhucau'] . "'>" . $row['tennhucau'] . "</option>
                            ";
                      }
                      $con->close();
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row" data-toggle="buttons">
                  <div class="col">
                    <label>Năm ra mắt</label>
                    <select class="form-control" name="namramat">
                      <option selected>2021</option>
                      <option>2020</option>
                      <option>2019</option>
                      <option>2018</option>
                      <option>2017</option>
                      <option>Cũ hơn</option>
                    </select>
                  </div>
                  <div class="col">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="thuonghieu">
                      <?php
                      // Lay du lieu ve
                      // Lam viec voi CSDL
                      $con = new mysqli("localhost", "root", "", "banlaptop");
                      $con->set_charset("utf8");
                      $sql = "SELECT * FROM  thuonghieu";
                      $result = $con->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        echo " <option value='" . $row['mahieu'] . "'>" . $row['tenhieu'] . "</option>";
                      }
                      $con->close();
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="exampleFormControlFile1">Chọn hình sản phẩm:</label>
                  </div>
                  <div class="col">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="hinh">
                  </div>
                </div>
              </div>
              <div class="form-group submit_but">
                <div class="row justify-content-center">
                  <button class="btn btn-success" type="submit">Thêm vào cơ sở dữ liệu</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Kết thúc thêm laptop-->

    <!--Model cập nhật thông tin -->
    <div class="modal fade" id="empModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">
              Cập nhật thông tin sản phẩm
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Kết thúc model cập nhật thông tin -->

    <!--Chi tiết danh sách laptop-->
    <div role="tabpanel" class="tab-pane justify-content-center" id="sualaptop">
      <div class="container-fluid">
        <div class="row justify-content-center" style="margin-bottom: 25px;">
          <h3>DANH SÁCH LAPTOP</h3>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $sql = "select * from laptop order by tenlaptop ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
        $sql1 = "select * from laptop";
        $result1 = $con->query($sql1);
        $result = $con->query($sql);
        $totalrecord = mysqli_query($con, "select * from laptop");
        $totalrecord = $totalrecord->num_rows;
        $totalpages = ceil($totalrecord / $item_per_page);
        if ($result->num_rows > 0) {
          echo "<div id='cover-table'>";
          echo "<table>";
          echo "<tr>
           <th>TÊN LAPTOP</th>
           <th>ẢNH</th>
           <th>GIÁ</th>
           <th>CPU</th> 
           <th>MÀN HÌNH</th>
           <th>RAM</th>
           <th>ĐỒ HỌA</th>
           <th>THAO TÁC</th>
        </tr>";
          $i = 1;
          while ($row = $result->fetch_assoc()) {
            $format_number_tien = number_format($row['giatien']);
            echo
            "<tr>
                   <td><span class='name_lap'>" . $row['tenlaptop'] . "</span></td>
                   <td max-width=250px max-height=100px > <img src='" . $row['hinhlaptop'] . "' class='zoom' style='max-width: 200px; max-height: 150px; width: auto; height: auto;' /></td>
                   <td><span class='cost'>" . $format_number_tien . " đ</span></td>
                   <td><span class='cpu'>" . $row['cpu'] . "</span> </td>
                   <td><span class='monitor'>" . $row['manhinh'] . "</span></td>
                   <td><span class='ram'>" . $row['ram'] . "</span></td>
                   <td style='text-align:left;'><span style='text-align:center;' class='gpu'>" . $row['dohoa'] . "</span></td>
                   <td>
                     &nbsp;&nbsp;&nbsp;
                     <a data-id='" . $row['malaptop'] . "' style='cursor:pointer;' class='lap_update'><img src='img/update.png' class='zoom-in' width=25px height=25px/></a>&nbsp;
                     <a  onclick='return Del(this)' href='xoa_lap.php?id=" . $row['malaptop'] . "' ><img src='img/trashbin.png' class='zoom-in' width=25px height=25px/></a>   
				            </td>
              </tr>";
            $i = $i + 1;
          }
          echo "</table>";
          echo "<div class='row control justify-content-center'>";
          include './pagination.php';
          echo "</div>";
          echo "</div>";
        } else {
          echo "o result";
        }
        $con->close();
        ?>
      </div>
      <div class="modal fade" id="modal-watch">
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
              <?php $malap = $_GET['select'];
              echo $malap; ?>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
              </div>
              <!--end modal body-->
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
    </div>
    <!--Kết thúc danh sách laptop-->



    <!--Quản lí Khach hang-->
    <div role="tabpanel" class="tab-pane" id="khachhang">
      <div class="container-fluid customer_cover">
        <div class="row justify-content-center">
          <h3>DANH SÁCH KHÁCH HÀNG</h3>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select * from khachhang order by tenkh";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          echo "<div class='cover-table'>";
          echo "<div id='cover-history'>";
          echo "<table>";
          echo "<tr>
           <th class='client'>#</th>
           <th class='client'>TÊN KHÁCH HÀNG</th>
           <th class='client'>USERNAME</th>
           <th class='client'>ĐỊA CHỈ</th> 
           <th class='client'>SỐ ĐIỆN THOẠI</th>
           <th class='client'>GIỚI TÍNH</th>
           <th class='client'>THAO TÁC</th>
        </tr>";
          $i = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                   <td class='client' style='font-weight:bold;font-size:19px;'> " . $i . "</td>
                   <td class='client'><span class='name_lap'>" . $row['tenkh'] . "</span></td>
                   <td class='client'><span class='cpu'>" . $row['tendn'] . "</span></td>
                   <td class='client'><span class='monitor'>" . $row['diachi'] . "</span></td>
                   <td class='client'><span class='ram'>" . $row['sdt'] . "</span></td>
                   <td class='client'><span class='gpu'>" . $row['gioitinh'] . "</span></td>
                   <td class='client'>
                     &nbsp;&nbsp;&nbsp;
                     <a onclick='return Del_kh()' href='xoa_kh.php?id=" . $row['makh'] . "'><img src='img/trashbin.png'  class='zoom-in' width=25px height=25px/></a>   
                     </td>
              </tr>";
            $i = $i + 1;
          }
          echo "</table>";
          echo "</div>";
          echo "</div>";
        } else {
          echo "o result";
        }
        $con->close();
        ?>
      </div>
    </div>
    <!--Kết thúc quản lí khách hàng -->


    <!--Quản lí đơn hàng -->
    <div role="tabpanel" class="tab-pane" id="thongke">
      <div class="container-fluid history">
        <div class="row justify-content-center">
          <h3>DANH SÁCH ĐƠN HÀNG</h3>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select lichsumuahang.malichsu,khachhang.tenkh,lichsumuahang.thoigianmua,lichsumuahang.sotien,lichsumuahang.tenmathang,
                 lichsumuahang.trangthai,lichsumuahang.diachigiao from khachhang,lichsumuahang
                 where lichsumuahang.makh=khachhang.makh and trangthai !=3 and trangthai !=2";
        $result = $con->query($sql);
        $tongtien = 0;
        if ($result->num_rows > 0) {
          echo "<div class='have' style='margin-top:10px;margin-bottom:-10px;margin-right:75px;'>";
          echo "Có " . $result->num_rows . " đơn hàng trong danh sách: ";
          echo "</div>";
          echo "<div class='cover-table'>";
          echo "<div id='cover-history'>";
          echo "<table>";
          echo "<tr>
                 <th class='client' style='width:70px;'>#</th>
                 <th class='client' style='width:230px;'>KHÁCH HÀNG</th>
                 <th class='client' style='width:250px;'>NGÀY MUA</th>
                 <th class='client' style='width:330px;'>MẶT HÀNG</th> 
                 <th class='client' style='width:320px;'>ĐỊA CHỈ GIAO HÀNG</th>
                 <th class='client' style='width:200px;'>TỔNG TIỀN</th> 
                 <th class='client' style='width:180px;'>TRẠNG THÁI</th>
                 <th class='client' style='width:180px;'>THAO TÁC</th
              </tr>";
          $i = 1;
          while ($row = $result->fetch_assoc()) {
            $format_tien = number_format($row['sotien']);
            echo  "<tr>
                   <td class='client' style='width:70px;font-weight:bold;font-size:19px;'> " . $i . "</td>
                   <td class='client' style='width:230px;'><span class='name_lap'>" . $row['tenkh'] . "</span></td>
                   <td class='client' style='width:250px;'><span class='cpu'>" . $row['thoigianmua'] . "</span></td>
                   <td class='client' style='width:330px;'><span class='monitor'>" . $row['tenmathang'] . "</span></td>
                   <td class='client' style='width:320px;'><span class='gpu'>" . $row['diachigiao'] . "</span></td>
                   <td class='client' style='width:200px;'><span class='cost'>$format_tien VNĐ</span></td>";
            if ($row['trangthai'] == 0) {
              echo  "<td class='client' style='width:180px;'><span class='accept'>Chờ xác nhận </span></td>";
            } else if ($row['trangthai'] == 1) {
              echo " <td class='client' style='width:180px;'><span class='gpu'>Đã xác nhận </span></td>";
            } else if ($row['trangthai'] == 2) {
              echo " <td class='client' style='width:180px;'><span class='ram'>Đã giao hàng </span></td>";
            }
            echo "<td class='client' style='width:180px;'>  <a onclick='return Huy_dh()' href='huy_dh.php?id=" . $row['malichsu'] . "'><img src='img/x.png'  class='zoom-in' width=23px height=23px/></a>
                                      &nbsp    <a onclick='return Conf()' href='xac_nhan.php?id=" . $row['malichsu'] . "' class='zoom-in'><img src='img/check2.png'  class='zoom-in' width=23px height=23px/></a>
                                      &nbsp    <a onclick='return Deliver()' href='giao_hang.php?id=" . $row['malichsu'] . "' class='zoom-in'><i class='fas fa-truck'></i></a>
                   </tr>";
            $i = $i + 1;
            $tongtien = $tongtien + $row['sotien'];
          }
          echo "</table>";
        }
        $tong_dt_dd = number_format($tongtien);
        echo "</div>";
        echo "</div>";
        ?>
      </div>
    </div>
    <!--Kết thúc quản lí đơn hàng -->
  </div>

  
    <!--script update lap -->
    <script type='text/javascript'>
      $(document).ready(function() {
        $('.lap_update').click(function() {
          var idlap = $(this).data('id');
          $.ajax({
            url: 'update_lap.php',
            type: 'post',
            data: {
              idlap: idlap
            },
            success: function(response) {
              $('.modal-body').html(response);
              $('#empModal').modal('show');
            }
          });
        });
      });
      function search_item(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cover-table").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "live_search.php?u=" + str, true);
        xmlhttp.send();
      }
      function Del() {
          return confirm("Bạn có chắc muốn xóa sản phẩm này không?");
        }

        function Del_kh() {
          return confirm("Bạn có chắc muốn xóa khách hàng này không?");
        }

        function Huy_dh() {
          return confirm("Bạn có chắc không xác nhận đơn hàng này không?");
        }

        function Conf() {
          return confirm("Bạn có chắc muốn xác nhận đơn hàng này không?");
        }

        function Deliver() {
          return confirm("Bạn có muốn xác nhận giao hàng đơn hàng này không?");
        }
    </script>
<!--Kết thúc script-->


  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>
</html>