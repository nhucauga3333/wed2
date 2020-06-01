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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql =  $conn->prepare("UPDATE sanpham
        SET MaSP = ?, MaLoai = ?, TenSP = ?,Gia = ?,ImgPath = ?
        WHERE ID = ?;");

    $target_file = "";

    if (!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
        $sql =  $conn->prepare("UPDATE sanpham
            SET MaSP = ?, MaLoai = ?, TenSP = ?,Gia = ?
            WHERE ID = ?;");

        $sql->bind_param("sisii", $MaSP, $MaLoai, $TenSP, $Gia, $ID);
    } else {



        $target_dir = "../image/";
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

        $sql->bind_param("sisisi", $MaSP, $MaLoai, $TenSP, $Gia, $ImgPath, $ID);
    }

    $MaSP = $_REQUEST['MaSP'];
    $MaLoai = $_REQUEST['MaLoai'];
    $TenSP = $_REQUEST['TenSP'];
    $Gia = $_REQUEST['Gia'];
    $ID = $_REQUEST['ID'];
    $ImgPath =  $target_file;
    $sql->execute();

    $sql->close();
    $conn->close();

    header('Location: quanlysanpham.php');
}
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Sửa sản phẩm</h5>
    </div>
    <div class="card-body" style="min-height:250px">

        <?php
        echo '<form action = "suasanpham.php?ID=' . $product['ID'] . '" method ="POST" enctype="multipart/form-data">';
        echo '<input type = "hidden" name = "ID" value = "' . $product['ID'] . '" />';
        echo   '<table >';
        echo        '<tr>';
        echo            '<td>Mã Sản Phẩm</td>';
        echo           '<td><input type = "text" name = "MaSP" value = "' . $product['MaSP'] . '" /></td>';
        echo        '</tr>';
        echo       '<tr>';
        echo          '<td>Tên Sản Phẩm</td>';
        echo        '<td><input type = "text" name = "TenSP" value = "' . $product['TenSP'] . '" /></td>';
        echo    '</tr>';
        echo    '<tr>';
        echo        '<td>Giá</td>';
        echo        '<td><input type = "text" name = "Gia" value = "' . $product['Gia'] . '"/></td>';
        echo    '</tr>';
        echo    '<tr>';
        echo        '<td>Mã Loại</td>';
        echo        '<td><input type = "text" name = "MaLoai" value = "' . $product['MaLoai'] . '" /></td>';
        echo    '</tr>';
        echo    '<tr>';
        echo        '<td>Hình Ảnh</td>';
        echo        '<td><img width ="200px" src = "' . $product['ImgPath'] . '"/></td>';
        echo    '</tr>';
        echo    '<tr>';
        echo        '<td>Thay Đổi Hình Ảnh</td>';
        echo        '<td><input type="file" name="fileToUpload" id="fileToUpload"></td>';
        echo    '</tr>';
        echo    '<tr>';
        echo        '<td></td>';
        echo        '<td><input type = "submit" value = "Cập Nhật" /></td>';
        echo    '</tr>';
        echo    '</table>';
        echo '</form>';

        ?>
    </div>
</div>