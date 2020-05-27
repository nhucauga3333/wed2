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


    $sql = "SELECT S.ID,  S.TenSP,S.Gia,L.TenLoai
    FROM SANPHAM S
    INNER JOIN loaisp L ON S.MaLoai = L.ID";

    $result = mysqli_query($conn, $sql);

    $listProduct = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listProduct[] = $row;
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

            


            <a href = "themsanpham.php">Thêm mới</a>
            <div class="productArea">
                <table>
                    <tr>
                        <td>STT</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá</td>
                        <td>Loại</td>
                        <td></td>
                    </tr>

                    <?php
                        for ($i = 0; $i < count($listProduct); $i++) {

                            $xoasp = "window.location.href = 'xoasanpham.php?ID=".$listProduct[$i]['ID']."'" ;

                            $suasp = "window.location.href = 'suasanpham.php?ID=".$listProduct[$i]['ID']."'" ;
                        echo    '<tr>';
                        echo        '<td>'.($i+1).'</td>';
                        echo        '<td>'.$listProduct[$i]['TenSP'].'</td>';
                        echo        '<td>'.$listProduct[$i]['Gia'].'</td>';
                        echo        '<td>'.$listProduct[$i]['TenLoai'].'</td>';
                        echo        '<td><button onclick = "'.$suasp.'">Sửa</button> <button onclick = "'.$xoasp.'">Xóa</button></td>';
                        echo    '</tr>';

   
                        }
                    ?>
                </table>
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