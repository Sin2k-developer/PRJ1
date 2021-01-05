<?php
	session_start();
	require_once 'db/connect.php';
	if(isset($_POST["submit"]) && $_POST["email"] != '' && $_POST["password"] != ''){
		// Thực hiện xử lý khi người dùng ấn nút submit và điền đầy đủ thông tin.
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$password = mysqli_real_escape_string($con,$_POST["password"]);
		// Mã hóa password 
		$password = md5($password);
		$sql = "SELECT * FROM khach_hang WHERE email='$email' AND mat_khau='$password'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			if($row['tinh_trang'] == 0){
				// Tạo ra 1 phiên lưu trữ tạm thời dữ liệu lên hệ thống	
				$_SESSION['ma_khach_hang'] = $row['ma_khach_hang'];
				$_SESSION['ten_tai_khoan'] = $row['ten_tai_khoan'];
				$_SESSION['ten_khach_hang'] = $row['ten_khach_hang'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['dia_chi']=$row['dia_chi'];
				$_SESSION['sdt']=$row['sdt'];
				$_SESSION['gioi_tinh']=$row['gioi_tinh'];
				header("location:account.php");
				exit();
			}else{
				$_SESSION["thongbao"] = "Tài khoản đã bị tạm khóa";
				header("location:login.php");
				exit();
			}
		}else{
			$_SESSION["thongbao"] = "Email hoặc mật khẩu nhập không đúng";
			header("location:login.php");
			exit();
		}
	}else{
		$_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
		header("location:login.php");
		exit();
	}
?>
