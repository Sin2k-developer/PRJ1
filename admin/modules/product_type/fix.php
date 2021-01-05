<?php
    $sql = "SELECT * FROM loai_san_pham WHERE ma_loai_san_pham = '$_GET[id]'";
	$result_strUpdate = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result_strUpdate);
?>

<form action="modules/product_type/process.php?id=<?php echo $row['ma_loai_san_pham'] ?>" method="post">
    <div class="fix-brand-content">
        <table>
            <tr>
                <td><label class="color">Mã loại sản phẩm</label></td>
                <td><input type="text" readonly="readonly" value="<?php echo $row['ma_loai_san_pham'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Tên loại sản phẩm</label></td>
                <td><input type="text" name="type" value="<?php echo $row['ten_loai_san_pham'] ?> "></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input type="submit" name="fix" value="Sửa"> 
                        <input type="reset" value="Hủy">
                    </div>
                </td>
            </tr>
        </table>
	</div>
</form>