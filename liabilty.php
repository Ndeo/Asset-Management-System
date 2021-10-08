<?php
require "Session.php";
require 'Fetch.php';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Liabilty</title>
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
                      <li class="breadcrumb-item active">Liabilty</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-bank"></i> Liabilty
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->

            <div class="card">
              <div class="card-body">
                  <button class="btn btn-primary" type="button" onclick="location.href='createNewLiability.php';">
                                         <b>Create a new liabilty +</b>
                                        </button>
                                        <br>
                                    <br>
                <div class="tab-pane show active" id="liability">
                        <!--<div class="row">-->
                        <!--    <div class="col-10">-->
                <table id="basic-datatable" class="table dt-responsive nowrap">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>liabilityName</th>
                      <th>From-To</th>
                      <th>Descrip</th>
                      <th>value</th>
                      <th>Remaining</th>
                      <th>Entry Date</th>
                      <th>Expected On</th>
                      <th>Updated on</th>
                      <th>Enterd By</th>
                      <th>is Periodc</th>
                      <th>Frequency</th>
                      <th>Exit Date</th>
                      <?php if($_SESSION['role']=='Admin' ){ echo '<th></th>';} ?>
                    </tr>
                  </thead>

                  <tbody>
                     <?php
                     $liabilitiesList=updateLiabilities();
        $liabilitiesList->rewind();
while($liabilitiesList->valid()){
$String="";
    $String =$String." <tr><td>". $liabilitiesList->current()->getId()."</td>
                           <td>".$liabilitiesList->current()->getName()."</td>
                           <td>".$liabilitiesList->current()->getFromTo()."</td>
                           <td>".$liabilitiesList->current()->getDescription()."</td>
                           <td>".$liabilitiesList->current()->getValue()."</td>
                           <td>".$liabilitiesList->current()->getRemaining()."</td>
                           <td>".$liabilitiesList->current()->getEntryDate()."</td>
                           <td>".$liabilitiesList->current()->getExpectedOn()."</td>
                           <td>".$liabilitiesList->current()->getUpdatedOn()."</td>
                           <td>".$liabilitiesList->current()->getEnteredBy()."</td>
                           <td>".$liabilitiesList->current()->getIsPeriodic()."</td>
                           <td>".$liabilitiesList->current()->getFrequency()."</td>
                           <td>".$liabilitiesList->current()->getExitDate()."</td>";
    if($_SESSION['role']=='Admin' ){
         $String =$String.'<td><form method="post" action=editLiability.php >
         <input type=hidden name= "id" value="'.$liabilitiesList->current()->getId().'" />
         <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Liability</b></button>
 <button class="btn btn-danger" value="delete" name="submit" type="submit"><b>Delete Liability</b></button>
 </form></td>';
     }
                $String=$String."</tr>";
                echo $String;
                
                
           /*   echo $liabilitiesList->current()->getId()." ".$liabilitiesList->current()->getName()." \r\n ".$liabilitiesList->current()->getFromTo()." \r\n ".$liabilitiesList->current()->getDescription()."
 \r\n ".$liabilitiesList->current()->getValue()." \r\n ".$liabilitiesList->current()->getRemaining()."
 \r\n ".$liabilitiesList->current()->getEntryDate()." \r\n ".$liabilitiesList->current()->getExpectedOn()."
 \r\n ".$liabilitiesList->current()->getUpdatedOn()." \r\n ".$liabilitiesList->current()->getEnteredBy()."
 \r\n ".$liabilitiesList->current()->getFrequency()." \r\n ".$liabilitiesList->current()->getExitDate()."\r\n";
*/
                   
    $liabilitiesList->next();
}
                     
                     
                     
                     
                     ?>
                  </tbody>
                </table>
                </div>
                <!--</div>-->
                <!--</div>-->
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

    <!-- bundle -->
    <script src="assets/js/app.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->

    <!-- third party css -->
    <link
      href="assets/css/vendor/dataTables.bootstrap4.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="assets/css/vendor/responsive.bootstrap4.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- third party css end -->

    <!-- third party js -->
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
  </body>
</html>
