<form action="modules/product_details/process.php" method="post" enctype="multipart/form-data">
    <div class="add-product_details-content">
    	<table> 	
        	<tr>
        		<td>
                    <label class="color">Tên sản phẩm</label>
                    <input type="text" name="product_name">
                </td>
    		</tr>
            <tr>
                <td>
                    <label class="color">Giá sản phẩm</label>
                    <input type="text" name="product_price">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Hình ảnh</label>
                    <input type="file" name="fileUpload">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Mô tả</label>
                    <textarea name="description" id="ndn"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Giảm giá</label>
                   <input type="text" name="sale" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Nội dung</label>
                    <textarea name="content" id="editor1"></textarea>
                </td>
            </tr>             
            <tr>
                <td>
                    <label class="color">Size</label>
                    <select name="size">
                        <?php
                        $sql = "SELECT * FROM size";
                        $result_sz=mysqli_query($con,$sql);
                        while($row_sz=mysqli_fetch_array($result_sz))
                        {
                            ?>
                            <option value="<?php echo($row_sz["ma_size"])?>"><?php echo($row_sz["size"])?></option>
                            <?php   
                            }
                        ?>
                    </select><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Hãng</label>
                    <select name="brand">
                        <?php
                        $sql = "SELECT * FROM hang";
                        $result_hang=mysqli_query($con,$sql);
                        while($row_hang=mysqli_fetch_array($result_hang))
                        {
                            ?>
                            <option value="<?php echo($row_hang["ma_hang"])?>"><?php echo($row_hang["ten_hang"])?></option>
                            <?php   
                            }
                        ?>
                    </select><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Loại sản phẩm</label>
                    <select name="product_type" >
                        <?php
                        $sql = "SELECT * FROM loai_san_pham";
                        $result_lsp=mysqli_query($con,$sql);
                        while($row_lsp=mysqli_fetch_array($result_lsp))
                        {
                            ?>
                            <option value="<?php echo($row_lsp["ma_loai_san_pham"])?>"><?php echo($row_lsp["ten_loai_san_pham"])?></option>
                            <?php   
                            }
                        ?>
                    </select><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Danh mục</label>
                    <select name="category" >
                        <?php
                        $sql = "SELECT * FROM danh_muc";
                        $result_danhmuc=mysqli_query($con,$sql);
                        while($row_danhmuc=mysqli_fetch_array($result_danhmuc))
                        {
                            ?>
                            <option value="<?php echo($row_danhmuc["ma_danh_muc"])?>"><?php echo($row_danhmuc["ten_danh_muc"])?></option>
                            <?php   
                            }
                        ?>
                    </select><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Tình trạng</label>
                    <select name="status">
                        <option value="1">Còn Hàng</option>
                        <option value="0">Hết Hàng</option>
                    </select><br />
                </td>
            </tr>      
    		<tr>
        		<td colspan="2">
            		<div align="center">
                		<input type="submit" name="add" id="them" value="Thêm">
            		</div>
        		</td>
  			</tr>
            <script>
                    CKEDITOR.replace('editor1');
            </script>
        </table>
    </div>
</form>
