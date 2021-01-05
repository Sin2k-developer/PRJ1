<?php 
	include('../../../db/connect.php');
	$id = $_GET['id'];
	$category = $_POST["category"];
	if(isset($_POST['add'])){
		$sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES ('$category')";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=category&action=list');
	}else if(isset($_POST['fix'])){
		$sql = "UPDATE danh_muc SET ten_danh_muc = '$category' WHERE ma_danh_muc = '$id'";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=category&action=list');
	}else{	
		$sql = "DELETE FROM danh_muc WHERE ma_danh_muc = '$id'";	
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=category&action=list');
	}
?>