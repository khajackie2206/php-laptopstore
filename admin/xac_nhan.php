<?php 
   $idls = $_GET['id'];
   $con=mysqli_connect("localhost","root","","banlaptop");
   $con->set_charset("utf8");
	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}
	    $sql="update FROM lichsumuahang where malichsu='$idls'";
        $sql="UPDATE lichsumuahang SET trangthai=1 WHERE malichsu='$idls'";
		$result=$con->query($sql);
		if($result){
			echo '<script language="javascript">alert("Đã xác nhận");;window.history.go(-1);</script>';
		}
		else {
			echo '<script language="javascript">alert("Có lỗi xảy ra");;window.history.go(-1);</script>';
		}
	$con->close();
?>