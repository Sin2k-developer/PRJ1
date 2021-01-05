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
<div class="main_bg_account">
<div class="wrap">
<div class="main-account">
<div class="account">
    <nav class="vertical-menu">
        <ul>
          <li class="dashboard">
            <i class="fas fa-tachometer-alt"></i><span>Bảng điều khiển</span>
          </li>
          <li class="general-information">
            <a href="account.php">Thông tin chung</a>
          </li>
          <li class="account-information">
            <a href="update_account.php">Thông tin tài khoản</a>
          </li>
          <li class="orders">
            <a href="orders.php?khachhang=<?php echo $_SESSION['ma_khach_hang'] ?>">Đơn hàng</a>
          </li>
          <li class="recently-view active">
            <a href="recently_view.php">Đã xem gần đây</a>
          </li>
          <li class="logout">
            <a href="logout.php">Đăng xuất</a>
          </li>
        </ul>
    </nav>
    <div class="account-content">
        <div class="title">
            <h1>Đã xem gần đây</h1>
        </div>       
    </div>
</div>
</div>
</div>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>

