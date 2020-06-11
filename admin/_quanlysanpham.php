<?php

$timkiemTen = "";

if (isset($_GET['TenSP'])) {
    $timkiemTen =  $_GET['TenSP'];
}

$timkiemTensql = "%" . $timkiemTen . "%";

$sql =  $conn->prepare("SELECT S.ID, S.TenSP,S.Gia,L.TenLoai FROM SANPHAM S INNER JOIN loaisp L ON S.MaLoai = L.ID WHERE TenSP LIKE ?");
$sql->bind_param("s", $timkiemTensql);



$sql->execute();

$result = $sql->get_result();

$listProduct = array();


$page = 1; //khởi tạo trang ban đầu
$limit = 12; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)

//tổng số trang

$total_record = mysqli_num_rows($result); //tính tổng số bản ghi có trong bảng khoahoc

$total_page = ceil($total_record / $limit); //tính tổng số trang sẽ chia

if (isset($_GET["Page"])) {

    $page = $_GET["Page"];
}; //nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
if ($page < 1) $page = 1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
if ($page > $total_page && $total_page != 0) $page = $total_page; //nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng

//tính start (vị trí bản ghi sẽ bắt đầu lấy):

$start = ($page - 1) * $limit;

//lấy ra danh sách và gán vào biến $arrs:

$sql =  $conn->prepare("SELECT S.ID, S.TenSP,S.Gia,L.TenLoai FROM SANPHAM S INNER JOIN loaisp L ON S.MaLoai = L.ID WHERE TenSP LIKE ? LIMIT ?,?");
//$timkiemTensql = $timkiemTensql ." LIMIT ".$start.",".$limit;
$sql->bind_param("sii", $timkiemTensql, $start, $limit);
$sql->execute();
//$sql = "SELECT * FROM SANPHAM WHERE MaLoai = " . $_GET['MaLoai'] . " LIMIT " . $start . "," . $limit;

$result = $sql->get_result();


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $listProduct[] = $row;
    }
}

$nav  = ''; //no la 1 chuoi

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $nav .= "<a style = 'color:white; background-color:blue' >" . $page . "</a>"; // khong can tao link cho trang hien hanh
    } else {
        $nav .= '<a  href = "quanlysanpham.php?TenSP=' . $timkiemTen . '&Page=' . $i . '">' . $i . '</a>';        //dau \ de lay ki tu
    }
}

// tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
if ($page > 1) {
    $p  = $page - 1;
    $prev  = '<a  href = "quanlysanpham.php?TenSP=' . $timkiemTen . '&Page=' . $p . '">' . 'prev' . '</a>';

    $first = '<a  href = "quanlysanpham.php?TenSP=' . $timkiemTen . '&Page=1">first</a>';
} else {
    $prev  = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
    $first = '&nbsp;'; // va lien ket trang dau
}

if ($page < $total_page) {
    $p = $page + 1;
    $next =  '<a href = "quanlysanpham.php?TenSP=' . $timkiemTen . '&Page=' . $p . '">' . 'next' . '</a>';

    $last = '<a  href = "quanlysanpham.php?TenSP=' . $timkiemTen . '&Page=' . $total_page . '">' . 'last' . '</a>';
} else {
    $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
    $last = '&nbsp;'; // va lien ket trang cuoi
}


?>

<div class="card">
    <div class="card-header">
        <div>
            <div style="float:left">
                <h5 class="card-title">

                    Danh sách sản phẩm
                </h5>
            </div>

            <div style="float:right;vertical-align:middle;line-height:52px">
                <a href="themsanpham.php">Thêm mới</a>
            </div>
        </div>


        <div style="clear:both">
            <br />
            <div style="float:left">
                <form action="quanlysanpham.php" method="GET">
                    <?php
                    echo    '<input class="form-control" type="text" value="' . $timkiemTen . '" name="TenSP"  placeholder="Tìm kiếm..">'
                    ?>
                </form>
            </div>

        </div>



    </div>
    <div class="card-body" style="min-height:700px">

        <table class="table" style="width:100%; font-size:14px">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Loại</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($listProduct); $i++) {

                    $xoasp = "window.location.href = 'xoasanpham.php?ID=" . $listProduct[$i]['ID'] . "'";

                    $suasp = "window.location.href = 'suasanpham.php?ID=" . $listProduct[$i]['ID'] . "'";
                    echo    '<tr>';
                    echo        '<td  class="text-center">' . ($i + 1) . '</td>';
                    echo        '<td>' . $listProduct[$i]['TenSP'] . '</td>';
                    echo        '<td>' . $listProduct[$i]['Gia'] . '</td>';
                    echo        '<td>' . $listProduct[$i]['TenLoai'] . '</td>';
                    echo        '<td><button class="btn btn-primary" onclick = "' . $suasp . '">Sửa</button> <button class="btn btn-danger"  onclick = "' . $xoasp . '">Xóa</button></td>';
                    echo    '</tr>';
                }
                ?>
            </tbody>

        </table>

        <!-- 'start hiện nút phân trang' -->
        <div class="pagercontainer" style="padding-bottom: 30px;">
            <br><br>
            <?php
            echo $first . $prev . $nav . $next . $last;
            ?>
        </div>
        <!-- 'end hiện nút phân trang' -->


    </div>
</div>

<style>
    .pagercontainer {
        text-align: center;
        margin: 0 auto;
        clear: both;
        width: 1000px;
    }

    .pagercontainer a {
        border: solid 1px #C9C9C9;
        text-decoration: none;
        margin: 0 5px;
        padding: 5px 8px;
    }
</style>