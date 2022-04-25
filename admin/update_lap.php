<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <link rel="stylesheet" type="text/css" href="quantri.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="icon" href="img/iconlaptop.png" type="image/png" sizes="16x16">
  <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <?php
  $idlap = $_POST['idlap'];
  $con = mysqli_connect("localhost", "root", "", "banlaptop");
  $con->set_charset("utf8");
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "select * from laptop where malaptop='$idlap'";
  $result = $con->query($sql);
  $row = mysqli_fetch_array($result);
  ?>
  <form method="post" action="xuly_update_lap.php?id=<?php echo $idlap; ?>" enctype="multipart/form-data">
    <div class="form-group">
      <div class="row">
        <div class="col">
          <?php echo "<img src='" . $row['hinhlaptop'] . "'  style='max-width: 250px; max-height: 170px; width: auto; height: auto;'/>" ?>
        </div>
        <div class="col">
          <label style="font-weight:bold;">Tên laptop</label>
          <input type="text" class="form-control" value="<?php echo $row['tenlaptop']; ?>" name="tenlap">
          <label style="margin-top: 10px;font-weight:bold;">Giá</label>
          <input type="text" class="form-control" value="<?php echo $row['giatien']; ?>" name="gia">
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col">
          <label style="font-weight:bold;">CPU</label>
          <input type="text" class="form-control" value="<?php echo $row['cpu']; ?>" name="cpu">
        </div>
        <div class="col">
          <label style="font-weight:bold;">Màn hình</label>
          <select class="form-control" name="manhinh">
            <option selected><?php echo $row['manhinh']; ?></option>
            <option>720p - 60hz</option>
            <option>1080p - 60hz</option>
            <option>1080p - 120hz</option>
            <option>1080p - 144hz</option>
            <option>2k - 60hz</option>
          </select>
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col">
          <label style="font-weight:bold;">Đồ họa</label>
          <input type="text" class="form-control" value="<?php echo $row['dohoa']; ?>" name="dohoa">
        </div>
        <div class="col">
          <label style="font-weight:bold;">RAM</label>
          <select class="form-control" name="ram">
            <option selected><?php echo $row['ram']; ?></option>
            <option>4G</option>
            <option>8G</option>
            <option>16G</option>
            <option>32G</option>
          </select>
        </div>

      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col">
          <label style="font-weight:bold;">Ổ cứng</label>
          <input type="text" class="form-control" value="<?php echo $row['ocung']; ?>" name="ocung">
        </div>
        <div class="col">
          <label style="font-weight:bold;">Năm ra mắt</label>
          <select class="form-control" name="namramat">
            <option selected><?php echo $row['namramat'] ?></option>
            <option>2020</option>
            <option>2019</option>
            <option>2018</option>
            <option>2017</option>
            <option>Cũ hơn</option>
          </select>
        </div>

      </div>
      <div class="row" style="margin-top: 22px;">
        <div class="col">
          <label style="font-weight:bold;">Hình ảnh</label>
        </div>
        <div class="col">
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="hinh">
        </div>
      </div>
      <div class="row justify-content-center" style="margin-top: 25px;">
        <button type="submit" class="btn btn-primary" name="update_sp">Cập nhật</button>
      </div>
    </div>
  </form>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>