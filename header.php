<?php session_start() ?>
<div class="header-top">
	<div class="wrap">
		<div class="left-panel">
			<img src="images/icons/icon-hotline.gif" width="18px" height="18px">
			<p>HOTLINE: 0128803267</p>
		</div>
		<div class="right-panel">
			<a href="address_shop.php">
				<i class="fas fa-map-marked-alt"></i>
				Địa chỉ cửa hàng
			</a>
		</div>
	</div>
</div>
<div class="header-middle">
	<div class="wrap">
		<div class="logo">
			<a href="http://project.com/"><img src="images/logo/shoesvn.jpg" width="105px" height="70px" alt=""/></a>
	    </div>
		
        <form class="search" action="search.php" method="GET">                  	 
            <div class="full-text">
                <input type="hidden" name="price" />
                <input type="text" class="search-txt" name="search" value="<?php if(isset($_GET['search'])){ ?><?php echo $_GET['search'] ?><?php }else{ ?><?php echo '' ?><?php } ?>" placeholder="Search product..."/>
            </div>
            <button type="submit" class="search-btn"><img src="images/search.png" width="25px" height="25px"></button>
        </form>
		
	    <div class="cssmenu">
	    	<div class="icon-user">
	    		<img src="images/user.png">
	    	</div>
	    	<?php
	    		if(empty($_SESSION['ma_khach_hang'])){
	    	?>
		   <ul style="display: grid; margin-top: 1px">
			 <li><a href="register.php">Đăng ký & Lưu</a></li> 	
			 <li><a href="login.php">Đăng nhập</a></li> 
		   </ul>
		<?php }else{ ?>
			<ul style="display: grid; margin-top: 1px">
			 <li class="active"><a href="account.php">Đăng ký & Lưu</a></li> 	
			 <li><a href="account.php">Đăng nhập</a></li> 
		   </ul>
		<?php } ?>
		</div>

		<div class="clear"></div>
	</div>
</div>
