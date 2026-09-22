<?php
    session_start();
    session_unset();
    session_destroy();

    echo '<script>
        alert("Logged out successfully!");
        setTimeout(function(){
        window.location.href="logout.php";
        }, 500);
        </script>';

    header("Location: login.php");
    exit();
?>