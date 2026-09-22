<?php
    session_start();
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
            <li style=float:right><a href="../register/register.php">Register</a></li>
            <li style=float:right><a href="login.php">Login</a></li>
        </ul>
        <br>
    </div>

    <div class="lform">
        <div class="heading">
            <h1>Login</h1>
        </div>
        <form action="login.php" method="post">
            </br><br>
            <input type="email" name="email" placeholder="Email" required>
            </br><br>
            <input type="password" name="pass" placeholder="Password" required>
            </br><br>
            </br>
            <input class="button" name="login" type="submit" value="Login"/>
        </form>
    </div>

    <?php
        require("../register/connection.php");

        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['pass'];

            $sql = "SELECT * FROM register WHERE userEmail = '$email'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);
            $password = password_verify($password, $row['userPass']);

            if($password){
                header("Location: WelcomeUser.php");

                $_SESSION['userID'] = $row['userID'];
                $_SESSION['userRole'] = $row['userRole'];
                
                exit;
            }

            else{
                echo '<script>
                alert("Login failed, Invalid email or password!");
                setTimeout(function(){
                window.location.href="login.php";
                }, 500);
                </script>';
            }
        }
    ?>
</body>
</html>