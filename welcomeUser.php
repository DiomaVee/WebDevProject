<?php
    session_start();

    include("../register/connection.php");

    if(!isset($_SESSION['userID'])){
        header("Location: login.php");
        exit();
    }

    $userID = $_SESSION['userID'];
    $sql = "SELECT userFirstName FROM register WHERE userID = '$userID'";
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    $fname = $row['userFirstName'];

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
            <li><a href="welcomeUser.php">Menu</a><li>
            <?php if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"): ?>
                <li><a href="../adminDash/adminDash.php">Admin Dashboard</a></li>
            <?php endif; ?>
            <li style=float:right><a href="register.php">Register</a></li>
            <li style=float:right><a href="../login/logout.php">Logout</a></li> 
        </ul>
        <br>
    </div>
    <br><br>
    <h1>Welcome <?php echo $fname.'!'; ?></h1>
    <br>
    <hr>
    <br>
    <h1>Menu:</h1>
    <br>
    <hr>
    <h2>Starters:</h2>
    <?php 
        $sql = "SELECT * FROM menu WHERE productCategory='starter'";
        $result = mysqli_query($conn,$sql);

        echo "<div class='menu-container'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='menu-card'>";
            echo "<img style= 'width: 200px; height: 200px;'src='" . htmlentities($row['productImage']) . "'>";          
            echo "<h3>".htmlentities($row['productName']). "</h3>";
            echo "<p class='price'>€".htmlentities($row['productPrice'])."</p>";
            echo "<p class='description'>".htmlentities($row['productDescription'])."</p>";
            echo "</div>";
        }
        echo "</div>";
    ?>
    <hr>

    <h2>Mains:</h2>
    <?php 
        $sql = "SELECT * FROM menu WHERE productCategory='main'";
        $result = mysqli_query($conn,$sql);

        echo "<div class='menu-container'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='menu-card'>";
            echo "<img style= 'width: 200px; height: 200px;'src='" . htmlentities($row['productImage']) . "'>";          
            echo "<h3>".htmlentities($row['productName']). "</h3>";
            echo "<p class='price'>€".htmlentities($row['productPrice'])."</p>";
            echo "<p class='description'>".htmlentities($row['productDescription'])."</p>";
            echo "</div>";
        }
        echo "</div>";

    ?>
    <hr>

    <h2>Desserts:</h2>
    <?php 
        $sql = "SELECT * FROM menu WHERE productCategory='dessert'";
        $result = mysqli_query($conn,$sql);

        echo "<div class='menu-container'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='menu-card'>";
            echo "<img style= 'width: 200px; height: 200px;'src='" . htmlentities($row['productImage']) . "'>";          
            echo "<h3>".htmlentities($row['productName']). "</h3>";
            echo "<p class='price'>€".htmlentities($row['productPrice'])."</p>";
            echo "<p class='description'>".htmlentities($row['productDescription'])."</p>";
            echo "</div>";
        }
        echo "</div>";

    ?>
    <hr>

    <h2>Sides:</h2>
    <?php 
        $sql = "SELECT * FROM menu WHERE productCategory='side'";
        $result = mysqli_query($conn,$sql);

        echo "<div class='menu-container'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='menu-card'>";
            echo "<img style= 'width: 200px; height: 200px;'src='" . htmlentities($row['productImage']) . "'>";          
            echo "<h3>".htmlentities($row['productName']). "</h3>";
            echo "<p class='price'>€".htmlentities($row['productPrice'])."</p>";
            echo "<p class='description'>".htmlentities($row['productDescription'])."</p>";
            echo "</div>";
        }
        echo "</div>";

    ?>
    <hr>

    <h2>Drinks:</h2>
    <?php 
        $sql = "SELECT * FROM menu WHERE productCategory='drink'";    
        $result = mysqli_query($conn,$sql);

        echo "<div class='menu-container'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='menu-card'>";
            echo "<img style= 'width: 200px; height: 200px;'src='" . htmlentities($row['productImage']) . "'>";          
            echo "<h3>".htmlentities($row['productName']). "</h3>";
            echo "<p class='price'>€".htmlentities($row['productPrice'])."</p>";
            echo "<p class='description'>".htmlentities($row['productDescription'])."</p>";
            echo "</div>";
        }
        echo "</div>";

    ?>
    <hr>

</body>
</html>