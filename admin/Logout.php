<?php

    session_start();
    
    $_SESSION["dangnhap"] = "";
    header('Location: ../login.php');
?>