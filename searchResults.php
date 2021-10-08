 <?php
 require("Fetch.php");
 $search_field=$_POST["search_bar"];
 if(!isset($search_field)){
// header('location: index.php');
}
 ?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Asset Manager - Test Page1</title>
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
                                            <li class="breadcrumb-item active">Test Page1</li>
                                        </ol>
                                    </div>
                                    
                                    <h4 class="page-title"><i class="mdi mdi-numeric-1-circle"></i> Test Page1</h4>
                                </div>
                            </div>
                        </div>
                        
                         <div class="card">
                                    <div class="card-body">
                                        
                                         <div class="tab-pane show active" id="Assets">
                                                                    <h4 class="header-title mb-3">Assets</h4>
                                                
                                            
                                            

                                                                                                <table class="table dt-responsive datatable nowrap">
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
                                                                                                        
                                                                                        $assetlistsatas=search($search_field);
                                                                                         
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
                                        
                                        
                                        </div>
                                        </div>
                        <!-- ================= end page title ================= -->
                        <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
                
                       


                        
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
    </body>

</html>