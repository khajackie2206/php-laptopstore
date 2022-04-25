var kiemtra = true;
function isExisted(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == 'Tên đăng nhập đã tồn tại') {
        kiemtra = false;
      } else kiemtra = true;
    }
    document.getElementById('exist').innerText = this.responseText;
  }
  xmlhttp.open("GET", "isExisted.php?u=" + str, true);
  xmlhttp.send();
}
function check() {
  var tendn = document.getElementById("tendn").value;
  var TendnRegEx = /^[a-zA-Z][a-zA-Z0-9]{5,14}$/;
  var matkhau = document.getElementById("pass").value;
  var MatkhauRegEx1 = /[?=0-9]/;
  var MatkhauRegEx3 = /^[0-9A-Za-z]{6,15}$/;
  var MatkhauRegEx2 = /[?=A-Za-z]/;
  var Re_matkhau = document.getElementById("re_pass").value;
  if (!TendnRegEx.test(tendn)) {
    document.getElementById("exist").innerText = 'Tên đăng nhập sai định dạng';
    kiemtra = false;
  } else {
    document.getElementById("exist").innerText = "";
  }
  if (!MatkhauRegEx1.test(matkhau) || !MatkhauRegEx2.test(matkhau) || !MatkhauRegEx3.test(matkhau)) {
    document.getElementById("mk").innerText = 'Mật khẩu phải chứa cả chữ và số, không chứa kí tự đặc biệt và dài 6-15 kí tự';
    kiemtra = false;
  } else {
    document.getElementById("mk").innerText = "";
  }
  if (Re_matkhau !== matkhau) {
    document.getElementById("re_mk").innerText = 'Nhập lại mật khẩu phải giống mật khẩu';
    kiemtra = false;
  } else {
    document.getElementById("re_mk").innerText = "";
  }
  return kiemtra;
}
function test() {
  var user = document.getElementById("user").value;
  var pass = document.getElementById("pass_dn").value;
  var check = true;
  if (user == "") {
    document.getElementById("tendn").innerText = 'Tên đăng nhập không được bỏ trống';
    check = false;
  } else {
    document.getElementById("tendn").innerText = "";
  }
  if (pass == "") {
    document.getElementById("matkhau").innerText = "Mật khẩu không được bỏ trống";
    check = false;
  } else {
    document.getElementById("matkhau").innerText = "";
  }
  return check;
}
function check_out() {
  return confirm("Bạn có chắc muốn xác nhận đặt hàng không?");
}
function kiemtra1() {
  var check = true;
  var diachi = document.getElementById("diachi").value;
  if (diachi == "") {
    document.getElementById("diachi2").innerText = "Bạn phải điền vào địa chỉ giao hàng";
    check = false;
    return check;
  } else return check_out();

}


