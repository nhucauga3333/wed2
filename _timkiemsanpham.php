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

            echo '<div class="product">';
            echo            '<div class="pImage">';
            echo                '<a href="ctsanpham.php?ID=' . $listProduct[$i]['ID'] . '" ><img src="' . $listProduct[$i]['ImgPath'] . '"/></a>';
            echo            '</div>';
            echo               ' <div class="pInfo">';
            echo                    '<p><strong>' . $listProduct[$i]['TenSP'] . '</strong></p>';
            echo                    '<h3 class="amount">' . $listProduct[$i]['Gia'] . '₫</h3>';
            echo                '<span>Màn hình: 6.5", Super Retina XDR</span><br>';
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