<?php

require("Person.php");

class User extends Person{
    protected $Uname;
    protected $passcode;
    protected $imagePath;
    protected $RegDate;
    
    function inializeUserDetails($Uname, $email, $passcode) {
        
        $this->Uname = $Uname;
        $this->passcode = $passcode;
        $this->emailAddress = $email;
     
    }

    function setUserUpdate($firstname, $lastname){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        
    }
    
    function setUname($Uname): void {
        $this->Uname = $Uname;
    }

    function setPasscode($passcode): void {
        $this->passcode = $passcode;
    }

    function setImagePath($imagePath): void {
        $this->imagePath = $imagePath;
    }

        
    function getUname() {
        return $this->Uname;
    }

    function getPasscode() {
        return $this->passcode;
    }


    function getImagePath() {
        return $this->imagePath;
    }

    
    function registerHealthCareUser($handler){
        $query = "INSERT INTO users (Username, Email, Passcode) VALUES(?,?,sha1(?))";
        $pre = $handler->conn->prepare($query);
        $pre->bind_param("sss", $this->Uname, $this->emailAddress, $this->passcode);
        $result = $pre->execute();
        if($result){
           /* echo '<script>
            alert("User added successfully");
            window.location.href = "Index.php";
           </script>';*/
           $handler->conn->close();
           return true;
          }
          else{
            /*echo '<script>
            alert("Failed to add user");
            window.location.href = "Index.php";
           </script>';*/
           $handler->conn->close();
           return false;
          }     
       
    }

    function viewRegisteredUsers(){
        $query = "select * from users";
        return $query;
    }
    
   
    function performLogin($unique, $passcode){
        $query = "Select * from users where (Username ='$unique' or Email ='$unique') "
                . "and Passcode = sha1('$passcode')";    
        return $query;
        
    }

    public function emailExist($email){
        $query = "SELECT * from users where Email = '$email'  ";
        return $query;
   }
   
    public function usernameExist($username){
        $query = "SELECT * from users where Username = '$username'  ";
       return $query;
   }
}