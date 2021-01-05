<?php 
	$sql = "SELECT ma_hoa_don,ten_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,tinh_thanh_pho,dia_chi_nguoi_nhan,noi_dung,hoa_don.email,hoa_don.tinh_trang,thoi_gian_mua,tong_tien FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang ORDER BY ma_hoa_don DESC";
	$array = mysqli_query($con,$sql);
	$tong_so_san_pham = mysqli_num_rows($array);
	$limit = 5;
	$trang_hien_tai = 1;
	if(isset($_GET['page'])){
		$trang_hien_tai = $_GET['page'];
	}
    $trang_ke_tiep = ($trang_hien_tai - 1)*$limit;
	$so_trang = ceil($tong_so_san_pham / $limit);
	$sql = "$sql limit $limit offset $trang_ke_tiep";
    $array = mysqli_query($con,$sql);
?>

<div class="list-bill-content">
<table>
  <tr>
    <th style="color:brown">Mã hóa đơn</th>
    <th style="color:brown">Tên khách hàng</th>
    <th style="color:brown">Tên người nhận</th>
    <th style="color:brown">Tỉnh/Thành Phố</th>
    <th style="color:brown">Địa chỉ</th>
    <th style="color:brown">Điện thoại</th>
    <th style="color:brown">Email</th>
    <th style="color:brown">Nội dung</th>
    <th style="color:brown">Tổng tiền</th>
    <th style="color:brown">Thời gian đặt</th>
    <th style="color:brown">Trạng thái</th>
    <th style="color:brown">Cách thức</th>
    <th style="color:brown">Active</th>
  </tr>
  <?php
  	if($tong_so_san_pham > 0)
  	while($each = mysqli_fetch_array($array)){
  ?>
  <tr>
    <td> <?php echo $each['ma_hoa_don'] ?> </td>
    <td> <?php echo $each['ten_khach_hang'] ?> </td>
    <td> <?php echo $each['ten_nguoi_nhan'] ?> </td>
    <td> <?php 
            if($each['tinh_thanh_pho'] == 1){
                echo "Hà Nội";
            }else if($each['tinh_thanh_pho'] == 2){
                echo "Hồ Chí Minh";
            }else if($each['tinh_thanh_pho'] == 3){
                echo "An Giang";
            }else if($each['tinh_thanh_pho'] == 4){
                echo "Bà Rịa - Vũng Tàu";
            }else if($each['tinh_thanh_pho'] == 5){
                echo "Bạc Liêu";
            }else if($each['tinh_thanh_pho'] == 6){
                echo "Bắc Giang";
            }else if($each['tinh_thanh_pho'] == 7){
                echo "Bắc Kạn";
            }else if($each['tinh_thanh_pho'] == 8){
                echo "Bắc Ninh";
            }else if($each['tinh_thanh_pho'] == 9){
                echo "Bến Tre";
            }else if($each['tinh_thanh_pho'] == 10){
                echo "Bình Dương";
            }else if($each['tinh_thanh_pho'] == 11){
                echo "Bình Định";
            }else if($each['tinh_thanh_pho'] == 12){
                echo "Bình Phước";
            }else if($each['tinh_thanh_pho'] == 13){
                echo "Bình Thuận";
            }else if($each['tinh_thanh_pho'] == 14){
                echo "Cao Bằng";
            }else if($each['tinh_thanh_pho'] == 15){
                echo "Cà Mau";
            }else if($each['tinh_thanh_pho'] == 16){
                echo "Cần Thơ";
            }else if($each['tinh_thanh_pho'] == 17){
                echo "Hải Phòng";
            }else if($each['tinh_thanh_pho'] == 18){
                echo "Đà Nẵng";
            }else if($each['tinh_thanh_pho'] == 19){
                echo "Gia Lai";
            }else if($each['tinh_thanh_pho'] == 20){
                echo "Hòa Bình";
            }else if($each['tinh_thanh_pho'] == 21){
                echo "Hà Giang";
            }else if($each['tinh_thanh_pho'] == 22){
                echo "Hà Nam";
            }else if($each['tinh_thanh_pho'] == 23){
                echo "Hà Tĩnh";
            }else if($each['tinh_thanh_pho'] == 24){
                echo "Hưng Yên";
            }else if($each['tinh_thanh_pho'] == 25){
                echo "Hải Dương";
            }else if($each['tinh_thanh_pho'] == 26){
                echo "Hậu Giang";
            }else if($each['tinh_thanh_pho'] == 27){
                echo "Điện Biên";
            }else if($each['tinh_thanh_pho'] == 28){
                echo "Đắk Lắk";
            }else if($each['tinh_thanh_pho'] == 29){
                echo "Đắk Nông";
            }else if($each['tinh_thanh_pho'] == 30){
                echo "Đồng Nai";
            }else if($each['tinh_thanh_pho'] == 31){
                echo "Đồng Tháp";
            }else if($each['tinh_thanh_pho'] == 32){
                echo "Khánh Hòa";
            }else if($each['tinh_thanh_pho'] == 33){
                echo "Kiên Giang";
            }else if($each['tinh_thanh_pho'] == 34){
                echo "Kon Tum";
            }else if($each['tinh_thanh_pho'] == 35){
                echo "Lai Châu";
            }else if($each['tinh_thanh_pho'] == 36){
                echo "Long An";
            }else if($each['tinh_thanh_pho'] == 37){
                echo "Lào Cai";
            }else if($each['tinh_thanh_pho'] == 38){
                echo "Lâm Đồng";
            }else if($each['tinh_thanh_pho'] == 39){
                echo "Lạng Sơn";
            }else if($each['tinh_thanh_pho'] == 40){
                echo "Nam Định";
            }else if($each['tinh_thanh_pho'] == 41){
                echo "Nghệ An";
            }else if($each['tinh_thanh_pho'] == 42){
                echo "Ninh Bình";
            }else if($each['tinh_thanh_pho'] == 43){
                echo "Ninh Thuận";
            }else if($each['tinh_thanh_pho'] == 44){
                echo "Phú Thọ";
            }else if($each['tinh_thanh_pho'] == 45){
                echo "Phú Yên";
            }else if($each['tinh_thanh_pho'] == 46){
                echo "Quảng Bình";
            }else if($each['tinh_thanh_pho'] == 47){
                echo "Quảng Nam";
            }else if($each['tinh_thanh_pho'] == 48){
                echo "Quảng Ngãi";
            }else if($each['tinh_thanh_pho'] == 49){
                echo "Quảng Ninh";
            }else if($each['tinh_thanh_pho'] == 50){
                echo "Quảng Trị";
            }else if($each['tinh_thanh_pho'] == 51){
                echo "Sóc Trăng";
            }else if($each['tinh_thanh_pho'] == 52){
                echo "Sơn La";
            }else if($each['tinh_thanh_pho'] == 53){
                echo "Thanh Hóa";
            }else if($each['tinh_thanh_pho'] == 54){
                echo "Thái Bình";
            }else if($each['tinh_thanh_pho'] == 55){
                echo "Thái Nguyên";
            }else if($each['tinh_thanh_pho'] == 56){
                echo "Thừa Thiên-Huế";
            }else if($each['tinh_thanh_pho'] == 57){
                echo "Tiền Giang";
            }else if($each['tinh_thanh_pho'] == 58){
                echo "Trà Vinh";
            }else if($each['tinh_thanh_pho'] == 59){
                echo "Tuyên Quang";
            }else if($each['tinh_thanh_pho'] == 60){
                echo "Tây Ninh";
            }else if($each['tinh_thanh_pho'] == 61){
                echo "Vĩnh Long";
            }else if($each['tinh_thanh_pho'] == 62){
                echo "Vĩnh Phúc";
            }else if($each['tinh_thanh_pho'] == 63){
                echo "Yên Bái";
            }else{

            }
         ?></td>
    <td> <?php echo $each['dia_chi_nguoi_nhan'] ?> </td>
    <td> <?php echo $each['sdt_nguoi_nhan'] ?> </td>
    <td> <?php echo $each['email'] ?> </td>
    <td> <?php echo $each['noi_dung'] ?> </td>
    <td> <?php echo $each['tong_tien'] ?> </td>
    <td> <?php echo $each['thoi_gian_mua'] ?> </td>
    <td> 
		<?php 
			switch($each['tinh_trang']){
				case '1':
					echo "Đang chờ duyệt";
					break;
				case '2':
					echo "Đã duyệt";
					break; 
				case '3':
					echo "Đã hủy";
					break; 
			}
		?>
    </td>
    <td>
    	<a href="modules/bill/thay_doi_tinh_trang_hoa_don.php?ma_hoa_don=<?php echo $each['ma_hoa_don'] ?>&tinh_trang=2">
        	Duyệt
        </a>
        <a href="modules/bill/thay_doi_tinh_trang_hoa_don.php?ma_hoa_don=<?php echo $each['ma_hoa_don'] ?>&tinh_trang=3">
        	Hủy
        </a>
    </td>
    <td><a href="index.php?manage=bill_detail&action=list&ma_hoa_don=<?php echo $each['ma_hoa_don']; ?>"/><i class="fas fa-shopping-basket"></i></a></td>
  </tr>
	<?php
		}else echo "<script>
                        alert('Không có dữ liệu trong CSDL');
                </script>";
	?>
</table>
<div id="phantrang">
		<?php
			for($i = 1; $i <= $so_trang;$i++){
				?>
                <a href="?manage=bill&action=list&page=<?php echo $i ?>"><button class="so"><?php echo $i; ?></button></a>
                <?php
			}
		?>
	</div>
</div>
    
  



