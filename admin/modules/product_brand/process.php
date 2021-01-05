<?php 
	include('../../../db/connect.php');
	$id = $_GET['id'];
	$brand = $_POST["brand"];
	if(isset($_POST['add'])){
		$sql = "INSERT INTO hang(ten_hang) VALUES ('$brand')";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_brand&action=list');
	}else if(isset($_POST['fix'])){
		$sql = "UPDATE hang SET ten_hang = '$brand' WHERE ma_hang = '$id'";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_brand&action=list');
	}else{	
		$sql = "DELETE FROM hang WHERE ma_hang = '$id'";	
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_brand&action=list');
	}
?>