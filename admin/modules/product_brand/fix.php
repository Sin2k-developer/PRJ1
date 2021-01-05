<?php
    $sql = "SELECT * FROM hang WHERE ma_hang = '$_GET[id]'";
	$result_strUpdate = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result_strUpdate);
?>

<form action="modules/product_brand/process.php?id=<?php echo $row['ma_hang'] ?>" method="post">
    <div class="fix-brand-content">
        <table>
            <tr>
                <td><label class="color">Mã hãng</label></td>
                <td><input type="text" readonly="readonly" value="<?php echo $row['ma_hang'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Tên hãng</label></td>
                <td><input type="text" name="brand" value="<?php echo $row['ten_hang'] ?> "></td>
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