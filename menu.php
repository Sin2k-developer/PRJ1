<div class="header-bottom">
	<div class="wrap">
		<a class="color1" href="http://project.com/"><span>Trang chủ</span></a>
		<a class="color2" href="all_product.php"><span>Tất cả giày thể thao</span></a>
		<?php 
			include 'db/connect.php';
			$sql_hangsp = "select * from hang";
			$result = mysqli_query($con,$sql_hangsp);
			$row_product = mysqli_fetch_array($result);
		?>
		<a href="product.php?id=3">
		<div class="dropdown">
			<button class="dropbtn">Adidas 
				<i class="sub-icon"></i>
			</button>
		</a>
			<div class="dropdown-content">
				<div class="row">
					<div class="column">
						<h3>Nam</h3>
						<a href="product3.php?category=1&id=3&type=5">Ultra Boost</a>
						<a href="product3.php?category=1&id=3&type=6">Alphabounce</a>
						<a href="product3.php?category=1&id=3&type=7">Stan Smith</a>
						<a href="product3.php?category=1&id=3&type=8">Yeezy</a>
					</div>
					<div class="column">
						<h3>Nữ</h3>
						<a href="product3.php?category=2&id=3&type=5">Ultra Boost</a>
						<a href="product3.php?category=2&id=3&type=6">Alphabounce</a>
						<a href="product3.php?category=2&id=3&type=7">Stan Smith</a>
						<a href="product3.php?category=2&id=3&type=8">Yeezy</a>
					</div>
				</div>
			</div>
		</div>

		<a href="product.php?id=2">
		<div class="dropdown">
			<button class="dropbtn aaas">Nike
				<i class="sub-icon"></i>
			</button>
		</a>
			<div class="dropdown-content">
				<div class="row">
					<div class="column">
						<h3>Nam</h3>
						<a href="product3.php?category=1&id=2&type=1">Air Max</a>
						<a href="product3.php?category=1&id=2&type=2">Air Force 1</a>
						<a href="product3.php?category=1&id=2&type=3">Air Zoom</a>
						<a href="product3.php?category=1&id=2&type=4">Air Jordan 1</a>
					</div>
					<div class="column">
						<h3>Nữ</h3>
						<a href="product3.php?category=2&id=2&type=1">Air Max</a>
						<a href="product3.php?category=2&id=2&type=2">Air Force 1</a>
						<a href="product3.php?category=2&id=2&type=3">Air Zoom</a>
						<a href="product3.php?category=2&id=2&type=4">Air Jordan 1</a>
					</div>
				</div>
			</div>
		</div>

		<a href="product.php?id=4">
		<div class="dropdown">
			<button class="dropbtn bbbs">Vans 
				<i class="sub-icon"></i>
			</button>
		</a>
			<div class="dropdown-content">
				<div class="row">
					<div class="column">	
						<h3>Nam</h3>
						<a class="kkk" href="product3.php?category=1&id=4&type=9">Old Skool</a>
						<a class="kkk" href="product3.php?category=1&id=4&type=10">SK8-Hi</a>
					</div>
					<div class="column">
						<h3>Nữ</h3>	
						<a class="kkk" href="product3.php?category=2&id=4&type=9">Old Skool</a>
						<a class="kkk" href="product3.php?category=2&id=4&type=10">SK8-Hi</a>
					</div>
				</div>
			</div>
		</div>

		<a href="product.php?id=5">
		<div class="dropdown">
			<button class="dropbtn cccs">Puma 
				<i class="sub-icon"></i>
			</button>
		</a>
			<div class="dropdown-content">
				<div class="row">
					<div class="column">
						<h3>Nam</h3>
						<a class="kkk" href="product3.php?category=1&id=5&type=11">Smash</a>
						<a class="kkk" href="product3.php?category=1&id=5&type=12">Muse X</a>
					</div>
					<div class="column">
						<h3>Nữ</h3>
						<a class="kkk" href="product3.php?category=2&id=5&type=11">Smash</a>
						<a class="kkk" href="product3.php?category=2&id=5&type=12">Muse X</a>
					</div>
				</div>
			</div>
		</div>

		<a class="color3" href="product.php?id=1"><span>New Balance</span></a>
		
		<a href="product.php?id=6">
		<div class="dropdown">
			<button class="dropbtn ddds">Converse 
				<i class="sub-icon"></i>
			</button>
		</a>
			<div class="dropdown-content">
				<div class="row">
					<div class="column">
						<h3>Nam</h3>
						<a class="kkk1" href="product3.php?category=1&id=6&type=13">Jack Purcell</a>
						<a class="kkk1" href="product3.php?category=1&id=6&type=14">Chuck Taylor</a>
					</div>
					<div class="column">
						<h3>Nữ</h3>
						<a class="kkk1" href="product3.php?category=2&id=6&type=13">Jack Purcell</a>
						<a class="kkk1" href="product3.php?category=2&id=6&type=14">Chuck Taylor</a>
					</div>
				</div>
			</div>
		</div>

		<a class="color4" href="blog.php"><span>Tin Tức</span></a>
		<?php 
		 	$numberCart = 0;
		 	if(isset($_SESSION["cart"])){
		 		foreach ($_SESSION["cart"] as $key => $value) {
					$numberCart ++;
				}
		 	}
		 ?>	
		<ul class="show-cart">
			<li>
				<a href="view_gio_hang.php"><img src="images/cart-icon.png" alt=""></a>
				<strong id="numberCart"><?php echo $numberCart; ?></strong>
				<ul class="icon2 sub-icon2 profile_img1">
					<li style="margin-left: 30px;">
						<a class="active-icon2 c2" href="view_gio_hang.php">My cart</a>
						<ul class="sub-icon2 show-cart">
							<?php if(isset($_SESSION["cart"]) && count($_SESSION['cart'])>0){ 
								$arr_cart = $_SESSION["cart"];
							?>
							<li>
					            <h3>Sản phẩm đã đặt mua</h3><a href=""></a>
				          	</li>
				          	<div class="clear"></div>
							<?php 
								$tong_tien = 0;
								foreach ($arr_cart as $key => $each) : ?>
								<?php
									$thanh_tien = ($each['price'] * $each['num']);
									$tong_tien += $thanh_tien;
								 ?>
					          <li class="ims">
					          	<div class="delete">
						            <a href="view_product_detail.php?ma=<?php echo $each['id'] ?>" style="border:none;">
											<img class="umd" src="images/pen1.png" width="15" height="15">
									</a>
						          	<a href="delete_product_cart_header.php?ma=<?php echo $each['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá bỏ mục này từ các giỏ mua hàng?');" style="border:none;">
											<img class="cmd" src="images/delete1.png" width="15" height="15">
									</a>
								</div>
					            <img src="admin/modules/product_details/uploads_product/<?php echo $each['image'] ?>" width="55px" height="55px">
					            <span>
					            	<?php echo $each['name'] ?>
					            	<p><?php echo $each['num'] ?> x <?php echo number_format($each['price'],0,",",".") ?> ₫</p>
					            	<p>Kích cỡ - <?php echo $each['size'] ?></p>
					            </span>
					          </li>
					        <?php endforeach ?>
					        <li class="total-cart">
					            <p>Total: <?php echo number_format($tong_tien,0,",",".") ?> ₫</p>
					        </li>
					        <button type="button" class="btn-cart" onclick="window.location = 'http://project.com/view_gio_hang.php'">
					        	<span class="btn-cart-effect">
					        		<span>Giỏ hàng</span>
					        	</span>
					        </button>
					        <button type="button" class="btn-pay" onclick="window.location = 'http://project.com/checkout.php'">
					        	<span class="btn-pay-effect">
					        		<span>Thanh toán</span>
					        	</span>
					        </button>
				          	<?php }else{
								echo '<li><h1>Giỏ hàng của bạn đang trống</h1><a href=""></a></li>'; 
							}?>
				        </ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>