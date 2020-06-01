<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //cập nhật trạng thái hóa đơn
    $sql =  $conn->prepare("UPDATE HOADON SET TrangThai = ? WHERE ID = ?");  
    $sql->bind_param("si", $TrangThai,$ID);

    $TrangThai = $_REQUEST['TrangThai'];
    $ID = $_GET['ID'];


    $sql->execute();
    $sql->close();

}

$sql = "SELECT * FROM HOADON WHERE ID = " . $_GET['ID'];


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

        <table style="width:100%">
            <tr>
                <td>Tên Sản Phẩm</td>
                <td>Số Lượng</td>
                <td>Đơn Giá</td>
                <td>Thành Tiền</td>
            </tr>

            <?php
            for ($i = 0; $i < count($listctHoaDon); $i++) {
                $cthoadon = "window.location.href = 'cthoadon.php?ID=" . $listctHoaDon[$i]['ID'] . "'";
                echo    '<tr>';
                echo        '<td>' . $listctHoaDon[$i]['TenSP'] . '</td>';
                echo        '<td>' . $listctHoaDon[$i]['SoLuong'] . '</td>';
                echo        '<td>' . $listctHoaDon[$i]['DonGia'] . '</td>';
                echo        '<td>' . $listctHoaDon[$i]['ThanhTien'] . '</td>';
                echo    '</tr>';
            }
            ?>
        </table>

    
            <form class="form-inline" action="<?php echo 'cthoadon.php?ID='. $_GET['ID'];?>" method="POST">

        
                <table>
                    <tr>
                        <td><label>Trạng Thái</label></td>
                        <?php
                            echo '<td><input type="text"  value = "' . $HoaDon["TrangThai"] . '" name="TrangThai"></td>'
                        ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="pull-right">
                            <button type="submit" style="color:black"><strong>Cập Nhật</strong></button>
                        </td>
                    </tr>
                </table>

                <input type="hidden" id="inhoadon" name="Giohang" />
            </form>
        

    </div>
</div>