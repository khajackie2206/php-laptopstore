<?php
$idlap = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "banlaptop");
$con->set_charset("utf8");
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	$sql = "DELETE FROM laptop where malaptop='$idlap'";
	$result = $con->query($sql);
	if ($result) {
		echo '<script language="javascript">alert("Xóa thành công");;window.history.go(-1);</script>';
	} else {
		echo '<script language="javascript">alert("Có lỗi xảy ra");;window.history.go(-1);</script>';
	}
}
$con->close();
?>