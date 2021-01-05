<?php
	$result = mysqli_query($con,"select * from admin ");
	$row = mysqli_fetch_array($result);
?>

<div class="admin-heading-panel">
    <div class="admin-heading-introduce">
        <img src="../images/windows-10.png">
        <span>Administrator</span>
    </div>
    
    <div class="admin-heading-home">
        <img src="../images/reply-arrow.png">
        <span><a href="../index.php">Back To Website</a></span>
    </div>

    <div class="admin-heading-bill">
        <img src="../images/bill.png">
        <span><a href="index.php?manage=bill&action=list">Hóa Đơn</a></span>
    </div>
         
    <div class="header-bar">
    	<nav class="header-nav">
			<ul class="header-nav-ul">
	   			<li><img src="../images/align-justify.png"></i>Xin chào <span><?php echo $_SESSION['tai_khoan']; ?></span>
                	<ul>
	         			<li><a href="index.php?manage=admin&action=list"><i class="fas fa-address-card"></i>Profile</a></li>
		 				<li><a href="edit.php"><i class="fas fa-key"></i>Đổi mật khẩu</a></li>
		 				<li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
	      			</ul>     
                </li>
			</ul>
    	</nav>
	</div>
</div>
