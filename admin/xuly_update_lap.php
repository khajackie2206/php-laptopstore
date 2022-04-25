<?php
$idlap = $_GET['id'];
$tenlaptop = $_POST['tenlap'];
$gia = $_POST['gia'];
$cpu = $_POST['cpu'];
$manhinh = $_POST['manhinh'];
$dohoa = $_POST['dohoa'];
$ram = $_POST['ram'];
$ocung = $_POST['ocung'];
$namramat = $_POST['namramat'];
$hinh = $_FILES['hinh']['name'];
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($hinh != "") {
    $duongdan = 'img/';
    $duongdan = $duongdan . $_FILES['hinh']['name'];
    move_uploaded_file($_FILES['hinh']['tmp_name'], $duongdan);
    $sql = "UPDATE laptop SET tenlaptop='$tenlaptop',giatien='$gia',cpu='$cpu',manhinh='$manhinh',ram='$ram',dohoa='$dohoa',ocung='$ocung',namramat='$namramat',
     hinhlaptop = '$duongdan' WHERE malaptop='$idlap'";
    $result = $con->query($sql);
    if ($result) {
        echo '<script language="javascript">alert("Cập nhật thành công!!!");window.location="quantri.php";</script>';
    } else {
        echo "Có lỗi khi cập nhật!!! " . $con->error;
    }
} else {

    $sql = "UPDATE laptop SET tenlaptop='$tenlaptop',giatien='$gia',cpu='$cpu',manhinh='$manhinh',ram='$ram',dohoa='$dohoa',ocung='$ocung',namramat='$namramat' WHERE malaptop='$idlap'";
    $result = $con->query($sql);
    if ($result) {
        echo '<script language="javascript">alert("Cập nhật thành công!!!");window.location="quantri.php";</script>';
    } else {
        echo "Có lỗi khi cập nhật!!! " . $con->error;
    }
}
$con->close();
?>