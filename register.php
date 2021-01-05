<!DOCTYPE html>
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
	<div class="register_account">
      	<div class="wrap">
	      	<h4 class="title">Create an Account</h4>
	      	<?php 
	            if(isset($_SESSION['dangki'])){
	                ?>
	                	<div class="errorsss">
				    		<p><?php echo $_SESSION['dangki'] ?></p>
						</div>
	                	<?php unset($_SESSION['dangki']) ?>
	                <?php
	            }
	        ?>
		   	<form action="process_register.php" method="post" onsubmit="return checkRegister()">
			 <div class="left-regis right-regis">
				<div>
					<input type="text" placeholder="Username" id="username" name="username" >
					<span class="fix-box" id="err_username"></span>	
				</div>
    			<div>
    				<input type="text" placeholder="Phone" id="phone" name="phone">
    				<span class="fix-box" id="err_phone"></span>
    			</div>
    			<div>
    				<input type="text" placeholder="E-Mail" id="email" name="email">
    				<span class="fix-box" id="err_email"></span>
    			</div>	
    			<div style="position: relative;">
    				<input placeholder="Password" type="password" name="password" id="password">
    				<i class="fas fa-eye" style="position: absolute; top: 21px; right: 40px; color: #999;" onclick="showHidden()"></i>
    				<span class="fix-box" id="err_password"></span>
    			</div>
	    	 </div>
	    	  <div class="left-regis right-regis">	
	    	  	<div>
	   			 	<input type="text" placeholder="Fullname" id="fullname" name="fullname" >
					<span class="fix-box" id="err_fullname"></span>	
	   			 </div>
	    		<div>
	    			<input type="text" placeholder="Address" id="address" name="address">
	    			<span class="fix-box" id="err_address"></span>
	    		</div>
	    		<div class="sky_form">
					<ul>
						<li><label><input type="radio" name="gender" value="1"><i>Male</i></label></li>
						<li><label><input type="radio" name="gender" value="0"><i>Female</i></label></li>
					</ul>
					<span class="fix-box-gt" id="err_gender"></span>
				</div>
    			<div style="position: relative;">
    				<input placeholder="Confirm Password:" type="password" name="confirm_pass" id="confirm_pass">
    				<i class="fas fa-eye" style="position: absolute; top: 21px; right: 40px; color: #999;" onclick="showHidden1()"></i>
    				<span class="fix-box" id="err_confirm_pass"></span>
    			</div>		      
	          </div>
	          <div class="clear"></div>
	          <div>
	          	<button class="grey" type="submit" name="submit">Đăng ký</button>
		         <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
	          </div>
	         <div class="clear"></div>
	    </form>
	  </div> 
    </div>
    <?php include 'footer.php' ?>
    <script>
     // ----JS cho form----
	function checkRegister(){
		var dem = 0;
		var username = document.getElementById("username");
		var err_username = document.getElementById("err_username");
		var value_username = username.value;
		if(value_username.length==""){
			username.style.border = "4px solid red";
			err_username.innerHTML = "Thiếu thông tin mục này";
			dem++;
		}
		else if(value_username.length >= 30){
			username.style.border = "4px solid red";
			err_username.innerHTML = "Tối đa là 30 kí tự";
			dem++;
		}
		else{
			username.style.border = "4px solid white";
			err_username.innerHTML = "";
		}

		var fullname = document.getElementById("fullname");
		var err_fullname = document.getElementById("err_fullname");
		var value_fullname = fullname.value;
		if(value_fullname.length==""){
			fullname.style.border = "4px solid red";
			err_fullname.innerHTML = "Thiếu thông tin mục này";
			dem++;
		}
		else if(value_fullname.length >= 30){
			fullname.style.border = "4px solid red";
			err_fullname.innerHTML = "Tối đa là 30 kí tự";
			dem++;
		}
		else{
			fullname.style.border = "4px solid white";
			err_fullname.innerHTML = "";
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
		
		var gender = Array();
		gender=document.getElementsByName("gender");
		var err_gender = document.getElementById("err_gender");
		var dem_gender = 0;
		for(var i = 0;i<gender.length;i++){
			if(gender[i].type === 'radio' && gender[i].checked){
				dem_gender++;
			}
		}
		if(dem_gender == 0){
			err_gender.innerHTML = "Phải chọn giới tính";
			dem++;
		}
		else{
			err_gender.innerHTML = "";
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
		
		var regex_password = /^[A-Za-z0-9]{6,30}$/;
		var password = document.getElementById("password");
		var err_password = document.getElementById("err_password");
		var value_password = password.value;
		if(value_password.length == ""){
			password.style.border = "4px solid red";
			err_password.innerHTML = "Thiếu thông tin mục này";
			dem++;
		}
		else if(regex_password.test(value_password) == false){
			password.style.border = "4px solid red";
			err_password.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
			dem++;
		}
		else{
			password.style.border = "4px solid white";
			err_password.innerHTML = "";
		}
		
		var regex_confirm_pass = /^[A-Za-z0-9]{6,30}$/;
		var confirm_pass = document.getElementById("confirm_pass");
		var err_confirm_pass = document.getElementById("err_confirm_pass");
		var value_confirm_pass = confirm_pass.value;
		if(value_confirm_pass.length == ""){confirm_pass
			confirm_pass.style.border = "4px solid red";
			err_confirm_pass.innerHTML = "Thiếu thông tin mục này";
			dem++;
		}
		else if(regex_confirm_pass.test(value_confirm_pass) == false){
			confirm_pass.style.border = "4px solid red";
			err_confirm_pass.innerHTML = "Độ dài mật khẩu trong khoảng [6,30]";
			dem++;
		}
		else if(value_confirm_pass.length =! value_password.length){
			confirm_pass.style.border = "4px solid red";
			err_confirm_pass.innerHTML = "Hãy chắc chắn rằng mật khẩu của bạn giống nhau";
			dem++;
		}
		else{
			confirm_pass.style.border = "4px solid white";
			err_confirm_pass.innerHTML = "";
		}
		
		if(dem == 0){
			return true;
		}
		else{
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
	<script>
	  isBool = true;
	  function showHidden1(){
	    if(isBool){
	      document.getElementById("confirm_pass").setAttribute("type","text");
	      isBool = false;
	    }else{
	      document.getElementById("confirm_pass").setAttribute("type","password");
	      isBool = true;
	    }
	  }
	</script>
</body>
</html>