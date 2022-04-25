<html>
<body>
    <head>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <?php
    session_start();
    if (!isset($_SESSION['makh'])) {
        echo '<script language="javascript">alert("Bạn cần đăng nhập để sử dụng tính năng này");window.history.go(-1);</script>';
    } else {
        $idkh = $_SESSION['makh'];
        $idlap = $_GET['u'];
        $solg = 1;
        $con = mysqli_connect("localhost", "root", "", "banlaptop");
        $con->set_charset("utf8");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO giohang(makhachhang,malaptop,soluonglap) values ('$idkh','$idlap',$solg)";
        if (mysqli_query($con, $sql)) {
            echo '<script language="javascript">alert("thêm thành công sản phẩm vào giỏ hàng");window.location="giohang.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    ?>
</body>

</html>