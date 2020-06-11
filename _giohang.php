<?php

use FFI\ParserException;



if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $Giohang = json_decode($_REQUEST["Giohang"], false);


    $tongtien = 0;
    for ($i = 0; $i < count($Giohang); $i++) {
        $tongtien = $tongtien + ($Giohang[$i]->gia * $Giohang[$i]->soluong);
    }

    //thêm dữ liệu vào hóa đơn
    $sql =  $conn->prepare("INSERT INTO HOADON (SoHD,NgLap,TenKH,SdtKH,DiaChiGiaoHang,TongTien) VALUES (?,?,?,?,?,?)");
    $sql->bind_param("sssssi", $SoHD, $NgLap, $TenKH, $SdtKH, $DiaChiGiaoHang, $TongTien);
    $SoHD = "HĐ" . randomNumber(7);
    $NgLap =  date('Y-m-d H:i:s');
    $TenKH = $_REQUEST['TenKH'];
    $SdtKH = $_REQUEST['SdtKH'];
    $DiaChiGiaoHang = $_REQUEST['DiaChiGiaoHang'];
    $TongTien = $tongtien;

    $sql->execute();

    $last_id = mysqli_insert_id($conn);

    for ($i = 0; $i < count($Giohang); $i++) {
        //thêm dữ liệu vào chi tiết hóa đơn
        $sql =  $conn->prepare("INSERT INTO CTHOADON (IDHoaDon,TenSP,SoLuong,DonGia,ThanhTien) VALUES (?,?,?,?,?)");
        $sql->bind_param("isiii", $IDHoaDon, $TenSP, $SoLuong, $DonGia, $ThanhTien);
        $IDHoaDon = $last_id;
        $TenSP = $Giohang[$i]->tensp;
        $SoLuong = $Giohang[$i]->soluong;
        $DonGia = $Giohang[$i]->gia;
        $ThanhTien = $Giohang[$i]->gia * $Giohang[$i]->soluong;
        $sql->execute();
    }
    $sql->close();
    $conn->close();

    $_SESSION["dathang"]  = "thanhcong";

    header('Location: dathangthanhcong.php');
}


