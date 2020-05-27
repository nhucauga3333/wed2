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


    $sql = "SELECT * FROM SANPHAM WHERE MaLoai = " . $_GET['MaLoai'];

    $result = mysqli_query($conn, $sql);

    $listProduct = array();

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $listProduct[] = $row;
        }

        
    }


    

?>




   

            
            <div class="productArea">
                <div class="production_selling">

                <?php
                    for ($i = 0; $i < count($listProduct); $i++) {

                        echo '<div class="product">';
                        echo            '<div class="pImage">';
                        echo                '<a href="iphonedetail/iphone11promax.php" ><img src="'. $listProduct[$i]['ImgPath'] .'"/></a>';
                        echo            '</div>';
                        echo               ' <div class="pInfo">';
                        echo                    '<p><strong>'. $listProduct[$i]['TenSP'] .'</strong></p>';
                        echo                    '<h3 class="amount">'. $listProduct[$i]['Gia'] .'₫</h3>';
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
                       









           
            
        </div>   
