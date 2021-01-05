<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đổi thông tin thành viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="192x192" href="../icon/android-icon-96x96.png" >
        <link rel="stylesheet" type="text/css" href="../css/admin/edit.css" >
    </head>
    <body>
        <?php
        	include('../db/connect.php');
     		if(isset($_POST['edit'])){
				 $email = $_POST['email'];
				 $matkhaucu = $_POST['matkhaucu'];
				 $matkhaumoi = $_POST['matkhaumoi'];
                 $matkhaucu = md5($matkhaucu);
                 $matkhaumoi = md5($matkhaumoi);
				 if($email == "" || $matkhaucu == "" || $matkhaumoi == ""){
					 $_SESSION["error"] = '<img src="../images/error.png">Email || mật khẩu cũ || mật khẩu mới không được để trống!';
				 }
				 else{
                    $sql = "SELECT * FROM admin WHERE email = '$email' AND mat_khau = '$matkhaucu' LIMIT 1";
					$result = mysqli_query($con,$sql); 
					if(mysqli_num_rows($result) > 0){
                        $sql = "UPDATE admin SET mat_khau = '$matkhaumoi'";
                        $update = mysqli_query($con,$sql);
                        echo "<script>
                                alert('Bạn thay đổi mật khẩu thành công');
                        </script>";
                        ?>
                            <script type="text/javascript">
                                window.location.href="http://project.com/admin/index.php";
                            </script>
                        <?php
					}else{
						$_SESSION["error"] = '<img src="../images/error.png">Email hoặc mật khẩu cũ không đúng!';			
					}		
				 }		 
			}	
        ?>         
        <div class="edit_user box-content">
            <h1>Xin chào "<?= $_SESSION["tai_khoan"]?>" .Bạn đang thay đổi mật khẩu</h1>
            <form action="" method="post" autocomplete="off">
                <?php if(isset($_SESSION['error'])){ ?>
                    <div class="errors">
                        <p><?= $_SESSION["error"] ?></p>
                    </div>
                <?php unset($_SESSION['error']); }?>
                <input type="hidden" name="user_id" value="<?= $_SESSION['ma_admin'] ?>">
                <label class="fontc">Email</label></br>
                <input type="text" name="email" value=""  /></br>
                <label class="fontc">Mật khẩu cũ</label></br>
                <input type="password" name="matkhaucu" value="" /></br>
                <label class="fontc">Mật khẩu mới</label></br>
                <input type="password" name="matkhaumoi" value="" /></br>
                <input type="submit" value="Edit" name="edit"/>
            </form>
        </div>
    </body>
</html>
