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

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Danh sách sản phẩm </h5>

        <form action="quanlysanpham.php" method="GET">
            
            <?php
                echo    '<input type="text" value="' . $timkiemTen . '" name="TenSP"  placeholder="Tìm kiếm..">'
            ?>
        </form>

        
    </div>
    <div class="card-body" style="min-height:700px">
        <a href="themsanpham.php">Thêm mới</a>
        <table style="width:100%">
            <tr>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Loại</td>
                <td></td>
            </tr>

            <?php
            for ($i = 0; $i < count($listProduct); $i++) {

                $xoasp = "window.location.href = 'xoasanpham.php?ID=" . $listProduct[$i]['ID'] . "'";

                $suasp = "window.location.href = 'suasanpham.php?ID=" . $listProduct[$i]['ID'] . "'";
                echo    '<tr>';
                echo        '<td>' . ($i + 1) . '</td>';
                echo        '<td>' . $listProduct[$i]['TenSP'] . '</td>';
                echo        '<td>' . $listProduct[$i]['Gia'] . '</td>';
                echo        '<td>' . $listProduct[$i]['TenLoai'] . '</td>';
                echo        '<td><button onclick = "' . $suasp . '">Sửa</button> <button onclick = "' . $xoasp . '">Xóa</button></td>';
                echo    '</tr>';
            }
            ?>
        </table>
    </div>
</div>