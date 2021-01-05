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
	<?php require_once 'header.php' ?>
	<?php 
		if(empty($_SESSION["cart"])){
			header("location:index.php");
			exit();
		}
	?>
	<?php include 'menu.php' ?>
	<div class="main-check-out">
		<div class="wrap">
			<div class="breadcrumb iii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<li><a href="view_gio_hang.php">Giỏ hàng</a></li>
					<li><span>Thanh toán</span></li>
				</ul>
			</div>
			<div class="list-check-out">
				<form action="process_order.php" method="post" onsubmit="return checkorder()">
					<div class="info-customer">
						<h4>Thanh toán đơn hàng</h4>
						<div class="info-customer-step">
							<div class="order-step-1">
								<div class="order-step-1-head">
									<div class="order-step-1-head-img">
										Bước 1
									</div>
									<div class="order-step-1-head-title">
										Quý khách vui lòng cung cấp thông tin mua hàng
									</div>
								</div>
								<div class="order-step-1-content">
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Họ tên người nhận *</label>
										</div>
										<div class="order-step-1-content-info">
											<input class="order-step-1-content-input" placeholder="Full Name" type="text" id="name" name="ten_nguoi_nhan">
											<span class="fix-order" id="err_name"></span>
										</div>
									</div>
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Số điện thoại người nhận *</label>
										</div>
										<div class="order-step-1-content-info">
											<input class="order-step-1-content-input" placeholder="Phone" type="text" id="phone" name="sdt_nguoi_nhan">
											<span class="fix-order" id="err_phone"></span>
										</div>
									</div>
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Email *</label>
										</div>
										<div class="order-step-1-content-info">
											<input class="order-step-1-content-input" placeholder="Email" type="text" id="email" name="email">
											<span class="fix-order" id="err_email"></span>
										</div>
									</div>
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Tỉnh / Thành phố *</label>
										</div>
										<div class="order-step-1-content-info">
											<select class="order-step-1-content-input" id="selection" name="tinh_thanh">
												<option value="0">Vui lòng chọn Tỉnh / Thành phố</option>
												<option value="1">Hà Nội</option>
												<option value="2">Hồ Chí Minh</option>
												<option value="3">An Giang</option>
												<option value="4">Bà Rịa - Vũng Tàu</option>
												<option value="5">Bạc Liêu</option>
												<option value="6">Bắc Giang</option>
												<option value="7">Bắc Kạn</option>
												<option value="8">Bắc Ninh</option>
												<option value="9">Bến Tre</option>
												<option value="10">Bình Dương</option>
												<option value="11">Bình Định</option>
												<option value="12">Bình Phước</option>
												<option value="13">Bình Thuận</option>
												<option value="14">Cao Bằng</option>
												<option value="15">Cà Mau</option>
												<option value="16">Cần Thơ</option>
												<option value="17">Hải Phòng</option>
												<option value="18">Đà Nẵng</option>
												<option value="19">Gia Lai</option>
												<option value="20">Hòa Bình</option>
												<option value="21">Hà Giang</option>
												<option value="22">Hà Nam</option>
												<option value="23">Hà Tĩnh</option>
												<option value="24">Hưng Yên</option>
												<option value="25">Hải Dương</option>
												<option value="26">Hậu Giang</option>
												<option value="27">Điện Biên</option>
												<option value="28">Đắk Lắk</option>
												<option value="29">Đắk Nông</option>
												<option value="30">Đồng Nai</option>
												<option value="31">Đồng Tháp</option>
												<option value="32">Khánh Hòa</option>
												<option value="33">Kiên Giang</option>
												<option value="34">Kon Tum</option>
												<option value="35">Lai Châu</option>
												<option value="36">Long An</option>
												<option value="37">Lào Cai</option>
												<option value="38">Lâm Đồng</option>
												<option value="39">Lạng Sơn</option>
												<option value="40">Nam Định</option>
												<option value="41">Nghệ An</option>
												<option value="42">Ninh Bình</option>
												<option value="43">Ninh Thuận</option>
												<option value="44">Phú Thọ</option>
												<option value="45">Phú Yên</option>
												<option value="46">Quảng Bình</option>
												<option value="47">Quảng Nam</option>
												<option value="48">Quảng Ngãi</option>
												<option value="49">Quảng Ninh</option>
												<option value="50">Quảng Trị</option>
												<option value="51">Sóc Trăng</option>
												<option value="52">Sơn La</option>
												<option value="53">Thanh Hóa</option>
												<option value="54">Thái Bình</option>
												<option value="55">Thái Nguyên</option>
												<option value="56">Thừa Thiên-Huế</option>
												<option value="57">Tiền Giang</option>
												<option value="58">Trà Vinh</option>
												<option value="59">Tuyên Quang</option>
												<option value="60">Tây Ninh</option>
												<option value="61">Vĩnh Long</option>
												<option value="62">Vĩnh Phúc</option>
												<option value="63">Yên Bái</option>
											</select>
											<span class="fix-order" id="err_selection"></span>
										</div>
									</div>
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Địa chỉ người nhận *</label>
										</div>
										<div class="order-step-1-content-info">
											<input class="order-step-1-content-input" placeholder="Address" type="text" id="address" name="dia_chi_nguoi_nhan">
											<span class="fix-order" id="err_address"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="order-step-2">
								<div class="order-step-1-head">
									<div class="order-step-1-head-img">
										Bước 2
									</div>
									<div class="order-step-1-head-title">
										Thông tin bổ sung
									</div>
								</div>
								<div class="order-step-1-content">
									<div class="order-step-1-content-group">
										<div class="order-step-1-content-label">
											<label class="shared">Ghi chú (tùy chọn) *</label>
										</div>
										<div class="order-step-1-content-info">
											<textarea placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." id="content" name="noi_dung"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="info-product">
						<h4>Đơn hàng của bạn</h4>
						<div>
							<?php 	
			                    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
			                    $arr_cart = $_SESSION['cart'];
		                    ?>
							<table style="width: 96%; margin: auto;">
								<thead style="color: #222222; text-transform: uppercase;">
									<tr>
										<th style="color: #222222; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: 500; line-height: 1.35; border-bottom: 1px solid #ebebeb; font-size: 1em; margin: 20px 0 0 10px; padding-bottom: 10px; text-transform: uppercase; float: left; width: 200px;">Sản phẩm</th>
										<th style="color: #222222; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: 500; line-height: 1.35; border-bottom: 1px solid #ebebeb; font-size: 1em; margin: 20px 10px 0 0; padding-bottom: 10px; text-transform: uppercase; float: right; width: 115px">Tạm tính</th>
									</tr>
								</thead>
								<?php 
									$tong_tien = 0;
									foreach ($arr_cart as $key => $each):
								?>
								<?php 
									$thanh_tien = ($each['price'] * $each['num']);
                        			$tong_tien += $thanh_tien;
								?>
								<tbody>
									<tr>
										<td style="color: #343a40; font-family: Roboto, Arial, Helvetica, sans-serif; line-height: 2.35; border-bottom: 1px solid #ebebeb; font-size: 13px; margin: 0 0 0 10px; font-weight:bold; float: left;width: 200px;text-align: justify; padding: 18px 5px 18px 5px">
										<?php echo $each['name']; ?>&nbsp;<i>X<?php echo $each['num']; ?></i>
										<h5 style="font-size: 12px; color: #6c757d;">Cỡ giày: <span style="color: #000"><?php echo $each['size'] ?></span></h5>  	
										</td>
										<td style="color: #343a40; font-family: Roboto, Arial, Helvetica, sans-serif; line-height: 2.35; border-bottom: 1px solid #ebebeb; font-size: 13px; margin: 0 10px 0 0; padding: 47px 0 47px 0; font-weight:bold; float: right;width: 115px;text-align: center;">
											<?php echo number_format($thanh_tien,0,",",".") ?> ₫
										</td>
									</tr>
								</tfoot>
								<?php endforeach ?>
								<tbody>
									<tr>
										<td style="color: #343a40; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; line-height: 3.35; border-bottom: 1px solid #ebebeb; font-size: 14px; margin: 0 0 0 10px; text-transform: uppercase;float: left;width: 200px; padding: 5px 0 5px 53px">Tạm tính
										</td>
										<td style="color: #343a40; font-family: Roboto, Arial, Helvetica, sans-serif; line-height: 2.35; border-bottom: 1px solid #ebebeb; font-size: 13px; margin: 0 10px 0 0; padding: 13px 0; font-weight:bold;float: right;width: 115px; text-align: center;">
											<?php echo number_format($tong_tien,0,",",".") ?> ₫
										</td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<td style="color: #343a40; font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: bold; line-height: 3.35; font-size: 19px; margin: 0 0 0 10px; text-transform: uppercase; float: left; width: 200px; padding-left: 59px">Tổng
										</td>
										<td style="color: #f00; font-family: Roboto, Arial, Helvetica, sans-serif; line-height: 2.35; font-size: 16px; margin: 0 3px 0 0; font-weight:bold; float: right;width: 118px;padding: 12px 12px 10px 8px">
											<?php echo number_format($tong_tien,0,",",".") ?> ₫
										</td>
									</tr>
								</tbody>
							</table>
						<?php } ?>
						</div>
						<div class="list-pay-text">
			                <p style="margin: 25px 22px 25px 22px; letter-spacing: 0.3px; line-height: 25px; text-align: justify; width: 88%; font-size: 15px">
			                    Thông tin cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm mua hàng của bạn trên trang web của cửa hàng và những mục đích khác được ghi trong
			                    <a href="privacing.php" style="color: #a43d21;">Chính sách riêng tư</a>
			                </p>
			            </div>
					    <div class="list-pay-select"  style="margin: 20px; font-size: 14px">
					    	<input type="checkbox" style="margin-right:5px"/>Tôi đã đọc và đồng ý với <a style="color: #a43d21" href="warranting.php">điều khoản và điều kiện</a> của website <span style="color:#F00">*</span>
					    </div>
					    <div class="list-pay-button">
					    	<button type="submit" name="order">Đặt Hàng</button>
					    </div>
					</div>
				</form>
				<div class="clear"></div>
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
	<script type="text/javascript">
		function checkorder(){
			var dem = 0;
			var name = document.getElementById("name");
			var err_name = document.getElementById("err_name");
			var value_name = name.value;
			if(value_name.length==""){
				name.style.border = "4px solid red";
				err_name.innerHTML = "Thiếu thông tin mục này";
				dem++;
			}
			else if(value_username.length >= 30){
				name.style.border = "4px solid red";
				err_name.innerHTML = "Tối đa là 30 kí tự";
				dem++;
			}
			else{
				name.style.border = "4px solid white";
				err_name.innerHTML = "";
			}

			var regex_phone = /^0[0-9]{9}$/;
			var phone = document.getElementById("phone");
			var err_phone = document.getElementById("err_phone");
			var value_phone = phone.value;
			if(value_phone.length == ""){
				phone.style.border = "4px solid red";
				err_phone.innerHTML = "Thiếu thông tin mục này";
				dem++;
			}
			else if(regex_phone.test(value_phone) == false){
				phone.style.border = "4px solid red";
				err_phone.innerHTML = "Chỉ nhập số và giới hạn là 10 chữ số";
				dem++;
			}
			else{
				phone.style.border = "4px solid white";
				err_phone.innerHTML = "";
			}

			var regex_email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
			var email = document.getElementById("email");
			var err_email = document.getElementById("err_email");
			var value_email = email.value;
			if(value_email.length == ""){
				email.style.border = "4px solid red";
				err_email.innerHTML = "Thiếu thông tin mục này";
				dem++;
			}
			else if(regex_email.test(value_email) == false){
				email.style.border = "4px solid red";
				err_email.innerHTML = "Mời bạn nhập lại email theo định dạng như: Test@gmail.com";
				dem++;
			}
			else{
				email.style.border = "4px solid white";
				err_email.innerHTML = "";
			}

			var selection = document.getElementById("selection");
			var err_selection = document.getElementById("err_selection");
			var value_selection = selection.value;
			if (value_selection == 0) {
				selection.style.border = "4px solid red";
				err_selection.innerHTML = "Vui lòng chọn tỉnh / thành phố";
				dem++;
			}
			else{
				selection.style.border = "4px solid white";
				err_selection.innerHTML = "";
			}



			var address = document.getElementById("address");
			var err_address = document.getElementById("err_address");
			var value_address = address.value;
			if(value_address.length == ""){
				address.style.border = "4px solid red";
				err_address.innerHTML = "Thiếu thông tin mục này";
				dem++;
			}
			else{
				address.style.border = "4px solid white";
				err_address.innerHTML = "";
			}

			if(dem == 0){
				return true;
			}
			else{
				return false;
			}
		}
	</script>
	<?php require_once 'footer.php' ?>
</body>
</html>