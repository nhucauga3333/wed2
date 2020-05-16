<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_cart.css">
        <title>Thế giới di động</title>



    </head>



    <body>


    <style>
    .tablegiohang{

        table-layout: fixed;
        word-wrap: break-word;
    }
</style>
        <div class="main">

            <div class="header">
                <div class="logo" style="float: left;">
                    <a href="index.php"> <img src="image/logo_thegioididong.png" alt="logothegioididong"  width="196px"></a>
                </div>
                <div class="searchBar" >
                    <div class="topnav" style="padding-top:14px;padding-bottom:18px">                           
                        <a class="active" href="index.php">Trang chủ</a>
                        <a href="introduce.php"> Giới thiệu</a>
                        <a href="cart.php">Giỏ Hàng</a>
                        <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")' >Hotline: 1900</a>
                        <input type="text" placeholder="Tìm kiếm..">
                    </div>
                </div>
            </div>

            <center id = "hienthigiohangrong" style = "display:none"><p>GIỎ HÀNG CỦA BẠN CHƯA CÓ SẢN PHẨM NÀO</p></center>

            <div class="mid" id = "hienthigiohang" style = "display:none" >
                <div>
                    <p class="pull-left" style="font-size: large;color: #116ab7;" >GIỎ HÀNG CỦA BẠN (<span id = "tongsosanpham">2</span> sản phẩm)</p>
                    <a class="pull-right" href="#" style="font-size: large; margin-top: 20px; color: #337ab7;">Mua thêm sản phẩm khác</a>                    
                </div>
               <div class="clear-both">
                    <hr/>
               </div>

                <div class="clear-both padding-14">

                       

                        <table style="width:100%" class="tablegiohang" id="tablegiohang">
                        </table>    


                  
                </div>

               
                  

                    <div class="clear-both pull-right">
                        <p style="font-size: large; margin-right: 20px; "><strong>Tổng tiền: <span style="color:red" id = "tongtien">68.980.000 đ</span> </strong></p>

                    </div>

                <div class="clear-both" style="padding-top: 20px;">
                    <p style="font-size: large; color: #d0021b;">THÔNG TIN KHÁCH HÀNG</p>
                   

                    <form class="form-inline" action="#">
                        <table>
                            <tr>
                                <td><label>Họ và tên: *</label></td>
                                <td><input type="text" placeholder="nhập họ và tên" name="customerName"></td>
                            </tr>
                            <tr>
                                <td><label>Số điện thoại: *</label></td>
                                <td><input type="text" placeholder="nhập số điện thoại" name="customerPhone"><br/></td>
                            </tr>
                            <tr>
                                <td><label>Email:</label></td>
                                <td><input type="text" placeholder="nhập email" name="customerEmail"><br/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pull-right">
                                    <button type="submit" onclick='alert("mua hàng thành công")' style="color:black"><strong>Đặt hàng luôn</strong></button>
                                </td>
                            </tr>
                        </table>                                                
                      </form>
                </div>

                    
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

    <script>

        var giohang =  localStorage.getItem("giohang");
        var listsanpham = [];

        var tongtien = 0;

      

        if(giohang.length>0){
            listsanpham = JSON.parse(giohang);
        } 



        var table = document.getElementById("tablegiohang");


        for(var i = 0 ; i<listsanpham.length;i++){
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


            
            cell1.innerHTML = '<img width="100" height="102" src="'+listsanpham[i].hinhanh+'"/>';
            cell2.innerHTML = ' <p><b>'+listsanpham[i].tensp+'</b></p>';
            cell3.innerHTML = ' <p>'+listsanpham[i].gia +' ₫</p>';
            cell4.innerHTML = ' <button onclick = "giamsoluong(this)">-</button> '
                       + '<input type="text" disabled value="'+listsanpham[i].soluong+'" style="width: 40px; text-align: center;" /> '
                      + '<button onclick = "tangsoluong(this)">+</button>';
            cell5.innerHTML = '<button onclick = "xoa(this)">x</button> ';


            table.appendChild(row);

        }

        function xoa(button){
            var row = button.parentElement.parentElement;

            var index = row.rowIndex;
            

            listsanpham.splice(index,1);   

            localStorage.setItem("giohang",JSON.stringify(listsanpham));


            window.location.href = "cart.php";
        }

        function tangsoluong(button){
            var row = button.parentElement.parentElement;

            var index = row.rowIndex;
            

            listsanpham[index].soluong = listsanpham[index].soluong + 1;

            localStorage.setItem("giohang",JSON.stringify(listsanpham));


            window.location.href = "cart.php";
        }

        function giamsoluong(button){
            var row = button.parentElement.parentElement;

            var index = row.rowIndex;
            

            listsanpham[index].soluong = listsanpham[index].soluong - 1;



            // xóa sản phẩm nếu sô lượng = 0
            if(listsanpham[index].soluong == 0){
                listsanpham.splice(index,1);   
            }

            localStorage.setItem("giohang",JSON.stringify(listsanpham));


            window.location.href = "cart.php";


        }

        //tinh tong tien
        for(var i = 0 ; i<listsanpham.length;i++){
            tongtien = tongtien +( Number(listsanpham[i].soluong) * Number(listsanpham[i].gia));
        }

        document.getElementById("tongtien").innerHTML = tongtien +" đ";

        //tinhsoluongsanpham

        document.getElementById("tongsosanpham").innerHTML = listsanpham.length;

       
       if(listsanpham.length>0){
        document.getElementById("hienthigiohang").setAttribute("style", "display:block");
       }else{
        document.getElementById("hienthigiohangrong").setAttribute("style",  "display:block");
       }

    </script>



    
</html>