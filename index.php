<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qldd";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM Product ";

    $result = mysqli_query($conn, $sql);

    $listProduct = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listProduct[] = $row;
        }

        echo count($listProduct);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Thế giới di động</title>
    </head>
    <body>
        <div class="main">

            <div class="header">
                <div class="logo" style="float: left;">
                    <a href="index.html"> <img src="image/logo_thegioididong.png" alt="logothegioididong"  width="196px"></a>
                </div>
                <div class="searchBar" >
                    <div class="topnav" style="padding-top:14px;padding-bottom:18px">                           
                        <a class="active" href="index.html">Trang chủ</a>
                        <a href="introduce.html"> Giới thiệu</a>
                        <a href="cart.html">Giỏ Hàng</a>
                        <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")' >Hotline: 1900</a>
                        <input type="text" placeholder="Tìm kiếm..">
                    </div>
                </div>
            </div>

            <div class="nav" style="clear: both;">
                    <ul>
                            <li><a href="iphone_product.html"title="IPhone" ><img src="image/iPhone-(Apple)42-b_16.jpg"></a></li>
                            <li><a href="samsung_product.html"title="SamSung"><img src="image/Samsung42-b_25.jpg"></a></li>
                            <li><a href="oppo_product.html"title="Oppo"><img src="image/OPPO42-b_57.jpg"></a></li>
                            <li><a href="xiaomi_product.html"title="Xiaomi"><img src="image/Xiaomi42-b_31.png"></a></li>
                            <li><a href="vivo_product.html"title="Vivo"><img src="image/Vivo42-b_50.jpg"></a></li>
                            <li><a href="huawei_product.html"title="Huawei"><img src="image/Huawei42-b_30.jpg"></a></li>
                            <li><a href="realme_product.html"title="realme"><img src="image/Realme42-b_37.png"></a></li>
            
                    </ul>
            </div>
   
            <div class="content" style="clear: both;">
                <div class ="left">
                    <a href="#" ><img src="image/iphone_index.png"/></a>
                   
                </div>

                <div class ="right">
                    <div class ="top">
                        <a href="#" ><img src="image/quangcao1_index.png"/></a>
                    </div>

                    <div class ="bottom">
                        <a href="#" ><img src="image/quangcao2_index.png"/></a>
                    </div>

                </div>
            </div>
            
            <div class="productArea">
                <h1>Sản phẩm bán chạy</h1>
                <div class="production_selling">
                <?php
                    for ($i = 0; $i < count($listProduct); $i++) {
                       
                        echo "<div class='product'>";
                        echo        "<div class='pImage'>";
                        echo        "    <a href='iphonedetail/iphone7plus.html' ><img src='image/iphone/iphone-7-plus-32gb.jpg'/></a>";
                        echo        "</div>";
                        echo        "<div class='pInfo'>";
                        echo            "<p><strong>" . $listProduct[$i]['Name'] ."</strong></p>";
                        echo            "<h3 class='amount'>" . $listProduct[$i]['Price'] ."₫</h3>";
                        echo            "<span>" . $listProduct[$i]['Description'] . "</span><br>";
                        echo        "</div>";
                        echo"</div>";
                    }

                   
                ?> 
                                            
                </div>
               
                

                <h1>Sản phẩm mới nhất</h1>
                <div class="production_selling">
                    <div class="product">
                        <div class="pImage">
                            <a href="iphonedetail/iphone11promax.html" ><img src="image/iphone/iphone-11-pro-max-512g.jpg"/></a>
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
                            <a href="samsungdetail/samsungnote10.html" ><img src="image/samsung/note10+.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                            <a href="xiaomidetail/xiaomiredminote7.html" ><img src="image/xiaomi-redmi-note-7.jpg"/></a>
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
                       
            <div class="myfooter">
                    
                <center style="padding-top: 60px;">
               
                    <h2><span style="color: red;">Tập Đoàn</span></h2>
    
                    <p><strong>Địa chỉ: 273, An Dương Vương, Phường 3, Quận 5, TP.HCM</strong></p>
                    <p>Liên he: 01207288007</p>
    
                    <p>hdcpaint.com</p>
                    <p>Copyright © by HDC Group</p>
                </center>
              
            </div>

        </div>   
                
    </body>
</html>