
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

    $account = $_POST["account"];
    $password =  $_POST["password"];

    $sql = "SELECT firstname, lastname FROM account where account = '$account' and password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
        header('Location: loginsuccess.php');

    } else {
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    
    

    <body>
    

       <h2> Welcome account <?php echo   "SELECT firstname, lastname FROM account where account = '$account' and password = '$password'"  ?><br>
Your email passwrd is: <?php echo $_POST["password"]; ?>

</h2>


    </body>



</head>
</html>