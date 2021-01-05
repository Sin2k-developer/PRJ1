<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>	
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<?php
		include 'db/connect.php';
		if(isset($_GET['email']) && isset($_GET['code'])){
			$email = $_GET['email'];
			$code = $_GET['code'];
			$checkmail = mysqli_query($con,"SELECT email FROM khach_hang WHERE email = '$email' AND token = '$code' AND token !=''");
			$count = mysqli_num_rows($checkmail);
			if($count){
				if(isset($_POST['password']) AND ($_POST['password'])){
					$password = mysqli_real_escape_string($con,$_POST['password']);
					$password1 = md5($password);
					$repassword = mysqli_real_escape_string($con,$_POST['repassword']);
					$repassword1 = md5($repassword);
					if($password1 === $repassword1){
						$inserted = mysqli_query($con,"UPDATE khach_hang SET token='', mat_khau='$password1' WHERE email='$email'");
						if($inserted) {
							echo "<h1>Successfully Changed! </h1>
							<a href='forgot.php'>Quay lại trang đổi mật khẩu</a>";
						}
					}else{
						echo "Password to do match!";
					}
				}
				echo '
					<div class="reset-pass">
					<h2>Create New Password</h2>
					<form method="POST" action="">
						<p>
							<span>Mật khẩu mới:</span>
							<input type="password" name="password">
						</p>
						<p>
							<span>Nhập lại mật khẩu:</span>
							<input type="password" name="repassword">
						</p>
						<p><input type="submit" name="create" value="Submit"></p>
					</form>
					</div>
				';
			}else{
				echo "<h2>Error occured <a href='forgot.php'>Return</a></h2>";
			}
		}
	?>
	<?php include 'footer.php' ?> 
</body>
</html>