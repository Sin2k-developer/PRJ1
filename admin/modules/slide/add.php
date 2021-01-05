<form action="modules/slide/process.php" method="post" enctype="multipart/form-data">
    <div class="add-slide-content">
    	<table> 	
        	<tr>
        		<td>
                    <label class="color">Tên ảnh bìa</label>
                    <input type="text" name="banner_name" required>
                </td>
    		</tr>   
            <tr>
                <td>
                    <label class="color">Màu</label>
                    <input type="text" name="color" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Ảnh bìa</label>
                    <input type="file" name="fileUpload" style="margin:auto; vertical-align: bottom;">
                </td>
            </tr>
            
            <tr>
                <td>
                    <label class="color">Nội dung</label>
                    <textarea name="content" id="editor1" ></textarea>
                </td>
            </tr>
    		<tr>
        		<td colspan="2">
            		<div align="center">
                		<input type="submit" name="add" id="add" value="Thêm">
            		</div>
        		</td>
  			</tr>
            <script>
                    CKEDITOR.replace('editor1');
            </script>
        </table>
    </div>
</form>