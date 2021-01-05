<?php 
	session_start();
	require_once 'db/connect.php';
	if(isset($_POST['submit']) && $_POST["username"] != '' && $_POST["fullname"] != '' && $_POST["phone"] != '' && $_POST["address"] != '' && $_POST["gender"] != '' && $_POST["email"] != '' && $_POST["password"] != '' && $_POST["confirm_pass"] != ''){
		// Thực hiện xử lý khi người dùng ấn nút submit và điền đầy đủ thông tin.
		$username = mysqli_real_escape_string($con,$_POST["username"]);
		$fullname = mysqli_real_escape_string($con,$_POST["fullname"]);
		$phone = mysqli_real_escape_string($con,$_POST["phone"]);
		$address = mysqli_real_escape_string($con,$_POST["address"]);
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$gender = mysqli_real_escape_string($con,$_POST["gender"]);
		$password = mysqli_real_escape_string($con,$_POST["password"]);
		$confirm_pass = mysqli_real_escape_string($con,$_POST["confirm_pass"]);
		// Kiểm tra xem nhập lại mật khẩu có trùng khớp hay không.
		if($password != $confirm_pass){
			$_SESSION["dangki"] = "Mật khẩu nhập lại không chính xác";
			header("location:register.php");
			die();
		}
		$password = md5($password);
		$confirm_pass = md5($confirm_pass);
		$sql = "SELECT * FROM khach_hang WHERE ten_tai_khoan = '$username' OR email = '$email'";
		$result = mysqli_query($con,$sql);
		$row_cnt = $result->num_rows;
		if($row_cnt > 0 ){
			$_SESSION["dangki"] = "Tài khoản hoặc email đã được sử dụng";
			header("location:register.php");
			die();
		}else{
			$sql = "INSERT INTO khach_hang(ten_tai_khoan,ten_khach_hang,sdt,dia_chi,gioi_tinh,email,mat_khau) VALUES ('$username','$fullname','$phone','$address','$gender','$email','$password')";
			mysqli_query($con,$sql);
			// $select_khach_hang = "SELECT * FROM khach_hang ORDER BY ma_khach_hang DESC LIMIT 1";
			// $row_khach_hang = mysqli_fetch_array($select_khach_hang);
			
			$_SESSION["dangki"] = "Đã đăng ký thành công";
			header("location:register.php");
		}
	}else{
		$_SESSION["dangki"] = "Vui lòng nhập đầy đủ thông tin";
		header("location:register.php");
	}
?>