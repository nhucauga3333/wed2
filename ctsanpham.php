
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


    $sql = "SELECT * FROM SANPHAM WHERE ID = " . $_GET['ID'];


    $result = mysqli_query($conn, $sql);

    $listProduct = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listProduct[] = $row;
        }
    }

$product = $listProduct[0];



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
        <link rel="stylesheet" type="text/css" href="style_detail.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Thế giới di động</title>


        <script>
        function openDetail()
        {
           var obj=document.getElementById("hidden");
           obj.setAttribute("style","display:block");
         
        }
        function closeDetail()
        {
            var obj=document.getElementById("hidden");
            obj.setAttribute("style","display:none");
        }

        function themsanpham(){

            
            var listsanpham = [];
            var giohang =  localStorage.getItem("giohang");
            

            if(giohang.length>0){
                listsanpham = JSON.parse(giohang);
            }

            var hinhanh = document.getElementById("hinhanh").getAttribute("src");
            var tensp = document.getElementById("tensp").innerHTML;
            var gia = document.getElementById("gia").innerHTML;
            var soluong = 1;
            var sanpham = {hinhanh:hinhanh ,tensp:tensp ,gia:gia ,soluong:soluong};
            var v = -1;
            for(var i = 0 ; i<listsanpham.length;i++){
                if(listsanpham[i].tensp == sanpham.tensp ){
                    v = i;                   
                }
            }

            if(v == -1){
                listsanpham.push(sanpham);
            }else{
                listsanpham[v].soluong = listsanpham[v].soluong + 1;
            }
            
            localStorage.setItem("giohang",JSON.stringify(listsanpham));
            window.location.href = "cart.php";

        }



        
        </script>
        
    </head>
    <body>
        <div class="main">

            <div class="header">
                <div class="logo" style="float: left;">
                    <a href="huawei/huaweiP30pro.php"> <img src="image/logo_thegioididong.png" alt="logothegioididong"  width="196px"></a>
                </div>
                <div class="searchBar" >
                    <div class="topnav" style="padding-top:14px;padding-bottom:18px">                           
                        <a class="active" href="index.php">Trang chủ</a>
                        <a href="introduce.php">Giới thiệu</a>
                        <a href="cart.php">Giỏ Hàng</a>
                        <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")' >Hotline: 1900</a>          
                        <input type="text" placeholder="Tìm kiếm..">
                    </div>
                </div>
            </div>

            <div class="nav" style="clear: both;">
                <ul>                           
                    <?php
                        for ($i = 0; $i < count($listloaisp); $i++) {                       
                            echo '<li><a href="product.php?MaLoai='. $listloaisp[$i]['MaLoai'] .'"title="IPhone" ><img src="'. $listloaisp[$i]['ImgPath'] .'"></a></li>';                  
                        }                   
                    ?> 
                </ul>
        </div>
        

            <div class="rowtop">
            <?php
                echo '<h1 id = "tensp">'.$product['TenSP'].'</h1>';
            ?>  
            </div>



            <div class="rowInfo">
                <div class="imageInfo">

                    <?php
                    
                    echo ' <img  id="hinhanh" src="'.$product['ImgPath'].'">'

                    ?>  
                   
                </div>
                <div class="info">
                    <h2>Thông tin kĩ thuật<h2>
                    
                    <li> 
                        <span>Màn hình </span>
                        <div>
                            5.5", Retina HD
                        </div>
                    </li>
                    <li> 
                            <span>Hệ điều hành</span>
                            <div>
                                iOS 12
                            </div>
                    </li>
                    <li> 
                            <span>Camera sau</span>
                            <div>
                                Chính 12 MP &amp; Phụ 12 MP
                            </div>
                    </li>
                    <li> 
                            <span>Camera trước</span>
                            <div>
                                7 MP
                            </div>
                    </li>
                    <li> 

                            <span>CPU</span>
                            <div>
                                Apple A10 Fusion 4 nhân 64-bit
                            </div>
                    </li>
                    <li> 
                            <span>RAM</span>
                            <div>
                                3GB
                            </div>
                    </li>
                    <li> 
                            <span>ROM</span>
                            <div>
                                32 GB
                            </div>
                    </li>
                    <li> 
                            <span>Dung lượng pin</span>
                            <div>
                            2900 mAh
                            </div>
                    </li>
                    <button type="button" class="detail" onclick="openDetail()">
                    Xem chi tiết thông tin
                    </button>
                </div>
            </div>





            
            <div class="rowInfo">
                <div class="price_sale">
                    <div class="price">
                        <?php

                         echo '<strong id ="gia">'.$product['Gia'].'</strong>đ'

                        ?>
                        
                    </div>
                    <button  onclick ="themsanpham()">mua ngay</buton>
                </div>
                <div class="more" >
                    <ul>
                            <li>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng</li>
                            <li>Bảo hành chính hãng 12 tháng. </li>
                    </ul>
               
                </div>
            </div>
             
            


           

        </div>   
       <div id="hidden" >
           <div class="detail">
                <div class="detailInfo">
                        <div class="info">
                                <li><h3>Màn hình</h3></li>
                                
                                <li> 
                                    <span>Công nghệ màn hình</span>
                                    <div>
                                        chỉ số...
                                    </div>
                                </li>
                                <li> 
                                        <span>Độ phân giải </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li> 
                                        <span>Màn hình rộng</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li> 
                                        <span>Mặt kính cảm ứng</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Camera Sau</h3></li>
                                
                                <li> 
                                        <span>Độ phân giải</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                            Quay phim
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Đèn Flash</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li> 
                                        <span>Chụp ảnh nâng cao</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Camera trước</h3></li>
                                
                                <li> 
                                        <span>Độ phân giải</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                            Videocall
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Thông tin khác</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Hệ điều hành</h3></li>
                                
                                <li> 
                                        <span>Hệ điều hành</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                          Tốc độ CPU
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>GPU</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Bộ nhớ & lưu trữ</h3></li>
                                
                                <li> 
                                        <span>RAM</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                            Bộ nhớ chung
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Thẻ nhớ ngoài</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Kết nối</h3></li>
                                
                                <li> 
                                        <span>Mạng di động</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                            SIM
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Wifi</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li> 
                                        <span>GPS</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                           Bluetooth
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Cổng kết nối</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Thiết kế và trọng lượng</h3></li>
                                
                                <li> 
                                        <span>Thiết kế</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                           Chất liệu
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Kích thước</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li> 
                                        <span>Trọng lượng</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li><h3>Thông tin sạc và Pin</h3></li>
                                
                                <li> 
                                        <span>Dung lượng pin</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                                <li>
                                        <span>
                                           Loại pin
                                        </span>
                                        <div>
                                            chỉ số...
                                        </div>
                                    </li>
                                <li> 
                                        <span>Công nghệ pin</span>
                                        <div>
                                            chỉ số...
                                        </div>
                                </li>
                               
                                </div>
                </div>
           </div>
           <button onclick="closeDetail()">
            X
           </button>
       </div>



        <div class="myfooter">
                    
                <center style="padding-top: 60px;">
                    
                    <h2><span style="color: red;">Tập Đoàn </span></h2>
    
                    <p><strong>Địa chỉ: 273, An Dương Vương, Phường 3, Quận 5, TP.HCM</strong></p>
                    <p>Liên he: 01207288007</p>
    
                    <p>hdcpaint.com</p>
                    <p>Copyright © by HDC Group</p>
                </center>
              
            </div>
                
    </body>

    
</html>