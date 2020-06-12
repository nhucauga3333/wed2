<?php
$sql = "SELECT *, DATE(NgLap) as  NgLap FROM HOADON";


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

        <table class="table" style="font-size:14px">
            <thead>
                <tr>
                    <th class="text-center">Số HD</th>
                    <th>Ngày Lập</th>
                    <th>Tên Khách Hàng</th>
                    <th>Sđt Khách Hàng</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($listHoaDon); $i++) {
                    $cthoadon = "window.location.href = 'cthoadon.php?ID=" . $listHoaDon[$i]['ID'] . "'";
                    echo    '<tr>';
                    echo        '<td class="text-center">' . ($i + 1) . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['NgLap'] . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['TenKH'] . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['SdtKH'] . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['DiaChiGiaoHang'] . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['TongTien'] . '</td>';
                    echo        '<td>' . $listHoaDon[$i]['TrangThai'] . '</td>';
                    echo        '<td><button class="btn btn-primary" onclick = "' . $cthoadon . '">Chi tiết</button> </td>';
                    echo    '</tr>';
                }
                ?>

            </tbody>

        </table>
    </div>
</div>