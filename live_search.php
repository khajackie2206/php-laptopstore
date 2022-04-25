<!DOCTYPE html>

<head>
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <style>
    td {
      border-top: 1px solid lightgrey;
      padding: 7px 25px 7px 25px;
      border-bottom: 1px solid lightgrey;
      border-collapse: collapse;
      text-align: left;
    }
    .cover-table {
      border: 1px solid lightgrey;
      background-color: white;
      padding: 5px 15px 25px 20px;
      margin-top: 25px;
      margin-bottom: 30px;
      padding-bottom: 25px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <?php
  $name_item = $_GET['u'];
  $con = mysqli_connect("localhost", "root", "", "banlaptop");
  $con->set_charset("utf8");
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "select * from laptop where tenlaptop like '%$name_item%' order by tenlaptop ";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    echo "<div id='cover-table'>";
    echo "<table>";
    echo "<tr>
     <th>#</th>
     <th>TÊN</th>
     <th>HÌNH</th>
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
             <td><a style='font-weight:bold;font-size:19px;'>" . $i . "<a/></td>
             <td><span class='name_lap'>" . $row['tenlaptop'] . "</span></td>
             <td max-width=230px max-height=90px > <img src='" . $row['hinhlaptop'] . "' class='zoom' style='max-width: 200px; max-height: 150px; width: auto; height: auto;' /></td>
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
    echo "</div>";
    echo "</div>";
  } else {
    echo "<div class='row inform justify-content-center' style='martin-top:50px;'>
             <a href='index.php'><img src='img/giohang2.png' style='width: 300px;height:300px;'></a>
            </div>   ";
    echo "<div class='row info justify-content-center'>
             <p style='font-size:19px;'> Không tồn tại sản phẩm bạn tìm kiếm</p>
            </div>";
  }
  $con->close();
  ?>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>