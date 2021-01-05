<?php 
	$sql = "SELECT * FROM khach_hang";
	$result = mysqli_query($con,$sql);
?>
<div class="list-customer-content">
	<table>
	  <tr>
	    <th style="color:brown">Mã khách hàng</th>
	    <th style="color:brown">Tên tài khoản</th>
	    <th style="color:brown">Tên khách hàng</th>
	    <th style="color:brown">Số điện thoại</th>
	    <th style="color:brown">Địa chỉ</th>
	    <th style="color:brown">Giới tính</th>
	    <th style="color:brown">Email</th>
	    <th style="color:brown">Mật khẩu</th>
	    <th style="color:brown">Tác vụ</th>
	  </tr>  
	 <?php foreach ($result as $row) :?>  
	  <tr>
	    <td> <?php echo $row['ma_khach_hang']; ?> </td>
	    <td> <?php echo $row['ten_khach_hang']; ?> </td> 
	    <td> <?php echo $row['ten_tai_khoan']; ?> </td>
	    <td> <?php echo $row['sdt']; ?> </td>
	    <td> <?php echo $row['dia_chi']; ?> </td>
	    <td> <?php if($row['gioi_tinh'] == 1){echo "Nam";}else{echo "Nữ";} ?> </td>
	    <td> <?php echo $row['email']; ?> </td>
	    <td> <?php echo $row['mat_khau']; ?> </td>
	    <td> <a href="modules/customer/process.php?id=<?php echo $row['ma_khach_hang'];?>">
	    		<?php
					if($row['tinh_trang']==0){
						echo '<img src="../images/unlock.png" width="17px">';
					}else{
						echo '<img src="../images/lock.png" width="17px">';
					}
				?>
	    	</a>
	    </td>
	  </tr>
	   <?php endforeach ?>
	</table>
</div>
