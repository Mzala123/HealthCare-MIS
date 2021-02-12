<?php
session_start();
if(isset($_SESSION['username_Mzala'])){
    $username = $_SESSION['username_Mzala'];
    echo "Logged out as $username";
    session_destroy();

    header("location:../Logins.php");
    
}
else{
    header("location:../index.php");
}
