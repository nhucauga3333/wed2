<?php

$sql = "SELECT * FROM SANPHAM WHERE SanPhamBanChay = 1 ";

$result = mysqli_query($conn, $sql);

$listSanPhamBanChay = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $listSanPhamBanChay[] = $row;
    }
}


$sql = "SELECT * FROM SANPHAM WHERE SanPhamMoiNhat = 1 ";
$result = mysqli_query($conn, $sql);

$listSanPhamMoiNhat = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $listSanPhamMoiNhat[] = $row;
    }

    
}

?>


<div class="productArea">
    <h1>Sản phẩm bán chạy</h1>
    <div class="production_selling">
        <?php
        for ($i = 0; $i < count($listSanPhamBanChay); $i++) {
            echo "<div class='product'>";
            echo        "<div class='pImage'>";
            echo        '    <a href="ctsanpham.php?ID=' . $listSanPhamBanChay[$i]['ID'] . '" ><img src="'. $listSanPhamBanChay[$i]['ImgPath'].'"></a>';
            echo        "</div>";
            echo        "<div class='pInfo'>";
            echo            "<p><strong>" . $listSanPhamBanChay[$i]['TenSP'] . "</strong></p>";
            echo            "<h3 class='amount'>" . $listSanPhamBanChay[$i]['Gia'] . "₫</h3>";
            echo            "<span>" . $listSanPhamBanChay[$i]['ID'] . "</span><br>";
            echo    "<span>Màn Hình: " . $listSanPhamBanChay[$i]['ManHinh'] . "</span><br>";
            echo    "<span>HĐH: " . $listSanPhamBanChay[$i]['HDH'] . "</span><br>";
            echo    "<span>Camera Sau: " . $listSanPhamBanChay[$i]['CameraSau'] . "</span><br>";
            echo    "<span>Camera Trước: " . $listSanPhamBanChay[$i]['CameraTruoc'] . "</span><br>";
            echo    "<span>CPU: " . $listSanPhamBanChay[$i]['CPU'] . "</span><br>";
            echo    "<span>Ram: " . $listSanPhamBanChay[$i]['Ram'] . "</span><br>";
            echo    "<span>Rom: " . $listSanPhamBanChay[$i]['Rom'] . "</span><br>";
            echo    "<span>Dung Lượng Pin: " . $listSanPhamBanChay[$i]['DungLuongPin'] . "</span>";
            echo        "</div>";
            echo "</div>";

       
        }
        
        ?>
    </div>
</div>

<div class="productArea" style="clear:both; margin-top: 20px">
<br><br>
<h1>Sản phẩm mới nhất</h1>
    <div class="production_selling">
        <?php
        for ($i = 0; $i < count($listSanPhamMoiNhat); $i++) {
            echo "<div class='product'>";
            echo        "<div class='pImage'>";
            echo        '    <a href="ctsanpham.php?ID=' . $listSanPhamMoiNhat[$i]['ID'] . '" ><img src="' . $listSanPhamMoiNhat[$i]['ImgPath'] . '"></a>';
            echo        "</div>";
            echo        "<div class='pInfo'>";
            echo            "<p><strong>" . $listSanPhamMoiNhat[$i]['TenSP'] . "</strong></p>";
            echo            "<h3 class='amount'>" . $listSanPhamMoiNhat[$i]['Gia'] . "₫</h3>";
            echo            "<span>" . $listSanPhamMoiNhat[$i]['ID'] . "</span><br>";
            echo    "<span>Màn Hình: " . $listSanPhamMoiNhat[$i]['ManHinh'] . "</span><br>";
            echo    "<span>HĐH: " . $listSanPhamMoiNhat[$i]['HDH'] . "</span><br>";
            echo    "<span>Camera Sau: " . $listSanPhamMoiNhat[$i]['CameraSau'] . "</span><br>";
            echo    "<span>Camera Trước: " . $listSanPhamMoiNhat[$i]['CameraTruoc'] . "</span><br>";
            echo    "<span>CPU: " . $listSanPhamMoiNhat[$i]['CPU'] . "</span><br>";
            echo    "<span>Ram: " . $listSanPhamMoiNhat[$i]['Ram'] . "</span><br>";
            echo    "<span>Rom: " . $listSanPhamMoiNhat[$i]['Rom'] . "</span><br>";
            echo    "<span>Dung Lượng Pin: " . $listSanPhamMoiNhat[$i]['DungLuongPin'] . "</span>";
            echo        "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>