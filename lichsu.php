<?php
    $tongmathang = $_GET['mathang'];
    $idkhach=$_GET['idkh'];
    $tientong=$_GET['tong'];
    $diachi = $_POST['diachi'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaygio = date("Y-m-d H:i:s");  
    $con = mysqli_connect("localhost","root","","banlaptop");
    $con ->set_charset("utf8");
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
     }
     $sql="insert into lichsumuahang(makh,thoigianmua,tenmathang,diachigiao,sotien) values ('$idkhach','$ngaygio','$tongmathang','$diachi',$tientong)";
     $sql1="delete from giohang where makhachhang='$idkhach'";
     if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo '<script language="javascript">alert("Đặt hàng thành công");window.location="lichsumua.php";</script>';
     }else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
     }
     $con ->close();
?>