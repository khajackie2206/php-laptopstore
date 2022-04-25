<!DOCTYPE html>
<html>
<body>
    <?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con = mysqli_connect("localhost", "root", "", "banlaptop");
    $con->set_charset("utf8");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT makh,tenkh,tendn,matkhau FROM khachhang WHERE tendn='$username' AND matkhau=md5('$password')";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['makh'] = $row['makh'];
        echo '<script language="javascript">alert("Đăng nhập thành công");window.location="index.php";</script>';
    } else {
        echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng vui lòng đăng nhập lại");history.go(-1);</script>';
    }
    $con->close();
    ?>
</body>
</html>