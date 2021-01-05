<?php 
    $sql = "SELECT * FROM banner WHERE ma_anh_bia = '$_GET[id]'";
	$result_Update = mysqli_query($con,$sql);	
	$row = mysqli_fetch_array($result_Update);
?>
<form action="modules/slide/process.php?id=<?php echo $row['ma_anh_bia']; ?>" method="post" enctype="multipart/form-data">
    <div class="fix-slide-content">
    	<table>
        	<tr>
        		<td>
                    <label class="color">Mã ảnh bìa</label>
                    <input type="text" readonly="readonly" value="<?php echo $row['ma_anh_bia']; ?>">
                </td>
    		</tr> 	
        	<tr>
        		<td>
                    <label class="color">Tên ảnh bìa</label>
                    <input type="text" name="banner_name"  value="<?php echo $row['ten_anh_bia']; ?>">
                </td>
    		</tr>
            <tr>
                <td>
                    <label class="color">Màu</label>
                    <input type="text" name="color" value="<?php echo $row['mau']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Ảnh bìa</label>
                    <input type="file" name="fileUpload" style="margin:auto; vertical-align: bottom;" ><img src="modules/slide/uploads_slide/<?php echo $row['anh_bia'] ?>"  width="60px" height="60px"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Nội dung</label>
                    <textarea name="content" id="editor1" ><?php echo $row['noi_dung'] ?></textarea>
                </td>
            </tr>
    		<tr>
        		<td colspan="2">
            		<div align="center">
                		<input type="submit" name="fix" id="sua" value="Sửa"> <input type="reset" value="Hủy">
            		</div>
        		</td>
  			</tr>
            <script>
                    CKEDITOR.replace('editor1');
            </script>
        </table>
    </div>
</form>
