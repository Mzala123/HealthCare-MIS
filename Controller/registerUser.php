<?php
session_start();


if(!isset($_SESSION['Username'])){
    require_once("../Model/User.php");
    require_once("../Model/DataHandler.php"); 
    $handler = new DataHandler();
    $handler->createDBConnection();
    $user = new User();
    
    if (isset($_GET['currentState'])) {
        $state = $_GET['currentState'];
        switch ($state) {
         case "verify_username" : verifyUsername($handler,$user);break;
         case "verify_email"    : verifyEmail($handler,$user);break;
         case "register"        : addUser($handler, $user);break;
        // case "login"           : login($handler, $user);break;
        }
    } 
    else {
        echo json_encode(array("statusCode" => 206));
    }


}


function addUser($handler, $user){
    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["passcode"])){
        
        $username = stripslashes($_REQUEST["username"]);
        $username = mysqli_real_escape_string($handler->conn, $username);

        $password = stripslashes($_POST["passcode"]);
        $password = mysqli_real_escape_string($handler->conn, $password);

        $Email = stripslashes($_REQUEST["email"]);
        $Email = mysqli_real_escape_string($handler->conn, $Email);
         
        $user->inializeUserDetails($username, $Email, $password);

        if($user->registerHealthCareUser($handler)){
            echo json_encode(array("statusCode" => 200)); 
        }
        else{
            echo json_encode(array("statusCode" => 201));
        }
    
    

    }
    else{
        echo json_encode(array("statusCode" => 203)); 
    }
}


function verifyUsername($handler, $user) {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $result = $handler->conn->query($user->usernameExist($username));

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array("statusCode" => 204));
        } else {
            echo json_encode(array("statusCode" => 205));
        }
    } else {
        // echo json_encode(array("statusCode" => 204));
    }
}

function verifyEmail($handler, $user) {
    if (isset($_POST['email'])) {
        
        $email = $_POST['email'];
        if(isValidEmail($email)){
        $result = $handler->conn->query($user->emailExist($email));

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array("statusCode" => 204));
        } else {
            echo json_encode(array("statusCode" => 205));
        }
    }
    }
     else {
        // echo json_encode(array("statusCode" => 204));
    }
}
function isValidEmail($emailString) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emailString)) ? FALSE : TRUE;
}


?>