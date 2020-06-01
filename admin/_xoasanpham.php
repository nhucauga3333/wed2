<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
 
        $sql =  $conn->prepare("DELETE FROM sanpham WHERE ID = ?");
        $sql->bind_param("i", $ID);
        $ID =  $_REQUEST['ID'];
        $sql->execute();

        $sql->close();
        $conn->close();

        header('Location: quanlysanpham.php');
    }
?>