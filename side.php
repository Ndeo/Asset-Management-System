<div class="left-side-menu">
  <div class="slimscroll-menu">
    <!-- LOGO -->
    <a href="index.php" class="logo text-center">
      <span class="logo-lg">
        <img src="assets/images/logo1.png" alt="" height="65" />
      </span>
      <span class="logo-sm">
        <img src="assets/images/logo2.png" alt="" height="65" />
      </span>
    </a>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav">
      <li class="side-nav-title side-nav-item">Navigation</li>

      <li class="side-nav-item">
        <a href="index.php" class="side-nav-link">
          <i class="dripicons-meter"></i>
          <span> Dashboard </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="assets.php" class="side-nav-link">
          <i class="mdi mdi-archive"></i>
          <span> Assets </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="liabilty.php" class="side-nav-link">
          <i class="mdi mdi-bank"></i>
          <span> Liabilty </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="reports.php" class="side-nav-link">
          <i class="dripicons-document"></i>
          <span> Reports </span>
        </a>
      </li>

      <!--<li class="side-nav-item">-->
      <!--  <a href="calendar.php" class="side-nav-link">-->
      <!--    <i class="mdi mdi-calendar-clock"></i>-->
      <!--    <span> Calendar </span>-->
      <!--  </a>-->
      <!--</li>-->
      
      <?php 
    session_start();
     if($_SESSION['role']=='Admin' ){
         
      echo '<li class="side-nav-item"><a href="editUsers.php" class="side-nav-link"><i class="mdi mdi-account-multiple-plus-outline"></i><span> Edit Users </span></a></li>';
     }
      ?>
    

      <li class="side-nav-item">
        <a href="ledger.php" class="side-nav-link">
          <i class="mdi mdi-account"></i>
          <span> Ledger </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="logout.php" class="side-nav-link">
          <i class="mdi mdi-logout"></i>
          <span> Sign Out </span>
        </a>
      </li>

      <hr>
      <?php 
    session_start();
     if($_SESSION['role']=='Admin' ){
         
      echo ' <li class="side-nav-item">
        <a href="log.txt" class="side-nav-link">
          <i class="mdi mdi-numeric-1-circle"></i>
          <span> Log file </span>
        </a>
      </li>
    
    <li class="side-nav-item">
        <a href="tPage2.php" class="side-nav-link">
          <i class="mdi mdi-numeric-2-circle"></i>
          <span> Test Page2 </span>
        </a>
      </li>';
     }
      ?>
     
    






    </ul>







    
    <!-- End Sidebar -->

    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->
</div>
