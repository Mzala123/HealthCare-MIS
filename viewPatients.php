<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "this is your username $username";

    require("Model/DataHandler.php");
    $handler = new DataHandler();
 //   require("Model/User.php");
    require("Model/Patient.php");

    $handler = new DataHandler();
    $handler->createDBConnection(); 

   // $user = new User();
    $patient = new Patient();

   // $result = $handler->getDataQuery($user->viewRegisteredUsers());
    $result = $handler->getDataQuery($patient->viewRegisteredPatients());

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>HealthCare DashBoard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
          
        <link href="main.css" rel="stylesheet">
        <link href="css/dataTables.css" rel="stylesheet">
        <link href="css/timeline.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <div class="">
                        <?php echo $username; ?>
                    </div>
                </div>    
            
            </div>        
            
          <div class="app-main">
                <?php include 'Model/nav.php'; ?>
                

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                   
                                        <i class="fa fa-medkit icon-gradient bg-mean-fruit" ></i>
                                        </i>
                                    </div>
                                    <div>PATIENT RECORD
                                        <div class="page-title-subheading">Below is a List of Patients.
                                        </div>
                                    </div>

                                </div>
                                <div class="page-title-actions">
                               
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            Logged in As <?php echo $username; ?>
                                        </button>
                                       <!-- <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="Controller/Logout.php" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Log Out
                                                        </span>
                                                      
                                                    </a>
                                                </li>
                     
                                            </ul>
                                        </div>-->
                                    </div>
                                </div>    </div>
                        </div>        
                            
                        <div class="row">
 

                        <div class="col-lg">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Patient List</h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table table-hover" id="userTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Gender</th>
                                                <th>Date of birth</th>
                                                <th>Current Address</th>
                                                <th>Occupation</th>
                                                <th>Health Record</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 while($row = mysqli_fetch_assoc($result)) {

                                                  $Id = $row['Id'];   
                                                  $fname = $row['firstname'];   
                                                  $lname = $row['lastname'];  
                                                  $gender = $row['gender'];
                                                  $birthdate = $row['birthdate'];   
                                                  $address = $row['currentAddress'];  
                                                  $occupation = $row['occupation'];
                                               ?>

                                            <tr>
                                             <td><?php echo $Id ?></td>
                                             <td><?php echo $fname ?></td>
                                             <td><?php echo $lname ?></td>
                                             <td><?php echo $gender ?></td>
                                             <td><?php echo $birthdate ?></td>
                                             <td><?php echo $address ?></td>
                                             <td><?php echo $occupation ?></td>
                                            <td>
                                             <button class="btn btn-outline-primary" id="addHealthRecord" data-toggle="modal" 
                                              data-target="#health-record" data-id="<?php echo $Id ?>"  name="addHealthRecord">
                                                 <i class="fa fa-plus-circle icon-gradient bg-mean-fruit"></i>
                                                 
                                             </button>

                                             <button class="btn btn-outline-primary" id="viewHealthRecord" data-toggle="modal" 
                                              data-target="#view-health-record" data-id="<?php echo $Id ?>">
                                                 
                                             <i class="fa fa-eye icon-gradient bg-mean-fruit"></i>
                                                 
                                             </button>
                                            </td>
                                            </tr>
                                           
                                            <?php
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            
                        </div>
                        </div>
                       
                    </div>

    <form action="" id="addPatientRecord" method="POST">              
   <div class="modal fade bd-example-modal-lg" id="health-record" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Health Data To Patient Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

               <div class="modal-body">
                  <div class="form-row">
                
                                        <div class="col-md-6 mb-3">
                                            <label>Weight(Kgs)</label>
                                            <input type="text" class="form-control" id="weight" name="weight"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                             placeholder="weight">
                                         
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Height(Meters)</label>
                                            <input type="text" class="form-control" id="height" name="height"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                             placeholder="height" >
                                                   
                                        </div>

                                        </div>


                                        <div class="form-row">

                                        <div class="col-md-6 mb-3">
                                            <label>Temparature reading</label>
                                            <input type="text" class="form-control" id="temperature" name="temperature" 
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                            placeholder="Temperature" >
                                            
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label>Diagnosis</label>
                                            
                                            <select class="form-control" aria-label="Default select example" name="diagnosis"
                                             id="diagnosis">
                                            <option value="A00-B99|Certain infectious and parasitic diseases"> Certain infectious and parasitic diseases</option>
                                            <option value="C00-D49|Neoplasms"> Neoplasms </option> 
                                            <option value="D50-D89|Diseases of the blood and blood-forming organs and certain disorders involving the immune mechanism"> Diseases of the blood and blood-forming organs and certain disorders involving the immune mechanism</option>
                                            <option value="E00-E89|Endocrine, nutritional and metabolic diseases"> Endocrine, nutritional and metabolic diseases</option> 
                                            <option value="F01-F99|Mental, Behavioral and Neurodevelopmental disorders">  Mental, Behavioral and Neurodevelopmental disorders</option>
                                            <option value="G00-G99|Diseases of the nervous system"> Diseases of the nervous system</option> 
                                            <option value="H00-H59|Diseases of the eye and adnexa">  Diseases of the eye and adnexa</option>
                                            <option value="H60-H95|Diseases of the ear and mastoid process">  Diseases of the ear and mastoid process</option> 
                                            <option value="I00-I99|Diseases of the circulatory system">  Diseases of the circulatory system</option>
                                            <option value="J00-J99|Diseases of the respiratory system">  Diseases of the respiratory system</option> 
                                            <option value="K00-K95|Diseases of the digestive system"> Diseases of the digestive system</option>
                                            <option value="L00-L99|Diseases of the skin and subcutaneous tissue"> Diseases of the skin and subcutaneous tissue</option> 
                                            <option value="M00-M99|Diseases of the musculoskeletal system and connective tissue">  Diseases of the musculoskeletal system and connective tissue</option>
                                            <option value="N00-N99|Diseases of the genitourinary system">  Diseases of the genitourinary system</option> 
                                            <option value="O00-O9A|Pregnancy, childbirth and the puerperium">  Pregnancy, childbirth and the puerperium</option>
                                            <option value="P00-P96|Certain conditions originating in the perinatal period">  Certain conditions originating in the perinatal period</option> 

                                            <option value="Q00-Q99|Congenital malformations, deformations and chromosomal abnormalities">  Congenital malformations, deformations and chromosomal abnormalities</option> 
                                            <option value="R00-R99|Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified">  Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified</option>
                                            <option value="S00-T88|Injury, poisoning and certain other consequences of external causes"> Injury, poisoning and certain other consequences of external causes</option> 
                                            
                                            <option value="U00-U85|Codes for special purposes"> Codes for special purposes</option> 
                                            <option value="V00-Y99|External causes of morbidity">  External causes of morbidity</option>
                                            <option value="Z00-Z99|Factors influencing health status and contact with health services">  Factors influencing health status and contact with health services</option> 
                                           </select>
                                                 
                                        
                                        </div>

                                    </div>

                                    
                                    <div class="form-row">

                                <div class="col-md-6 mb-3">
                           
                                <input type="text" class="form-control" id="patient_id" name="patient_id" 
                                hidden="true"  placeholder="patient id" >
                                        
                                    </div>


                                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

        </div>
    </div>
     </div>

     <div class="modal fade bd-example-modal-lg" id="view-health-record" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Patients Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
            <div class="modal-body" id="timeline-body">
                <!-- Timeline -->
                <ul class="timeline" id="timeline-list">
                </ul>
                <!-- End Timeline-->
                            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </form>
        </div>
    </div>
     </div>
        </div>

                    <?php include'Model/footer.php'; ?>  
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages--->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="plugins/toastr/toastr.min.js"></script>
	<script src="js/main.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
    <script type="text/javascript" src="js/dataTables.js"></script>

        <script>
           $(document).ready( function () {
             $('#userTable').DataTable();
             } );

        </script>

       <script src="js/addPatients.js"></script>

      
       </body>
</html>
<?php
}else{
    header("location:Logins.php");
}
