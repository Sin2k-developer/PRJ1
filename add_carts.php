<?php
	session_start();
	if(isset($_POST["ma"]) && isset($_POST["num"])){
		include "db/connect.php";
		$ma = $_POST["ma"];
		$num = $_POST["num"]; 
		$sql = "SELECT ma_san_pham,ten_san_pham,anh,gia,sales,mo_ta,noi_dung,tinh_trang,size,ten_hang,ten_loai_san_pham,ten_danh_muc FROM san_pham INNER JOIN size ON san_pham.ma_size = size.ma_size INNER JOIN hang ON san_pham.ma_hang = hang.ma_hang INNER JOIN loai_san_pham ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham INNER JOIN danh_muc ON san_pham.ma_danh_muc = danh_muc.ma_danh_muc WHERE ma_san_pham = '$ma'";
		$array = mysqli_query($con,$sql);
		$each = mysqli_fetch_array($array);
		$gia_ban = ($each['gia'] - ($each['gia'] * $each['sales'] ));
		if(isset($each['sales']) > 0){
			if(!isset($_SESSION["cart"])){
				$cart = array();
				$cart[$ma] = array(
					'id' => $each["ma_san_pham"],
					'name' => $each["ten_san_pham"],
					'num' => $num,
					'price' => $gia_ban,
					'image' => $each["anh"],
					'size' => $each["size"]
				);
			}else{
				$cart = $_SESSION["cart"];
				if(array_key_exists($ma, $cart)){
					$cart[$ma] = array(
						'id' => $each["ma_san_pham"],
						'name' => $each["ten_san_pham"],
						'num' => (int)$cart[$ma]['num'] + $num,
						'price' => $gia_ban,
						'image' => $each["anh"],
						'size' => $each["size"] 
					);
				}else{
					$cart[$ma] = array(
					'id' => $each["ma_san_pham"],
					'name' => $each["ten_san_pham"],
					'num' => $num,
					'price' => $gia_ban,
					'image' => $each["anh"],
					'size' => $each["size"]
					);			
				}
			}
			$_SESSION["cart"] = $cart;
			$numCart = 0;
			foreach ($cart as $key => $value) {
				$numCart ++;
			}
			echo $numCart;
		}else{
			if(!isset($_SESSION["cart"])){
				$cart = array();
				$cart[$ma] = array(
					'id' => $each["ma_san_pham"],
					'name' =>$each["ten_san_pham"],
					'num' => $num,
					'price' => $each["gia"],
					'image' => $each["anh"],
					'size' => $each["size"]
				);
			}else{
				$cart = $_SESSION["cart"];
				if (array_key_exists($ma, $cart)) {
					$cart[$ma] = array(
						'id' => $each["ma_san_pham"],
						'name' => $each["ten_san_pham"],
						'num' => (int)$cart[$ma]['num'] + $num,
						'price' => $each["gia"],
						'image' => $each["anh"],
						'size' => $$each["size"] 
					);
				}else{
					$cart[$ma] = array(
					'id' => $each["ma_san_pham"],
					'name' => $each["ten_san_pham"],
					'num' => $num,
					'price' => $each["gia"],
					'image' => $each["anh"],
					'size' => $each["size"]
				);
				}
			}
			$_SESSION["cart"] = $cart;
			$numCart = 0;
			foreach ($cart as $key => $value) {
				$numCart ++;
			}
			echo $numCart;
		}
	}
?>