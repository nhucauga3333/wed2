<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_cart.css">
        <title>Thế giới di động</title>
    </head>
    <body>
        <div class="main">

            <div class="header">
                <div class="logo" style="float: left;">
                    <a href="index.html"> <img src="image/logo_thegioididong.png" alt="logothegioididong"  width="196px"></a>
                </div>
                <div class="searchBar" >
                    <div class="topnav" style="padding-top:14px;padding-bottom:18px">                           
                        <a class="active" href="index.html">Trang chủ</a>
                        <a href="introduce.html"> Giới thiệu</a>
                        <a href="cart.html">Giỏ Hàng</a>
                        <a href="#" onclick='alert("đang gọi vui lòng chờ để được tư vấn")' >Hotline: 1900</a>
                        <input type="text" placeholder="Tìm kiếm..">
                    </div>
                </div>
            </div>

            <div class="mid">
                <div>
                    <p class="pull-left" style="font-size: large;     color: #116ab7;">GIỎ HÀNG CỦA BẠN (2 sản phẩm)</p>
                    <a class="pull-right" href="#" style="font-size: large; margin-top: 20px; color: #337ab7;">Mua thêm sản phẩm khác</a>                    
                </div>
               <div class="clear-both">
                    <hr/>
               </div>

                <div class="clear-both padding-14">
                    <div class="pull-left" style="width: 380px">
                        <div class="pull-left">
                            <img width="100" height="102" src="image/iphone/iphone-11-pro-max-512g.jpg"/>
                        </div>
                        <div class="pull-left">
                            <p><b>iPhone 11 Pro Max 512GB</b></p>
                        </div>                        
                    </div>
                    <div class="pull-left" style="margin-left: 20px; width: 120px">
                            <p>43.990.000₫</p>
                    </div>
                    <div class="pull-left" style="margin-left: 54px; margin-top: 17px;">
                        <button>-</button>
                        <input type="text" value="1" style="width: 50px; text-align: center;" />
                        <button>+</button>
                    </div>
                    <div class="pull-left" style="margin-left: 20px; margin-top: 17px;">
                            <button>x</button>                            
                        </div>
                </div>

                <div class="clear-both padding-14">
                        <hr/>
                   </div>

                   <div class="clear-both padding-14">
                        <div class="pull-left" style="width: 380px">
                            <div class="pull-left">
                                <img width="100" height="102" src="image/samsung/note10+.jpg"/>
                            </div>
                            <div class="pull-left">
                                <p><b>Samsung Galaxy Note 10+</b></p>
                            </div>                        
                        </div>
                        <div class="pull-left" style="margin-left: 20px; width: 120px">
                                <p>24.990.000₫</p>
                        </div>
                        <div class="pull-left" style="margin-left: 54px; margin-top: 17px;">
                            <button>-</button>
                            <input type="text" value="1" style="width: 50px; text-align: center;" />
                            <button>+</button>
                        </div>
                        <div class="pull-left" style="margin-left: 20px; margin-top: 17px;">
                                <button>x</button>                            
                            </div>
                    </div>

                    <div class="clear-both pull-right">
                        <p style="font-size: large; margin-right: 20px; "><strong>Tổng tiền: <span style="color:red">68.980.000 đ</span> </strong></p>

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
</html>