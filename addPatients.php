<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "this is your username $username";

    require("Model/DataHandler.php");
    $handler = new DataHandler();
    require("Model/User.php");
    $handler = new DataHandler();
    $handler->createDBConnection(); 
    $user = new User();

    $result = $handler->getDataQuery($user->viewRegisteredUsers());

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
                                    <div>PATIENT REGISTRATION SECTION
                                        <div class="page-title-subheading">Below is a patient form registration.
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
                                        <!--<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
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
                            
                       
                          
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Patient Registration Form</h5>
                                <form class="needs-validation" novalidate action="" id="registerPatient" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" id="fname" name="fname"
                                             placeholder="First name"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide firstname
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" 
                                            placeholder="Last name"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide last name
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Choose Gender</label>
                                            <select class="form-control" aria-label="Default select example" name="gender"
                                            id="gender">
                                          
                                            <option>Male</option>
                                            <option>Female</option> 
                                           </select>
                                           <div class="valid-feedback">
                                                Looks good!
                                            </div>    
                                            <div class="invalid-feedback">
                                                Please select gender
                                            </div>                                    

                                        </div>
                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Date of Birth</label>
                                            <input type="date" class="form-control" id="birthDate" name="birthDate"
                                             placeholder="mm/dd/year" required >
                                            <div class="invalid-feedback">
                                                Please include a valid Date of Birth.
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>  
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom04">District</label>
                                            <input type="text" class="form-control" id="district" name="district"
                                             placeholder="District" required>
                                            <div class="invalid-feedback">
                                                Please provide district name
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>  
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Village</label>
                                            <input type="text" class="form-control" id="village" name="village" 
                                            placeholder="Village" required>
                                            <div class="invalid-feedback">
                                                Please provide a village name
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="form-row">
                                   
                                    <div class="col-md-5 mb-3">
                                            <label for="validationCustom02">Choose Occupation</label>
                                            <select class="form-control" aria-label="Default select example" name="occupation"
                                             id="occupation">
                                            <option>Doctor</option>
                                            <option>Nurse</option> 
                                            <option>ICT Officer</option>
                                            <option>Teacher</option> 
                                            <option>Plumber</option>
                                            <option>Mechanic</option> 
                                            <option>Clinician</option>
                                            <option>Receptionist</option> 
                                            <option>Marketer</option>
                                            <option>Farmer</option> 
                                            <option>Maid</option>
                                            <option>Business Person</option> 
                                            <option>Accountants</option>
                                            <option>Human resource manager</option> 
                                            <option>Manager</option>
                                            <option>Cleaner</option> 
                                            <option>Gardener</option>
                                            <option>Others</option> 
                                           </select>
                                           <div class="valid-feedback">
                                                Looks good!
                                            </div>         
                                        </div>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Confirm</button>
                                    <button type="reset" class="btn btn-danger" >Cancel</button>

                                </form>
            
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </div>
                        </div>

                            
                        </div>
                        </div>
                       
                    </div>
                    <?php include'Model/footer.php'; ?>  
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>

      
      <!-- Bootstrap core JavaScript-->
      <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages--->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="plugins/toastr/toastr.min.js"></script>
	<script src="js/main.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>

        <script type="text/javascript" src="assets/scripts/main.js"></script>

        <script src="js/addPatients.js"></script>
       
       </body>
</html>
<?php
}else{
    header("location:Logins.php");
}
