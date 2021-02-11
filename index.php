<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "this is your username $username";
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

        <link href="main.css" rel="stylesheet"></head>
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
                                    </div>
                                    <div>Dashboard
                                        <div class="page-title-subheading">This is the Health Care Dashboard.
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
                                       
                                    </div>
                                </div>    </div>
                        </div>          
                          <div class="row">
                            <div class="col-md-6 col-xl-4">
                                
                                <div class="card">
                                    <div class="card-header">
                                <?php
                                   require "Model/DataHandler.php";
                                   $handler = new DataHandler();
                                   $handler->createDBConnection();

                                   $query = "select count(*) as number_users from users";
                                   $result = $handler->getDataQuery($query);
                                   if($row = mysqli_fetch_assoc($result)){
                                           $numberOfusers = $row['number_users'];
                                   }

                                   
                                ?>
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Number of Users</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>
                                                <?php echo $numberOfusers ?>
                                            </span></div>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                
                                <div class="card-footer">
                                     <a class="btn btn-block widget-content bg-midnight-bloom text-white" href="viewUsers.php">View Providers</a>
                                 </div>
                                
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xl-4">
                            <div class="card">
                             <div class="card-header">
                            <?php
                                   //require_once "Model/DataHandler.php";
                                   //$handler = new DataHandler();
                                   //$handler->createDBConnection(); -->

                                   $query = "select count(*) as number_patients from patients";
                                   $result = $handler->getDataQuery($query);
                                   if($row = mysqli_fetch_assoc($result)){
                                           $numberOfpatients = $row['number_patients'];
                                   }
                                   
                                ?>
                                
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total number of Patients </div>
                                           
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>
                                                <?php echo $numberOfpatients ?>
                                            </span></div>
                                        </div>
                                       
                                    </div>                             
                                </div>
                                </div>
                                 <div class="card-footer">
                                     <a class="btn btn-block widget-content bg-arielle-smile text-white" href="addPatients.php">Register Patients</a>
                                 </div>

                                </div>
                            </div>

                            
                            <div class="col-md-6 col-xl-4">
                             <div class="card">
                                 <div class="card-header">
                           <?php 
                            $query = "select  count(Distinct patient_id) as no_health_records from 
                            health_records";

                                   $result = $handler->getDataQuery($query);
                                   if($row = mysqli_fetch_assoc($result)){
                                           $healthRecords = $row['no_health_records'];
                                   } 
                                   
                            ?>
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Patients with Health Records </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>
                                                <?php 
                                                   echo $healthRecords;
                                                ?>
                                        </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="card-footer">
                            <a class="btn btn-block widget-content bg-grow-early text-white" href="viewPatients.php">View Patients</a>
                            </div>
                            </div>
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
        <script type="text/javascript" src="assets/scripts/main.js"></script>
       </body>
</html>
<?php
}else{
    header("location:Logins.php");
}
