<?php
	include '../../../db/connect.php';
	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$short_content = $_POST['short_content'];
		$detail_content = $_POST['detail_content'];
		$date=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		$author = $_POST['author'];
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_tt/";
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
		$sql = "INSERT tin_tuc(tieu_de,noi_dung_ngan,noi_dung,anh,ngay_dang_tin,tac_gia) VALUES ('$title','$short_content','$detail_content','$images','$date','$author')";
		mysqli_query($con,$sql);
		header('location:../../index.php?manage=blog&action=list');
		exit();
	}else if(isset($_POST['fix'])){
		$id = $_GET['id'];
		$title = $_POST['title'];
		$short_content = $_POST['short_content'];
		$detail_content = $_POST['detail_content'];
		$date=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		$author = $_POST['author'];
		$images = $_FILES['fileUpload']['name'];
		// echo "<pre>";
		// print_r($_FILES);
		// echo "</pre>";
		$error = array();
		// B1: Tạo forder uploads để chứa file
		$target_dir = "uploads_tt/";
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
			$sql = "UPDATE tin_tuc SET tieu_de='$title',noi_dung_ngan ='$short_content',noi_dung='$detail_content',anh='$images',ngay_dang_tin='$date',tac_gia='$author' WHERE ma_tin_tuc='$id'";
		}else{
			$sql = "UPDATE tin_tuc SET tieu_de='$title',noi_dung_ngan ='$short_content',noi_dung='$detail_content',ngay_dang_tin='$date',tac_gia='$author' WHERE ma_tin_tuc='$id'";
		}
		 mysqli_query($con,$sql);
		 header('location:../../index.php?manage=blog&action=fix&id='.$id);
		 exit();
	}else{	
		$id = $_GET['id'];
		mysqli_query($con, "DELETE FROM tin_tuc WHERE ma_tin_tuc = '$id'");
		header('location:../../index.php?manage=blog&action=list');
	}

?>