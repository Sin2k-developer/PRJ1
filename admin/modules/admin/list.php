<?php
	$sql = "SELECT * FROM admin";
	$result = mysqli_query($con,$sql);
?>
<div class="list-admin-content">
	<table>
	  	<tr>
			<th style="color:brown">Mã admin</th>
			<th style="color:brown">Tên admin</th>
			<th style="color:brown">Tài khoản</th>
			<th style="color:brown">Mật khẩu</th>
			<th style="color:brown">Số điện thoại</th>
			<th style="color:brown">Email</th>
			<th style="color:brown">Địa chỉ</th>
			<th style="color:brown">Giới tính</th>
			<th style="color:brown">Tác vụ</th>
	  	</tr>
	  	<?php foreach ($result as $row): ?>
	  	<tr>
		    <td><?php echo $row['ma_admin'] ?></td>
		    <td><?php echo $row['ten_admin'] ?></td>
		    <td><?php echo $row['tai_khoan'] ?></td>
		    <td><?php echo $row['mat_khau'] ?></td>
		    <td><?php echo $row['sdt'] ?></td>
		    <td><?php echo $row['email'] ?></td>
		    <td><?php echo $row['dia_chi'] ?></td>
	    	<td><?php if($row["gioi_tinh"]==1){echo"Nam";}else{echo"Nữ";}?></td>
	    	<td><a href="index.php?manage=admin&action=fix&id=<?php echo $row['ma_admin'] ?>"><i class="fas fa-edit"></i></a></td>
	  	</tr>
  		<?php endforeach ?>
</table>
</div>