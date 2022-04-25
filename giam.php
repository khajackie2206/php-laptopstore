<?php
$idgio = $_GET['id'];
echo $idgio;
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
   die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM giohang where magiohang ='$idgio'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      if ($row['soluonglap'] > 1) {
         $sql1 = "UPDATE giohang SET soluonglap=soluonglap-1 WHERE magiohang='$idgio'";
         $result1 = $con->query($sql1);
         if ($result1) {
            header("location:giohang.php");
         }
      } else if ($row['soluonglap'] <= 1) {
         $sql1 = "UPDATE giohang SET soluonglap=1 WHERE magiohang='$idgio'";
         $result1 = $con->query($sql1);
         if ($result1) {
            header("location:giohang.php");
         }
      }
   }
}
$con->close();
?>