<?php 
	$ma = $_GET['ma'];
	session_start();
	unset($_SESSION['cart'][$ma]);
	header('location:index.php');
?>