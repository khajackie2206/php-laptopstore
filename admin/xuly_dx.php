<?php
  session_start();
  unset($_SESSION['ID']);
  echo '<script language="javascript">alert("Đã đăng xuất");window.location="login.php";</script>';
?>