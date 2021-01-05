<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'header.php' ?>
	<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		// Load Composer's autoloader
		require 'vendor/autoload.php';

		if(isset($_POST['submit'])){
			require 'vendor/autoload.php';
			include 'db/connect.php';
			if(isset($_POST["email"]) && ($_POST["email"]!="")){
				$email = trim($_POST['email']);
				$code = md5(uniqid(true));
				if(!filter_var($email, FILTER_VALIDATE_EMAIL) == false){
					$checkmail = mysqli_query($con,"SELECT email FROM khach_hang WHERE email = '$email'") or die(mysql_error('Run time error...'));
					$count = mysqli_num_rows($checkmail); // kiem tra co email nay trong db
					if($count == 1){
						$inserted = mysqli_query($con,"UPDATE khach_hang SET token='$code' WHERE email='$email'");
						$mail = new PHPMailer(true);
						try {
						    //Server settings
						    $mail->CharSet='utf-8'; 
						    $mail->SMTPDebug = 0;                      // Enable verbose debug output
						    $mail->isSMTP();                                            // Send using SMTP
						    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
						    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
						    $mail->Username   = 'kelvinanh69@gmail.com';                     // SMTP username
						    $mail->Password   = 'kungfupanda2000s';                               // SMTP password
						    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
						    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

						    //Recipients
						    $mail->setFrom('kelvinanh69@gmail.com', 'Project');
						    $mail->addAddress($email);     // Add a recipient

						    // Content
						    $mail->isHTML(true);                                  // Set email format to HTML
						    $mail->Subject = 'Reset password link';
						    $mail->Body    = 'Here is your link to reset your password for active your account, visit the link below to complete: 
								http://project.com/reset_password.php?email='.$email.'&code='.$code;

						    $mail->send();
						    echo '<i style="position: relative; top: 82px; left: 293px; border: 1px solid blueviolet; padding: 4px; background: yellowgreen; color: #fff;">Message has been sent</i>';
						} catch (Exception $e) {
					    	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}
					}else{
						echo "Oops! Sory, $email does not belong to any account!";
					}
				}else{
					echo "$email is not a valid email address!";
				}
			}else{
				echo "Email not empty!";
			}
		}
	?>
	<?php include 'menu.php' ?>
	<div class="forgot">
		<div class="wrap">
			<div class="forgot-content">
				<div class="healding">
					<span><i class="fas fa-user"></i>Quên mật khẩu</span>
				</div>
				<div class="text">
					<p>Vui lòng nhập địa chỉ email đã đăng ký của bạn, chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu.</p>
					<form action="" method="post" onsubmit="return checkEmail()">
			            <div class="enter_email">
			                <label>* Địa chỉ E-Mail:</label>    
			                <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ E-Mail:">
			                <span id="err_email"></span>
			              	<div class="buttons">
					          <div class="buttons-left"><a href="login.php" class="btn btn-default">Quay lại</a></div>
					          <div class="buttons-right">
					            <button type="submit" name="submit" class="button">Tiếp tục</button>
					          </div>
				        	</div>
			            </div>			       
				    </form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>	
	<?php include 'footer.php' ?>
	<script>
		function checkEmail(){
			var dem = 0;
			var regex_email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
			var email = document.getElementById("email");
			var err_email = document.getElementById("err_email");
			var value_email = email.value;
			if(value_email.length == ""){
				email.style.border = "4px solid red";
				err_email.innerHTML = "Vui lòng nhập một địa chỉ email.";
				dem++;
			}
			else if(regex_email.test(value_email) == false){
				email.style.border = "4px solid red";
				err_email.innerHTML = "Mời bạn nhập lại email theo định dạng như: Test@gmail.com";
				dem++;
			}
			else{
				email.style.border = "4px solid white";
				err_email.innerHTML = "";
			}
			
			if(dem == 0){
				return true;
			}else{
				return false;
			}
			
		}
	</script>	
</body>
</html>