<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        echo "<a href = 'themsanpham.php'>Quay Lại</a>";
        return 0;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql =  $conn->prepare("INSERT INTO SANPHAM (MaSP,MaLoai,TenSP, Gia, ImgPath,ManHinh,HDH,CameraSau,CameraTruoc,CPU,Ram,Rom,DungLuongPin,SanPhamBanChay,SanPhamMoiNhat) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->bind_param("sisisssssssssii", $MaSP, $MaLoai, $TenSP, $Gia, $ImgPath,$ManHinh,$HDH,$CameraSau,$CameraTruoc,$CPU,$Ram,$Rom,$DungLuongPin,$SanPhamBanChay,$SanPhamMoiNhat);


    $MaSP = $_REQUEST['MaSP'];
    $MaLoai = $_REQUEST['MaLoai'];
    $TenSP = $_REQUEST['TenSP'];
    $Gia = $_REQUEST['Gia'];




    $ManHinh = $_REQUEST['ManHinh'];
    $HDH = $_REQUEST['HDH'];
    $CameraSau = $_REQUEST['CameraSau'];
    $CameraTruoc = $_REQUEST['CameraTruoc'];

    $CPU = $_REQUEST['CPU'];
    $Ram = $_REQUEST['Ram'];
    $Rom = $_REQUEST['Rom'];
    $DungLuongPin = $_REQUEST['DungLuongPin'];
    $SanPhamBanChay = $_REQUEST['SanPhamBanChay'];
    $SanPhamMoiNhat = $_REQUEST['SanPhamMoiNhat'];
    $ImgPath = $target_file;

    $sql->execute();
    $sql->close();
    $conn->close();

    header('Location: quanlysanpham.php');
}
?>
<div class="card">

    <div class="card-header">
        <h5 class="card-title">Thêm sản phẩm</h5>
    </div>

    <div class="card-body" style="min-height:250px">
        <form action="themsanpham.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã Sản Phẩm</td>
                    <td><input type="text" name="MaSP" /></td>
                </tr>
                <tr>
                    <td>Tên Sản Phẩm</td>
                    <td><input type="text" name="TenSP" /></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="text" name="Gia" /></td>
                </tr>
                <tr>
                    <td>Mã Loại</td>
                    <td><input type="text" name="MaLoai" /></td>
                </tr>

                <tr>
                    <td>Màn Hình</td>
                    <td><input type="text" name="ManHinh" /></td>
                </tr>

                <tr>
                    <td>HĐH</td>
                    <td><input type="text" name="HDH" /></td>
                </tr>

                <tr>
                    <td>Camera Sau</td>
                    <td><input type="text" name="CameraSau" /></td>
                </tr>

                <tr>
                    <td>Camera Trước</td>
                    <td><input type="text" name="CameraTruoc" /></td>
                </tr>

                <tr>
                    <td>CPU</td>
                    <td><input type="text" name="CPU" /></td>
                </tr>

                <tr>
                    <td>Ram</td>
                    <td><input type="text" name="Ram" /></td>
                </tr>

                <tr>
                    <td>Rom</td>
                    <td><input type="text" name="Rom" /></td>
                </tr>

                <tr>
                    <td>Dung Lượng Pin</td>
                    <td><input type="text" name="DungLuongPin" /></td>
                </tr>

                <tr>
                    <td>Sản Phẩm Bán Chạy</td>
                    <td><input type="text" name="SanPhamBanChay" /></td>
                </tr>

                <tr>
                    <td>Sản Phẩm Mới Nhất</td>
                    <td><input type="text" name="SanPhamMoiNhat" /></td>
                </tr>

                <tr>
                    <td>Chọn Hình Ảnh</td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Thêm" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>