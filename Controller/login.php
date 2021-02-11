<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:/Index.php');
}
else{
         require("../Model/DataHandler.php");
         require("../Model/User.php");
         $handler = new DataHandler();
         $handler->createDBConnection(); 
         $user = new User();


        if(isset($_POST["LoginWith"]) && isset($_POST["passcode"]))
        {
            $username = stripslashes($_REQUEST["LoginWith"]);

            $username = mysqli_real_escape_string($handler->conn, $username);
    
            $password = stripslashes($_POST["passcode"]);
            $password = mysqli_real_escape_string($handler->conn, $password);
            
            $result = $handler->getDataQuery($user->performLogin($username, $password));

           

            $rows = mysqli_num_rows($result);      //Fetching the number of rows in a column
            if ($rows == 1) {                      //If the number of rows is one then login details are correct 
                $row = mysqli_fetch_assoc($result); //Fetching user data, no need for loop since its one row
                /* Assigning user session  values to be used in different pages */
                $_SESSION['id'] = $row['Id'];
                $_SESSION['username'] = $row['Username'];
    
                //Return success status code 200 to login javascript file
                echo json_encode(array("statusCode" => 200));
            }else{
                 echo json_encode(array("statusCode" => 201));
            }
           
        }
        else{
            echo json_encode(array("statusCode" => 202));
        }
    
    
}