<?php
  session_start();
  unset($_SESSION['makh']);
  echo '<script language="javascript">alert("Đã đăng xuất");window.location="index.php";</script>';
?>