<?php
	include '../../../db/connect.php';
	if(isset($_POST['add'])){
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$sale = $_POST['sale'];
		$description = $_POST['description'];
		$content = $_POST['content'];
		$size = $_POST['size'];
		$brand = $_POST['brand'];
		$product_type = $_POST['product_type'];
		$category = $_POST['category'];
		$status = $_POST['status'];
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_product/";
		// B2: Tạo đường dẫn file sau khi upload lên sever
		$target_file = $target_dir.basename($_FILES['fileUpload']['name']);
		// B3: Kiểm tra điều kiện Upload
		/*
			1 . Kiểm tra kích thước file
			2 . Kiểm tra loại file
			3 . Kiểm tra sự tồn tại file cần upload
		*/
		// 1. Kiểm tra kích thước (max = 5MB <=> 5242880 bytes)
		if($_FILES['fileUpload']['size'] > 5242880){
			$error['fileUpload'] = "Chỉ được upload file dưới 5MB";
		}
		// 2. Kiểm tra loại file (png, jpeg, jpg, gif)
		$file_type = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION); //PATHINFO_EXTENSION lấy đuôi mở rộng
		$file_type_allow = array('png', 'jpeg', 'jpg', 'gif');
		if(!in_array(strtolower($file_type), $file_type_allow)){   //in_array(): Kiểm tra 1 phần tử của mảng || strolower : chuyển về dạng in thường
			$error['fileUpload'] = "Chỉ cho phép upload file ảnh";
		}
		// 3. Kiểm tra file đã tồn tại trên hệ thống
		if(file_exists($target_file)){
			$error['fileUpload'] = "File đã tồn tại trên hệ thông";
		}
		// B4: Chuyển file từ bộ nhớ tạm lên sever
		if(empty($error)){
			if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)){
				echo "Bạn đã upload thành công";
			}else{
				echo "Bạn đã upload thất bại";
			}
		}
		$sql = "INSERT san_pham(ten_san_pham,anh,gia,sales,mo_ta,noi_dung,tinh_trang,ma_size,ma_hang,ma_loai_san_pham,ma_danh_muc) VALUES ('$product_name','$images','$product_price','$sale','$description','$content','$status','$size','$brand','$product_type','$category')";
		mysqli_query($con,$sql);
		header('location:../../index.php?manage=product_details&action=list');
		exit();
	}else if(isset($_POST['fix'])){
		$id = $_GET['id'];
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$sale = $_POST['sale'];
		$description = $_POST['description'];
		$content = $_POST['content'];
		$size = $_POST['size'];
		$brand = $_POST['brand'];
		$product_type = $_POST['product_type'];
		$category = $_POST['category'];
		$status = $_POST['status'];
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_product/";
		// B2: Tạo đường dẫn file sau khi upload lên sever
		$target_file = $target_dir.basename($_FILES['fileUpload']['name']);
		// B3: Kiểm tra điều kiện Upload
		/*
			1 . Kiểm tra kích thước file
			2 . Kiểm tra loại file
			3 . Kiểm tra sự tồn tại file cần upload
		*/
		// 1. Kiểm tra kích thước (max = 5MB <=> 5242880 bytes)
		if($_FILES['fileUpload']['size'] > 5242880){
			$error['fileUpload'] = "Chỉ được upload file dưới 5MB";
		}
		// 2. Kiểm tra loại file (png, jpeg, jpg, gif)
		$file_type = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION); //PATHINFO_EXTENSION lấy đuôi mở rộng
		$file_type_allow = array('png', 'jpeg', 'jpg', 'gif');
		if(!in_array(strtolower($file_type), $file_type_allow)){   //in_array(): Kiểm tra 1 phần tử của mảng || strolower : chuyển về dạng in thường
			$error['fileUpload'] = "Chỉ cho phép upload file ảnh";
		}
		// 3. Kiểm tra file đã tồn tại trên hệ thống
		if(file_exists($target_file)){
			$error['fileUpload'] = "File đã tồn tại trên hệ thông";
		}
		// B4: Chuyển file từ bộ nhớ tạm lên sever
		if(empty($error)){
			if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)){
				echo "Bạn đã upload thành công";
			}else{
				echo "Bạn đã upload thất bại";
			}
		}
		if($images!=''){
			$sql = "UPDATE san_pham SET ten_san_pham='$product_name',anh='$images',gia ='$product_price',sales='$sale',mo_ta='$description',noi_dung='$content',tinh_trang='$status',ma_size='$size',ma_hang='$brand',ma_loai_san_pham='$product_type',ma_danh_muc='$category' WHERE ma_san_pham='$id'";
		}else{
			$sql = "UPDATE san_pham SET ten_san_pham='$product_name',gia ='$product_price',sales='$sale',mo_ta='$description',noi_dung='$content',tinh_trang='$status',ma_size='$size',ma_hang='$brand',ma_loai_san_pham='$product_type',ma_danh_muc='$category' WHERE ma_san_pham='$id'";
		}
		 mysqli_query($con,$sql);
		 header('location:../../index.php?manage=product_details&action=fix&id='.$id);
		 exit();
	}else{	
		$id = $_GET['id'];
		mysqli_query($con, "DELETE FROM san_pham WHERE ma_san_pham = '$id'");
		header('location:../../index.php?manage=product_details&action=list');
	}

?>