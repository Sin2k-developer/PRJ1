<?php
    $sql = "SELECT * FROM danh_muc WHERE ma_danh_muc = '$_GET[id]'";
	$result_strUpdate = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result_strUpdate);
?>

<form action="modules/category/process.php?id=<?php echo $row['ma_danh_muc'] ?>" method="post">
    <div class="fix-category-content">
        <table>
            <tr>
                <td><label class="color">Mã danh mục</label></td>
                <td><input type="text" readonly="readonly" value="<?php echo $row['ma_danh_muc'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Tên danh mục</label></td>
                <td><input type="text" name="category" value="<?php echo $row['ten_danh_muc'] ?> "></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input type="submit" name="fix" value="Sửa"> <input type="reset" value="Hủy">
                    </div>
                </td>
            </tr>
        </table>
	</div>
</form>