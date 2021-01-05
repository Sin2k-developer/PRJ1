<?php 
	$tim_kiem = "";
	if(isset($_GET['tim_kiem_tt'])){
		$tim_kiem = $_GET['tim_kiem_tt'];
	}
	$sql = "SELECT * FROM tin_tuc WHERE tac_gia LIKE '%$tim_kiem%' ORDER BY ma_tin_tuc DESC";
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

<div class="list-blog-heading">
    <div id="buttons">
        <a href="index.php?manage=blog&action=add"><i class="fas fa-plus"></i>Thêm mới</a>
    </div>
    <form>
        <div class="search-box-news">
        	<input class="search-txt" type="text" name="tim_kiem_tt" value="<?php echo $tim_kiem ?>" placeholder="Type to search" required="required"/>
            <input class="search-btn" type="submit" name="search" value="Search"/>       	
        </div>
    </form>
</div>
<div class="list-blog-content">
    <table>
      <tr>
        <th style="color:brown">ID</th>
        <th style="color:brown">Tiêu đề</th>
        <th style="color:brown">Nội dung ngắn</th>
        <th style="color:brown">Hình ảnh</th>
        <th style="color:brown">Tác giả</th>
        <th style="color:brown">Date</th>
        <th colspan="2" style="color:brown">Tác vụ</th>
      </tr>
      <?php
        if($tong_so_san_pham > 0) 
        foreach ($array as $row):       
      ?>
      <tr>
        <td> <?php echo $row['ma_tin_tuc'] ?></td>
        <td> <?php echo $row['tieu_de'] ?></td>
        <td> <?php echo $row['noi_dung_ngan'] ?></td>
        <td> <img src="modules/blog/uploads_tt/<?php echo $row['anh'] ?>"/></td>
        <td> <?php echo $row['tac_gia'] ?></td>
        <td> <?php echo $row['ngay_dang_tin'] ?></td>
        <td><a href="index.php?manage=blog&action=fix&id=<?php echo $row['ma_tin_tuc'] ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="modules/blog/process.php?id=<?php echo $row['ma_tin_tuc'] ?>"  onclick="return confirm('Bạn có chắc chắn xóa bài viết không?');"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
      <?php
        endforeach
      ?>
    </table>
    <div id="phantrang">
		<?php
			for($i = 1; $i <= $so_trang;$i++){
				?>
					<a href="?manage=blog&action=list&page=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"><button class="so"><?php echo $i; ?></button></a>
				<?php
			}
		?>    	
    </div>
</div>
