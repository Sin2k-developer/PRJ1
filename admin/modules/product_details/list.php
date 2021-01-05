<?php 
	$tim_kiem = "";
	if(isset($_GET['tim_kiem_sp'])){
		$tim_kiem = $_GET['tim_kiem_sp'];
	}
	$sql = " SELECT
    ma_san_pham,ten_san_pham,anh,gia,sales,mo_ta,noi_dung,tinh_trang,size,ten_hang,ten_loai_san_pham,ten_danh_muc
    FROM san_pham
    JOIN size ON san_pham.ma_size = size.ma_size
    JOIN hang ON san_pham.ma_hang = hang.ma_hang
    JOIN loai_san_pham ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham
    JOIN danh_muc ON san_pham.ma_danh_muc = danh_muc.ma_danh_muc
    WHERE ten_san_pham LIKE '%$tim_kiem%' ORDER BY ma_san_pham DESC
    ";
	$array = mysqli_query($con,$sql);
	$tong_so_san_pham = mysqli_num_rows($array);
	$limit = 10;
	$trang_hien_tai = 1;
	if(isset($_GET['page'])){
		$trang_hien_tai = $_GET['page'];
	}
	$trang_ke_tiep = ($trang_hien_tai - 1)*$limit;
	$so_trang = ceil($tong_so_san_pham / $limit);
	$sql = "$sql limit $limit offset $trang_ke_tiep";
    $array = mysqli_query($con,$sql); 
    if($tong_so_san_pham > 0){ 
?>

<div class="list-product_details-heading">
    <div id="buttons">
        <a href="index.php?manage=product_details&action=add"><i class="fas fa-plus"></i>Thêm mới</a>
    </div>
    <form>
        <div class="search-box-news">
        	<input class="search-txt" type="text" name="tim_kiem_sp" value="<?php echo $tim_kiem ?>" placeholder="Type to search" required="required"/>
            <input class="search-btn" type="submit" name="search" value="Search"/>       	
        </div>
    </form>
</div>
<div class="list-product_details-content">
    <table>
      <tr>
        <th style="color:brown">ID</th>
        <th style="color:brown">Tên sản phẩm</th>
        <th style="color:brown">Hình ảnh</th>
        <th style="color:brown">Giá</th>
        <th style="color:brown">Sales</th>
        <th style="color:brown">Mô tả</th>     
        <th style="color:brown">Tình trạng</th>
        <th style="color:brown">Size</th>
        <th style="color:brown">Hãng</th>
        <th style="color:brown">Loại sản phẩm</th>
        <th style="color:brown">Danh mục</th>      
        <th colspan="2" style="color:brown">Tác vụ</th>
      </tr>
      <?php
        foreach ($array as $row):       
      ?>
      <tr>
        <td> <?php echo $row['ma_san_pham'] ?></td>
        <td> <?php echo $row['ten_san_pham'] ?></td>
        <td> <img src="modules/product_details/uploads_product/<?php echo $row['anh'] ?>"/></td>
        <td> <?php echo $row['gia'] ?></td>
        <td> <?php echo $row['sales'] ?></td>
        <td> <?php echo $row['mo_ta'] ?></td>
        <td> <?php if($row['tinh_trang'] == 1){ echo "Còn hàng";}else{ echo "Hết hàng";} ?></td>
        <td> <?php echo $row['size'] ?></td>
        <td> <?php echo $row['ten_hang'] ?></td>
        <td> <?php echo $row['ten_loai_san_pham'] ?></td>
        <td> <?php echo $row['ten_danh_muc'] ?></td>   
        <td><a href="index.php?manage=product_details&action=fix&id=<?php echo $row['ma_san_pham'] ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="modules/product_details/process.php?id=<?php echo $row['ma_san_pham'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?');"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
      <?php
        endforeach
      ?>
        <?php }else{ ?>
            <?php echo'<div class="infoss">
                        <p> Sản phẩm không tìm thấy! </p>
                        
                    </div>'; ?>
        <?php } ?>  
    </table>
    <div id="phantrang">
		<?php
			for($i = 1; $i <= $so_trang;$i++){
				?>
					<a href="?manage=product_details&action=list&page=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"><button class="so"><?php echo $i; ?></button></a>
				<?php
			}
		?>    	
    </div>
</div>
