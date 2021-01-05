<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
	<title>Đồ án 1: SHOESVN</title>	
</head>
<body>
	<?php include 'header.php' ?>
	<?php 
		if(isset($_SESSION["ma_khach_hang"])){
		  	header("location:account.php");
			exit();
		}    
	?>
	<?php include 'menu.php' ?>
	<div class="login">
		<div class="wrap">
			<div class="left_login right_login">
				<h4 class="title">New Customers</h4>
				<h5 class="sub_title">Register Account</h5>
				<p>Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể chuyển qua quy trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi đơn hàng của bạn trong tài khoản của bạn và hơn thế nữa.</p>
				<div class="button1">
				   <a href="register.php"><input type="submit" name="Submit" value="Tiếp tục"></a>
				 </div>
				 <div class="clear"></div>
			</div>
			<div class="left_login right_login">
			  <div class="login-title">
					<h4 class="title">Registered Customers</h4>
				 <div class="comments-area">
					<form action="process_login.php" method="post" onsubmit="return checkLogin()">
							<?php 
					            if(isset($_SESSION['thongbao'])){
					                ?>
					                	<div class="errorss">
								    		<p><?php echo $_SESSION['thongbao'] ?></p>
										</div>
					                	<?php unset($_SESSION['thongbao']) ?>
					                <?php
					            }
					        ?>
							<h6>Địa chỉ Email</h6>
							<span>*</span>
							<input type="text" id="email" name="email" />
							<span class="fix-box" id="err_email"></span>
							<div style="position: relative;">
							<h6>Mật khẩu</h6>
							<span>*</span>
							<input type="password" name="password" id="password">
							<span class="fix-box" id="err_pwd"></span>
							<i class="fas fa-eye" style="position: absolute; top: 50px; right: 30px; color: #999;" onclick="showHidden()"></i>
							</div>
						 <p id="login-form-remember">
							<h6><a href="forgot.php">Quên mật khẩu? </a></h6>
						 </p>
						 <p id="btn-sub">
							<input type="submit" value="Đăng nhập" name="submit">
						</p>
					</form>
				</div>
			  </div>
			</div>
			<div class="clear"></div>
		</div>
	</div>	
	<?php include 'footer.php' ?>
	<script>
		function checkLogin(){
			var dem = 0;
			var regex_email = /^[a-zA-Z0-9_+.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
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

			var regex_pwd = /^[A-Za-z0-9]{6,30}$/;
			var pwd = document.getElementById("password");
			var err_pwd = document.getElementById("err_pwd");
			var value_pwd = pwd.value;
			if(value_pwd.length == ""){
				pwd.style.border = "4px solid red";
				err_pwd.innerHTML = "Thiếu thông tin mục này";
				dem++;
			}
			else if(regex_pwd.test(value_pwd) == false){
				pwd.style.border = "4px solid red"; 
				err_pwd.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
				dem++;
			}
			else{
				pwd.style.border = "4px solid white";
				err_pwd.innerHTML = "";
			}
		
			if(dem == 0){
				return true;
			}else{
				return false;
			}
			
		}
	</script>
	<script>
	  isBool = true;
	  function showHidden(){
	    if(isBool){
	      document.getElementById("password").setAttribute("type","text");
	      isBool = false;
	    }else{
	      document.getElementById("password").setAttribute("type","password");
	      isBool = true;
	    }
	  }
	</script>
</body>
</html>