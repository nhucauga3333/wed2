<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "image/";
    $target_file = basename($_FILES["fileToUpload"]["name"]);
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
        $target_file = $target_dir . date('dmYHis') . basename($_FILES["fileToUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../" . $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql =  $conn->prepare("INSERT INTO SANPHAM (MaSP,MaLoai,TenSP, Gia, ImgPath,ManHinh,HDH,CameraSau,CameraTruoc,CPU,Ram,Rom,DungLuongPin,SanPhamBanChay,SanPhamMoiNhat) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->bind_param("sisisssssssssii", $MaSP, $MaLoai, $TenSP, $Gia, $ImgPath, $ManHinh, $HDH, $CameraSau, $CameraTruoc, $CPU, $Ram, $Rom, $DungLuongPin, $SanPhamBanChay, $SanPhamMoiNhat);


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
    $SanPhamBanChay = isset($_REQUEST['SanPhamBanChay']) ? 1 : 0;
    $SanPhamMoiNhat = isset($_REQUEST['SanPhamMoiNhat']) ? 1 : 0;
    $ImgPath = $target_file;


    $sql->execute();
    $sql->close();
    $conn->close();

    //header('Location: quanlysanpham.php');
}


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
        <h5 class="card-title">Thêm sản phẩm</h5>
    </div>

    <div class="card-body" style="min-height:250px">
        <form action="themsanpham.php" method="POST" enctype="multipart/form-data">

            <table class="table table-borderless " style="font-size: 14px">
                <tr>
                    <td>Mã Sản Phẩm</td>
                    <td><input class="form-control" type="text" name="MaSP" /></td>
                </tr>
                <tr>
                    <td>Tên Sản Phẩm</td>
                    <td><input class="form-control" type="text" name="TenSP" /></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input class="form-control" type="number" name="Gia" /></td>
                </tr>
                <tr>
                    <td>Mã Loại</td>
                    <td>
                        <select class="form-control" name="MaLoai" id="cars">
                            <?php
                            for ($i = 0; $i < count($listLoaiSP); $i++) {
                                echo ' <option value="'.$listLoaiSP[$i]['ID'].'">'.$listLoaiSP[$i]['TenLoai'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Màn Hình</td>
                    <td><input class="form-control" type="text" name="ManHinh" /></td>
                </tr>

                <tr>
                    <td>HĐH</td>
                    <td><input class="form-control" type="text" name="HDH" /></td>
                </tr>

                <tr>
                    <td>Camera Sau</td>
                    <td><input class="form-control" type="text" name="CameraSau" /></td>
                </tr>

                <tr>
                    <td>Camera Trước</td>
                    <td><input class="form-control" type="text" name="CameraTruoc" /></td>
                </tr>

                <tr>
                    <td>CPU</td>
                    <td><input class="form-control" type="text" name="CPU" /></td>
                </tr>

                <tr>
                    <td>Ram</td>
                    <td><input class="form-control" type="text" name="Ram" /></td>
                </tr>

                <tr>
                    <td>Rom</td>
                    <td><input class="form-control" type="text" name="Rom" /></td>
                </tr>

                <tr>
                    <td>Dung Lượng Pin</td>
                    <td><input class="form-control" type="text" name="DungLuongPin" /></td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="checkbox" name="SanPhamBanChay" />
                        Sản Phẩm Bán Chạy
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="checkbox" name="SanPhamMoiNhat" />
                        Sản Phẩm Mới Nhất
                    </td>
                </tr>

                <tr>
                    <td>Chọn Hình Ảnh</td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="btn btn-primary" type="submit" value="Thêm" /></td>
                </tr>
            </table>
        </form>

    </div>
</div>