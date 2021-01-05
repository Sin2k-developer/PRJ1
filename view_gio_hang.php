<!DOCTYPE html>
<html>
<head>
	<title>Đồ án 1: SHOESVN</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<div class="main-view-cart">
		<div class="wrap">
			<?php
				if(isset($_SESSION["cart"]) && count($_SESSION["cart"])>0){
					$arr_gio_hang = $_SESSION["cart"];
			?>
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li><span>Giỏ hàng</span></li>
				</ul>
			</div>
			<div style="width: 97%; margin: auto;">
			<?php include 'side_bar.php' ?>
			<div class="list-view-cart">
				<div class="healing-cart"> 
					<h2>Giỏ hàng của bạn</h2>
				</div>
				<table>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Ảnh sản phẩm</th>
						<th>Giá tiền</th>
						<th>Số lượng</th>
						<th>Tổng tiền</th>
						<th class="line">Thao tác</th>
					</tr>
					<?php 
						$i=0;
						$tong_tien = 0;
						foreach ($arr_gio_hang as $ma_san_pham => $each): $i++ ?>
						<?php
							$thanh_tien = ($each['price'] * $each['num']);
							$tong_tien += $thanh_tien;
						?>
						<?php
				
							include 'db/connect.php';
							$sql = "SELECT * FROM san_pham WHERE ma_san_pham = '$ma_san_pham '";
								$result = mysqli_query($con,$sql);
								$row = mysqli_fetch_array($result);
								$sales = "-".($row['sales'] * 100)."%";
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td>
								<a href="view_product_detail.php?ma=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
								<strong style="display: block; font-weight: normal; font-size: 15px; margin-top:7px">Cỡ giày: <?php echo $each['size'] ?></strong>
							</td>
							<td>
								<img src="admin/modules/product_details/uploads_product/<?php echo $each['image'] ?>" width="60px" height="60px" />
							</td>
							<td style="font-weight: bold;">
								<?php echo number_format($each['price'],0,",",".") ?> <span>₫</span>
								<strong style="display: block; font-weight: normal;"><del><?php echo number_format($row['gia'],0,",",".") ?> <span>₫</span></del><i style="color: #fff;margin-left: 4px; font-size: 10px; vertical-align: top; background: red; border-radius: 35%; padding: 1px"><?php echo $sales ?></i></strong>
							</td>
							<td>
								<a class="update_cart sub" href="update_num_cart.php?ma=<?php echo $each['id'] ?>&kieu=tru" style="border:1px solid darkgray; color:#000">
								-
								</a>
									<strong style="padding: 0px 5px 1px 5px; border: 1px solid darkgray; font-size: 14px;"><?php echo $each['num'] ?></strong><a class="update_cart" href="update_num_cart.php?ma=<?php echo $each['id'] ?>&kieu=cong" style="border:1px solid darkgray; color:#000">+</a>        
							</td>
							<td>
								<?php echo number_format($thanh_tien,0,",",".") ?> <span>₫</span>
							</td>
							<td>
								<a href="delete_product_cart.php?ma=<?php echo $each['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?');" style="border:none;">
								<img src="images/delete.png" width="25" height="25">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
				<div class="plus-cart">
					<div class="content-plus-cart">
						<h2>Cộng giỏ hàng</h2>
						<h3>Tổng cộng: <span id="tong_tien_tat_ca"><?php echo number_format($tong_tien,0,",",".") ?> <span>₫</span></span></h3> 
						<div class="buttom">
							<a href="checkout.php">Tiến hành thanh toán</a>
						</div>	
					</div>
				</div>
			</div>
			<?php }else{
				echo '<h1>Giỏ hàng của bạn đang trống</h1>
					  <p>Không có sản phẩm nào. Quay lại <a href="http://project.com/">cửa hàng</a> để tiếp tục mua sắm. </p>
					  ';
			}?>
		</div>
	</div>
	</div>
	<div class="clear"></div>
	<div class="content-bottom unm">
			<div class="wrap">
				<div class="tao-trang-chi dil">
                    <div class="phan-trang-chi">                  
                        <div class="trang-chi-img del">
                            <img src="images/icons/policy-icon5.png" width="40px" height="40px" />
                        </div>  
                        <div class="trang-chi-text">
                            <h3>THANH TOÁN NHANH GỌN</h3>
                            <p>Nhận thanh toán trực tiếp hoặc chuyển khoản</p>
                        </div>          
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon4-32x32.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>NHIỀU ƯU ĐÃI HẤP DẪN</h3>
                            <p>Thường nhận được ưu đãi và giảm giá</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon3.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>ĐỔI SIZE MIỄN PHÍ</h3>
                            <p>Đổi size trong thời gian 5 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon2.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>HỖ TRỢ 24/12</h3>
                            <p>Hỗ trợ trực tuyến 24h/ngày</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon1.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>GIAO HÀNG TOÀN QUỐC</h3>
                            <p>Nhận giao hàng tận nơi</p>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	<?php include 'footer.php'?>
</body>
</html>