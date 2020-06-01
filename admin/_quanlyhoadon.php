<?php
$sql = "SELECT * FROM HOADON";


$result = mysqli_query($conn, $sql);

$listHoaDon = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listHoaDon[] = $row;
    }
}
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Hóa Đơn</h5>
    </div>
    <div class="card-body" style="min-height:700px">
        <a href="themsanpham.php">Thêm mới</a>
        <table style = "width:100%">
            <tr>
                <td>Số HD</td>
                <td>Ngày Lập</td>
                <td>Tên Khách Hàng</td>
                <td>Sđt Khách Hàng</td>
                <td>Địa chỉ giao hàng</td>
                <td>Tổng Tiền</td>
            </tr>

            <?php
            for ($i = 0; $i < count($listHoaDon); $i++) {

                

                $cthoadon = "window.location.href = 'cthoadon.php?ID=" . $listHoaDon[$i]['ID'] . "'";
                echo    '<tr>';
                echo        '<td>' . ($i + 1) . '</td>';
                echo        '<td>' . $listHoaDon[$i]['NgLap'] . '</td>';
                echo        '<td>' . $listHoaDon[$i]['TenKH'] . '</td>';
                echo        '<td>' . $listHoaDon[$i]['SdtKH'] . '</td>';          
                echo        '<td>' . $listHoaDon[$i]['DiaChiGiaoHang'] . '</td>';
                echo        '<td>' . $listHoaDon[$i]['TongTien'] . '</td>';
                echo        '<td><button onclick = "' . $cthoadon . '">Chi tiết</button> </td>';
                echo    '</tr>';
            }
            ?>
        </table>
    </div>
</div>