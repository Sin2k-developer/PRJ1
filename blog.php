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
	<div class="main-blog">
		<div class="wrap">
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li><span>Tin tức</span></li>	
				</ul>
			</div>
			<?php
				include 'db/connect.php';
				$sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC";
				$array = mysqli_query($con,$sql);
				$tong_so_san_pham = mysqli_num_rows($array);
				$limit = 6; 
			  	$total_page = ceil($tong_so_san_pham/$limit);
				$trang_hien_tai = 1;
				if(isset($_GET['page'])){  
					$trang_hien_tai = $_GET['page'];  
				}   
				$trang_ke_tiep = ($trang_hien_tai - 1)*$limit;  
				$so_trang = ceil($tong_so_san_pham / $limit);	
				$sql = "$sql limit $limit offset $trang_ke_tiep";
				$array = mysqli_query($con,$sql);
				while($row_blog = mysqli_fetch_array($array)){
			?>
			<div style="width: 97%; margin: 30px auto;">
				<div class="box-blog">
					<div class="img-blog">
						<a href="blog_detail.php?matt=<?php echo $row_blog['ma_tin_tuc'] ?>">
							<img src="admin/modules/blog/uploads_tt/<?php echo $row_blog['anh'] ?>">
						</a>
					</div>
					<div class="post-date">
						<span class="post-date-day">
							<?php
								$date = $row_blog['ngay_dang_tin'];
								$timestamp = strtotime($date);
								$new_date = date("d",$timestamp);
								echo $new_date;
							?>
						</span>
						<span class="post-date-month">
							<?php
								$date = $row_blog['ngay_dang_tin'];
								$timestamp = strtotime($date);
								$new_date = date("M",$timestamp);
								echo $new_date;
							?>
						</span>
					</div>
					<div class="blog-content">
						<div class="blog-content-title"><?php echo $row_blog['tieu_de'] ?></div>
						<div class="blog-content-author">BY <span><?php echo $row_blog['tac_gia'] ?></span></div>
						<div class="blog-content-short">
							<p><?php echo $row_blog['noi_dung_ngan']?></p>
							<a href="blog_detail.php?matt=<?php echo $row_blog['ma_tin_tuc'] ?>">Đọc Thêm</a>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			<div class="clear"></div>
			<div class="pagination">
				<?php
			        for($i = 1; $i <= $so_trang;$i++){
				        ?>
				        	<a href="blog.php?page=<?php echo $i ?>"><button class="so active"><?php echo $i; ?></button></a>
				        <?php
			    	}
			    ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>