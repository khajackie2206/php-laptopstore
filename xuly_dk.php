<!DOCTYPE html>
<html>
<body>
    <?php
    $tenkh = $_POST['tenkh'];
    $duongdan = $_FILES['hinh']['name'];
    if ($duongdan=="") {
        $duongdan = 'img/human.png';
    } else {
        $duongdan = 'img/';
        $duongdan = $duongdan . $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'], $duongdan);
    }
    $tendn = $_POST['username'];
    $pass = $_POST['password'];
    $diachi = $_POST['address'];
    $sdt = $_POST['phonenumber'];
    $gioitinh = $_POST['gioitinh'];
    $con = mysqli_connect("localhost", "root", "", "banlaptop");
    $con->set_charset("utf8");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO  khachhang(tenkh,tendn,matkhau,diachi,sdt,gioitinh,hinhkh) values ('$tenkh','$tendn',md5('$pass'),'$diachi','$sdt','$gioitinh','$duongdan')";

    if (mysqli_query($con, $sql)) {
        echo '<script language="javascript">alert("Đăng kí thành công");window.location="index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
    ?>
</body>
</html>