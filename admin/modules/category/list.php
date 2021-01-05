<?php
  $sql = "SELECT * FROM danh_muc ORDER BY ma_danh_muc DESC";
	$result = mysqli_query($con,$sql);
?>

<div class="list-category-heading">
    <div id="buttons">
        <a href="index.php?manage=category&action=add"><i class="fas fa-plus"></i>Thêm mới</a>
    </div>
</div>
<div class="list-category-content">
    <table>
      <tr>
        <th style="color:brown">Mã danh mục</th>
        <th style="color:brown">Tên danh mục</th>
        <th colspan="2" style="color:brown">Tác vụ</th>
      </tr>
      
      <?php
        while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td> <?php echo $row['ma_danh_muc'] ?></td>
        <td> <?php echo $row['ten_danh_muc'] ?></td>
        <td><a href="index.php?manage=category&action=fix&id=<?php echo $row['ma_danh_muc'] ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="modules/category/process.php?id=<?php echo $row['ma_danh_muc'] ?>"  onclick="return confirm('Bạn có chắc chắn xóa không?');"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
      <?php
        }
      ?>
    </table>
</div>	

