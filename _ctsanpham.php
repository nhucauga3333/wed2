<?php
$sql = "SELECT * FROM SANPHAM WHERE ID = " . $_GET['ID'];


$result = mysqli_query($conn, $sql);

$listProduct = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listProduct[] = $row;
    }
}

$product = $listProduct[0];


?>

<link rel="stylesheet" type="text/css" href="style_detail.css">

<script>
    function openDetail() {
        var obj = document.getElementById("hidden");
        obj.setAttribute("style", "display:block");

    }

    function closeDetail() {
        var obj = document.getElementById("hidden");
        obj.setAttribute("style", "display:none");
    }

    function themsanpham() {


        var listsanpham = [];
        var giohang = localStorage.getItem("giohang");


        if (giohang !=null && giohang.length > 0) {
            listsanpham = JSON.parse(giohang);
        }
        
        var hinhanh = document.getElementById("hinhanh").getAttribute("src");
        var tensp = document.getElementById("tensp").innerHTML;
        var gia = document.getElementById("gia").innerHTML;
        var soluong = 1;
        var sanpham = {
            hinhanh: hinhanh,
            tensp: tensp,
            gia: gia,
            soluong: soluong
        };
        var v = -1;
        for (var i = 0; i < listsanpham.length; i++) {
            if (listsanpham[i].tensp == sanpham.tensp) {
                v = i;
            }
        }

        if (v == -1) {
            listsanpham.push(sanpham);
        } else {
            listsanpham[v].soluong = listsanpham[v].soluong + 1;
        }

        localStorage.setItem("giohang", JSON.stringify(listsanpham));
        window.location.href = "giohang.php";

    }
</script>

<div class="rowtop">
    <?php
    echo '<h1 id = "tensp">' . $product['TenSP'] . '</h1>';
    ?>
</div>

<div class="rowInfo">
    <div class="imageInfo">
        <?php echo ' <img  id="hinhanh" src="' . $product['ImgPath'] . '">' ?>
    </div>
    <div class="info">
        <h2>Thông tin kĩ thuật<h2>

                <li>
                    <span>Màn hình </span>
                    <div>
                        <?php echo $product['ManHinh']; ?>
                    </div>
                </li>

                <li>
                    <span>Hệ điều hành</span>
                    <div>
                        <?php echo $product['HDH']; ?>
                    </div>
                </li>

                <li>
                    <span>Camera sau</span>
                    <div>
                        <?php echo $product['CameraSau']; ?>
                    </div>
                </li>

                <li>
                    <span>Camera trước</span>
                    <div>
                        <?php echo $product['CameraTruoc']; ?>
                    </div>
                </li>

                <li>

                    <span>CPU</span>
                    <div>
                        <?php echo $product['CPU']; ?>
                    </div>
                </li>

                <li>
                    <span>RAM</span>
                    <div>
                        <?php echo $product['Ram']; ?>
                    </div>
                </li>

                <li>
                    <span>ROM</span>
                    <div>
                        <?php echo $product['Rom']; ?>
                    </div>
                </li>

                <li>
                    <span>Dung lượng pin</span>
                    <div>
                        <?php echo $product['DungLuongPin']; ?>
                    </div>
                </li>
                <button type="button" class="detail" onclick="themsanpham()">
                   Mua Ngay
                </button>
                


    </div>
    
</div>

<div class="rowInfo">
    <div class="price_sale">
        <div class="price">
            <?php echo '<strong id ="gia">' . $product['Gia'] . ' </strong><strong> đ</strong>'   ?>
        </div>
    </div>

    <div class="more">
        <ul>
            <li>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng</li>
            <li>Bảo hành chính hãng 12 tháng. </li>
        </ul>

    </div>

</div>