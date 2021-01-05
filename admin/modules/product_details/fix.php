<?php 
    $sql = "SELECT * FROM san_pham WHERE ma_san_pham = '$_GET[id]'";
	$result_Update = mysqli_query($con,$sql);	
	$rowsp = mysqli_fetch_array($result_Update);
?>

<form action="modules/product_details/process.php?id=<?php echo $rowsp['ma_san_pham'] ?>" method="post">
    <div class="fix-product_details-content">
    	<table> 
            <tr>
            	<td>
                    <label class="color">Mã sản phẩm</label>
                    <input type="text" readonly="readonly" value="<?php echo $rowsp['ma_san_pham'] ?>">
                </td>
            </tr>	
        	<tr>
        		<td>
                    <label class="color">Tên sản phẩm</label>
                    <input type="text" name="product_name" value="<?php echo $rowsp['ten_san_pham'] ?>">
                </td>
    		</tr>
            <tr>
                <td>
                    <label class="color">Giá sản phẩm</label>
                    <input type="text" name="product_price" value="<?php echo $rowsp['gia'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Hình ảnh</label>
                    <input type="file" name="fileUpload" style="margin:auto" ><img src="modules/product_details/uploads_product/<?php echo $rowsp['anh'] ?>"  width="60px" height="60px"/>
                </td>
            </tr>       
            <tr>
                <td>
                    <label class="color">Mô tả</label>
                    <textarea name="description" id="ndn"><?php echo $rowsp['mo_ta']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Giảm giá</label>
                     <input type="text" name="sale" value="<?php echo $rowsp['sales'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Nội dung</label>
                    <textarea name="content" id="editor1"><?php echo $rowsp['noi_dung'] ?></textarea>
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
                            if($rowsp['ma_size'] == $row_sz['ma_size']){
                                ?>
                                    <option selected="selected" value="<?php echo($row_sz["ma_size"])?>"><?php echo($row_sz["size"])?></option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo($row_sz["ma_size"])?>"><?php echo($row_sz["size"])?></option>
                                <?php
                            }   
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
                            if($rowsp['ma_hang'] == $row_hang['ma_hang']){
                                ?>
                                    <option selected="selected" value="<?php echo($row_hang["ma_hang"])?>"><?php echo($row_hang["ten_hang"])?></option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo($row_hang["ma_hang"])?>"><?php echo($row_hang["ten_hang"])?></option>
                                <?php
                            }   
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
                            if($rowsp['ma_loai_san_pham'] == $row_lsp['ma_loai_san_pham']){
                                ?>
                                    <option selected="selected" value="<?php echo($row_lsp["ma_loai_san_pham"])?>"><?php echo($row_lsp["ten_loai_san_pham"])?></option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo($row_lsp["ma_loai_san_pham"])?>"><?php echo($row_lsp["ten_loai_san_pham"])?></option>
                                <?php
                            }
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
                            if($rowsp['ma_danh_muc'] == $row_danhmuc['ma_danh_muc']){
                                ?>
                                    <option selected="selected" value="<?php echo($row_danhmuc["ma_danh_muc"])?>"><?php echo($row_danhmuc["ten_danh_muc"])?></option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo($row_danhmuc["ma_danh_muc"])?>"><?php echo($row_danhmuc["ten_danh_muc"])?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="color">Tình trạng</label>
                    <select name="status">
                        <?php 
                            if($rowsp['tinh_trang'] == 1){
                                ?>
                                    <option selected="selected" value="1">Còn Hàng</option>
                                    <option value="0">Hết Hàng</option>
                                <?php
                            }else{
                                ?>  
                                    <option value="0">Hết Hàng</option>
                                    <option value="1">Còn Hàng</option>
                                <?php
                            }
                        ?>
                     
                    </select><br />
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
