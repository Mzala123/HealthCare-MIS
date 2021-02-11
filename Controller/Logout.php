<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "Logged out as $username";
    session_destroy();

    header("location:../Logins.php");
    
}
else{
    header("location:../index.php");
}
