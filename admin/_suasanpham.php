<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql =  $conn->prepare("UPDATE sanpham
        SET MaSP = ?, MaLoai = ?, TenSP = ?,Gia = ?,ImgPath = ?,ManHinh = ?,CPU = ?,CameraSau = ?,CameraTruoc = ?,HDH = ?,Ram = ?,Rom = ?,DungLuongPin = ?,SanPhamBanChay=?,SanPhamMoiNhat=?
        WHERE ID = ?;");



    $target_file = "";

    if (!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
        $sql =  $conn->prepare("UPDATE sanpham
                	            SET MaSP = ?, MaLoai = ?, TenSP = ?,Gia = ?,ManHinh = ?,CPU = ?,CameraSau = ?,CameraTruoc = ?,HDH = ?,Ram = ?,Rom = ?,DungLuongPin = ?,SanPhamBanChay=?,SanPhamMoiNhat=?
                                WHERE ID = ?;");
        $sql->bind_param("sisissssssssiii", $MaSP, $MaLoai, $TenSP, $Gia, $ManHinh, $CPU, $CameraSau, $CameraTruoc, $HDH, $Ram, $Rom, $DungLuongPin, $SanPhamBanChay, $SanPhamMoiNhat, $ID);
    } else {

        $sql =  $conn->prepare("UPDATE sanpham
                                SET MaSP = ?, MaLoai = ?, TenSP = ?,Gia = ?,ImgPath = ?,ManHinh = ?,CPU = ?,CameraSau = ?,CameraTruoc = ?,HDH = ?,Ram = ?,Rom = ?,DungLuongPin = ?,SanPhamBanChay=?,SanPhamMoiNhat=?
                                WHERE ID = ?;");
        $sql->bind_param("sisisssssssssiii", $MaSP, $MaLoai, $TenSP, $Gia, $ImgPath, $ManHinh, $CPU, $CameraSau, $CameraTruoc, $HDH, $Ram, $Rom, $DungLuongPin, $SanPhamBanChay, $SanPhamMoiNhat, $ID);

        $target_dir = "image/";
        $target_file = $target_dir  . date('dmYHis') . basename($_FILES["fileToUpload"]["name"]);

      

        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],'../' . $target_file);
    }



    $MaSP = $_REQUEST['MaSP'];
    $MaLoai = $_REQUEST['MaLoai'];
    $TenSP = $_REQUEST['TenSP'];
    $Gia = $_REQUEST['Gia'];
    $ID = $_REQUEST['ID'];

    $ManHinh = $_REQUEST['ManHinh'];
    $HDH = $_REQUEST['HDH'];
    $CameraSau = $_REQUEST['CameraSau'];
    $CameraTruoc = $_REQUEST['CameraTruoc'];

    $CPU = $_REQUEST['CPU'];
    $Ram = $_REQUEST['Ram'];
    $Rom = $_REQUEST['Rom'];
    $DungLuongPin = $_REQUEST['DungLuongPin'];

    $SanPhamBanChay = isset($_REQUEST['SanPhamBanChay']) ? 1 : 0;
    $SanPhamMoiNhat = isset($_REQUEST['SanPhamMoiNhat']) ? 1 : 0;
    $ImgPath =  $target_file;




    $sql->execute();





    //header('Location: quanlysanpham.php');

}

$sql =  $conn->prepare("SELECT * FROM SANPHAM WHERE ID = ?");
$sql->bind_param("i", $_GET['ID']);
$sql->execute();

$result = $sql->get_result();


$listProduct = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listProduct[] = $row;
    }
}

$product = $listProduct[0];


$sql =  $conn->prepare("SELECT * FROM LOAISP L");

$sql->execute();

$result = $sql->get_result();

$listLoaiSP = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listLoaiSP[] = $row;
    }
}


?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Sửa sản phẩm</h5>
    </div>
    <div class="card-body" style="min-height:250px">


        <form action="suasanpham.php?ID=<?php echo $product['ID'] ?> " method="POST" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?php echo $product['ID'] ?>" />
            <table class="table table-borderless " style="font-size: 14px">
                <tr>
                    <td>Mã Sản Phẩm</td>
                    <td><input class="form-control" type="text" name="MaSP" value="<?php echo $product['MaSP'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tên Sản Phẩm</td>
                    <td><input class="form-control" type="text" name="TenSP" value="<?php echo $product['TenSP'] ?>" /></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input class="form-control" type="number" name="Gia" value="<?php echo $product['Gia'] ?>" /></td>
                </tr>
                <tr>
                    <td>Mã Loại</td>
                    <td>
                        <select class="form-control" name="MaLoai" id="cars">
                            <?php
                            for ($i = 0; $i < count($listLoaiSP); $i++) {
                                if ($listLoaiSP[$i]['ID'] == $product['MaLoai']) {
                                    echo ' <option selected value="' . $listLoaiSP[$i]['ID'] . '">' . $listLoaiSP[$i]['TenLoai'] . '</option>';
                                } else {
                                    echo ' <option value="' . $listLoaiSP[$i]['ID'] . '">' . $listLoaiSP[$i]['TenLoai'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Màn Hình</td>
                    <td><input class="form-control" type="text" name="ManHinh" value="<?php echo $product['ManHinh'] ?>" /></td>
                </tr>

                <tr>
                    <td>HĐH</td>
                    <td><input class="form-control" type="text" name="HDH" value="<?php echo $product['HDH'] ?>" /></td>
                </tr>

                <tr>
                    <td>Camera Sau</td>
                    <td><input class="form-control" type="text" name="CameraSau" value="<?php echo $product['CameraSau'] ?>" /></td>
                </tr>

                <tr>
                    <td>Camera Trước</td>
                    <td><input class="form-control" type="text" name="CameraTruoc" value="<?php echo $product['CameraTruoc'] ?>" /></td>
                </tr>

                <tr>
                    <td>CPU</td>
                    <td><input class="form-control" type="text" name="CPU" value="<?php echo $product['CPU'] ?>" /></td>
                </tr>

                <tr>
                    <td>Ram</td>
                    <td><input class="form-control" type="text" name="Ram" value="<?php echo $product['Ram'] ?>" /></td>
                </tr>

                <tr>
                    <td>Rom</td>
                    <td><input class="form-control" type="text" name="Rom" value="<?php echo $product['Rom'] ?>" /></td>
                </tr>

                <tr>
                    <td>Dung Lượng Pin</td>
                    <td><input class="form-control" type="text" name="DungLuongPin" value="<?php echo $product['DungLuongPin'] ?>" /></td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="checkbox" name="SanPhamBanChay" <?php if ($product['SanPhamBanChay'] == 1) echo " checked" ?> />
                        Sản Phẩm Bán Chạy
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="checkbox" name="SanPhamMoiNhat" <?php if ($product['SanPhamMoiNhat'] == 1) echo " checked" ?> />
                        Sản Phẩm Mới Nhất
                    </td>
                </tr>

                <tr>
                    <td>Chọn Hình Ảnh</td>
                    <td>
                        <img height="150" src="<?php echo "../" . $product['ImgPath'] ?>">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="btn btn-primary" type="submit" value="Cập Nhật" /></td>
                </tr>
            </table>
        </form>

    </div>
</div>