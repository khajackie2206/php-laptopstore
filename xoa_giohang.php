<?php
$idlap=$_GET['id'];
echo $idlap;
$con = mysqli_connect("localhost","root","","banlaptop");
$con ->set_charset("utf8");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql="DELETE FROM giohang where magiohang='$idlap'";
$result=$con->query($sql);
if($result==true){
    echo '<script language="javascript">alert("Xóa thành công sản phẩm");window.location="giohang.php";</script>';
}
else {
    echo '<script language="javascript">alert("Có lỗi xảy ra!!!");window.location="giohang.php";</script>';
}
$con->close();
?>