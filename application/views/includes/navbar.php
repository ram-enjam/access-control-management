<?php 
session_start();
include("include/connection.php");
$ss = "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ";
       $rrr = mysqli_query($conn,$ss);
       $rr = mysqli_fetch_array($rrr);
if($_SESSION['id'] == ''){
  header("Location:index.php");
}

?>


<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php if($_SESSION['role_id'] == '1' || $_SESSION['role_id'] == '3') { ?>
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
         <!--  <i class="fa fa-bus" style="font-size:48px;color:red"></i> -->
         <i class="fa fa-bus" aria-hidden="true" style="font-size:30px;color:white"></i>
         <!--  <img src="img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Smart Bus Transportation</div>
      </a>
      <hr class="sidebar-divider my-0">
    
      <hr class="sidebar-divider">
      <!-- <div class="sidebar-heading">
        <?php echo $_SESSION['name']; ?>
      </div> -->


<?php if($_SESSION['role_id'] == '1') { ?>
      <li class="nav-item">
        <a class="nav-link" href="view_users.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Users</span>
        </a>
      </li> 
    
  
    <?php }if($_SESSION['role_id'] == '3') {  ?>
 <li class="nav-item">
        <a class="nav-link" href="add_data.php">
           <i class="fa fa-bus" aria-hidden="true" ></i>
          <span>Bus Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daily_alerts.php">
           <i class="fas fa-bell fa-fw"></i>
          <span>Daily Alerts</span>
        </a>
      </li>
  
    <?php } ?>


      <hr class="sidebar-divider">
      <!-- <div class="version" id="version-ruangadmin"></div> -->
    </ul>
  <?php } ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <?php if($_SESSION['role_id'] == '1' || $_SESSION['role_id'] == '3') { ?>
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
           <?php } ?>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php echo $rr['name']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 <?php if($_SESSION['role_id'] == '1') { ?>
                
                 <a class="dropdown-item" href="settings.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <?php } ?>
                <?php if($_SESSION['role_id'] == '2') { ?>
                
                 <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="travel_history.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                  History
                </a>

                <?php } ?>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>