<?php 
	include('../../../db/connect.php');
	$id = $_GET['id'];
	$type = $_POST["type"];
	if(isset($_POST['add'])){
		$sql = "INSERT INTO loai_san_pham(ten_loai_san_pham) VALUES ('$type')";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_type&action=list');
	}else if(isset($_POST['fix'])){
		$sql = "UPDATE loai_san_pham SET ten_loai_san_pham = '$type' WHERE ma_loai_san_pham = '$id'";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_type&action=list');
	}else{	
		$sql = "DELETE FROM loai_san_pham WHERE ma_loai_san_pham = '$id'";	
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_type&action=list');
	}
?>