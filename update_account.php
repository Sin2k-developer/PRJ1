<!DOCTYPE HTML>
<html>
<head>
  <title>Đồ án 1: SHOESVN</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
  <script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'header.php'; ?>
<?php 
  if(!isset($_SESSION["ma_khach_hang"])){
      header("location:login.php");
      exit();
  }    
?>
<?php include 'menu.php' ?>
<!-- start main -->
<div class="main_bg_account">
<div class="wrap">
<div class="main-update-account">
<div class="update-account">
    <nav class="vertical-menu">
        <ul>
          <li class="dashboard">
            <i class="fas fa-tachometer-alt"></i><span>Bảng điều khiển</span>
          </li>
          <li class="general-info">
            <a href="account.php">Thông tin chung</a>
          </li>
          <li class="account-info active">
            <a href="update_account.php">Thông tin tài khoản</a>
          </li>
          <li class="orders">
            <a href="orders.php?khachhang=<?php echo $_SESSION['ma_khach_hang'] ?>">Đơn hàng</a>
          </li>
          <li class="recently-view">
            <a href="recently_view.php">Đã xem gần đây</a>
          </li>
          <li class="logout">
            <a href="logout.php">Đăng xuất</a>
          </li>
        </ul>
    </nav>
    <div class="update-account-content">
        <div class="title">
            <h1>Sửa thông tin tài khoản</h1>
        </div>
        <form action="process_update_account.php?id=<?php echo $_SESSION["ma_khach_hang"] ?>" method="POST" onsubmit="return CheckUpKh()">
            <fieldset>
                  <legend>Thông tin tài khoản</legend>
                  <div class="title-second">
                    <div style="width:641px">          
                      <div>
                        <input type="hidden" name="makh" value="<?php echo $_SESSION['ma_khach_hang'] ?>"/>
                      </div>
                    </div>
                    <div class="name">
                        <h5>Họ và tên <i>*</i></h5>
                        <div>
                            <input type="text" name="tenkh" id="hoten" value="<?php echo $_SESSION['ten_khach_hang'] ?>"/><span class="fix-box" id="err_hoten"></span>
                        </div>
                    </div>
                    <div class="phone">
                        <h5>Số điện thoại <i>*</i></h5>
                        <div>
                            <input type="text" name="sdt" id="sdt" value="<?php echo $_SESSION['sdt'] ?>"/><span class="fix-box" id="err_sdt"></span>
                        </div>
                    </div>                    
                  </div>
                  <div class="title-third"> 
                    <h5>Tên hiển thị <i>*</i></h5>
                    <div>
                      <input type="text" name="tenht" id="tenht" value="<?php echo $_SESSION['ten_tai_khoan'] ?>"/><span class="fix-box" id="err_tenht"></span>
                    </div>
                  </div>
                  <div class="title-third"> 
                    <h5>Số địa chỉ <i>*</i></h5>
                    <div>
                      <input type="text" name="dc" id="dc" value="<?php echo $_SESSION['dia_chi'] ?>"/><span class="fix-box" id="err_dc"></span>
                    </div>
                  </div>
                  <div class="title-fourth"> 
                    <h5>Email <i>*</i></h5>
                    <div>
                      <input type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ?>"/><span class="fix-box" id="err_email"></span>
                    </div>
                  </div>
                    <div class="up_sky_form">
                      <ul>
                        <li style="display: block;"><h5>Giới tính <strong>*</strong></h5></li>
                        <li>
                          <h5>
                            <input type="radio" name="gioi_tinh" id="gt" value="1" <?php if($_SESSION['gioi_tinh']==1){echo 'checked';} ?>>Nam
                          </h5>
                        </li>
                        <li>
                          <h5>
                            <input type="radio" name="gioi_tinh" id="gt" value="0" <?php if($_SESSION['gioi_tinh']==0){echo 'checked';} ?>>Nữ
                          </h5>
                        </li>
                      </ul>
                      <span class="fix-box-gt" id="err_gender"></span>
                    </div>
                  <div class="title-fifth"> 
                    <h5>Mật khẩu cũ <i>*</i></h5>
                    <div>
                      <input type="password" name="matkhaucu" id="pwd_cu"/>
                      <i class="fas fa-eye" style="position: absolute; right: 8px; top: 30px; color: #999;" onclick="showHidden1()"></i>
                      <span class="fix-box" id="err_pwd_cu"></span>
                    </div>
                  </div>
                  <div class="title-sixth">         
                      <input type="checkbox" id="myCheck" onclick="myFunction()"> <h5 style="display: inline;">Thay đổi mật khẩu</h5>             
                  </div>       
            </fieldset>
            <fieldset id="changePass" style="display: none">
                  <legend>Thay đổi mật khẩu</legend>
                  <div class="title-seventh">
                    <div class="pwd">
                        <h5>Mật khẩu mới <i>*</i></h5>
                        <div>
                            <input type="password" name="matkhaumoi" id="pwd"/>
                            <i class="fas fa-eye" style="position: absolute; top: 30px; left: 273px; color: #999;" onclick="showHidden2()"></i>
                            <span class="fix-box" id="err_pwd"></span>
                        </div>
                    </div>
                    <div class="conf_pwd">
                        <h5>Nhập lại mật khẩu mới <i>*</i></h5>
                        <div>
                            <input type="password" name="nlmatkhaumoi" id="nl_pwd"/>
                            <i class="fas fa-eye" style="position: absolute; top: 29px; right: 8px; color: #999;" onclick="showHidden3()"></i>
                            <span class="fix-box" id="err_nl_pwd"></span>
                        </div>
                    </div>                    
                  </div>
            </fieldset>
            <div class="button-box">
                  <div class="left">
                        <a  title="Quay lại" onclick="window.history.go(-1);">
                            <span class="btn-led-btn">
                              <span style="color: #fff"><i class="fas fa-backward" style="color: #fff"></i>Quay lại</span>
                            </span>
                        </a>
                    </div>
                    <div class="right">
                        <button class="button" type="submit" name="updateAC" value="Lưu" title="Gửi đi"><span>Lưu</span></button>
                    </div>
                </div>
        </form>   
    </div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
