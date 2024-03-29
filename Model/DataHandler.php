<?php

require "Constants.php";
class DataHandler {
   
    
    public $conn;
    public $statement;
            

   public function DataHandler(){
          
   }



   public function createDBConnection(){
    $this->conn = new mysqli(DBlink, Username,Password, DBname);
       
    if($this->conn->connect_error){
        return false;
    }
    return true;
   }



  /* public function autoCreateDatabase(){
          $this->conn = new mysqli(DBlink, Username, Password);

          if($this->conn->connect_error){
             //  die("An error occured while connecting to the database"); 
          }

          $makeDB = "CREATE DATABASE HealthCareDB";
          if($this->conn->query($makeDB) === TRUE){
            //  echo("Database Created Successfully");
          }
          else{
             // echo("Error Creating Database" .$this->conn->error);
          }
   }

   public function createTableHealthCareUsers(){

        $makeTable = "CREATE TABLE Users (
        Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(50) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Passcode VARCHAR(50) NOT NULL,
        Reg_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
       )";

       if($this->conn->query($makeTable) === TRUE){
          // echo "Table Users Has been created successfully";
       }
       else{
          //  echo"an error occured while creating a table " .$this->conn->error;
       }
       
   }

   public function createTablePatients(){
    $makeTable = "CREATE TABLE Patients (
        Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        gender VARCHAR(6) NOT NULL,
        birthdate DATE,        
        currentAddress VARCHAR(100) NOT NULL,
        occupation VARCHAR(40) NOT NULL
       )";

       if($this->conn->query($makeTable) === TRUE){
          // echo "Table Users Has been created successfully";
       }
       else{
          //  echo"an error occured while creating a table " .$this->conn->error;
       }
   }


   public function createTableHealthRecord(){
    $makeTable = "CREATE TABLE  health_records(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        patient_id INT(6) NOT NULL,
        weight DOUBLE NOT NULL,
        height DOUBLE NOT NULL,
        temp_reading DOUBLE NOT NULL,
        code VARCHAR(15) NOT NULL,
        visit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        username VARCHAR(40) NOT NULL
       )";

       if($this->conn->query($makeTable) === TRUE){
          // echo "Table Users Has been created successfully";
       }
       else{
          //  echo"an error occured while creating a table " .$this->conn->error;
       }
   }
   */

   public function executeAction($query){
       $result = $this->conn->query($query);
       if($result){
           throw new Exception("Failed to execute query");
       }
       return true;
       
   }
   
   public function getDataQuery($query){
       $result = $this->conn->query($query);
       if(!$result){
           throw new Exception("Could not get data");
       }
       else
           return $result;
   }
    
  public function clearDB() {
      $this->conn->close();
  }
  

}
