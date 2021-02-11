<?php

require("Person.php");

class Patient extends Person{

    protected $occupation;
    protected $addressDistrict;

    protected $weight;
    protected $height;
    protected $tempReading;
    protected $diagnosisCode;
    protected $codeDesc;
    protected $visit_date;
    protected $username;
    
    function initPatientDetails($fname, $lname, $gender, $birthDate,$addressDistrict,$occupation){
        $this->firstname  = $fname;
        $this->lastname  = $lname;
        $this->gender   = $gender;
        $this->dateOfBirth = $birthDate;
        $this->addressDistrict = $addressDistrict;
        $this->occupation = $occupation;
      
    }

    function initPatientHealthData($id, $weight, $height, $tempReading, $diagnosisCode, $codeDesc, $username){
        $this->Id = $id;
        $this->weight = $weight;
        $this->height = $height;
        $this->tempReading = $tempReading;
        $this->diagnosisCode = $diagnosisCode;
        $this->codeDesc = $codeDesc;
        $this->username = $username;
    }
    
    function registerPatient($handler){
        $query = "INSERT INTO patients (firstname, lastname, gender, birthdate, currentAddress, occupation)
         VALUES(?,?,?,?,?,?)";
         $pre = $handler->conn->prepare($query);
         $pre->bind_param("ssssss",$this->firstname,$this->lastname,$this->gender,
         $this->dateOfBirth, $this->addressDistrict,$this->occupation);
         $result = $pre->execute();
         if($result){
             $handler->conn->close();
             return true;
         }
         else{
             $handler->close();
             return false;
         }
    }

    function viewRegisteredPatients(){
        $query = "select * from patients";
        return $query;
    }


    function addPatientData($handler){
        $query = "INSERT INTO health_records (patient_id, weight, height, temp_reading,
         code, code_desc, username) VALUES(?,?,?,?,?,?,?)";
         
         $pre = $handler->conn->prepare($query);
    
        $pre->bind_param("idddsss",$this->Id,$this->weight,$this->height,
         $this->tempReading,$this->diagnosisCode,$this->codeDesc,$this->username);
                
         $result = $pre->execute();

         if($result){

             return true;
         }
         else{
            
             return false;
         }
    }


}