<?php 
	$sql = "SELECT * FROM binh_luan";
	$result = mysqli_query($con,$sql);
?>
<div class="list-customer-content">
	<table>
	  <tr>
	    <th style="color:brown">STT</th>
	    <th style="color:brown">Người bình luận</th>
	    <th style="color:brown">Email</th>
	    <th style="color:brown">Nội dung</th>
	    <th style="color:brown">Ngày bình luận</th>
	    <th style="color:brown">Trạng thái</th>   
	    <th style="color:brown">Tác vụ</th>
	  </tr>  
	 <?php 
	 	$stt = 1;
	 	foreach ($result as $row) :
	 ?>  
	  <tr>
	    <td> <?php echo $stt++ ?> </td>
	    <td> <?php echo $row['nguoi_binh_luan']; ?> </td> 
	    <td> <?php echo $row['email']; ?> </td>
	    <td> <?php echo $row['noi_dung_binh_luan']; ?> </td>
	    <td> <?php echo $row['ngay_binh_luan']; ?> </td>
	    <td> <?php if($row['trang_thai'] == 1){ 
	    		echo 'Hiển thị';
	    	}else{
	    		echo 'Ẩn';
	    	} ?></td>	    
	    <td>
	    	<a href="modules/comment/thay_doi_tinh_trang_binh_luan.php?ma_binh_luan=<?php echo $row['ma_binh_luan'] ?>&trang_thai=1">
	        	<i class="far fa-eye" style="color: black"></i>
	        </a>
			
	        |

	        <a href="modules/comment/thay_doi_tinh_trang_binh_luan.php?ma_binh_luan=<?php echo $row['ma_binh_luan'] ?>&trang_thai=2">
	        	<i class="fas fa-eye-slash" style="color: black"></i>
	        </a>
    	</td>
	  </tr>
	   <?php endforeach ?>
	</table>
</div>