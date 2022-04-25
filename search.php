<?php 
 $con = mysqli_connect("localhost","root","","banlaptop");
 $con ->set_charset("utf8");
 if (!$con) {
   die("Connection failed: " . mysqli_connect_error());
}
 if(isset($_POST['submit'])){
     $data = $_POST['search'];
     echo $data;
     $sql = "select malaptop from laptop where tenlaptop = '$data'";
     $result = $con ->query($sql);
     if($result->num_rows>0){
     while($row = $result ->fetch_assoc()){
     header("location:xemsanpham.php?select=".$row['malaptop']."");
     }
 }
  else {
    echo '<script language="javascript">alert("Không tìm thấy sản phẩm");window.history.go(-1);</script>';
  }
}
?>