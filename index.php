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
	<div class="slide">
		<div class="chuyen-slide">
				<?php
					include 'db/connect.php';
					$sql = "SELECT * FROM banner limit 0,6";
					$result_banner = mysqli_query($con,$sql);
				?>
				<?php
					while($row_banner = mysqli_fetch_array($result_banner)){
				?>
				<div class="abc">		
					<div class="wrap">
						<div class="slider-left">
							<img src="admin/modules/slide/uploads_slide/<?php echo $row_banner['anh_bia'] ?>">
						</div>
						<div class="slider-right">
							<h1><?php echo $row_banner['ten_anh_bia'] ?></h1>
							<h2><?php echo $row_banner['mau'] ?></h2>
							<p><?php echo $row_banner['noi_dung'] ?></p>
							<div class="btn-slide">
								<a href="all_product.php">Shop now</a>
							</div>
						</div>	 
					</div>			
				</div>
				<?php } ?>
		</div>
		<a class="prev" onclick="Back();"><i class="fas fa-chevron-left"></i></a>
		<a class="next" onclick="Next();"><i class="fas fa-chevron-right"></i></a>
	</div>
	<script type="text/javascript" src="js/slide.js"></script>
	<div class="clear"></div>
	<div class="main-page">
		<div class="wrap">
			<div class="brand">
				<ul class="brand-title">
					<li>
						<h3>Nhà phân phối chính hãng các thương hiệu nổi tiếng</h3>
					</li>
				</ul>
				<div class="brand-logo umn">
					<a href="product.php?id=1">
						<img src="images/brand/Newbalance_brand.png">
					</a>
				</div>
				<div class="brand-logo">
					<a href="product.php?id=2">
						<img src="images/brand/Nike_brand.png">
					</a>
				</div>
				<div class="brand-logo">
					<a href="product.php?id=3">
						<img src="images/brand/adidas_brand.png">
					</a>
				</div>
				<div class="brand-logo">
					<a href="product.php?id=4">
						<img src="images/brand/vans_brand.png">
					</a>
				</div>
				<div class="brand-logo">
					<a href="product.php?id=5">
						<img src="images/brand/puma_brand.png">
					</a>
				</div>
				<div class="brand-logo">
					<a href="product.php?id=6">
						<img src="images/brand/converse_brand.png">
					</a>
				</div>
				<ul class="brand-healing">
					<li>
						<h3>Hàng mới nhập</h3> </li>
				</ul>
			</div>
			<div class="content-top">
				<div class="box">
					<?php 
						include 'db/connect.php';
						$sql = "SELECT * FROM san_pham ORDER BY ma_san_pham ASC limit 0,6";
						$result = mysqli_query($con,$sql);
					?>
					<?php
						while($row_moi_nhap = mysqli_fetch_array($result)){
							$gia_ban = ($row_moi_nhap['gia'] - ($row_moi_nhap['gia'] * $row_moi_nhap['sales']));
							$gia_fm = number_format($row_moi_nhap['gia'],"0",",",".")." "."₫";
							$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
							$sales = ($row_moi_nhap['sales'] * 100)."%";
					?>
					<div class="box-top box-content">
						<a>
							<div class="view view-fifth">
						  	  <div class="top_box">
							  	<h3 class="text_1"><?php echo $row_moi_nhap['ten_san_pham'] ?></h3>
							  	<p class="text_2">Lorem ipsum</p>
						         	<div class="grid_img">
									   	<div class="imgs" style="height: 220px !important">
									   		<img src="admin/modules/product_details/uploads_product/<?php echo $row_moi_nhap['anh'] ?>" width="220px" height="220px"  alt="File lỗi"/>
									   	</div>
									   	<a href="view_product_detail.php?ma=<?php echo $row_moi_nhap['ma_san_pham'] ?>">
								          	<div class="mask">
				                       			<div class="info">
				                       				Quick View
				                       			</div>
						                  	</div>
					                  	</a>
			                    	</div>
		                      		
		                      		<?php 
			                      		if($row_moi_nhap['sales'] > 0){
			                      			echo "<h5>SALE  $sales</h5>";
			                      		}else{
			                      			echo "";
			                      		}
		                      		?> 

									<?php if($row_moi_nhap['tinh_trang'] == 0){ ?>
			                      		<p style="display: inline-block; border: 1px solid #000; position: absolute;transform: rotate(90deg);right: -47px; top: 142px; "><img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(92deg);">Tạm hết hàng<img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(-87deg);">
			                      		</p>      
			                      	<?php }else{ ?>

			                      	<?php } ?>  		
							   </div>
					    	</div>
					    	
							<div class="price" style="height: 45px !important; width: 50% !important">
                      			<?php
							 		if($row_moi_nhap['sales'] > 0){
							 			echo "<h6>$gia_fm</h6>";
							 			echo "$gia_banfm";
							 		}else{
							 			echo "<h4>$gia_fm</h4>"; 
							 		}
							 	?> 				
                      		</div>			

		    	      		<ul class="list" style="height:45px;">
							  	<li>
							  		<img src="images/plus.png" style="margin: 5px 0px 0 18% !important" alt=""/>
							  		<ul class="icon1 sub-icon1 profile_img" style="margin-top: 5px">
								  		<li>
								  			<?php if($row_moi_nhap['tinh_trang'] == 1){ ?>
									  			<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
									  			<a class="active-icon c1" href="login.php" onclick="return confirm('Bạn cần có tài khoản thì mới được đặt mua sản phẩm');">Add To Bag </a>
									  			<?php }else{ ?>		  				
													<a class="active-icon c1" style="margin-top: 14px !important" href="add_cart.php?ma=<?php echo $row_moi_nhap["ma_san_pham"] ?>" onclick="return alert('Bạn đã thêm sản phẩm vào giỏ hàng');">Add To Bag </a>		
												<?php } ?>
											<?php }else{ ?>
												<a class="active-icon c1" style="cursor: pointer;" onclick="return alert('Sản phẩm tạm hết hàng');">Add To Bag</a>
											<?php } ?>
								  		</li>
								 	</ul>
							   	</li>
					     	</ul>
					     	<div class="clear"></div>
						</a>
					</div>	
					<?php } ?>	
				</div>
			</div>
			<div class="content-middle">
				<div class="selling">
					<ul class="selling-title">
						<li>
							<h3>Hàng bán chạy</h3>
						</li>
					</ul>
				</div>
				<div class="box">
					<?php 
						require_once 'db/connect.php';
						$sql = "SELECT * FROM san_pham ORDER BY ma_san_pham asc limit 6,6";
						$result = mysqli_query($con,$sql);
					?>
					<?php
						while($row_moi_nhap = mysqli_fetch_array($result)){
							$gia_ban = ($row_moi_nhap['gia'] - ($row_moi_nhap['gia'] * $row_moi_nhap['sales']));
							$gia_fm = number_format($row_moi_nhap['gia'],"0",",",".")." "."₫";
							$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
							$sales = ($row_moi_nhap['sales'] * 100)."%";
					?>
					<div class="box-top box-content">
						<a href="">
							<div class="view view-fifth">
						  	  <div class="top_box">
							  	<h3 class="text_1"><?php echo $row_moi_nhap['ten_san_pham'] ?></h3>
							  	<p class="text_2">Lorem ipsum</p>
						         	<div class="grid_img">
									   	<div class="imgs" style="height: 220px !important">
									   		<img src="admin/modules/product_details/uploads_product/<?php echo $row_moi_nhap['anh'] ?>" width="200px" height="200px" alt="File lỗi"/>
									   	</div>
									   	<a href="view_product_detail.php?ma=<?php echo $row_moi_nhap['ma_san_pham'] ?>">
							          	<div class="mask">
			                       			<div class="info">Quick View</div>
					                  	</div>
					                  	</a>
			                    	</div>
		                      		
		                      		<?php 
		                      		if($row_moi_nhap['sales'] > 0){
		                      			echo "<h5>SALE  $sales</h5>";
		                      		}else{
		                      			echo "";
		                      		}
		                      		?>

		                      		<?php if($row_moi_nhap['tinh_trang'] == 0){ ?>
			                      		<p style="display: inline-block; border: 1px solid #000; position: absolute;transform: rotate(90deg);right: -47px; top: 142px; "><img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(92deg);">Tạm hết hàng<img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(-87deg);">
			                      		</p>      
			                      	<?php }else{ ?>

			                      	<?php } ?>  	
							   </div>
					    	</div>
					    	
							<div class="price" style="height: 45px !important; width: 50% !important">
                      			<?php
							 		if($row_moi_nhap['sales'] > 0){
							 			echo "<h6>$gia_fm</h6>";
							 			echo "$gia_banfm";
							 		}else{
							 			echo "<strong>$gia_fm</strong>"; 
							 		}
							 	?> 
                      		</div>

		    	      		<ul class="list" style="height:45px;">
							  	<li>
							  		<img src="images/plus.png" style="margin: 5px 0px 0 18% !important" alt=""/>
							  		<ul class="icon1 sub-icon1 profile_img" style="margin-top: 5px">
								  		<li>
								  			<?php if($row_moi_nhap['tinh_trang'] == 1){ ?>
									  			<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
									  			<a class="active-icon c1" href="login.php" onclick="return confirm('Bạn cần có tài khoản thì mới được đặt mua sản phẩm');">Add To Bag </a>
									  			<?php }else{ ?>		  				
													<a class="active-icon c1" style="margin-top: 14px !important" href="add_cart.php?ma=<?php echo $row_moi_nhap["ma_san_pham"] ?>" onclick="return alert('Bạn đã thêm sản phẩm vào giỏ hàng');">Add To Bag </a>		
												<?php } ?>
											<?php }else{ ?>
												<a class="active-icon c1" style=" cursor: pointer;" onclick="return alert('Sản phẩm tạm hết hàng');">Add To Bag</a>
											<?php } ?>
								  		</li>
								 	</ul>
							   	</li>
					     	</ul>
					     	<div class="clear"></div>
						</a>
					</div>	
					<?php } ?>	
				</div>
			</div>
		</div>
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
	</div>
	<?php include 'footer.php' ?>
</body>
</html>