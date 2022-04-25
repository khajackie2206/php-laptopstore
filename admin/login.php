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
    body {
      background-color: lightgray;
      background-image: url("img/office.jpeg");
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
    }

    .cover-login {
      border: 1px solid lightgray;
      background-color: #f5f5f5;
      width: 470px;
      padding: 30px;
      border-radius: 15px;
      margin-top: 200px;

    }

    .but-login {
      margin-left: 120px;
    }

    h4 {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div class="container">

    <div class="row justify-content-center">
      <div class="cover-login">
        <div class="row justify-content-center">
          <h4>Đăng nhập</h4>
        </div>
        <form action="xuly_dn.php" method="POST" enctype="multipart/form-data" onsubmit="return test()">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id="user">
            <div id="tendn" style="color:red;margin-top:15px;"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="pass">
            <div id="matkhau" style="color:red;margin-top:15px;"></div>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-success"> <a href="form_dk.php" style="color: aliceblue; text-decoration: none;"> Bạn quên mật khẩu?</a>
            </button>
            <button type="submit" class="btn btn-primary but-login">
              Đăng nhập
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>