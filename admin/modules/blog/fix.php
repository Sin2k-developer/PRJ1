<?php 
    $sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = '$_GET[id]'";
	$result_Update = mysqli_query($con,$sql);	
	$row = mysqli_fetch_array($result_Update);
?>
<form action="modules/blog/process.php?id=<?php echo $row['ma_tin_tuc']; ?>" method="post" enctype="multipart/form-data">
    <div class="fix-blog-content">
    	<table>
        	<tr>
        		<td>
                    <label class="color">Mã tin tức</label>
                    <input type="text" readonly="readonly" value="<?php echo $row['ma_tin_tuc']; ?>">
                </td>
    		</tr> 	
        	<tr>
        		<td>
                    <label class="color">Tiêu đề</label>
                    <input type="text" name="title"  value="<?php echo $row['tieu_de']; ?>">
                </td>
    		</tr>
            <tr>
                <td>
                    <label class="color">Nội dung ngắn</label>
                    <textarea name="short_content" id="ndn"><?php echo $row['noi_dung_ngan']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Hình ảnh</label>
                    <input type="file" name="fileUpload" style="margin:auto; vertical-align: bottom;" ><img src="modules/blog/uploads_tt/<?php echo $row['anh'] ?>"  width="60px" height="60px"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Nội dung chi tiết</label>
                    <textarea name="detail_content" id="editor1" ><?php echo $row['noi_dung'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Tác giả</label>
                    <input type="text" name="author" value="<?php echo $row['tac_gia'] ?>">
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
