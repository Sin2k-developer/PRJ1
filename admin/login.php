<?php 
	session_start(); 
?>
<head>
	<title>Đồ án 1: Quản trị website</title>
	<link rel="stylesheet" type="text/css" href="../css/admin/login.css" media="all">
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php
		require_once '../db/connect.php';
		if(isset($_POST["login"])){
			$email = $_POST["email"];
			$password = $_POST["password"];		
			$email = addslashes($email);
			$password = addslashes($password);
			$password = md5($password);
			if ($email == "" || $password =="") {
				$_SESSION["error"] = '<img src="../images/error.png">Email hoặc mật khẩu bạn không được để trống!';
			}else{
				$sql = "SELECT * FROM admin WHERE email='$email' AND mat_khau='$password'";
				$result = mysqli_query($con,$sql);
				if(mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_array($result);
					$_SESSION["ma_admin"] = $row["ma_admin"];
					$_SESSION["tai_khoan"] = $row["tai_khoan"];
					$_SESSION["ten_admin"] = $row["ten_admin"];
					$_SESSION["email"] = $row["email"];
					$_SESSION["sdt"] = $row["sdt"];
					$_SESSION["dia_chi"] = $row["dia_chi"];
					$_SESSION["gioi_tinh"] = $row["gioi_tinh"];
					echo '<script type="text/javascript">alert("Chào mừng đến trang quản trị Website")</script>';
					?>
						<script type="text/javascript">
							window.location.href="index.php";
						</script>
					<?php
				}else{
					$_SESSION["error"] = '<img src="../images/error.png">Email hoặc mật khẩu không đúng!';
				}
			}
		}

	?>

    <div class="login-box">
        <h1>Login</h1>       
        <form action="" method="Post" autocomplete="off">
        	<?php if(isset($_SESSION["error"])){ ?>
        		<!-- <p style="color: orange; display: inline-block;"><?= $_SESSION["error"] ?></p> -->
        		<div class="errors">
                    <p><?= $_SESSION["error"] ?></p>
                </div>
        	<?php unset($_SESSION["error"]); } ?>
			<div class="text-box">
				<i class="fas fa-envelope"></i>
            	<input type="text" name="email" placeholder="Email"/>
			</div>

			<div class="text-box" style="position: relative;">
				<i class="fas fa-lock"></i>
            	<input type="password" name="password" id="password" placeholder="Password"/>
            	<i class="fas fa-eye" style="position: absolute; top: 10px; right: 5px; color: #999;" onclick="showHidden()"></i>
  			</div>

            <input class="btn" type="submit" value="Sign in" name="login"/>
        </form>
        <div class="back-to-web">
        	<a href="http://project.com/"><i class="fas fa-long-arrow-alt-left"></i> Quay lại trang Project.com</a>
        </div>
    </div>

    <script type="text/javascript">
    	isBool = true;
    	function showHidden(){
    		if(isBool){
    			document.getElementById('password').setAttribute("type","text");
    			isBool = false;
    		}else{
    			document.getElementById('password').setAttribute("type","password");
    			isBool = true;
    		}
    	}
    </script>
</body>
