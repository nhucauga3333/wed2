<?php
$sql = "SELECT * FROM SANPHAM WHERE TenSP LIKE '%";
$sql = $sql . $_GET['TenSP']. "%' ";



$result = mysqli_query($conn, $sql);
$listProduct = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listProduct[] = $row;
    }
}
?>

<div class="productArea">
    <div class="production_selling">
        <?php
        for ($i = 0; $i < count($listProduct); $i++) {

            echo "<div class='product'>";
            echo        "<div class='pImage'>";
            echo        '    <a href="ctsanpham.php?ID=' . $listProduct[$i]['ID'] . '" ><img src="' . $listProduct[$i]['ImgPath'] . '"></a>';
            echo        "</div>";
            echo        "<div class='pInfo'>";
            echo            "<p><strong>" . $listProduct[$i]['TenSP'] . "</strong></p>";
            echo            "<h3 class='amount'>" . $listProduct[$i]['Gia'] . "₫</h3>";
                      
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
</div>