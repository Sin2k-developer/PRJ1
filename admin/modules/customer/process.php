<?php
	require_once '../../../db/connect.php';
	$khoa = $_GET['id'];
	$result = mysqli_query($con,"select tinh_trang from khach_hang where ma_khach_hang = '$khoa'");
	$row=mysqli_fetch_array($result);
	if($row['tinh_trang']==0){
		$result="update khach_hang set tinh_trang = 1 where ma_khach_hang = '$khoa'";	
	}
	else{
		$result="update khach_hang set tinh_trang = 0 where ma_khach_hang = '$khoa'";
	}
	mysqli_query($con,$result);
	header('location:../../index.php?manage=customer&action=list');
	exit();
?>