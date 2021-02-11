<?php

//$username, $email
function displayNav() {
    
}
?>
<div class="app-sidebar sidebar-shadow">
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
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="index.php" class="mm-active">
                        <i class="metismenu-icon pe-7s-home"></i>
                      <i class="fa fa-tachometer"></i> </span>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Patients</li>
                <li>
                    <a href="addPatients.php">
                        <i class="metismenu-icon pe-7s-plus"></i>
                        Create Patient
                    </a>
                </li>
                <li>
                    <a href="viewPatients.php">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        View Patients
                    </a>
                </li>
                
                 <li class="app-sidebar__heading">Users</li>
                <li>
                    <a href="viewUsers.php">
                        <i class="metismenu-icon pe-7s-users"></i>
                        View Providers/Users
                    </a>
                </li>
                <li class="app-sidebar__heading">Sign Out</li>
                <li>
                    <a href="Controller/Logout.php">
                        <i class="metismenu-icon pe-7s-left-arrow"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>  

<?php

    