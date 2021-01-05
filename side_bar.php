<div class="side-bar">
    <?php 
        include 'db/connect.php';
        $sql_danhmuc = "select * from danh_muc";
        $result = mysqli_query($con,$sql_danhmuc);
    ?>
    <div class="category">
        <div class="healing-category">
            <div class="healing-category-img">
                <img src="images/menu.png" width="30px" height="30px">
            </div>
            <div class="healing-category-txt">
                <p>
                    Danh mục sản phẩm
                </p>
            </div>
        </div>
        <ul id="menutree">
            <?php
                while($row_danhmuc = mysqli_fetch_array($result)){
                ?>
            <?php if($row_danhmuc['ma_danh_muc'] == 1){ ?>
            <li class="collapse">
                <input type="checkbox" id="m0"/>
                <label for="m0">
                <a href="product1.php?category=1"><?php echo $row_danhmuc['ten_danh_muc'] ?></a>
                </label>
                <ul>
                    <li class="collapse">
                        <input type="checkbox" id="m1"/>
                        <label for="m1">
                            <a href="product2.php?category=1&id=3">Adidas</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=1&id=3&type=5">Ultra Boost</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=3&type=6">Alphabounce</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=3&type=7">Stan Smith</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=3&type=8">Yeezy</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m2"/>
                        <label for="m2">
                            <a href="product2.php?category=1&id=2">Nike</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=1&id=2&type=1">Air Max</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=2&type=2">Air Force 1</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=2&type=3">Air Zoom</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=2&type=4">Air Jordan 1</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m3"/>
                        <label for="m3">
                            <a href="product2.php?category=1&id=4">Vans</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=1&id=4&type=9">Old Skool</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=4&type=10">SK8-Hi</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m4"/>
                        <label for="m4">
                            <a href="product2.php?category=1&id=5">Puma</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=1&id=5&type=11">Smash</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=5&type=12">Muse X</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="product2.php?category=1&id=1">New Balance</a>
                        <span class="arw"></span>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m5"/>
                        <label for="m5">
                            <a href="product2.php?category=1&id=6">Converse</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=1&id=6&type=13">Jack Purcell</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=1&id=6&type=14">Chuck Taylor</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }else if($row_danhmuc['ma_danh_muc'] == 2){ ?>
            <li class="collapse">
                <input type="checkbox" id="m6"/>
                <label for="m6">
                <a href="product1.php?category=2"><?php echo $row_danhmuc['ten_danh_muc'] ?></a>
                </label>
                <ul>
                    <li class="collapse">
                        <input type="checkbox" id="m7"/>
                        <label for="m7">
                            <a href="product2.php?category=2&id=3">Adidas</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=2&id=3&type=5">Ultra Boost</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=3&type=6">Alphabounce</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=3&type=7">Stan Smith</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=3&type=8">Yeezy</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m8"/>
                        <label for="m8">
                            <a href="product2.php?category=2&id=2">Nike</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=2&id=2&type=1">Air Max</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=2&type=2">Air Force 1</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=2&type=3">Air Zoom</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=2&type=4">Air Jordan 1</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m9"/>
                        <label for="m9">
                            <a href="product2.php?category=2&id=4">Vans</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=2&id=4&type=9">Old Skool</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=4&type=10">SK8-Hi</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m10"/>
                        <label for="m10">
                            <a href="product2.php?category=2&id=5">Puma</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=2&id=5&type=11">Smash</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=5&type=12">Muse X</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="product2.php?category=2&id=1">New Balance</a>
                        <span class="arw"></span>
                    </li>
                    <li class="collapse">
                        <input type="checkbox" id="m11"/>
                        <label for="m11">
                            <a href="product2.php?category=2&id=6">Converse</a>
                            <span></span>
                        </label>
                        <ul>
                            <li>
                                <a href="product3.php?category=2&id=6&type=13">Jack Purcell</a>
                                <span class="childs"></span>
                            </li>
                            <li>
                                <a href="product3.php?category=2&id=6&type=14">Chuck Taylor</a>
                                <span class="childs"></span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }else{ ?>
            <?php }} ?>
        </ul>
    </div>
    <div class="search-price-product">
        <div class="title-price">
            <p>Giá tiền</p>
        </div>
        <form class="form-price" action="search.php" method="get" onsubmit="return checkPrice()">
            <input type="hidden" name="search" />
            <select name="price" id="select_price">
                <option value="0"> Giá sản phẩm </option>
                <option value="Dưới 1.000.000₫">Dưới 1.000.000 ₫</option>
                <option value="1.000.000₫ - 3.000.000₫">1.000.000 ₫ - 3.000.000 ₫</option>
                <option value="3.000.000₫ - 5.000.000₫">3.000.000 ₫ - 5.000.000 ₫</option>
                <option value="5.000.000₫ - 8.000.000₫">5.000.000 ₫ - 8.000.000 ₫</option>
                <option value="8.000.000₫ - 10.000.000₫">8.000.000 ₫ - 10.000.000 ₫</option>
                <option value="Trên 10.000.000₫">Trên 10.000.000 ₫</option>
            </select>
            <span class="fix-price" id="err_select_price"></span>
            <button type="submit" class="btn-tk">Tìm kiếm</button>
        </form>
    </div>
    <div class="news-product">
        <div class="title-news">
            <p>Bài viết mới nhất</p>
            <span></span>
        </div>
        <div class="content-news">
            <?php
                include 'db/connect.php';
                $sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC LiMIT 5";
                $array = mysqli_query($con,$sql);
                ?>
            <?php
                while($row_news = mysqli_fetch_array($array)){
                ?>
            <div class="content-news-box">
                <img src="admin/modules/blog/uploads_tt/<?php echo $row_news['anh'] ?>" width="60px" height="60px">
                <a href="blog_detail.php?matt=<?php echo $row_news['ma_tin_tuc'] ?>">
                    <h3><?php echo $row_news['tieu_de'] ?></h3>
                </a>
                <span>
                    <?php
                        $date = $row_news['ngay_dang_tin'];
                        $timestamp = strtotime($date);
                        $new_date = date("d/m/Y",$timestamp);
                        echo $new_date;
                    ?>
                </span>
            </div>
            <?php } ?>
        </div>
    </div>
</div>