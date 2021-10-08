<?php
//include("Asset.php");
include("Fetch.php");
require("Session.php");

                                                    $assetlistsatas=updateTypeIncome();
                                                    $assetlistsatas->rewind();
                                                     $incomeString="
                                                     <h4 class='header-title mb-3'>Assets</h4>
                                                
                                            
                                            

                                                                                                <table id='assets' class='table dt-responsive datatable nowrap'>
                                                                                                    
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
                                                        <th>Exit Date</th>";
                                                        
                                                        if($_SESSION['role']=='Admin' ){ 
                                                        $incomeString=$incomeString. '<th></th>';} 
                                                        
                                                    $incomeString=$incomeString."</tr>
                                                </thead>
                                    
                                    
                                                     <tbody>
                                                         ";
                                                    while($assetlistsatas->valid()){
                                                         $incomeString =$incomeString." <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                                                                            $incomeString =$incomeString.'<td><form method="post" action=editAsset.php >
                                                                            <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                                                                            <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                                                                    <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
                                                                    </form></td>';
                                                                        }
                                                                    $incomeString=$incomeString."</tr>";
                                                                    
                                                        $assetlistsatas->next();
                                                    }
                                                    $incomeString=$incomeString."</tbody>";
                                                    
                                                      $assetlistsatas=updateTypeAssets();
                                                                                         
                                                                                        $assetlistsatas->rewind();
                                                                                         
                                                                                         /*    while($assetlistsatas->valid()){
                                                                                            echo $assetlistsatas->current()->calculate_current_valuee();
                                                                                            echo "\r\n";
                                                                                            $assetlistsatas->next();
                                                                                            }
                                                                                        */
                                                                                        $tAssetString="<thead>
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
                                                        <th>Exit Date</th>";
                                                        
                                                        if($_SESSION['role']=='Admin' ){ 
                                                        $tAssetString=$tAssetString. '<th></th>';} 
                                                        
                                                    $tAssetString=$tAssetString."</tr>
                                                </thead>
                                    
                                    
                                                     <tbody>";
                                                                                        while($assetlistsatas->valid()){
                                                                                             
                                                                                            $tAssetString =$tAssetString." <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                                                                                                                $tAssetString =$tAssetString.'<td><form method="post" action=editAsset.php >
                                                                                                                <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                                                                                                                <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                                                                                                        <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
                                                                                                        </form></td>';
                                                                                                            }
                                                                                                        $tAssetString=$tAssetString."</tr>";
                                                                                                        
                                                                                            $assetlistsatas->next();
                                                                                        }
                                                                                                $tAssetString=$tAssetString."</tbody>";




                                                                                        
                                                                                        $assetlistsatas=updateTypeAssetsStock();
                                                                                        $assetlistsatas->rewind();
                                                                                        $StockString="<thead>
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
                                                        <th>Exit Date</th>";
                                                        
                                                        if($_SESSION['role']=='Admin' ){ 
                                                        $StockString=$StockString. '<th></th>';} 
                                                        
                                                    $StockString=$StockString."</tr>
                                                </thead>
                                    
                                    
                                                     <tbody>";
                                                                                        while($assetlistsatas->valid()){
                                                                                             $StockString =$StockString." <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                                                                                                                $StockString =$StockString.'<td><form method="post" action=editAsset.php >
                                                                                                                <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                                                                                                                <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                                                                                                        <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
                                                                                                        </form></td>';
                                                                                                            }
                                                                                                        $StockString=$StockString."</tr>";
                                                                                                       
                                                                                            $assetlistsatas->next();
                                                                                            }
                                                                                            $StockString=$StockString."</tbody>
                                                                                            
                                                                                                </table>
                                                                                                ";
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            $assetlistsatas=updateTypeAssetsStock();
                                                                                            $assetlistsatas->rewind();
                                                                                             /*    while($assetlistsatas->valid()){
                                                                                                echo $assetlistsatas->current()->calculate_current_valuee();
                                                                                                echo "\r\n";
                                                                                                $assetlistsatas->next();
                                                                                                }
                                                                                            */
                                                                                            $AssetString="<thead>
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
                                                        <th>Exit Date</th>";
                                                        
                                                        if($_SESSION['role']=='Admin' ){ 
                                                        $AssetString=$AssetString. '<th></th>';} 
                                                        
                                                    $AssetString=$AssetString."</tr>
                                                </thead>
                                    
                                    
                                                     <tbody>";
                                                                                            while($assetlistsatas->valid()){
                                                                                                 $AssetString =$AssetString." <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                                                                                                                    $AssetString =$AssetString.'<td><form method="post" action=editAsset.php >
                                                                                                                    <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                                                                                                                    <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                                                                                                            <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
                                                                                                            </form></td>';
                                                                                                                }
                                                                                                            $AssetString=$AssetString."</tr>";
                                                                                                           
                                                                                                $assetlistsatas->next();
                                                                                            }
                                                                                            $AssetString=$AssetString."</tbody>";
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            $assetlistsatas=updateTypeAssetsStock();
$assetlistsatas->rewind();
 /*    while($assetlistsatas->valid()){
    echo $assetlistsatas->current()->calculate_current_valuee();
    echo "\r\n";
    $assetlistsatas->next();
    }
*/
$InventoryString="";
while($assetlistsatas->valid()){
     $InventoryString =$InventoryString." <tr><td>". $assetlistsatas->current()->getId()."</td>
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
                        $InventoryString =$InventoryString.'<td><form method="post" action=editAsset.php >
                        <input type=hidden name= "id" value="'.$assetlistsatas->current()->getId().'" />
                        <button class="btn btn-info" value="edit" name="submit"  type="submit"><b>Edit Asset</b></button>
                <button class="btn btn-danger" value="delete" name="submit" type="submit" onclick="return checkForm(event);"><b>Delete Asset</b></button>
                </form></td>';
                    }
                $InventoryString=$InventoryString."</tr>";
               
    $assetlistsatas->next();
}


