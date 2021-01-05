<?php
	include('../../../db/connect.php');
	$ma_binh_luan = $_GET['ma_binh_luan'];
	$trang_thai = $_GET['trang_thai'];
	$sql = "UPDATE binh_luan SET trang_thai = '$trang_thai' WHERE ma_binh_luan = '$ma_binh_luan' ";
	mysqli_query($con,$sql);
	header('location:../../index.php?manage=comment&action=list');
?>