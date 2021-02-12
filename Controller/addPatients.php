<?php
session_start();
if(isset($_SESSION['username_Mzala'])){
    require_once("../Model/DataHandler.php"); 
    require_once("../Model/Patient.php");
   
    $handler = new DataHandler();
    $handler->createDBConnection();

    $patient = new Patient();
    
    if (isset($_GET['currentState'])) {
        $state = $_GET['currentState'];
        switch ($state) {
     
         case "register"        : createPatients($handler, $patient);break;
         case "addPatientData"        : addHealthRecordData($handler, $patient);break;
    
        }
    } 
    else {
        echo json_encode(array("statusCode" => 206));
    }

}

function createPatients($handler, $patient){
     if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"]) &&
     isset($_POST["birthDate"]) && isset($_POST["district"]) && isset($_POST["village"]) 
     && isset($_POST['occupation'])
     ){
        $fname = stripslashes($_POST["fname"]);
        $fname = mysqli_real_escape_string($handler->conn, $fname);

        $lname = stripslashes($_POST["lname"]);
        $lname = mysqli_real_escape_string($handler->conn, $lname);

        $gender = stripslashes($_POST["gender"]);
        $gender = mysqli_real_escape_string($handler->conn, $gender);

        $birthDate = stripslashes($_POST["birthDate"]);
        $birthDate = mysqli_real_escape_string($handler->conn, $birthDate);

        $district = stripslashes($_POST["district"]);
        $village = stripslashes($_POST["village"]);

        $mainAddress = $district.", ".$village;
        $mainAddress = mysqli_real_escape_string($handler->conn, $mainAddress);

        $occupation = stripslashes($_REQUEST["occupation"]);
        $occupation = mysqli_real_escape_string($handler->conn, $occupation);


       // $query = "INSERT INTO patients (firstname, lastname, gender, birthdate, currentAddress, occupation)
        $patient->initPatientDetails($fname, $lname, $gender, $birthDate, $mainAddress, $occupation);

        if($patient->registerPatient($handler)){
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


function addHealthRecordData($handler, $patient){
    if(isset($_POST["weight"]) && isset($_POST["height"]) && isset($_POST["temperature"]) &&
    isset($_POST["diagnosis"]) && isset($_POST["patient_id"]) )
    {
        $username = $_SESSION['username_Mzala'];
          
        $weight = stripslashes($_POST["weight"]);
        $weight = mysqli_real_escape_string($handler->conn, $weight);

        $height = stripslashes($_POST["height"]);
        $height = mysqli_real_escape_string($handler->conn, $height);

        $temperature = stripslashes($_POST["temperature"]);
        $temperature = mysqli_real_escape_string($handler->conn, $temperature);
        
        $codesDiagnosis = stripslashes($_POST["diagnosis"]);
   
        $codesDiagnosis = mysqli_real_escape_string($handler->conn, $codesDiagnosis);
        $diagnosis = explode('|',$codesDiagnosis);

        $code = $diagnosis[0];
        $desc = $diagnosis[1];

        $patientId = stripslashes($_POST["patient_id"]);
        $patientId = mysqli_real_escape_string($handler->conn, $patientId);

      //  function initPatientHealthData($id, $weight, $height, $tempReading, $diagnosisCode, $visit_date, $username)

       $patient->initPatientHealthData($patientId, $weight, $height, $temperature, $code, $desc, $username);

       if($patient->addPatientData($handler)){
      
      echo json_encode(array("statusCode" => 200)); 
//      echo "patient data added";
       
    }
    else{
      //  echo "failed to add patient data";
       echo json_encode(array("statusCode" => 201));
    }
 }

 else{

    echo json_encode(array("statusCode" => 203)); 
}

    }
