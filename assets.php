<?php
//include("Asset.php");
require("Fetch.php");
require("Session.php")








?>

<!-- third party css -->
<!--<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">-->
<!--<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css">-->
<!-- third party css end -->


<!DOCTYPE html>
    <html lang="en">
  <script type="text/javascript">
  function adjust(){
     
    $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust().draw();
      
      
      
  }
function checkForm(e) { 
   if (!(window.confirm("Are You Sure you Want to Delete this Asset?"))) 
     e.returnValue = false; 
 } 
</script>

    <head>
        <meta charset="utf-8" />
        <title>Asset Manager - Assets</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content=" " name=" " />
        
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
                                    
                                </div>
                            </div>
                        </div>
                        <!-- ================= end page title ================= -->
                        <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->

                        
                        <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-primary" type="button" onclick="location.href='addNewAsset.php';">
                                         <b>Create a new asset +</b>
                                        </button>
                                        <br>
                                        <br>
                                        
                                        

                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                             <li class="nav-item">
                                                <a href="#Total" c data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active" onClick="adjust()">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Total</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Assets" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0" onClick="adjust()">
                                                    <i class="mdi mdi-archive"></i>
                                                    <span class="d-none d-lg-block">Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#stockAssets" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 " onClick="adjust()">
                                                    <i class=" mdi mdi-alpha-s-box"></i>
                                                    <span class="d-none d-lg-block">Stock Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Inventory" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0" onClick="adjust()">
                                                    <i class=" mdi mdi-alpha-i-box"></i>
                                                    <span class="d-none d-lg-block">Inventory</span>
                                                </a>
                                            </li>
                                              <li class="nav-item">
                                                <a href="#Income" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0" onClick="adjust()">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Income</span>
                                                </a>
                                            </li>
                                            
                                            
                                            


                                        </ul>

                                                                <div class="tab-content">
                                                                   
                                            <div class="tab-pane" id="Income">
                                            <h4 class="header-title mb-3">Income</h4>

        
                                    
                                            <table id="incomeTable"  class="table dt-responsive datatable nowrap" width="100%" >
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
                                                    $assetlistsatas=updateTypeIncome();
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
                             <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                     <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
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
                                            
                                                                    <div class="tab-pane" id="Assets">
                                                                    <h4 class="header-title mb-3">Assets</h4>
                                                
                                            
                                            

                                                                                                <table  class="table dt-responsive datatable nowrap" width="100%" >
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
                                                                                        $assetlistsatas=updateTypeAssets();
                                                                                         
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
                             <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                     <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
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

        <table  class="table dt-responsive datatable nowrap" width="100%" >
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
$assetlistsatas=updateTypeAssetsStock();
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
                             <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                     <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
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

                                            <div class="tab-pane" id="Inventory">
                                            <h4 class="header-title mb-3">Inventory</h4>
            <table  class="table dt-responsive datatable nowrap" width="100%">
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
                    <td>Type</td>
                    <td>Frequency</td>
                    <td>Exit Date</td>
                    <?php if($_SESSION['role']=='Admin' ){ echo '<td></td>';} ?>
                </tr>
            </thead>


            <tbody>
               <?php 
$assetlistsatas=updateTypeInventory();
$assetlistsatas->rewind();
 /*    while($assetlistsatas->valid()){
    echo $assetlistsatas->current()->calculate_current_valuee();
    echo "\r\n";
    $assetlistsatas->next();
    }
*/
while($assetlistsatas->valid()){
    
    $String=" <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                             <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                     <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
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
               <!-- ============================================================================================================================== -->
        <div class="tab-pane show active" id="Total">
                                            <h4 class="header-title mb-3">Total</h4>


        <table  class="table dt-responsive datatable nowrap" width="100%">
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
      $String=" <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                             <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                     <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
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
        $('.datatable').DataTable({
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