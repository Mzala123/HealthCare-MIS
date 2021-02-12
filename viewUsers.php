<?php
session_start();
if(isset($_SESSION['username_Mzala'])){
    $username = $_SESSION['username_Mzala'];
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
                                    </div>
                                    <div>USERLIST
                                        <div class="page-title-subheading">Below is a List of Users in the Table.
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
                                    <div class="card-body"><h5 class="card-title">USERS</h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table table-hover" id="userTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Email Address</th>
                                                <th>Registration Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 while($row = mysqli_fetch_assoc($result)) {

                                                  $Id = $row['Id'];   
                                                  $uname = $row['Username'];   
                                                  $email = $row['Email'];  
                                                  $regDate = $row['Reg_Date'];
                                               ?>

                                            <tr>
                                             <td><?php echo $Id ?></td>
                                             <td><?php echo $uname ?></td>
                                             <td><?php echo $email ?></td>
                                             <td><?php echo $regDate ?></td>
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
                    <?php include'Model/footer.php'; ?>  
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
        <script src="plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/scripts/main.js"></script>
        <script type="text/javascript" src="js/dataTables.js"></script>
        <script>
           $(document).ready( function () {
             $('#userTable').DataTable();
             } );
        </script>
       </body>
</html>
<?php
}else{
    header("location:Logins.php");
}
