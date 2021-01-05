<div class="main-content">
	<div class="main-content-top">
		<?php
			if(isset($_GET['manage']) && isset($_GET['action'])){
				$man = $_GET['manage'];
				$ac = $_GET['action'];	
				if(($man == 'home_page')&&($ac == 'home')){
					echo '<span><i class="fas fa-home"></i>Trang chủ</span>'; 
				}
				else if(($man == 'product_details')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách sản phẩm</span>'; 
				}
				else if(($man == 'product_details')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=product_details&action=list">Danh sách sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm sản phẩm</span>';
				}
				else if(($man == 'product_details')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=product_details&action=list">Danh sách sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa sản phẩm</span>';
				}
				else if(($man == 'product_type')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></i></span><span>Danh sách loại sản phẩm</span>';
				}
				else if(($man == 'product_type')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></i></span><span><a class="middle" href="?manage=product_type&action=list">Danh sách loại sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm loại sản phẩm</span>';
				}
				else if(($man == 'product_type')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></i></span><span><a class="middle" href="?manage=product_type&action=list">Danh sách loại sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa loại sản phẩm</span>';
				}
				else if(($man == 'product_brand')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách hãng sản phẩm</span>';
				}
				else if(($man == 'product_brand')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=product_brand&action=list">Danh sách hãng sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm hãng sản phẩm</span>';
				}
				else if(($man == 'product_brand')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=product_brand&action=list">Danh sách hãng sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa hãng sản phẩm</span>';
				}
				else if(($man == 'product_size')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách size sản phẩm</span>';
				}
				else if(($man == 'product_size')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=product_size&action=list">Danh sách size sản phẩm</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm size sản phẩm</span>';
				}
				else if(($man == 'category')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách danh mục</span>';
				}
				else if(($man == 'category')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=category&action=list">Danh sách danh mục</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm danh mục </span>';
				}
				else if(($man == 'category')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=category&action=list">Danh sách danh mục</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa danh mục </span>';
				}
				else if(($man == 'blog')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách bài viết</span>';
				}
				else if(($man == 'blog')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=blog&action=list">Danh sách bài viết</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm bài viết</span>';
				}
				else if(($man == 'blog')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=blog&action=list">Danh sách bài viết</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa bài viết</span>';
				}
				else if(($man == 'comment')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách bình luận</span>';
				}
				else if(($man == 'slide')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách slide</span>';
				}
				else if(($man == 'slide')&&($ac == 'add')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=slide&action=list">Danh sách slide</a></span><span><img src="../images/chevron-right.png"></span><span>Thêm slide</span>';
				}
				else if(($man == 'slide')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></i></span><span><a class="middle" href="?manage=slide&action=list">Danh sách slide</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa slide</span>';
				}
				else if(($man == 'bill')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Danh sách hóa đơn</span>';
				}
				else if(($man == 'bill_detail')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Chi tiết hóa đơn</span>';
				}
				else if(($man == 'customer')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Thông tin khách hàng</span>';
				}
				else if(($man == 'admin')&&($ac == 'list')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span>Thông tin admin</span>';
				}
				else if(($man == 'admin')&&($ac == 'fix')){
					echo '<span><a class="middle" href="?manage=home_page&action=home"><i class="fas fa-home"></i>Trang chủ</a></span><span><img src="../images/chevron-right.png"></span><span><a class="middle" href="?manage=admin&action=list">Thông tin admin</a></span><span><img src="../images/chevron-right.png"></span><span>Sửa thông tin admin</span>';
				}else{
					echo '<span>Not page!</span>';
				}			
			}
		 ?>
	</div>
	<?php
		if(isset($_GET['manage']) && isset($_GET['action'])){
			$temp = $_GET['manage'];
			$temp2 = $_GET['action'];
		}else{
			$temp = "";
			$temp2 = "";
		}
		if(($temp == 'product_details')&&($temp2 == 'list')){
			include('modules/product_details/list.php');
		}else if(($temp == 'product_details')&&($temp2 == 'add')){
			include('modules/product_details/add.php');
		}else if(($temp == 'product_details')&&($temp2 == 'fix')){
			include('modules/product_details/fix.php');
		}else if(($temp == 'product_type')&&($temp2 == 'list')){
			include('modules/product_type/list.php');	
		}else if(($temp == 'product_type')&&($temp2 == 'add')){
			include('modules/product_type/add.php');
		}else if(($temp == 'product_type')&&($temp2 == 'fix')){
			include('modules/product_type/fix.php');
		}else if(($temp == 'product_brand')&&($temp2 == 'list')){
			include('modules/product_brand/list.php');
		}else if(($temp == 'product_brand')&&($temp2 == 'add')){
			include('modules/product_brand/add.php');
		}else if(($temp == 'product_brand')&&($temp2 == 'fix')){
			include('modules/product_brand/fix.php');
		}else if(($temp == 'product_size')&&($temp2 == 'list')){
			include('modules/product_size/list.php');
		}else if(($temp == 'product_size')&&($temp2 == 'add')){
			include('modules/product_size/add.php');
		}else if(($temp == 'category')&&($temp2 == 'list')){
			include('modules/category/list.php');	
		}else if(($temp == 'category')&&($temp2 == 'add')){
			include('modules/category/add.php');
		}else if(($temp == 'category')&&($temp2 == 'fix')){
			include('modules/category/fix.php');
		}else if(($temp == 'blog')&&($temp2 == 'list')){
			include('modules/blog/list.php');
		}else if(($temp == 'blog')&&($temp2 == 'add')){
			include('modules/blog/add.php');
		}else if(($temp == 'blog')&&($temp2 == 'fix')){
			include('modules/blog/fix.php');
		}else if(($temp == 'comment')&&($temp2 == 'list')){
			include('modules/comment/list.php');	
		}else if(($temp == 'slide')&&($temp2 == 'list')){
			include('modules/slide/list.php');
		}else if(($temp == 'slide')&&($temp2 == 'add')){
			include('modules/slide/add.php');
		}else if(($temp == 'slide')&&($temp2 == 'fix')){
			include('modules/slide/fix.php');
		}else if(($temp == 'bill')&&($temp2 == 'list')){
			include('modules/bill/list.php');
		}else if(($temp == 'bill_detail')&&($temp2 == 'list')){
			include('modules/bill_detail/list.php');
		}else if(($temp == 'customer')&&($temp2 == 'list')){
			include('modules/customer/list.php');
		}else if(($temp == 'admin')&&($temp2 == 'list')){
			include('modules/admin/list.php');
		}else if(($temp == 'admin')&&($temp2 == 'fix')){
			include('modules/admin/fix.php');
		}else if(isset($_GET['tim_kiem_sp'])){
			include('modules/product_details/list.php');
		}else{
			include('modules/home_page/home.php');
		}
	?>
</div>