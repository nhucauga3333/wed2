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


