<?php
    session_start();

    include("register/connection.php");

    if(!isset($_SESSION['userID'])){
        header("Location: login/login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login/welcomeUser.php">Menu</a><li>
            <?php if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"): ?>
                <li><a href="adminDash/adminDash.php">Admin Dashboard</a></li>
            <?php endif; ?>
            <li style=float:right><a href="register/register.php">Register</a></li>
            <li style=float:right><a href="login/logout.php">Logout</a></li>
        </ul>
        <br>
    </div>
    <div class="about">
        <h1>Welcome to Sakura Miso!</h1>
        <br>
        <p>At Sakura Miso Restaurant, we offer a unique dining experience with a focus on healthy, traditional Japanese cuisine. Using
        only the finest ingredients, we take pride in providing our customers with the best sushi and sashimi.
        Enjoy a warm and friendly atmosphere that caters to all your needs, ensuring a memorable and authentic Japanese experience.</P>
    </div>
</body>
<?php
    
?>
</html>