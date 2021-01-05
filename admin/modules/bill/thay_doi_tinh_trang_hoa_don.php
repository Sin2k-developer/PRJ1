<?php
	include('../../../db/connect.php');
	$ma_hoa_don = $_GET['ma_hoa_don'];
	$tinh_trang = $_GET['tinh_trang'];
	$sql = "UPDATE hoa_don SET tinh_trang = '$tinh_trang' WHERE ma_hoa_don = '$ma_hoa_don' ";
	mysqli_query($con,$sql);
	header('location:../../index.php?manage=bill&action=list');
?>