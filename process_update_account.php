<?php 
	session_start();
	require_once 'db/connect.php';
	if(isset($_POST['updateAC']) && isset($_POST['makh']) && isset($_POST['tenkh']) && isset($_POST['tenht']) && isset($_POST['sdt']) && isset($_POST['dc']) && isset($_POST['email']) && isset($_POST['gioi_tinh']) && isset($_POST['matkhaucu']) && isset($_POST['matkhaumoi']) && isset($_POST['nlmatkhaumoi']))
	{
		$id = $_GET['id'];
		$ma = $_POST["makh"];
		$tenkh = $_POST["tenkh"];
		$tenht = $_POST["tenht"];
		$sdt = $_POST["sdt"];
		$dc = $_POST["dc"];
		$email = $_POST["email"];
		$gt = $_POST["gioi_tinh"];
		$mkc = $_POST["matkhaucu"];
		$mkm = $_POST["matkhaumoi"];
		$nlmk = $_POST["nlmatkhaumoi"];
		$mkc = md5($mkc);
		$mkm = md5($mkm);
		$nlmk = md5($nlmk);
		$sql = "SELECT * FROM khach_hang WHERE ten_tai_khoan = '$tenht' OR email = '$email' OR mat_khau = '$mkc' where ma_khach_hang = $id";
		$result = mysqli_query($con,$sql);
		$row_upd = mysqli_num_rows($result);
		if($row_upd > 0){
			$_SESSION["thongbao"] = "Tài khoản, email đã được sử dụng hoặc mật khẩu đã tồn tại";
			header("location:update_account.php");
			die();
		}else{
			$sql = "update khach_hang set ten_tai_khoan='$tenht',ten_khach_hang='$tenkh',sdt='$sdt',dia_chi='$dc',gioi_tinh='$gt',email='$email',mat_khau='$mkm' where ma_khach_hang = $id";
			// print_r($sql);exit();
			mysqli_query($con,$sql);
			$_SESSION["thongbao"] = "Đã cập nhật thông tin thành công";
			header("location:update_account.php");
		}
	}else{
		$_SESSION["thongbao"] = "Lỗi cập nhật thông tin";
		header("location:update_account.php");
	}
?>