?>

<!-- third party css -->
<!--<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">-->
<!--<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css">-->
<!-- third party css end -->


<!DOCTYPE html>
    <html lang="en">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
  alert("help");
  var total="<?php echo $AssetString; ?>";
  var asset="<?php echo $tAssetString; ?>";
  var stock = "<?php echo $StockString; ?>";
  var inventory= "<?php echo $InventoryString; ?>";
  var income = "<?php echo $incomeString; ?>";
  var group = "<?php echo $AssetString; ?>";
   function totalf(){
     
        //  document.getElementById("Assets").innerHTML = dtotal;
        document.getElementById("table").append( "HELdasfffffffffffffffffffffffffffffffadfsdafLOO!");


 }
 function Assetf(){
      document.getElementById("Assets").innerHTML = asset;
 }
 function stockf(){
      document.getElementById("Assets").innerHTML = stock;
 }
 function inventoryf(){
      document.getElementById("Assets").innerHTML = inventory;
 }
 function incomef(){
      document.getElementById("Assets").append( income);
 }
 function groupf(){
      document.getElementById("Assets").innerHTML = group;
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
                                        <button class="btn btn-primary" type="button" onclick="return checkForm(event);">
                                         <b>Create a new asset +</b>
                                        </button>
                                        <br>
                                        <br>
                                        
                                        

                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                             <li class="nav-item">
                                                <a onclick="document.getElementById('Assets').innerHTML =total" class="nav-link rounded-0 active">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Total</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a onclick="document.getElementById('Assets').innerText =asset" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                                    <i class="mdi mdi-archive"></i>
                                                    <span class="d-none d-lg-block">Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a onclick= "document.getElementById('Assets').innerHTML =stock" ; data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 ">
                                                    <i class=" mdi mdi-alpha-s-box"></i>
                                                    <span class="d-none d-lg-block">Stock Assets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a onclick="inventory()" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    <i class=" mdi mdi-alpha-i-box"></i>
                                                    <span class="d-none d-lg-block">Inventory</span>
                                                </a>
                                            </li>
                                              <li class="nav-item">
                                                <a onclick="incomef()" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Income</span>
                                                </a>
                                            </li>
                                            
                                            
                                            <li class="nav-item">
                                                <a onclick="return group()" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    <i class="mdi mdi-alpha-g-box"></i>
                                                    <span class="d-none d-lg-block">Groups</span>
                                                </a>
                                            </li>


                                        </ul>

                                                                <div id=table class="tab-content">
                                                                   
                                           
                                                                                                                              
                                                                                                    
                                                                                                </div>
                                            
                                                                    <div class="tab-pane show active" id="Assets">
                                                                    
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                                                                    </div>
                                        
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