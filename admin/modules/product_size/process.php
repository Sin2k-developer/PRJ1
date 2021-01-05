<?php 
	include('../../../db/connect.php');
	$id = $_GET['id'];
	$size = $_POST["size"];
	if(isset($_POST['add'])){
		$sql = "INSERT INTO size(size) VALUES ('$size')";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_size&action=list');
	}else{	
		$sql = "DELETE FROM size WHERE ma_size = '$id'";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header('location:../../index.php?manage=product_size&action=list');
	}
?>