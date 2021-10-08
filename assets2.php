<?php
//include("Asset.php");
include("Fetch.php");
require("Session.php");








?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Asset Manager - Assets</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo2.png">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Asset Manager</a></li>
                                            <li class="breadcrumb-item active">Assets</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><i class="mdi mdi-archive"></i> Assets</h4>
                                    <button class="btn btn-primary" type="button" onclick="location.href='addNewAsset.php';">
                                      <b>Create new asset</b>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- ================= end page title ================= -->
                        <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->

                        
                        <div class="card">
                                    <div class="card-body">

                                        

                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class="nav-item">
                                                <a href="#Assets" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                                    <i class="mdi mdi-archive"></i>
                                                    <span class="d-none d-lg-block">Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#stockAssets" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 ">
                                                    <i class=" mdi mdi-alpha-s-box"></i>
                                                    <span class="d-none d-lg-block">Stock Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Inventory" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    <i class=" mdi mdi-alpha-i-box"></i>
                                                    <span class="d-none d-lg-block">Inventory</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Groups" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Groups</span>
                                                </a>
                                            </li>


                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="Assets">
                                            <h4 class="header-title mb-3">Assets</h4>
                                                
                                            
                                            <p class="text-muted font-14 mb-4">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
            function:
            <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned
            to individual cells, columns, rows or all cells.
        </p>

        <table id="basic-datatable" class="table dt-responsive nowrap">
            <thead>
               <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Deperciation Rate</th>
                    <th>Entry date</th>
                    <th>Availability</th>
                    <th>Entered By</th>
                    <th>Updated on</th>
                    <th>Is periodic</th>
                    <th>Type</th>
                    <th>Frequency</th>
                    <th>Exit Date</th>
                    <?php if($_SESSION['role']=='Admin' ){ echo '<th></th>';} ?>
                </tr>
            </thead>


            <tbody>
                
                <?php 
$assetlistsatas=updateAssets();
$assetlistsatas->rewind();

 /*    while($assetlistsatas->valid()){
    echo $assetlistsatas->current()->calculate_current_valuee();
    echo "\r\n";
    $assetlistsatas->next();
    }
*/

while($assetlistsatas->valid()){
    
     $String =" <tr><td>". $assetlistsatas->current()->getId()."</td>
                    <td>".$assetlistsatas->current()->getName()."</td>
                    <td>".$assetlistsatas->current()->getGroup()."</td>
                    <td>".$assetlistsatas->current()->getDescription()."</td>
                    <td>".$assetlistsatas->current()->calculate_current_valuee()."</td>
                    <td>".$assetlistsatas->current()->getDeperciationRate()."</td>
                    <td>".$assetlistsatas->current()->getEntryDate()."</td>
                    <td>".$assetlistsatas->current()->getAvailability()."</td>
                    <td>".$assetlistsatas->current()->getEnteredBy()."</td>
                    <td>".$assetlistsatas->current()->getUpdatedOn()."</td>
                    <td>".$assetlistsatas->current()->getIsPeriodic()."</td>
                    <td>".$assetlistsatas->current()->getAssetType()."</td>
                    <td>".$assetlistsatas->current()->getFrequency()."</td>
                    <td>".$assetlistsatas->current()->getExitDate()."</td>";
                    if($_SESSION['role']=='Admin' ){
                        $String =$String.'<td><form method="post" action=editAsset.php >
                        <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                        <button class="btn btn-info" value="edit" name="edit"  type="submit"><b>Edit Asset</b></button>
                <button class="btn btn-danger" value="delete" name="delete" type="submit"><b>Delete Asset</b></button>
                </form></td>';
                    }
                $String=$String."</tr>";
                echo $String;
    $assetlistsatas->next();
}
              ?>  
               
            
            </tbody>
        </table>






                                            </div>
                                            <!-- ============================================= -->

                                            <div class="tab-pane" id="stockAssets">
                                            <h4 class="header-title mb-3">Stock Assets</h4>

                                            <h4 class="header-title">Data Table Example</h4>
        <p class="text-muted font-14 mb-4">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
            function:
            <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned
            to individual cells, columns, rows or all cells.
        </p>

        <table id="basic-datatable" class="table dt-responsive nowrap">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>


            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr>
                <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr>
            
            </tbody>
        </table>
                                                                          
                                                
                                            </div>
                                            <!-- ============================================= -->

                                            <div class="tab-pane" id="Inventory">
                                            <h4 class="header-title mb-3">Inventory</h4>
                                             
                                             
                                            <!-- ============================================= -->

                                            <div class="tab-pane" id="Groups">
                                            <h4 class="header-title mb-3">Groups</h4>
                                                <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                                
                                            </div>
                                            <!-- ============================================= -->

                                        </div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                        
                       


                        
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
        <link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css">
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