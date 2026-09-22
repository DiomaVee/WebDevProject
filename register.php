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
            <li style=float:right><a href="register.php">Register</a></li>
            <li style=float:right><a href="../login/login.php">Login</a></li>
        </ul>
        <br>
    </div>

    <div class="rform">
        <h1 id="heading">Register</h1>
        <br><br>
        <form action="register.php" method="post">
            <input type="text" name="fname" placeholder="First Name" required>
            <br><br>
            <input type="text" name="lname" placeholder="Last Name"required>
            <br><br>
            <input type="text" name="age" placeholder="Age" required>
            <br><br>
            <input type="email" name="email" placeholder="Email" required>
            </br><br>
            <input type="password" name="pass" placeholder="Password" required>
            </br><br>
            <br>
            <input class="button" name="submit" type="submit" value="Register"/>    
        </form>
    </div>
    <?php
    include("connection.php");

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "SELECT * FROM register WHERE userEmail='$email'";
        $result = mysqli_query($conn,$sql);
        $count_email = mysqli_num_rows($result);

        if($count_email > 0){
            echo '<script>
                alert("Email already exists!");
                window.location.href="../index.php";
                </script>';
        }
        else{
            $sql = "INSERT INTO register (userFirstName,userLastName,userAge,userEmail,userPass) VALUES ('$fname','$lname','$age','$email','$hash')";
            mysqli_query($conn, $sql);

            echo '<script>
                alert("Registration successful!");
                window.location.href="../index.php";
                </script>';

            if($result){
                header("Location: ../login/welcomeUser  .php");
                exit;
            }
        }
    }
?>
</body>
</html>