<?php
session_start();
if (!isset($_SESSION['makh'])) {

  echo '<script language="javascript">alert("Vui lòng đăng nhập để sử dụng tính năng này");window.location="index.php";</script>';
} else {
  $makh = $_SESSION['makh'];
  if ($makh == 2) {
    echo '<script language="javascript">window.location="quantri.php";</script>';
  } else {
    echo '<script language="javascript">alert("Bạn không có quyền sử dụng tính năng này");window.location="index.php";</script>';
  }
}
?>