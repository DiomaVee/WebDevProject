<?php
    session_start();
    require("../register/connection.php");

    if(!isset($_SESSION['userID'])){
        header("Location: login/login.php");
        exit();
    }

    if($_SESSION['userRole'] == "user"){
        header("Location: ../index.php");
        exit();
    }

    if(isset($_POST['delete'])){
        $productID = $_POST['delete'];
        $sql = "DELETE FROM menu WHERE productID = $productID";
        mysqli_query($conn,$sql);

        header("Location: adminDash.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
</body>
</html>