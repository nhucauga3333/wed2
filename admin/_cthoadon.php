<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //cập nhật trạng thái hóa đơn
    $sql =  $conn->prepare("UPDATE HOADON SET TrangThai = ? WHERE ID = ?");
    $sql->bind_param("si", $TrangThai, $ID);

    $TrangThai = $_REQUEST['TrangThai'];
    $ID = $_GET['ID'];


    $sql->execute();
    $sql->close();
}

$sql = "SELECT *, DATE(NgLap) as  NgLap FROM HOADON WHERE ID = " . $_GET['ID'];


$result = mysqli_query($conn, $sql);

$listHoaDon = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listHoaDon[] = $row;
    }
}

$HoaDon = $listHoaDon[0];

$sql = "SELECT * FROM CTHOADON WHERE IDHOADON = " . $_GET['ID'];
$result = mysqli_query($conn, $sql);

$listctHoaDon = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listctHoaDon[] = $row;
    }
}
$conn->close();
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Hóa Đơn</h5>
    </div>
    <div class="card-body" style="min-height:700px">
        <?php
        echo    '<p>Số HD: ' . $HoaDon["SoHD"] . '</p>';
        echo    '<p>Ngày Lập: ' . $HoaDon["NgLap"] . '</p>';
        echo    '<p>Tên Khách Hàng: ' . $HoaDon["TenKH"] . '</p>';
        echo    '<p>Sđt: ' . $HoaDon["SdtKH"] . '</p>';
        echo    '<p>Địa Chỉ Giao Hàng: ' . $HoaDon["DiaChiGiaoHang"] . '</p>';
        echo    '<p>Tổng Tiền: ' . $HoaDon["TongTien"] . '</p>';
        ?>

        <hr>

        <table class="table" >
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th class="text-center">Số Lượng</th>
                    <th  class="text-right">Đơn Giá</th>
                    <th  class="text-right">Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($listctHoaDon); $i++) {
                    $cthoadon = "window.location.href = 'cthoadon.php?ID=" . $listctHoaDon[$i]['ID'] . "'";
                    echo    '<tr>';
                    echo        '<td >' . $listctHoaDon[$i]['TenSP'] . '</td>';
                    echo        '<td class="text-center">' . $listctHoaDon[$i]['SoLuong'] . '</td>';
                    echo        '<td class="text-right">' . $listctHoaDon[$i]['DonGia'] . '</td>';
                    echo        '<td class="text-right">' . $listctHoaDon[$i]['ThanhTien'] . '</td>';
                    echo    '</tr>';
                }
                ?>
            </tbody>
        </table>


        <form class="form-inline" action="<?php echo 'cthoadon.php?ID=' . $_GET['ID']; ?>" method="POST">


            <table class="table table-borderless" style="margin-top:10px">
                <tr>
                    <td style="width:100px">Trạng Thái</td>
                    <?php
                    echo '<td><input class="form-control" type="text"  value = "' . $HoaDon["TrangThai"] . '" name="TrangThai"></td>'
                    ?>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-primary" type="submit" style="color:black"><strong>Cập Nhật</strong></button>
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>