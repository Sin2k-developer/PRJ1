<?php
  $sql = "SELECT * FROM hang ORDER BY ma_hang DESC";
	$result = mysqli_query($con,$sql);
	$dem = mysqli_num_rows($result);
?>

<div class="list-brand-heading">
    <div id="buttons">
        <a href="index.php?manage=product_brand&action=add"><i class="fas fa-plus"></i>Thêm mới</a>
    </div>
</div>
<div class="list-brand-content">
    <table>
      <tr>
        <th style="color:brown">Mã hãng</th>
        <th style="color:brown">Hãng</th>
        <th colspan="2" style="color:brown">Tác vụ</th>
      </tr>
      
      <?php
        $so_san_pham_1_trang = 6;
        $tong_so_san_pham = mysqli_num_rows($result);
        $so_trang = ceil($tong_so_san_pham/$so_san_pham_1_trang);
        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $start = ($page - 1) * $so_san_pham_1_trang;
        $sql = "SELECT * FROM hang ORDER BY ma_hang DESC LIMIT $start,$so_san_pham_1_trang";
        $result_trang = mysqli_query($con, $sql);
        if($dem > 0)
        while($row = mysqli_fetch_array($result_trang)){
      ?>
      <tr>
        <td> <?php echo $row['ma_hang'] ?></td>
        <td> <?php echo $row['ten_hang'] ?></td>
        <td><a href="index.php?manage=product_brand&action=fix&id=<?php echo $row['ma_hang'] ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="modules/product_brand/process.php?id=<?php echo $row['ma_hang'] ?>"  onclick="return confirm('Bạn có chắc chắn xóa không?');"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
      <?php
        }else 
            echo "<script>
                  alert('Không có dữ liệu trong CSDL');
             </script>";
      ?>
    </table>
	  <div id="phantrang">
		<?php
			for($i = 1; $i <= $so_trang;$i++){
				?>
            <a href="?manage=product_brand&action=list&page=<?php echo $i ?>"><button class="so"><?php echo $i; ?></button></a>
            <?php
        }
		?>
	  </div>
</div>	

