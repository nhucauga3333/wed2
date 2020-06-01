<div class="productArea">
    <h1>Sản phẩm bán chạy</h1>
    <div class="production_selling">
        <?php
        for ($i = 0; $i < count($listProduct); $i++) {
            echo "<div class='product'>";
            echo        "<div class='pImage'>";
            echo        '    <a href="ctsanpham.php?ID=' . $listProduct[$i]['ID'] . '" ><img src="image/iphone/iphone-7-plus-32gb.jpg"/></a>';
            echo        "</div>";
            echo        "<div class='pInfo'>";
            echo            "<p><strong>" . $listProduct[$i]['TenSP'] . "</strong></p>";
            echo            "<h3 class='amount'>" . $listProduct[$i]['Gia'] . "₫</h3>";
            echo            "<span>" . $listProduct[$i]['ID'] . "</span><br>";
            echo    "<span>Màn Hình: " . $listProduct[$i]['ManHinh'] . "</span><br>";
            echo    "<span>HĐH: " . $listProduct[$i]['HDH'] . "</span><br>";
            echo    "<span>Camera Sau: " . $listProduct[$i]['CameraSau'] . "</span><br>";
            echo    "<span>Camera Trước: " . $listProduct[$i]['CameraTruoc'] . "</span><br>";
            echo    "<span>CPU: " . $listProduct[$i]['CPU'] . "</span><br>";
            echo    "<span>Ram: " . $listProduct[$i]['Ram'] . "</span><br>";
            echo    "<span>Rom: " . $listProduct[$i]['Rom'] . "</span><br>";
            echo    "<span>Dung Lượng Pin: " . $listProduct[$i]['DungLuongPin'] . "</span>";

            echo        "</div>";
            echo "</div>";
        }
        ?>
    </div>



    <h1>Sản phẩm mới nhất</h1>
    <div class="production_selling">
        <div class="product">
            <div class="pImage">
                <a href="iphonedetail/iphone11promax.html"><img src="image/iphone/iphone-11-pro-max-512g.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>iPhone 11 Pro Max 512GB</strong></p>
                <h3 class="amount">43.990.000₫</h3>
                <span>Màn hình: 6.5", Super Retina XDR</span><br>
                <span>HĐH: iOS 13</span><br>
                <span>CPU: Apple A13 Bionic 6 nhân</span><br>
                <span>RAM: 4 GB, ROM: 512 GB</span><br>
                <span>Camera: 3 camera 12 MP, Selfie: 12 MP</span><br>
                <span>PIN: 3969 mAh</span>
            </div>
        </div>
        <div class="product">
            <div class="pImage">
                <a href="samsungdetail/samsungnote10.html"><img src="image/samsung/note10+.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Samsung Galaxy Note 10+</strong></p>
                <h3 class="amount">24.990.000₫</h3>
                <span>Màn hình: 6.8", Quad HD+ (2K+)</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Exynos 9825 8 nhân 64-bit</span><br>
                <span>RAM: 12 GB, ROM: 256 GB</span><br>
                <span>Camera: Chính 12 MP &amp; Phụ 12 MP, 16 MP, TOF 3D, Selfie: 10 MP</span><br>
                <span>PIN: 4300 mAh</span>
            </div>
        </div>
        <div class="product">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
        <div class="product border-right-1">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
    </div>

    <div class="production_selling">
        <div class="product border-top-1">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
        <div class="product border-top-1">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
        <div class="product border-top-1">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
        <div class="product border-top-1 border-right-1">
            <div class="pImage">
                <a href="xiaomidetail/xiaomiredminote7.html"><img src="image/xiaomi-redmi-note-7.jpg" /></a>
            </div>
            <div class="pInfo">
                <p><strong>Xiaomi Redmi Note 7 (4GB/64GB)</strong></p>
                <h3 class="amount">4.990.000₫</h3>
                <span>Màn hình: 6.3", Full HD+</span><br>
                <span>HĐH: Android 9.0 (Pie)</span><br>
                <span>CPU: Qualcomm Snapdragon 660 8 nhân</span><br>
                <span>RAM: 4 GB, ROM: 64 GB</span><br>
                <span>Camera: Chính 48 MP &amp; Phụ 5 MP, Selfie: 13 MP</span><br>
                <span>PIN: 4000 mAh</span>
            </div>
        </div>
    </div>
</div>