<?php require_once 'footer.php'; ?>
<!-- Check Form -->
<script>
    function CheckUpKh(){
      var dem = 0;
      var hoten = document.getElementById("hoten");
      //lay the loi hoten 
      var err_hoten = document.getElementById("err_hoten");
      //lay value hoten
      var ht = hoten.value;
      if(ht.length == 0){
        hoten.style.borderColor = "red";
        err_hoten.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }else if(ht.length>=30){
        ht.style.borderColor = "red";
        err_hoten.innerHTML = "Tối đa là 30 kí tự";
        dem++
      }else{
        hoten.style.borderColor = "white";
        err_hoten.innerHTML = "";
      }
      //ten hien thi
      var tenht = document.getElementById("tenht");
      var err_tenht = document.getElementById("err_tenht");
      var value_tenht = tenht.value;
      if(value_tenht.length == 0){
        tenht.style.borderColor = "red";
        err_tenht.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }else if(value_tenht.length>=20){
        tenht.style.borderColor = "red";
        err_tenht.innerHTML = "Tối đa là 20 kí tự";
        dem++;
      }else{
        tenht.style.borderColor = "white";
        err_tenht.innerHTML = "";
      }
      //regex sdt
      var regex_sdt = /^0[0-9]{9}$/;
      var sdt = document.getElementById("sdt");
      var err_sdt = document.getElementById("err_sdt");
      var value_sdt = sdt.value;
      if(value_sdt.length == 0){
        sdt.style.borderColor = "red";
        err_sdt.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_sdt.test(value_sdt) == false){
        sdt.style.borderColor = "red";
        err_sdt.innerHTML = "Chỉ được nhập số, bắt đầu bằng số 0,{10}";
        dem++;
      }
      else{
        sdt.style.borderColor = "white";
        err_sdt.innerHTML = "";
      }
      // Dia chi
      var regex_dc = /[A-Za-z0-9\s\,\-]/;
      var dc = document.getElementById("dc");
      var err_dc = document.getElementById("err_dc");
      var value_dc = dc.value;
      if(value_dc.length == ""){
        dc.style.borderColor = "red";
        err_dc.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_dc.test(value_dc) == false){
        dc.style.borderColor = "red";
        err_dc.innerHTML = "Phải chứa trong khoảng 5-120 ký tự.";
        dem++;
      }
      else{
        dc.style.borderColor = "white";
        err_dc.innerHTML = "";
      }
      /*--Email--*/
      var regex_email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
      var email = document.getElementById("email");
      var err_email = document.getElementById("err_email");
      var value_email = email.value;
      if(value_email.length == ""){
        email.style.borderColor = "red";
        err_email.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_email.test(value_email) == false){
        email.style.borderColor = "red";
        err_email.innerHTML = "Mời bạn nhập lại email theo định dạng mẫu: Test@gmail.com";
        dem++;
      }
      else{
        email.style.borderColor = "white";
        err_email.innerHTML = "";
      }
      /*--Mậtkhẩucũ--*/
      var regex_pwd_cu = /^[A-Za-z0-9]{6,30}$/;
      var pwd_cu = document.getElementById("pwd_cu");
      var err_pwd_cu = document.getElementById("err_pwd_cu");
      var value_pwd_cu = pwd_cu.value;
      if(value_pwd_cu.length == ""){
        pwd_cu.style.borderColor = "red";
        err_pwd_cu.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_pwd_cu.test(value_pwd_cu) == false){
        pwd_cu.style.borderColor = "red";
        err_pwd_cu.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
        dem++;
      }
      else{
        pwd_cu.style.borderColor = "white";
        err_pwd_cu.innerHTML = "";
      }
      /*--Mậtkhẩu--*/
      var regex_pwd = /^[A-Za-z0-9]{6,30}$/;
      var pwd = document.getElementById("pwd");
      var err_pwd = document.getElementById("err_pwd");
      var value_pwd = pwd.value;
      if(value_pwd.length == ""){
        pwd.style.borderColor = "red";
        err_pwd.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_pwd.test(value_pwd) == false){
        pwd.style.borderColor = "red";
        err_pwd.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
        dem++;
      }
      else{
        pwd.style.borderColor = "white";
        err_pwd.innerHTML = "";
      }
      /*--Nhậplạimậtkhẩu--*/
      var regex_nl_pwd = /^[A-Za-z0-9]{6,30}$/;
      var nl_pwd = document.getElementById("nl_pwd");
      var err_nl_pwd = document.getElementById("err_nl_pwd");
      var value_nl_pwd = nl_pwd.value;
      if(value_nl_pwd.length == ""){
        nl_pwd.style.borderColor = "red";
        err_nl_pwd.innerHTML = "Thiếu thông tin mục này";
        dem++;
      }
      else if(regex_nl_pwd.test(value_nl_pwd) == false){
        nl_pwd.style.borderColor = "red";
        err_nl_pwd.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
        dem++;
      }
      else if(value_nl_pwd.length != value_pwd.length){
        nl_pwd.style.borderColor = "red";
        err_nl_pwd.innerHTML = "Hãy chắc chắn rằng mật khẩu của bạn giống nhau";
        dem++;
      }
      else{
        nl_pwd.style.borderColor = "white";
        err_nl_pwd.innerHTML = "";
      }
      if(dem == 0){
        return true;
      }else{
        return false;
      }
}
  </script>
<!-- Phần check checkbox - link:https://www.w3schools.com/howto/howto_js_display_checkbox_text.asp -->
<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var changePass = document.getElementById("changePass");
    if (checkBox.checked == true){
      changePass.style.display = "block";
    } else {
       changePass.style.display = "none";
    }
}
</script>
<!-- Ẩn hiện password -->
<script>
  isBool = true;
  function showHidden1(){
    if(isBool){
      document.getElementById("pwd_cu").setAttribute("type","text");
      isBool = false;
    }else{
      document.getElementById("pwd_cu").setAttribute("type","password");
      isBool = true;
    }
  }
</script>
<script>
  isBool = true;
  function showHidden2(){
    if(isBool){
      document.getElementById("pwd").setAttribute("type","text");
      isBool = false;
    }else{
      document.getElementById("pwd").setAttribute("type","password");
      isBool = true;
    }
  }
</script>
<script>
  isBool = true;
  function showHidden3(){
    if(isBool){
      document.getElementById("nl_pwd").setAttribute("type","text");
      isBool = false;
    }else{
      document.getElementById("nl_pwd").setAttribute("type","password");
      isBool = true;
    }
  }
</script>
</body>
</html>

