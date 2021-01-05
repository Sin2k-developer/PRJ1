<?php
	include '../../../db/connect.php';
	if(isset($_POST['add'])){
		$banner_name = $_POST['banner_name'];
		$color = $_POST['color'];
		$content = $_POST['content'];
		$date=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_slide/";
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
			$error['fileUpload'] = "File đã tồn tại trên hệ thống";
		}
		// B4: Chuyển file từ bộ nhớ tạm lên sever
		if(empty($error)){
			if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)){
				echo "Bạn đã upload thành công";
			}else{
				echo "Bạn đã upload thất bại";
			}
		}
		$sql = "INSERT banner(ten_anh_bia,mau,anh_bia,noi_dung,ngay_dang) VALUES ('$banner_name','$color','$images','$content','$date')";
		mysqli_query($con,$sql);
		header('location:../../index.php?manage=slide&action=list');
		exit();
	}else if(isset($_POST['fix'])){
		$id = $_GET['id'];
		$banner_name = $_POST['banner_name'];
		$color = $_POST['color'];
		$content = $_POST['content'];
		$date=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_slide/";
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
			$sql = "UPDATE banner SET ten_anh_bia='$banner_name',mau ='$color',anh_bia='$images',noi_dung='$content',ngay_dang='$date' WHERE ma_anh_bia='$id'";
		}else{
			$sql = "UPDATE banner SET ten_anh_bia='$banner_name',mau ='$color',noi_dung='$content',ngay_dang='$date' WHERE ma_anh_bia='$id'";
		}
		 mysqli_query($con,$sql);
		 header('location:../../index.php?manage=slide&action=fix&id='.$id);
		 exit();
	}else{	
		$id = $_GET['id'];
		mysqli_query($con, "DELETE FROM banner WHERE ma_anh_bia = '$id'");
		header('location:../../index.php?manage=slide&action=list');
	}

?>