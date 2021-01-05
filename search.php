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
	<div class="main-all-product">
		<div class="wrap">
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li><span><a href="all_product.php">Tất cả sản phẩm</a></span></li>	
					<li><span>Kết quả tìm kiếm cho  <strong style="color: darkblue">"<?php if($_GET['search']){ ?><?php echo $_GET['search'] ?><?php }else{ ?><?php echo $_GET['price'] ?><?php } ?>"</strong></span></li>					
				</ul>
			</div>
			<div style="width: 97%; margin: auto;">
			<?php include 'side_bar.php' ?>
			<div class="list-all-product">
				<?php
					require_once 'db/connect.php';
					if(isset($_GET['search'])){
						$tim=$_GET['search'];
						  switch($_GET['price']){
							case "Dưới 1.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%' and (gia between '0' and '1000000') order by ma_san_pham desc";	
							break;
							case "1.000.000₫ - 3.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%'  and (gia between '1000000' and '3000000') order by ma_san_pham desc";	
							break;
							case "3.000.000₫ - 5.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%'  and (gia between '3000000' and '5000000') order by ma_san_pham desc";	
							break;
							case "5.000.000₫ - 8.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%'  and (gia between '5000000' and '8000000') order by ma_san_pham desc";	
							break;
							case "8.000.000₫ - 10.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%'  and (gia between '8000000' and '10000000') order by ma_san_pham desc";	
							break;
							case "Trên 10.000.000₫":
								$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%'  and (gia >= '10000000')";	
							break;
							default:
							 	$sql="select * FROM san_pham WHERE ten_san_pham like '%".$tim."%' ";	
							 break;
							}			
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
							if($tong_so_san_pham>0){
								echo"";											
				?>
				<div class="toolbar" id="myDIV">
					<div class="pagination">
						<?php if($trang_hien_tai > 2){ 
							$first_page = 1;
						?>
							<a href="?price=<?php echo $_GET['price'] ?>&search=<?php echo $_GET['search']; ?>&limit=<?=$limit ?>&page=<?=$first_page ?>"><button class="so active">First</button></a>
						<?php 
							}
							if($trang_hien_tai > 1){
								$prev_page = $trang_hien_tai - 1; 
								?>
								<a href="?price=<?php echo $_GET['price'] ?>&search=<?php echo $_GET['search']; ?>&limit=<?=$limit ?>&page=<?=$prev_page ?>"><button class="so active">Prev</button></a>
						<?php } ?>

						<?php for($i = 1; $i <= $so_trang;$i++){ ?>
							<?php if($i != $trang_hien_tai){ ?>
								<?php if($i > $trang_hien_tai - 3 && $i < $trang_hien_tai + 3){ ?>
									<a href="?price=<?php echo $_GET['price']; ?>&search=<?php echo $_GET['search']; ?>&limit=<?=$limit ?>&page=<?php echo $i ?>"><button class="so active"><?php echo $i; ?></button></a>
								<?php } ?>
							<?php }else{ ?>
								<strong class="so" style="background: #333; color: #fff" ><?=$i ?></strong>
							<?php } ?>
						<?php } ?>

						<?php if($trang_hien_tai < $so_trang - 1 ){ 
							$next_page = $trang_hien_tai + 1;
						?>
							<a href="?price=<?php echo $_GET['price'] ?>&search=<?php echo $_GET['search']; ?>&limit=<?=$limit ?>&page=<?=$next_page ?>"><button class="so active">Next</button></a>
						<?php 
							}
							if($trang_hien_tai < $so_trang - 2){
								$end_page = $so_trang;
								?>
									<a href="?price=<?php echo $_GET['price'] ?>&search=<?php echo $_GET['search']; ?>&limit=<?=$limit ?>&page=<?=$end_page ?>"><button class="so active">Last</button></a>
								<?php
							}
						?>
				    </div>
				</div>
			
				<div class="show-all-product">
					<?php
						while($row_all_product = mysqli_fetch_array($array)){
							$gia_ban = ($row_all_product['gia'] - ($row_all_product['gia'] * $row_all_product['sales']));
							$gia_fm = number_format($row_all_product['gia'],"0",",",".")." "."₫";
							$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
							$sales = ($row_all_product['sales'] * 100)."%";
					?>
					<div class="box-bottom box-content-bottom">
						<a href="">
							<div class="view view-fifth">
						  	  <div class="top_box">
							  	<h3 class="text_3"><?php echo $row_all_product['ten_san_pham'] ?></h3>
							  	<p class="text_2">Lorem ipsum</p>
						         	<div class="grid_img">
									   	<div class="imgs">
									   		<img src="admin/modules/product_details/uploads_product/<?php echo $row_all_product['anh'] ?>" width="140px" height="140px"  alt="File lỗi"/>
									   	</div>
									   	<a href="view_product_detail.php?ma=<?php echo $row_all_product['ma_san_pham'] ?>">
								          	<div class="mask1">
				                       			<div class="info1">
				                       				Quick View
				                       			</div>
						                  	</div>
					                  	</a>
			                    	</div>
		                      		
		                      		<?php 
		                      		if($row_all_product['sales'] > 0){
		                      			echo "<h6>SALE  $sales</h6>";
		                      		}else{
		                      			echo "";
		                      		}
		                      		?>           		
							   </div>
					    	</div>
					    	
							<div class="price">
                      			<?php
							 		if($row_all_product['sales'] > 0){
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
												<a class="active-icon c1" href="add_cart1.php?ma=<?php echo $row_all_product["ma_san_pham"] ?>" onclick="return alert('Bạn đã thêm sản phẩm vào giỏ hàng');">Add To Bag </a>
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
				<?php }else{
				echo'<div class="infoss">
									    <p> Sản phẩm không tìm thấy! </p>
									</div>';
								?>
				<?php
			}}
				?>
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