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
	<?php 
		include 'db/connect.php';
		if(isset($_POST['submit']) && isset($_GET['ma'])){
			$ma = $_GET['ma'];
			$binh_luan = $_POST['binh_luan'];
			$ten_nguoi_binh_luan = $_POST['ten_nguoi_binh_luan'];
			$email = $_POST['email'];
			$ngay_binh_luan = date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
			if(isset($binh_luan) && isset($ten_nguoi_binh_luan) && isset($email)){
				$sql = "INSERT INTO binh_luan(nguoi_binh_luan,email,noi_dung_binh_luan,trang_thai,ngay_binh_luan,ma_san_pham) 
				VALUES ('$ten_nguoi_binh_luan','$email','$binh_luan','1','$ngay_binh_luan','$ma')";
				$query = mysqli_query($con,$sql);
				$each = mysqli_fetch_array($query);
				header('location:view_product_detail.php?ma='.$ma);
			}
		}
	?>
	<?php include 'menu.php' ?>
	<?php include 'db/connect.php' ?>
	<?php
	if(isset($_GET['ma'])){
		$ma = $_GET['ma'];
		$sql = "SELECT ma_san_pham,ten_san_pham,anh,gia,sales,mo_ta,noi_dung,tinh_trang,size,ten_hang,ten_loai_san_pham,ten_danh_muc FROM san_pham JOIN size ON san_pham.ma_size = size.ma_size JOIN hang ON san_pham.ma_hang = hang.ma_hang JOIN loai_san_pham ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham JOIN danh_muc ON san_pham.ma_danh_muc = danh_muc.ma_danh_muc WHERE ma_san_pham = '$ma'";
		$array = mysqli_query($con,$sql);
		$each = mysqli_fetch_array($array);
		// echo "<pre>";
		// print_r($each);
		// echo "</pre>";
		$gia_ban = ($each['gia'] - ($each['gia'] * $each['sales'] ));
		$gia_fm = number_format($each['gia'],"0",",",".")." "."₫";
		$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
		$sales = "-".($each['sales'] * 100)."%";
	?>
	<div class="main-view-product-detail">
		<div class="wrap">
			<div class="breadcrumb">
				<ul class="breadcrumbs sss">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li>
						<?php if($each['ten_danh_muc'] == "Nam"){ ?>
							<a href="product1.php?category=1">Nam</a>
						<?php }else if($each['ten_danh_muc'] == "Nữ"){ ?>
							<a href="product1.php?category=2">Nữ</a>	
						<?php }else{ ?>

						<?php } ?>
					</li>
					<li>
						<?php if($each['ten_hang'] == "New Balance"){ ?>
							<a href="product.php?id=1">New Balance</a>
						<?php }else if($each['ten_hang'] == "Nike"){ ?>
							<a href="product.php?id=2">Nike</a>
						<?php }else if($each['ten_hang'] == "Adidas"){ ?>
							<a href="product.php?id=3">Adidas</a>
						<?php }else if($each['ten_hang'] == "Vans"){ ?>
							<a href="product.php?id=4">Vans</a>
						<?php }else if($each['ten_hang'] == "Puma"){ ?>
							<a href="product.php?id=5">Puma</a>
						<?php }else if($each['ten_hang'] == "Converse"){ ?>
							<a href="product.php?id=6">Converse</a>
						<?php }else { ?>
							
						<?php } ?>
					</li>
					<li><span><?php echo $each['ten_san_pham'] ?></span></li>
				</ul>
			</div>
			<div class="single">
				<div class="left-single">
					<div class="left-single-left">
						<img id="zoom_01" src="admin/modules/product_details/uploads_product/<?php echo $each['anh'] ?>" style="height: 350px; width: 330px; float: left; margin: 20px 0 0 30px; border: 1px solid #ebebeb" data-zoom-image="admin/modules/product_details/uploads_product/<?php echo $each['anh'] ?>"/>
					</div>
					<div class="left-single-right">
						<h3><?php echo $each['ten_san_pham'] ?></h3>
						<div class="single-brand">
							<div class="brandsp">
								<span>Thương hiệu:</span>
								<a href=""><?php echo $each['ten_hang'] ?></a>
							</div>
							<div class="brandsp" style="display: inline;">
								<span>Tình trạng: <strong><?php if($each['tinh_trang'] == 1){ echo "Còn hàng";}else{ echo "Hết hàng";} ?></strong></span>
							</div>
							<div style="display: inline;">
								<span>Size: <strong><?php echo $each['size'] ?></strong></span>
							</div>
						</div>
						<h5>
							<?php
						 		if($each['sales'] > 0){
						 			echo "<span>$gia_fm</span>";
						 			echo "$gia_banfm"." "."<label>$sales</label>";
						 		}else{
						 			echo "<strong>$gia_fm</strong>"; 
						 		}
						 		?> 
						</h5>
						<p><?php echo $each['mo_ta'] ?></p>
						<div class="sale_product">
							<strong>Khuyến mại khi mua hàng</strong>
							<ul>
								<li>Miễn phí ship hàng trong nước cho đơn giá trên 3 triệu</li>
								<li style="display: block;">Được kiểm tra hàng</li>
								<li>Thanh toán khi nhận hàng</li>
							</ul>
						</div>
						<?php if($each['tinh_trang'] == 1){ ?>
							<form name="myform" onsubmit="return CheckNum()">
							<div class="quantity">
								<span>Số lượng:</span>
									<input type="number" name="quantitys" value="1" min="1" max="10" id="num" name="num">		
									<div id="error"></div>				
							</div>
							<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
								<a href="login.php" onclick="return confirm('Bạn cần có tài khoản thì mới được đặt mua sản phẩm');"><button class="btn-dat-hang">Đặt mua</button></a>
							<?php }else{ ?>						
								<button class="btn-dat-hang" onclick="addCart(<?php echo $each['ma_san_pham'] ?>)">Đặt mua</button>	
							<?php } ?>
							</form>
						<?php }else{ ?>
							<div class="quantity">
								<span>Số lượng:</span>
									<input type="number" min="1" max="10" id="num" name="num">		
									<div id="error"></div>				
							</div>						
								<button class="btn-dat-hang" onclick="return confirm('Sản phẩm tạm hết hàng');">Đặt mua</button>	
						<?php } ?>
					</div>
				</div>

				<div class="right-single">
					<h4>Sản phẩm tương tự</h4>
					<?php
						// Other Product
						$sqlOther = "SELECT ma_san_pham,ten_san_pham,anh,gia,sales,mo_ta,noi_dung,tinh_trang,size,ten_hang,ten_loai_san_pham,ten_danh_muc FROM san_pham INNER JOIN size ON san_pham.ma_size = size.ma_size INNER JOIN hang ON san_pham.ma_hang = hang.ma_hang INNER JOIN loai_san_pham ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham INNER JOIN danh_muc ON san_pham.ma_danh_muc = danh_muc.ma_danh_muc WHERE ten_hang = '$each[9]' 
							AND ten_loai_san_pham = '$each[10]' AND ten_danh_muc = '$each[11]' ORDER BY RAND() LIMIT 3";
						$resultOther = mysqli_query($con,$sqlOther);
						while($rowOther = mysqli_fetch_assoc($resultOther)){
								$gia_ban = ($rowOther['gia'] - ($rowOther['gia'] * $rowOther['sales'] ));
								$gia_fm = number_format($rowOther['gia'],"0",",",".")." "."₫";
								$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
								$sales = "-".($rowOther['sales'] * 100)."%";
					?>
					<div class="box-same_product">
						<div class="imageS">
							<a href="view_product_detail.php?ma=<?php echo $rowOther['ma_san_pham'] ?>">
								<img src="admin/modules/product_details/uploads_product/<?php echo $rowOther['anh'] ?>" width="110px" height="120px">
							</a>
						</div>
						<div class="contenT">
							<h5><?php echo $rowOther['ten_hang'] ?></h5>
							<a href="view_product_detail.php?ma=<?php echo $rowOther['ma_san_pham'] ?>" style="display: block; color: darkslategray">
								<h3><?php echo $rowOther['ten_san_pham'] ?></h3>
							</a>
							<?php if($rowOther['sales'] > 0){ ?>
							<del><span><?php echo $gia_fm ?></span></del>	
							<strong><?php echo $gia_banfm ?></strong>
							<h6>
								<strong style="display: block; margin: 0 !important; font:unset !important;">Sales</strong><?php echo $sales ?>
							</h6>
							<?php }else{ ?>
								<strong><?php echo $gia_fm ?></strong>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="content_product">
				<!-- Three columns -->
				<div class="row">
				  <div class="column1 active" style="border-top-left-radius: 10px;" onclick="openTab('b1');">Chi tiết</div>
				  <div class="column1" onclick="openTab('b2');">Đánh giá</div>
				</div>
				<!-- Full-width columns: (hidden by default) -->
				<div id="b1" class="containerTab" style="display:block;background:#fff; color: black">
				  <p><?php echo $each['noi_dung'] ?></p>
				</div>
				
				<div id="b2" class="containerTab" style="display:none;background:#fff; color: black">
					<h2>Hãy là người đầu tiên nhận xét “<?php echo $each['ten_san_pham'] ?>” </h2>
					<h3>Email của bạn sẽ không hiển thị công khai. Các trường bắt buộc được đánh dấu <span>*</span></h3>
					<form method="post" action="view_product_detail.php?ma=<?php echo $ma ?>">
				  	  	<p class="comment">
				  	  	 	<label>Nhận xét của bạn <span>*</span></label>
				  	  	 	<textarea required="" name="binh_luan" cols="45" rows="8"></textarea>
				  	  	</p>  
				  	  	<p class="author" style="width: 50%; float: left;">
				  	  	 	<label>Tên <span>*</span></label>
				  	  	 	<input required="" type="text" name="ten_nguoi_binh_luan">
				  	  	</p>
				  	  	<p class="eml" style="width: 50%; float: right;">
				  	  		<label>Email <span>*</span></label>
							<input required="" type="text" name="email">
				  	  	</p>
				  	  	<p class="clear"></p>
				  	  	<p class="btn-binh-luan">
				  	  		<button type="submit" name="submit">Bình luận</button>	
				  	  	</p>
				  	</form>

				 	<?php 
				 		$sql = "SELECT * FROM binh_luan WHERE ma_san_pham = $ma ORDER BY ma_binh_luan DESC";
				 		$query_binh_luan = mysqli_query($con,$sql);
				 		$total_binh_luan = mysqli_num_rows($query_binh_luan); 
				 		if($total_binh_luan > 0){
				 	?>
				  	<div class="box-comment">
				  		<?php  
				  			while($row_binh_luan =  mysqli_fetch_array($query_binh_luan)){
				  		?>
						<ul>
							<li class="comment-ten"><?php echo $row_binh_luan['nguoi_binh_luan'] ?></li>
							<li class="comment-thoigian"><?php 
								$dates = $row_binh_luan['ngay_binh_luan'];
								$timestamp = strtotime($dates);
								$new_date = date('d-m-Y H:i:s');
								echo $new_date;

							 ?></li>
							<li class="comment-chitiet">
								<p><?php echo $row_binh_luan['noi_dung_binh_luan'] ?></p>
							</li>
						</ul>
						<?php 
							}
						?>
				  	</div>
				  	<?php
				  		}
				  	?>
				</div>
				
				<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
				<script type="text/javascript">
					$(".column1").click(function(){
						$(this).addClass("active").siblings().removeClass("active")
					})
				</script>
			</div>
			<!-- <div class="history-product">
				<h4>Sản phẩm vừa xem</h4>
				<div style="height: 60px;background: darkgray; margin: 20px; border-radius: 5px;">
					<div style="float: left; margin-left: 25px">
						<a href="">
							<img src="admin/images/Nike Men's Air Zoom Pegasus 33-Blue White.jpg" width="60px" height="60px">
						</a>
					</div>
					<div style="height: 60px">
						<a href="" style="display: block; color: darkslategray">
							<h3 style="margin: 0px 0 5px 105px; color: black ">Nike Men's Air Zoom Pegasus 33-Blue White</h3>
						</a>
					</div>
				</div>
				// Neu ton tai SESSION thi luu san pham vua xem
			</div> -->
			<div class="clear"></div>
		</div>
	</div>
	<?php } ?> 
	<script type="text/javascript">
		function addCart(ma) {
			//Lấy số lượng 
			num = $("#num").val();
			 // alert(num);
			if(num < 1){
			 	elert("Số lượng tối thiểu là 1");
			}else if(num <= 10){
				$.post('add_carts.php', {'ma': ma, 'num': num}, function(data){
				alert('Bạn đã thêm sản phẩm vào giỏ hàng');
				location.reload(); 
				$("#numberCart").text(data);
				});
			}else{
				elert("Số lượng tối thiểu mỗi lần mua là 10");
			}
			// Áp dụng jquery post() --> Syntax: $(selector).post(URL,data,function(data,status,xhr),dataType)		
		}	
	</script>
	<script>
		function openTab(tabName) {
		  var i, x;
		  x = document.getElementsByClassName("containerTab");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";
		  }
		  document.getElementById(tabName).style.display = "block";
		}
	</script>
	<script>
		var number = document.forms['myform']['num'];
		function CheckNum(){
			if(number.value == ''){
				error.innerHTML="Số lượng không để trống";
				error.style.display="block";
				return false;
			}
			return true;
		}
	</script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
	<script>
	    $('#zoom_01').elevateZoom();	
	</script>
	<?php include 'footer.php' ?>
</body>
</html>