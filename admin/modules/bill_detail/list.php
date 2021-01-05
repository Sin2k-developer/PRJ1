<?php 
	$ma_hoa_don = $_GET['ma_hoa_don'];
	$sql = "select
	hoa_don_chi_tiet.gia,
	hoa_don_chi_tiet.so_luong,
	san_pham.anh,
	san_pham.ten_san_pham
	from hoa_don_chi_tiet
	join san_pham on san_pham.ma_san_pham = hoa_don_chi_tiet.ma_san_pham where ma_hoa_don = '$ma_hoa_don'";
	$array = mysqli_query($con,$sql);
?>

<div class="list-bill_details-content">
<table>
  <tr>
    <th style="color:brown">Ảnh</th>
    <th style="color:brown">Tên sản phẩm</th>
    <th style="color:brown">Số lượng</th>
    <th style="color:brown">Giá</th>
    <th style="color:brown">Thành tiền</th>
  </tr>
  <?php
  	$tong = 0;
  
    foreach ($array as $row):
		$thanhtien=($row['gia']*$row['so_luong']);
		$tong+=$thanhtien;
  ?>
  <tr>
    <td> <img src="modules/product_details/uploads_product/<?php echo $row['anh'] ?>" width="60px" height="60px" /> </td>
    <td> <?php echo $row['ten_san_pham'] ?> </td>
    <td> <?php echo $row['so_luong'] ?> </td>
    <td> <?php echo number_format($row['gia'],0,",",".") ?> </td>
   	<td> <?php echo number_format($thanhtien,0,",",".") ?> </td>
  </tr>
  <?php endforeach ?>

    <tr>
    	<td colspan="5" id="Total">Tổng:<font color="red"><?php echo " ". number_format($tong,0,",",".") ?></font></td>
    </tr>
</table>
</div>