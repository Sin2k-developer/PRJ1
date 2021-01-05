<?php 
    $sql = "SELECT * FROM admin WHERE ma_admin = '$_GET[id]'";
    $result_Update = mysqli_query($con,$sql);   
    $row = mysqli_fetch_array($result_Update);
?>

<form action="modules/admin/process.php?id=<?php echo $row['ma_admin'] ?>" method="post">
    <div class="fix-user-content">
        <table> 
            <tr>
                <td width="30%"><label class="color">Mã admin:</label></td>
                <td width="70%"><input type="text" name="id_admin" readonly="readonly" value="<?php echo $row['ma_admin'] ?>"></td>
            </tr>   
            <tr>
                <td><label class="color">Tên admin:</label></td>
                <td><input type="text" name="admin" value="<?php echo $row['ten_admin'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Tên tài khoản:</label></td>
                <td><input type="text" name="username" value="<?php echo $row['tai_khoan'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Số điện thoại:</label></td>
                 <td><input type="text" name="phone" value="<?php echo $row['sdt'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Email:</label></td>
                 <td><input type="text" name="email" value="<?php echo $row['email'] ?>"></td>
            </tr>
            <tr>
                 <td><label class="color">Địa chỉ:</label></td>
                 <td><input type="text" name="address" value="<?php echo $row['dia_chi'] ?>"></td>
            </tr>
            <tr>
                <td><label class="color">Giới tính:</label></td>
                 <td><input type="radio" name="gender" value="1" <?php if($row["gioi_tinh"]==1){echo "checked";}?>/> Nam &nbsp; &nbsp; &nbsp; <input type="radio" name="gender" value="0" <?php if($row["gioi_tinh"]==0){echo "checked";}?>/> Nữ</td>
            </tr>
            <tr>
                <td colspan="2">            
                    <input type="submit" name="fix" id="sua" value="Cập nhật">
                    <input type="reset" name="" id="huy" value="Hủy">
                </td>
            </tr>
        </table>
    </div>
</form>