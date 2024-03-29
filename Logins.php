<?php
session_start();
if(isset($_SESSION['username_Mzala'])){
    header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Form</title>

    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/login.css">

</head>

<body class="bg-gradient-light">
<?php
	require("Model/DataHandler.php");
	   $handler = new DataHandler();
       //$handler->autoCreateDatabase();    
	   $handler->createDBConnection();  
	 /* $handler->createTableHealthCareUsers();
       $handler->createTablePatients();
       $handler->createTableHealthRecord();*/
	?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                      <!--  <div class="row">-->
                           <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                          <!--  <div class="col-lg-6">-->
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-black-900 mb-4">HEALTHCARE MIS</h1>
                                    </div>
                                    <form class="user" form id="loginForm" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="LoginWith" aria-describedby="emailHelp"
                                                placeholder="Enter Username" name="LoginWith">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="passcode" placeholder="Password" name="passcode">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                       </button>
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                     Dont have an Account? <a class="small" href="Registers.php">Sign Up</a>
                                    </div>
                                </div>
                            <!--</div>-->
                      <!--  </div>-->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="plugins/toastr/toastr.min.js"></script>
	<script src="js/main.js"></script>
     <script src="js/login.js"></script>

</body>

</html>
<?php
}