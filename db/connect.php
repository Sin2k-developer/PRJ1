<?php
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"prj1");
	mysqli_set_charset($con,"utf8");

	if(mysqli_connect_errno()){
		echo "Kết nối cơ sở dữ liệu thất bại" . mysqli_connect_errno();
	}
?>