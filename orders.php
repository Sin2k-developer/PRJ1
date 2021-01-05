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
<div class="wrap-orders">
<div class="main-orders-account">
<div class="orders">
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
          <li class="orders active">
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


    <?php
      if(isset($_GET['khachhang'])){
          $id_khachhang = $_GET['khachhang'];
      }else{
           $id_khachhang = '';
      }


      $sql = "SELECT * FROM hoa_don WHERE ma_khach_hang = '$id_khachhang' ORDER BY ma_hoa_don DESC";
      $array = mysqli_query($con,$sql);
      $total_bill = mysqli_num_rows($array);
      if($total_bill > 0){
    ?>

    <div class="orders-account-content">
        <div class="title">
            <h1>Đơn hàng của tôi</h1>
        </div>  
        <div class="bill-account">
            <table>
                <tr>
                  <th>#</th>
                  <th>Tên người nhận</th>
                  <th>Nơi nhận</th>
                  <th>Thời gian mua</th>
                  <th>Tình trạng</th>
                  <th>Hành động</th>
                </tr>
                <?php 
                  while($each = mysqli_fetch_array($array)){
                    if($each["tinh_trang"] == 1){  
                ?>
                  <tr>
                    <td>#<?php echo $each["ma_hoa_don"] ?></td>
                    <td><?php echo $each["ten_nguoi_nhan"] ?></td>
                    <td><?php echo $each["dia_chi_nguoi_nhan"] ?></td>
                    <td><?php echo $each["thoi_gian_mua"] ?></td>
                    <td>
                        <?php
                            switch($each['tinh_trang']){
                                case '1':
                                  echo "Đang chờ duyệt";
                                  break;
                            }
                        ?>
                    </td>
                    <td><a href="">Hủy đơn</a></td>
                  </tr>
                <?php }else if($each["tinh_trang"] == 2){ ?>
                    <tr>
                      <td>#<?php echo $each["ma_hoa_don"] ?></td>
                      <td><?php echo $each["ten_nguoi_nhan"] ?></td>
                      <td><?php echo $each["dia_chi_nguoi_nhan"] ?></td>
                      <td><?php echo $each["thoi_gian_mua"] ?></td> 
                      <td>
                          <?php
                              switch($each['tinh_trang']){
                                  case '2':
                                    echo "Đã xử lý | Đang giao hàng";
                                    break; 
                              }
                          ?>
                      </td>
                      <td><a href="">Hủy đơn</a></td>
                  </tr> 
                <?php  }else{ ?>
                    <tr>
                      <td>#<?php echo $each["ma_hoa_don"] ?></td>
                      <td><?php echo $each["ten_nguoi_nhan"] ?></td>
                      <td><?php echo $each["dia_chi_nguoi_nhan"] ?></td>
                      <td><?php echo $each["thoi_gian_mua"] ?></td> 
                      <td>
                          <?php
                              switch($each['tinh_trang']){
                                  case '3':
                                    echo "Đơn hàng đã bị hủy";
                                    break; 
                              }
                          ?>
                      </td>
                      <td><a href="">Hủy đơn</a></td>
                  </tr> 
                <?php }} ?>
            </table>
        </div> 
        <div class="clear"></div>
        <div class="checkbox-account">
            <input type="checkbox" id="myCheck" onclick="myFunction()"> <h5 style="display: inline;">Xem chi tiết hóa đơn</h5>
        </div>
        <?php
            $sql = "SELECT
            hoa_don.ma_hoa_don,ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,tinh_thanh_pho,dia_chi_nguoi_nhan,hoa_don.noi_dung,hoa_don.email,hoa_don.tinh_trang,thoi_gian_mua,tong_tien,
            hoa_don_chi_tiet.gia,
            hoa_don_chi_tiet.so_luong,
            san_pham.anh,
            san_pham.ten_san_pham
            FROM hoa_don 
            JOIN hoa_don_chi_tiet ON hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don
            JOIN san_pham ON san_pham.ma_san_pham = hoa_don_chi_tiet.ma_san_pham
            WHERE ma_khach_hang = '$id_khachhang' ORDER BY ma_hoa_don DESC
            ";
            $array = mysqli_query($con,$sql);
        ?>

        <fieldset id="changePass" style="display: none; margin-top: 15px; height: auto;">
                  <legend style="margin-left: 20px; color: darkslateblue">Chi tiết hóa đơn</legend>
                  <div class="list-bill_details-content">
                      <table style="width: 915px; margin: auto; margin-top: 10px;">
                        <tr>
                          <th style="color:brown">Ảnh</th>
                          <th style="color:brown">Tên sản phẩm</th>
                          <th style="color:brown">Số lượng</th>
                          <th style="color:brown">Giá</th>
                          <th style="color:brown">Thành tiền</th>
                        </tr>
                        <?php
                          $tong = 0;                  
                          foreach ($array as $row):
                          $thanhtien=($row['gia']*$row['so_luong']);
                          $tong+=$thanhtien;
                        ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"> <img src="admin/modules/product_details/uploads_product/<?php echo $row['anh'] ?>" width="60px" height="60px" /> </td>
                          <td style="text-align: center; vertical-align: middle;"> <?php echo $row['ten_san_pham'] ?> </td>
                          <td style="text-align: center; vertical-align: middle;"> <?php echo $row['so_luong'] ?> </td>
                          <td style="text-align: center; vertical-align: middle;"> <?php echo number_format($row['gia'],0,",",".") ?> </td>
                          <td style="text-align: center; vertical-align: middle;"> <?php echo number_format($thanhtien,0,",",".") ?> </td>
                        </tr>
                        <?php endforeach ?>
                  </table>
                  </div>
            </fieldset>
        

            <div class="notes">
                <strong>* Lưu ý: </strong> 
                <p>- Khi khách hàng hủy đơn trước khi đơn hàng được duyệt thì sẽ không phải chịu phí ship.</p>
                <p>- Khi khách hàng hủy đơn sau khi đơn hàng được duyệt thì sẽ phải chịu phí ship.</p>
            </div>
        <?php }else{ ?>
                <script>
                  alert('Không có hóa đơn');
                </script>
        <?php } ?> 
    </div>
</div>
</div>
</div>
<div class="clear"></div>
<?php require_once 'footer.php'; ?>
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
</body>
</html>

