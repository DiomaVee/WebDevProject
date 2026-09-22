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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="logged">
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
    <?php
        $sql = "SELECT * FROM menu";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border = '1'>";

            echo "<tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Product Category</th>
                <th>Product Image</th>
                <th>Edit Product</th>
                <th>Delete Product</th>
            </tr>";

            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".(htmlentities($row['productID'])."</td>");
                echo "<td>".(htmlentities($row['productName'])."</td>");
                echo "<td>".(htmlentities($row['productPrice'])."</td>");
                echo "<td>".(htmlentities($row['productDescription'])."</td>");
                echo "<td>".(htmlentities($row['productCategory'])."</td>");
                echo "<td>".(htmlentities($row['productImage'])."</td>");
                echo "<td> 
                    <form action='edit.php' method='post'>
                    <button type='submit' value='" . htmlentities($row['productID']) . "' name='edit'>Edit</button>                    </form>
                </td>";
                echo "<td> 
                    <form action='delete.php' method='post'>
                    <button type='submit' value='" . htmlentities($row['productID']) . "' name='delete'>Delete</button>                    </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        else{
            echo "0 Results";
        }

        $conn->close();
    ?>
    <form action='add.php' method='post'>
        <button type='submit' value='Add Product' name='addProduct'>Add Product</button>
    </form>

</body>
</html>