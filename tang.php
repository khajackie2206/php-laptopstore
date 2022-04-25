<?php
$idgio = $_GET['id'];
echo $idgio;
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE giohang SET soluonglap=soluonglap+1 WHERE magiohang='$idgio'";
$result = $con->query($sql);
if ($result) {
  header("location:giohang.php");
} else {
  echo "Có lỗi khi cập nhật!!! " . $conn->error;
}
$con->close();
?>