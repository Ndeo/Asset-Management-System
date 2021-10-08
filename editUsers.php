<?php require "Fetch.php";
require 'Session.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <script>
function checkForm(e) { 
   if (!(window.confirm("Are You Sure you Want to Delete this User?"))) 
     e.returnValue = false; 
 } 
</script>
    <meta charset="utf-8" />
    <title>Asset Manager - Edit Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="A fully featured admin theme which can be used to build CRM, CMS, etc."
      name="description"
    />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />

    <!-- third party css -->
    <link
      href="assets/css/vendor/jquery-jvectormap-1.2.2.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="enlarged" data-keep-enlarged="true">
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ===================== Left Sidebar Start ===================== -->
      <?php include "side.php";?>
      <!-- ====================== Left Sidebar End ====================== -->

      <!-- ============================================================== -->
      <!-- ================== Start Page Content here =================== -->

      <div class="content-page">
        <div class="content">
          <!-- ==================== Topbar Start ==================== -->
          <?php include "top.php";?>
          <!-- ===================== Topbar End ===================== -->

          <!-- Start Content-->
          <div class="container-fluid">
            <!-- ================ start page title ================ -->
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Asset Manager</a>
                      </li>
                      <li class="breadcrumb-item active">Edit Users</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-account-multiple-plus-outline"></i> Edit
                    Users
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->

            <div class="card">
              <div class="card-body">
                <button class="btn btn-primary" type="button" onclick="location.href='createNewUser.php';">
                  <b>Create new User</b>
                </button>
                
                <br>
                <br>
                

                <div class="table-responsive-sm">
                    
                    <table id="basic-datatable" class="table dt-responsive nowrap table-striped">
                  <!--<table class="table table-centered mb-0">-->
                  
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone number</th>
                        <th>joining date</th>
                        <th>State</th>
                        <th>Created by</th>
                        <th>image</th>
                        <?php
                         if($_SESSION['role']=='Admin' ){
                        echo "<th></th>";
                         }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php



                session_start();
                     $userList=updateUsers();
        $userList->rewind();

            while($userList->valid()){
    $String =" <tr><td>". $userList->current()->getId()."</td>
                    <td>".$userList->current()->getFirstName()."</td>
                    <td>".$userList->current()->getLastName()."</td>
                    <td>".$userList->current()->getEmail()."</td>
                    <td>".$userList->current()->getUserRole()."</td>
                    <td>".$userList->current()->getPhone()."</td>
                    <td>".$userList->current()->getCreationDate()."</td>
                    <td>".$userList->current()->getState()."</td>
                    <td>".$userList->current()->getCreatedBy()."</td>
                    
                    <td> <img src= 'thumbnails/".$userList->current()->getImage()."'  class='rounded-circle'  height='50' width='50'  alt='no pic :('  /></td><td>".$_Session['role']."";
                    
                    
                    
                    
                    if($_SESSION['role']=='Admin' ){
                        //                           //
                        $String =$String.'<form method="post" id="my-form" action=editUser.php><input type=hidden name= "id" value="'.$userList->current()->getId().'" /><button class="btn btn-info" value="edit" name="edit"  type="submit"><b>Edit User</b></button>
                <button class="btn btn-danger" value="delete" id="delete" name="delete" type="submit" onclick="return checkForm(event);">
                  <b>Delete User</b>
                </button>
                </form>';
                    }
                   

                $String=$String." </td></tr>";
                
          echo $String;
                   
    $userList->next();
}
                     
                     
                     
                     
                     ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- ============= /\/\/\/\/\/\/\/\/\/\/\ ============= -->
          </div>
          <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include "footer.php";?>
        <!-- end Footer -->
      </div>

      <!-- ====================== End Page content ====================== -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->
<!-- third party css -->
<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css">
<!-- third party css end -->
    <!-- bundle -->
    <script src="assets/js/app.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    
    <script src="assets/js/vendor/jquery.dataTables.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
    <!-- third party js ends -->
<script type="text/Javascript">
        $('#basic-datatable').DataTable({
        keys: true,
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });
    </script>
    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
  </body>
</html>
