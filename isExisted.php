<?php
   $username=$_GET['u'];
   $con=mysqli_connect("localhost","root","","banlaptop");
   $con ->set_charset("utf8");
   if(!$con){
	   die("Connection failed:".mysqli_connect_error());
   }
   $sql="select * from khachhang where tendn='$username'";
   $result=$con->query($sql);
   if($result->num_rows>0){
	   echo "Tên đăng nhập đã tồn tại";
   } 
    $con->close();
?>
