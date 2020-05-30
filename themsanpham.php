<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qldd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    echo $_REQUEST['MaSP'];
    echo $_REQUEST['TenSP'];
    echo $_REQUEST['Gia'];
    echo $_REQUEST['MaLoai'];


    $sql =  $conn->prepare("INSERT INTO SANPHAM (MaSP,MaLoai,TenSP, Gia, ImgPath) VALUES (?,?,?,?,?)");
    $sql->bind_param("sisis", $MaSP, $MaLoai, $TenSP, $Gia, $ImgPath);

    $MaSP = $_REQUEST['MaSP'];
    $MaLoai = $_REQUEST['MaLoai'];
    $TenSP = $_REQUEST['TenSP'];
    $Gia = $_REQUEST['Gia'];
    $ImgPath = $target_file;
    

    $sql->execute();
    $sql->close();
    $conn->close();

    header('Location: quanlysanpham.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style_product.css">
    <title>Thế giới di động</title>
</head>

<body>
    <div class="main">

        <div class="header">
            <div class="logo" style="float: left;">
                <a href="index.html"> <img src="image/logo_thegioididong.png" alt="logothegioididong" width="196px"></a>
            </div>
            <div class="searchBar">
                <div class="topnav" style="padding-top:14px;padding-bottom:18px">
                    <a class="active" href="index.html">Trang chủ</a>
                    <a href="introduce.html">Giới thiệu</a>
                    <a href="cart.html">Giỏ Hàng</a>
                    <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")'>Hotline: 1900</a>
                    <input type="text" placeholder="Tìm kiếm..">
                </div>
            </div>
        </div>

        <div class="productArea">
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
        
        <div class="myfooter">

            <center style="padding-top: 60px;">

                <h2><span style="color: red;">Tập Đoàn</span></h2>

                <p><strong>Địa chỉ: 273, An Dương Vương, Phường 3, Quận 5, TP.HCM</strong></p>
                <p>Liên he: 01207288007</p>

                <p>hdcpaint.com</p>
                <p>Copyright © by HDC Group</p>
            </center>

        </div>

    </div>

</body>

</html>