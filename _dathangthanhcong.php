<?php

if( $_SESSION["dathang"]!="thanhcong") {
     header('Location: index.php');
}

$_SESSION["dathang"] = "";

?>

<div style ="margin-top:300px">
     <center >
          <p style = "color:#007bff">ĐẶT HÀNG THÀNH CÔNG</p>
     </center>

</div>

<script>

localStorage.setItem("giohang","");
</script>