function randomNumber($length)
{
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
?>




<link rel="stylesheet" type="text/css" href="style_cart.css">



<style>
    .tablegiohang {

        table-layout: fixed;
        word-wrap: break-word;
    }
</style>
<div>
    <p style="visibility: hidden;">fsdfsfs</p>
    <center id="hienthigiohangrong" style="display:none">
        <p>GIỎ HÀNG CỦA BẠN CHƯA CÓ SẢN PHẨM NÀO</p>
    </center>

    <div class="mid" id="hienthigiohang" style="display:none">
        <div>
            <p class="pull-left" style="font-size: large;color: #116ab7;">GIỎ HÀNG CỦA BẠN (<span id="tongsosanpham">2</span> sản phẩm)</p>
            <a class="pull-right" href="index.php" style="font-size: large; margin-top: 20px; color: #337ab7;">Mua thêm sản phẩm khác</a>
        </div>
        <div class="clear-both">
            <hr />
        </div>
        <div class="clear-both padding-14">
            <table style="width:100%" class="tablegiohang" id="tablegiohang">
            </table>
        </div>




        <div class="clear-both pull-right">
            <p style="font-size: large; margin-right: 20px; "><strong>Tổng tiền: <span style="color:red" id="tongtien">68.980.000 đ</span> </strong></p>
        </div>

        <div class="clear-both" style="padding-top: 20px;">
            <p style="font-size: large; color: #d0021b;">THÔNG TIN KHÁCH HÀNG</p>



            <script>
                


                function validateForm() {
                    var name = document.forms["form"]["TenKH"].value;
                    if (name == "") {
                        alert("Vui Lòng Nhập Tên");
                        return false;
                    }

                    var sdt = document.forms["form"]["SdtKH"].value;
                    if (sdt == "" || sdt > 1000000000 || sdt < 9999999999) {
                        alert("Vui Lòng Nhập SĐT");
                        return false;
                    }

                    $(document).ready(function() {
                    $('body').on('click', '.checkmobile', function() {
                        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                        var mobile = $('#mobile').val();
                        if (mobile !== '') {
                            if (vnf_regex.test(mobile) == false) {
                                alert('Số điện thoại của bạn không đúng định dạng!');
                            } else {
                                alert('Số điện thoại của bạn hợp lệ!');
                            }
                        } else {
                            alert('Bạn chưa điền số điện thoại!');
                        }
                    });
                });

                    var diachi = document.forms["form"]["DiaChiGiaoHang"].value;
                    if (diachi == "") {
                        alert("Vui Lòng Nhập Địa chỉ");
                        return false;
                    }
                }
            </script>

            <form class="form-inline" name="form" action="giohang.php" method="POST" onsubmit="return validateForm()">
                <table>
                    <tr>
                        <td><label>Họ và tên: *</label></td>
                        <td><input type="text" placeholder="nhập họ và tên" name="TenKH"></td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại: *</label></td>
                        <td><input type="text" placeholder="nhập số điện thoại" name="SdtKH"><br /></td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ giao hàng:</label></td>
                        <td><input type="text" placeholder="nhập Địa chỉ giao hàng" name="DiaChiGiaoHang"><br /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="pull-right">
                            <button type="submit" style="color:black"><strong>Đặt hàng luôn</strong></button>
                        </td>
                    </tr>
                </table>

                <input type="hidden" id="inhoadon" name="Giohang" />
            </form>
        </div>
    </div>
</div>


<script>
    var giohang = localStorage.getItem("giohang");

    document.getElementById("inhoadon").value = giohang;

    var listsanpham = [];
    var tongtien = 0;

    if (giohang.length > 0) {
        listsanpham = JSON.parse(giohang);
    }

    var table = document.getElementById("tablegiohang");

    for (var i = 0; i < listsanpham.length; i++) {
        var row = document.createElement("TR");

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        cell1.setAttribute("width", "110px");
        cell2.setAttribute("width", "270px");

        cell3.setAttribute("width", "100px");
        cell3.setAttribute("style", "text-align:center");

        cell4.setAttribute("width", "130px");
        cell4.setAttribute("style", "text-align:center");

        cell5.setAttribute("style", "text-align:center");



        cell1.innerHTML = '<img width="100" height="102" src="' + listsanpham[i].hinhanh + '"/>';
        cell2.innerHTML = ' <p><b>' + listsanpham[i].tensp + '</b></p>';
        cell3.innerHTML = ' <p>' + listsanpham[i].gia + ' ₫</p>';
        cell4.innerHTML = ' <button onclick = "giamsoluong(this)">-</button> ' +
            '<input type="text" disabled value="' + listsanpham[i].soluong + '" style="width: 40px; text-align: center;" /> ' +
            '<button onclick = "tangsoluong(this)">+</button>';
        cell5.innerHTML = '<button onclick = "xoa(this)">x</button> ';


        table.appendChild(row);
    }

    function xoa(button) {
        var row = button.parentElement.parentElement;

        var index = row.rowIndex;


        listsanpham.splice(index, 1);

        localStorage.setItem("giohang", JSON.stringify(listsanpham));


        window.location.href = "giohang.php";
    }

    function tangsoluong(button) {
        var row = button.parentElement.parentElement;

        var index = row.rowIndex;


        listsanpham[index].soluong = listsanpham[index].soluong + 1;

        localStorage.setItem("giohang", JSON.stringify(listsanpham));


        window.location.href = "giohang.php";
    }

    function giamsoluong(button) {
        var row = button.parentElement.parentElement;

        var index = row.rowIndex;


        listsanpham[index].soluong = listsanpham[index].soluong - 1;



        // xóa sản phẩm nếu sô lượng = 0
        if (listsanpham[index].soluong == 0) {
            listsanpham.splice(index, 1);
        }

        localStorage.setItem("giohang", JSON.stringify(listsanpham));
        window.location.href = "giohang.php";


    }

    //tinh tong tien
    for (var i = 0; i < listsanpham.length; i++) {
        tongtien = tongtien + (Number(listsanpham[i].soluong) * Number(listsanpham[i].gia));
    }

    document.getElementById("tongtien").innerHTML = tongtien + "đ";

    //tinhsoluongsanpham

    document.getElementById("tongsosanpham").innerHTML = listsanpham.length;

    if (listsanpham.length > 0) {
        document.getElementById("hienthigiohang").setAttribute("style", "display:block");
    } else {
        document.getElementById("hienthigiohangrong").setAttribute("style", "display:block");
    }
</script>