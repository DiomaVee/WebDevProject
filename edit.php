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
    
    if(isset($_POST['edit'])){
         $productID = $_POST['edit'];
    }

    if(isset($_POST['editProduct'])){
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productDescription = $_POST['productDescription'];
        $productCategory = $_POST['productCategory'];
        $productImage = $_POST['productImage'];
        $productID = $_POST['editProduct'];
        
        $sql = "UPDATE menu SET 
                productName = '$productName',
                productPrice = '$productPrice',
                productDescription = '$productDescription',
                productCategory = '$productCategory',
                productImage = '$productImage'
                WHERE productID='$productID'";

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
    <div id="nav">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <Li><a href="../login/welcomeUser.php">Menu</a></li>
            <?php if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"): ?>
                <li><a href="../adminDash/adminDash.php">Admin Dashboard</a></li>
            <?php endif; ?>
            <li style=float:right><a href="register.php">Register</a></li>
            <li style=float:right><a href="../login/logout.php">Logout</a></li> 
        </ul>
        <br>
    </div>

    <div class="lform">
        <h1>Edit Product</h1>
        <br>
        <form action="edit.php" method="post">
            <input type="text" name="productName" placeholder="Product Name" required>
            <br><br>
            <input type="text" name="productPrice" placeholder="Product Price" required>
            <br><br>
            <textarea id="productDescription" name="productDescription" row="8" col="50" placeholder="Product Description" required></textarea>
            <br><br>
            <input type="text" name="productCategory" placeholder="Product Category" required>
            <br><br>
            <input type="text" name="productImage" placeholder="Product Image URL" required>
            <br><br>
            <br>
            <button class="button" name='editProduct' value="<?php echo htmlspecialchars($productID); ?>" type='submit'>Edit Product</button>
            <br><br>
        </form>
    </div>
</body>
</html>