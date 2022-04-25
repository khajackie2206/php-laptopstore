<?php
session_start();
$ten = $_POST['tenlap'];
$gia = $_POST['gia'];
$cauhinh = $_POST['cpu'];
$manhinh = $_POST['monitor'];
$ram = $_POST['ram'];
$dohoa = $_POST['dohoa'];
$ocung = $_POST['ocung'];
$xuatxu = $_POST['xuatxu'];
$nhucau = $_POST['nhucau'];
$namramat = $_POST['namramat'];
$thuonghieu = $_POST['thuonghieu'];
$duongdan = 'img/';
//var_dump($_FILES['upload']['name']);exit;
$duongdan = $duongdan . $_FILES['hinh']['name'];
move_uploaded_file($_FILES['hinh']['tmp_name'], $duongdan);
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO  laptop(tenlaptop,giatien,cpu,manhinh,ram,dohoa,ocung,xuatxu,nhucau,thuonghieu,namramat,hinhlaptop) 
   values ('$ten','$gia','$cauhinh','$manhinh','$ram','$dohoa','$ocung','$xuatxu','$nhucau','$thuonghieu','$namramat','$duongdan')";

if (mysqli_query($con, $sql)) {


    echo '<script language="javascript">alert("Thêm thành công");window.location="quantri.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>