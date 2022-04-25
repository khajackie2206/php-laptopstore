<?php
$makh = $_GET['idkh'];
$tenkh = $_POST['tenkh'];
$sdt = $_POST['sdt'];
$gioitinh = $_POST['gioitinh'];
$diachi = $_POST['diachi'];
$hinh = $_FILES['filename']['name'];
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($hinh != "") {
    $duongdan = 'img/';
    $duongdan = $duongdan . $_FILES['filename']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $duongdan);
    $sql = "UPDATE khachhang SET tenkh='$tenkh',diachi='$diachi',sdt='$sdt',gioitinh='$gioitinh',hinhkh = '$duongdan' WHERE makh='$makh'";
    $result = $con->query($sql);
    if ($result) {
        echo '<script language="javascript">alert("Cập nhật thành công");window.location="capnhat_tt.php";</script>';
    } else {
        echo "Có lỗi khi cập nhật!!! " . $con->error;
    }
} else {
    $sql = "UPDATE khachhang SET tenkh='$tenkh',diachi='$diachi',sdt='$sdt',gioitinh='$gioitinh' WHERE makh='$makh'";
    $result = $con->query($sql);
    if ($result) {
        echo '<script language="javascript">alert("Cập nhật thành công");window.location="capnhat_tt.php";</script>';
    } else {
        echo "Có lỗi khi cập nhật!!! " . $con->error;
    }
}
$con->close();
?>