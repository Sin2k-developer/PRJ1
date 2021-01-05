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
  if(empty($_SESSION["ma_khach_hang"])){
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
          <li class="general-info active">
            <a href="account.php">Thông tin chung</a>
          </li>
          <li class="account-info">
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
    <div class="account-content">
        <div class="title">
            <h1>Thông tin chung</h1>
            <p><span>Xin chào, <?php echo $_SESSION['ten_tai_khoan']; ?> !! </span></p>
            <h5>Từ trang quản lý tài khoản bạn có thể xem nhanh chức năng sau:</h5>
        </div> 
        <div class="title-second">
            <div class="left">
                <a href="update_account.php">Thông tin tài khoản</a>
                <p>Cập nhật lại thông tin cá nhân và mật khẩu giúp tài khoản của bạn tăng cường bảo mật.</p>
            </div>
            <div class="right">
                <a href="orders.php">Đơn hàng của tôi</a>
                <p>Những gì bạn mua là tất cả ở đây, bạn có thể kiểm tra chúng bất cứ lúc nào.</p>
            </div>
        </div>  
        <div class="title-third">
          <div class="left">
              <a href="recently_view.php">Đã xem gần đây</a>
              <p>Sản phẩm đã được xem gần đây.</p>
          </div>
          <div class="right">
              <a href="update_account.php">Thay đổi mật khẩu</a>
              <p>Để giữ an toàn cho tài khoản của bạn, bạn có thể chỉnh sửa mật khẩu của mình, làm cho nó dễ nhớ! Chúng tôi khuyên bạn nên làm điều này và sẽ không mất nhiều thời gian.</p>
          </div>
        </div>
        <div class="title-fourth">
          <div class="left">
              <a href="product_reviews.php">Nhận xét về sản phẩm</a>
              <p>Đưa ra 1 số ý kiến đóng góp để cho web cải thiện hơn.</p>
          </div>
        </div>  
    </div>
</div>
</div>
</div>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>

