<form action="modules/blog/process.php" method="post" enctype="multipart/form-data">
    <div class="add-blog-content">
        <?php 
            if(isset($error['fileUpload'])){
                ?>
                <p style="color: red"><?php echo $error['fileUpload'] ?></p>
                <?php
            }
        ?>
    	<table> 	
        	<tr>
        		<td>
                    <label class="color">Tiêu đề</label>
                    <input type="text" name="title">
                </td>
    		</tr>   
            <tr>
                <td>
                    <label class="color">Nội dung ngắn</label>
                    <textarea name="short_content" id="ndn"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Hình ảnh</label>
                    <input type="file" name="fileUpload" style="margin:auto; vertical-align: bottom;">
                </td>
            </tr>
            
            <tr>
                <td>
                    <label class="color">Nội dung chi tiết</label>
                    <textarea name="detail_content" id="editor1" ></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Tác giả</label>
                    <input type="text" name="author">
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