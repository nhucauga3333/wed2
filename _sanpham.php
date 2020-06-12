 <?php    
$sql = "SELECT * FROM SANPHAM WHERE MaLoai = " . $_GET['MaLoai'];



$result = mysqli_query($conn, $sql);
$listProduct = array();



$page = 1;//khởi tạo trang ban đầu
$limit = 12;//số bản ghi trên 1 trang (2 bản ghi trên 1 trang)


//tổng số trang

$total_record = mysqli_num_rows($result);//tính tổng số bản ghi có trong bảng khoahoc




$total_page = ceil($total_record / $limit);//tính tổng số trang sẽ chia

//xem trang có vượt giới hạn không:

if (isset($_GET["Page"])) {

    $page = $_GET["Page"];
};//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
if ($page < 1) $page = 1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
if ($page > $total_page && $total_page != 0) $page = $total_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng



//tính start (vị trí bản ghi sẽ bắt đầu lấy):

$start = ($page - 1) * $limit;

//lấy ra danh sách và gán vào biến $arrs:
$sql = "SELECT * FROM SANPHAM WHERE MaLoai = " . $_GET['MaLoai'] . " LIMIT " . $start . "," . $limit;




$result = mysqli_query($conn, $sql);

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
        $nav .= '<a  href = "sanpham.php?MaLoai=' . $_GET['MaLoai'] . '&Page=' . $i . '">' . $i . '</a>';        //dau \ de lay ki tu
    }
}


// tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
if ($page > 1)
{
   $p  = $page - 1;
   $prev  = '<a  href = "sanpham.php?MaLoai=' . $_GET['MaLoai'] . '&Page=' . $p . '">' . 'prev' . '</a>';

   $first = '<a  href = "sanpham.php?MaLoai=' . $_GET['MaLoai'] . '&Page=1">first</a>';
}
else
{
   $prev  = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
   $first = '&nbsp;'; // va lien ket trang dau
}



if ($page < $total_page)
{
   $p = $page + 1;
   $next =  '<a href = "sanpham.php?MaLoai=' . $_GET['MaLoai'] . '&Page=' . $p . '">' . 'next' . '</a>';

   $last = '<a  href = "sanpham.php?MaLoai=' . $_GET['MaLoai'] . '&Page=' . $total_page . '">' . 'last' . '</a>';
}
else
{
   $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
   $last = '&nbsp;'; // va lien ket trang cuoi
}



?>



<div class="productArea">
    <div class="production_selling">
        <?php
        for ($i = 0; $i < count($listProduct); $i++) {
            echo "<div class='product'style='min-height:550px'>";
            echo        "<div class='pImage'>";
            echo        '    <a href="ctsanpham.php?ID=' . $listProduct[$i]['ID'] . '" ><img src="' . $listProduct[$i]['ImgPath'] . '"></a>';
            echo        "</div>";
            echo        "<div class='pInfo'>";
            echo            "<p><strong>" . $listProduct[$i]['TenSP'] . "</strong></p>";
            echo            "<h3 class='amount'>" . $listProduct[$i]['Gia'] . "₫</h3>";                      
            echo    "<span>Màn Hình: " . $listProduct[$i]['ManHinh'] . "</span><br>";
            echo    "<span>HĐH: " . $listProduct[$i]['HDH'] . "</span><br>";
            echo    "<span>Camera Sau: " . $listProduct[$i]['CameraSau'] . "</span><br>";
            echo    "<span>Camera Trước: " . $listProduct[$i]['CameraTruoc'] . "</span><br>";
            echo    "<span>CPU: " . $listProduct[$i]['CPU'] . "</span><br>";
            echo    "<span>Ram: " . $listProduct[$i]['Ram'] . "</span><br>";
            echo    "<span>Rom: " . $listProduct[$i]['Rom'] . "</span><br>";
            echo    "<span>Dung Lượng Pin: " . $listProduct[$i]['DungLuongPin'] . "</span>";
            echo        "</div>";
            echo "</div>";
        }
        ?>
    </div>




 <!-- 'start hiện nút phân trang' -->
 <div class="pagercontainer">
 <br>
        <?php
            echo $first . $prev . $nav . $next . $last;
        ?>
</div>
    <!-- 'end hiện nút phân trang' -->

   
</div>

<style>
    .pagercontainer
{
	text-align: center;
	margin: 0 auto;
    clear: both;
    width: 1000px;
	}
.pagercontainer a
{
	border: solid 1px #C9C9C9;
	text-decoration: none;
	margin: 0 5px;
	padding: 5px 8px;
	}
</style>