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
	<?php
		if(empty($_GET['category']) || empty($_GET['id']) || empty($_GET['type'])){
			header('location:all_product.php');
			exit();
		}
	?>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<div class="main-all-product">
		<div class="wrap">
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<?php if($_GET['id'] == 1){?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>					 
						<li><span>New Balance</span></li>
					<?php }else if($_GET['id'] == 2){ ?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>					 
						<li>
							<?php if($_GET['category'] == 1 && $_GET['id'] == 2){ ?>
								<a href="product2.php?category=1&id=2">Giày thể thao Nike</a>
							<?php }else{ ?>
								<a href="product2.php?category=2&id=2">Giày thể thao Nike</a>
							<?php } ?>
						</li>
						<li>
							<?php if($_GET['type'] == 1){ ?>
								<span>Air Max</span>
							<?php }else if($_GET['type'] == 2){ ?>
								<span>Air Force 1</span>
							<?php }else if($_GET['type'] == 3){ ?>
								<span>Air Zoom</span>
							<?php }else if($_GET['type'] == 4){ ?>
								<span>Air Jordan 1</span>
							<?php }else{ ?>

							<?php } ?>
						</li>
					<?php }else if($_GET['id'] == 3){ ?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>					 
						<li>
							<?php if($_GET['category'] == 1 && $_GET['id'] == 3){ ?>
								<a href="product2.php?category=1&id=3">Giày thể thao Adidas</a>
							<?php }else{ ?>
								<a href="product2.php?category=2&id=3">Giày thể thao Adidas</a>
							<?php } ?>
						</li>
						<li>
							<?php if($_GET['type'] == 5){ ?>
								<span>Ultra Boost</span>
							<?php }else if($_GET['type'] == 6){ ?>
								<span>Alphabounce</span>
							<?php }else if($_GET['type'] == 7){ ?>
								<span>Stan Smith</span>
							<?php }else if($_GET['type'] == 8){ ?>
								<span>Yeezy</span>
							<?php }else{ ?>
							<?php } ?>
						</li>
					<?php }else if($_GET['id'] == 4){ ?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>				 
						<li>
							<?php if($_GET['category'] == 1 && $_GET['id'] == 4){ ?>
								<a href="product2.php?category=1&id=4">Vans</a>
							<?php }else{ ?>
								<a href="product2.php?category=2&id=4">Vans</a>
							<?php } ?>
						</li>
						<li>
							<?php if($_GET['type'] == 9){ ?>
								<span>Old Skool</span>
							<?php }else if($_GET['type'] == 10){ ?>
								<span>SK8-Hi</span>
							<?php }else{ ?>
							<?php } ?>
						</li>
					<?php }else if($_GET['id'] == 5){ ?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>					 
						<li>
							<?php if($_GET['category'] == 1 && $_GET['id'] == 5){ ?>
								<a href="product2.php?category=1&id=5">Puma</a>
							<?php }else{ ?>
								<a href="product2.php?category=2&id=5">Puma</a>
							<?php } ?>
						</li>
						<li>
							<?php if($_GET['type'] == 11){ ?>
								<span>Smash</span>
							<?php }else if($_GET['type'] == 12){ ?>
								<span>Muse X</span>
							<?php }else{ ?>
							<?php } ?>
						</li>
					<?php }else if($_GET['id'] == 6){ ?>
						<li>
							<?php if($_GET['category'] == 1){ ?>
								<a href="product1.php?category=1">Nam</a>
							<?php }else{ ?>
								<a href="product1.php?category=2">Nữ</a>
							<?php } ?>
						</li>					 
						<li>
							<?php if($_GET['category'] == 1 && $_GET['id'] == 6){ ?>
								<a href="product2.php?category=1&id=6">Converse</a>
							<?php }else{ ?>
								<a href="product2.php?category=2&id=6">Converse</a>
							<?php } ?>
						</li>
						<li>
							<?php if($_GET['type'] == 13){ ?>
								<span>Jack Purcell</span>
							<?php }else if($_GET['type'] == 14){ ?>
								<span>Chuck Taylor</span>
							<?php }else{ ?>
							<?php } ?>
						</li>
					<?php }else{ ?>
						
					<?php } ?>
				</ul>
			</div>
			<div style="width: 97%; margin: auto;">
			<?php include 'side_bar.php' ?>
			<div class="list-all-product">
				<?php
					require_once 'db/connect.php';
					$sql="select * from san_pham where ma_danh_muc='$_GET[category]' AND ma_hang='$_GET[id]' AND ma_loai_san_pham='$_GET[type]'";
					$array=mysqli_query($con,$sql);
					$tong_so_san_pham = mysqli_num_rows($array);
					$limit = !empty($_GET['limit'])?$_GET['limit']:6;
					$trang_hien_tai = !empty($_GET['page'])?$_GET['page']:1;
					if(isset($_GET['page'])){
						$trang_hien_tai = $_GET['page'];
					}
					$trang_ke_tiep = ($trang_hien_tai - 1)*$limit;	
					$so_trang = ceil($tong_so_san_pham / $limit);
					$sql = "$sql limit $limit offset $trang_ke_tiep";
					$array = mysqli_query($con,$sql);
				?>
				<div class="advertisement">
					<?php if($_GET['category'] == 1){?>
						<?php if($_GET['id'] == 2 && $_GET['type'] == 1){ ?>
						 	<h1>
								Air Max
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Max</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/Air_Max_nam.jpg" width="440px" height="295px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 2){ ?>
							<h1>
								Air Force 1
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Force 1</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/Air_Force_1_nam.jpg" width="440px" height="295px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 3){ ?>
							<h1>
								Air Zoom
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Zoom</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 4){ ?>
							<h1>
								Air Jordan 1
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Jordan 1</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 5){ ?>
							<h1>
								Ultra Boost
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Ultra Boost</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 6){ ?>
							<h1>
								Alphabounce
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Alphabounce</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 7){ ?>
							<h1>
								Stan Smith
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Stan Smith</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 8){ ?>
							<h1>
								Yeezy
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Yeezy</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 4 && $_GET['type'] == 9){ ?>
							<h1>
								Old Skool
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Old Skool</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 4 && $_GET['type'] == 10){ ?>
							<h1>
								SK8-Hi
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>SK8-Hi</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 5 && $_GET['type'] == 11){ ?>
							<h1>
								Smash
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Smash</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 5 && $_GET['type'] == 12){ ?>
							<h1>
								Muse X
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Muse X</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 6 && $_GET['type'] == 13){ ?>
							<h1>
								Jack Purcell
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Jack Purcell</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 6 && $_GET['type'] == 14){ ?>
							<h1>
								Chuck Taylor
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Chuck Taylor</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else{ ?>
							<?php echo '<div class="infoss">
								    	<p> 404 Not Found! </p>
									</div>'; 
							?>
						<?php } ?>
					<?php }else if($_GET['category'] == 2){ ?>
						<?php if($_GET['id'] == 2 && $_GET['type'] == 1){ ?>
						 	<h1>
								Air Max
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Max</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/Air_Max_nu.jpg" width="440px" height="295px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 2){ ?>
							<h1>
								Air Force 1
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Force 1</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/Air_Force_1_nu.jpg" width="440px" height="295px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 3){ ?>
							<h1>
								Air Zoom
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Zoom</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 2 && $_GET['type'] == 4){ ?>
							<h1>
								Air Jordan 1
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Air Jordan 1</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 5){ ?>
							<h1>
								Ultra Boost
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Ultra Boost</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 6){ ?>
							<h1>
								Alphabounce
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Alphabounce</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 7){ ?>
							<h1>
								Stan Smith
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Stan Smith</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 3 && $_GET['type'] == 8){ ?>
							<h1>
								Yeezy
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Yeezy</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 4 && $_GET['type'] == 9){ ?>
							<h1>
								Old Skool
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Old Skool</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 4 && $_GET['type'] == 10){ ?>
							<h1>
								SK8-Hi
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>SK8-Hi</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 5 && $_GET['type'] == 11){ ?>
							<h1>
								Smash
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Smash</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 5 && $_GET['type'] == 12){ ?>
							<h1>
								Muse X
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Muse X</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 6 && $_GET['type'] == 13){ ?>
							<h1>
								Jack Purcell
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Jack Purcell</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else if($_GET['id'] == 6 && $_GET['type'] == 14){ ?>
							<h1>
								Chuck Taylor
							</h1>
							<div class="description">
								<p>Hãy lựa chọn những đôi giày thể thao <strong>Chuck Taylor</strong> phù hợp với phong cách của bạn.</p>
							</div>
							<div class="images mn">
								<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
							</div>
						<?php }else{ ?>
							<?php echo '<div class="infoss">
									    	<p> 404 Not Found! </p>
										</div>'; 
							?>
						<?php } ?>
					<?php }else{ ?>
						<?php echo '<div class="infoss">
								    	<p> 404 Not Found! </p>
									</div>'; 
						?>
					<?php } ?>
				</div>
				<div class="toolbar" id="myDIV">
					<div class="pagination">
						<?php for($i = 1; $i <= $so_trang;$i++){ ?>
							<?php if($i != $trang_hien_tai ){ ?>
								<a href="?category=<?php echo $_GET['category'] ?>&id=<?php echo $_GET['id'] ?>&type=<?php echo $_GET['type'] ?>&page=<?php echo $i ?>"><button class="so active"><?php echo $i; ?></button></a>
							<?php }else{ ?>
								<strong class="so" style="background: #333; color: #fff"><?=$i ?></strong>
							<?php } ?>
						<?php } ?>
				    </div>
				</div>
				<div class="show-all-product">
					<?php
						while($row_cat_bran_type_product = mysqli_fetch_array($array)){
							$gia_ban = ($row_cat_bran_type_product['gia'] - ($row_cat_bran_type_product['gia'] * $row_cat_bran_type_product['sales']));
							$gia_fm = number_format($row_cat_bran_type_product['gia'],"0",",",".")." "."₫";
							$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
							$sales = ($row_cat_bran_type_product['sales'] * 100)."%";
					?>
					<div class="box-bottom box-content-bottom">
						<a href="">
							<div class="view view-fifth">
						  	  <div class="top_box">
							  	<h3 class="text_3"><?php echo $row_cat_bran_type_product['ten_san_pham'] ?></h3>
							  	<p class="text_2">Lorem ipsum</p>
						         	<div class="grid_img">
									   	<div class="imgs">
									   		<img src="admin/modules/product_details/uploads_product/<?php echo $row_cat_bran_type_product['anh'] ?>" width="170px" height="170px"  alt=""/>
									   	</div>
									   	<a href="view_product_detail.php?ma=<?php echo $row_cat_bran_type_product['ma_san_pham'] ?>">
								          	<div class="mask1">
				                       			<div class="info1">
				                       				Quick View
				                       			</div>
						                  	</div>
					                  	</a>
			                    	</div>
		                      		
		                      		<?php 
		                      		if($row_cat_bran_type_product['sales'] > 0){
		                      			echo "<h6>SALE  $sales</h6>";
		                      		}else{
		                      			echo "";
		                      		}
		                      		?> 

		                      		<?php if($row_cat_bran_type_product['tinh_trang'] == 0){ ?>
			                      		<p style="display: inline-block; border: 1px solid #000; position: absolute;transform: rotate(90deg);right: -52px; top: 132px; padding-top: 1px "><img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(92deg);">Tạm hết hàng<img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(-87deg);">
			                      		</p>      
			                      	<?php }else{ ?>

			                      	<?php } ?>          		
							   </div>
					    	</div>
					    	
							<div class="price">
                      			<?php
							 		if($row_cat_bran_type_product['sales'] > 0){
							 			echo "<span>$gia_fm</span>";
							 			echo "$gia_banfm";
							 		}else{
							 			echo "<strong>$gia_fm</strong>"; 
							 		}
							 	?> 				
                      		</div>

		    	      		<ul class="list-product">
							  	<li>
							  		<img class="imgs-product" src="images/plus.png" alt=""/>
							  		<ul class="icon1 sub-icon1 profile_img">
								  		<li>
								  			<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
								  			<a class="active-icon c1" href="login.php" onclick="return confirm('Bạn cần có tài khoản thì mới được đặt mua sản phẩm');">Add To Bag </a>
								  			<?php }else{ ?>
								  				<?php if($row_cat_bran_type_product['tinh_trang'] == 1){ ?>
													<a class="active-icon c1" href="add_cart1.php?ma=<?php echo $row_cat_bran_type_product['ma_san_pham'] ?>" onclick="return alert('Bạn đã thêm sản phẩm vào giỏ hàng');">Add To Bag </a>
												<?php }else{ ?>
													<a class="active-icon c1" style="cursor: pointer;" onclick="return alert('Sản phẩm tạm hết hàng');">Add To Bag </a>
												<?php } ?>
								  			<?php } ?>
								  		</li>
								 	</ul>
							   	</li>
					     	</ul>
					     	<div class="clear"></div>
						</a>
					</div>
					<?php
						}
					?>
				</div>
			</div>
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
	<?php include 'footer.php' ?>
</body>
</html>