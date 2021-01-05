<!DOCTYPE html>
<html>
<head>
	<title>Đồ án 1: SHOESVN</title>
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<div class="main-detail-news">
		<div class="wrap">
			<?php
				if(isset($_GET['matt'])){
					$matt = $_GET['matt'];
					$sql = "select * from tin_tuc where ma_tin_tuc = '$matt'";
					$array = mysqli_query($con,$sql);
					$each = mysqli_fetch_array($array);
			?>
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li><a href="blog.php">Tin Tức</a></li>
					<li><span><?php echo $each['tieu_de'] ?></span></li>
				</ul>
			</div>
			<div style="width: 97%; margin: 30px auto;">
				<div style="width: 77%; float: left;">
					<h1><?php echo $each['tieu_de'] ?></h1>
					<strong>
						<?php
							$date = $each['ngay_dang_tin'];
							$timestamp = strtotime($date);
							$new_date = date("d/m/Y",$timestamp);
							echo $new_date;
						?>
					</strong>
					<div class="text-news">	
						<?php echo $each['noi_dung'] ?>
						<img src="images/img_avatar.png" alt="Avatar" class="avatar"><span><?php echo $each['tac_gia'] ?></span>
					</div> 
				</div>
				<div style="width: 23%; float: right; height: 500px">
					<img src="images/anh.jpg" style="width: 150px;height: 150px;margin: 70px 65px 0 65px; border-radius: 50% ">
					<h4 style="text-align: center;font-family: IBM Plex Sans;font-size: 20px;font-weight: 400;line-height: 1.6;text-transform: none;color: #222; margin-left: 20px">ShoesVN blog</h4>
					<p style="text-align: center; color: #777; font-family: IBM Plex Sans; font-size: 18px">Cập nhật nhanh chóng những tin tức liên quan đến giày thể thao và xu hướng mùa hè.</p>
				</div>
			</div>
			<div class="clear"></div>
			<?php
				}
			?>
		</div>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>