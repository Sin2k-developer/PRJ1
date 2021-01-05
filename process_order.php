<?php 
	session_start();
	if(isset($_POST['order']) && $_POST["ten_nguoi_nhan"] != '' && $_POST["sdt_nguoi_nhan"] != '' && $_POST["email"] != '' && $_POST["tinh_thanh"] != '' && $_POST['dia_chi_nguoi_nhan'] != ''){
		$ma_khach_hang = $_SESSION['ma_khach_hang'];
		$gio_hang = $_SESSION['cart'];
		$ten_nguoi_nhan = $_POST["ten_nguoi_nhan"];
		$sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
		$tinh_thanh = $_POST["tinh_thanh"];
		$dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"];
		$noi_dung = $_POST["noi_dung"];
		$email = $_POST["email"];

		$tong_tien = 0;
		foreach($gio_hang as $san_pham){
			$tong_tien += $san_pham['price'] * $san_pham['num'];
		}
		require_once 'db/connect.php';
		$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,tinh_thanh_pho,dia_chi_nguoi_nhan,noi_dung,email,tong_tien) values ('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$tinh_thanh','$dia_chi_nguoi_nhan','$noi_dung','$email','$tong_tien')";
		mysqli_query($con,$sql);
		// Lấy hóa đơn
		$sql = "select max(ma_hoa_don) from hoa_don";
		$array = mysqli_query($con,$sql);
		$each = mysqli_fetch_array($array);
		$ma_hoa_don = $each['max(ma_hoa_don)'];
		foreach($gio_hang as $ma_san_pham => $san_pham){
			$gia = $san_pham['price'];
			$so_luong = $san_pham['num'];
			$sql = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_san_pham,gia,so_luong) values ('$ma_hoa_don','$ma_san_pham','$gia','$so_luong')";
				mysqli_query($con,$sql);
			}
		unset($_SESSION['cart']);
		mysqli_close($con);
		header("location:view_gio_hang.php");
	}else{
		$_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
		header("location:checkout.php");
	}

?>