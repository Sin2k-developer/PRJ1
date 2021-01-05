<?php 
	$sql = "SELECT ma_hoa_don,ten_khach_hang,ten_nguoi_nhan,dia_chi_nguoi_nhan,sdt_nguoi_nhan,tinh_thanh_pho,thoi_gian_mua,hoa_don.tinh_trang,hoa_don.email FROM hoa_don  join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang ORDER BY ma_hoa_don DESC";
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

<div class="list-bill-product-home">
<table>
  <tr>
  	<th colspan="6" style="color: ivory; background: darkslategrey; font-size: 23px; letter-spacing: 2px; padding: 15px !important">Đơn hàng cần được xử lý</th>
  </tr>
  <tr>
    <th style="color:brown">Mã hóa đơn</th>
    <th style="color:brown">Tên khách hàng</th>
    <th style="color:brown">Địa chỉ</th>
    <th style="color:brown">Điện thoại</th>
    <th style="color:brown">Email</th>
    <th style="color:brown">Thời gian đặt</th>
  </tr>
  
  <?php
  	while($each = mysqli_fetch_array($array)){
	if($each['tinh_trang']==1){
  ?>
  <tr>
    <td> <?php echo $each['ma_hoa_don'] ?> </td>
    <td> <?php echo $each['ten_khach_hang'] ?> </td>
    <td> <?php echo $each['dia_chi_nguoi_nhan'] ?> </td>
    <td> <?php echo $each['sdt_nguoi_nhan'] ?> </td>
    <td> <?php echo $each['email'] ?> </td>
    <td> <?php echo $each['thoi_gian_mua'] ?> </td>
  </tr>
 <?php
	}else{
		
	}}
 ?>
  <tr>
  	<td colspan="6" style="text-align:right; padding-right:52px"><a href="index.php?manage=bill&action=list"/>Chi tiết</a></td>
  </tr>
</table>

	<div id="phantrang">
		<?php
			for($i = 1; $i <= $so_trang;$i++){
				?>
          	<a href="?manage=home_page&action=home&page=<?php echo $i ?>"><button class="so"><?php echo $i; ?></button></a>
          <?php
			  }
		?>
	</div>
</div>
    
  



