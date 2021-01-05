<?php
	session_start();
	$ma = $_GET['ma'];
	$kieu = $_GET['kieu'];
	
	if($kieu == 'tru'){
		if($_SESSION['cart'][$ma]['num']==1){
			unset($_SESSION['cart'][$ma]);
		}
		else{
			$_SESSION['cart'][$ma]['num']--;
		}
	}else{
		$_SESSION['cart'][$ma]['num']++;
	}
	
	header("location:view_gio_hang.php");
?>