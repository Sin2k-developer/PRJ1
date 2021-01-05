<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Đồ án 1: Quản trị website</title>
	<link rel="stylesheet" type="text/css" href="../css/admin/header.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/content.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/menu-bar.css">
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
	<script src="../resources/ckeditor/ckeditor.js"></script>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION['ma_admin'])){
			header('location:login.php');
		}
	?>
    
    <div class="wrapper">
    	<?php
			include('../db/connect.php');
			include('modules/header.php');
			include('modules/menu.php');
			include('modules/content.php');
		?>
    </div>
</body>
</html>