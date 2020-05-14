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


    $sql = "SELECT * FROM SANPHAM WHERE MASP = " . $_GET['MALOAI'];

    $result = mysqli_query($conn, $sql);

    $listProduct = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listProduct[] = $row;
        }

        
    }


    $sql = "SELECT * FROM LOAISP ";

    $result = mysqli_query($conn, $sql);

    $listloaisp = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listloaisp[] = $row;
        }

       
    }

?>




<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_product.css">
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
                        <a href="introduce.html">Giới thiệu</a>
                        <a href="cart.html">Giỏ Hàng</a>
                        <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")' >Hotline: 1900</a>
                        <input type="text" placeholder="Tìm kiếm..">
                    </div>
                </div>
            </div>

            <div class="nav" style="clear: both;">
                    <ul>
                    <?php
                   for ($i = 0; $i < count($listloaisp); $i++) {
                       
                    echo '<li><a href="product.php?MALOAI='. $listloaisp[$i]['MALOAI'] .'"title="IPhone" ><img src="'. $listloaisp[$i]['ImgPath'] .'"></a></li>';

              
                }

                   
                    ?> 
            
                    </ul>
            </div>
   

            
            <div class="productArea">
                <div class="production_selling">

                <?php
                    for ($i = 0; $i < count($listProduct); $i++) {

                        echo '<div class="product">';
                        echo            '<div class="pImage">';
                        echo                '<a href="iphonedetail/iphone11promax.php" ><img src="'. $listProduct[$i]['ImgPath'] .'"/></a>';
                        echo            '</div>';
                        echo               ' <div class="pInfo">';
                        echo                    '<p><strong>'. $listProduct[$i]['TENSP'] .'</strong></p>';
                        echo                    '<h3 class="amount">'. $listProduct[$i]['GIA'] .'₫</h3>';
                        echo                '<span>Màn hình: 6.5", Super Retina XDR</span><br>'     ;                   
                        echo            '</div>';
                        echo        '<div class="buybutton">';
                        echo            '<button class="buy">mua</button>';
                        echo            '<button class="buygop">mua trả góp</button>';
                        echo        '</div>';
                        echo    '</div>';
                    }
                ?> 

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