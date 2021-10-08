<!DOCTYPE html>
    <html lang="en">

    <head>
        
        
        <script type="text/javascript"> 
        
        
    </script> 
        
        
        <meta charset="utf-8" />
        <title>Asset Manager - Reports</title>
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
                                            <li class="breadcrumb-item active">Reports</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><i class="dripicons-document"></i> Reports</h4>
                                </div>
                            </div>
                        </div>
                        <!-- ================= end page title ================= -->
                        <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
                         <div class="card">
                             
                             <form method="post" action="generateLedger.php">
                                    <div class="card-body">
                                            <h4>Select Fiscal Year</h4>
                                         <select name="startDate" class="form-control" id="example-select" >
                        <option>-Years-</option>
                        <?php 
                            $currentDate = date("Y");
                            $startDate = 1970;
                            for ($startDate ; $startDate<=$currentDate ; $startDate++)
                            {
                                echo "<option value='$startDate'>$startDate</option>";
                            }
                             ?>
                </select>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
                                        
                                        
                                        </div>
                                        </div>
                       

<?php 
$Year=$_POST["startDate"];
// echo $Year;
// $Year=$Year."-01-01";
// echo"<br>";
// echo $Year;

$insertfiscalYear=$conn->prepare("INSERT INTO fiscal_year VALUE(?)");
// echo"<br>";
// echo $Year;
// echo"hello";
$insertfiscalYear->bind_param("s",$Year);
// echo"<br>";
// echo $Year;
$insertfiscalYear->execute();
    // echo"<br>";
// echo $Year;
    // $result_year=$insertfiscalYear-> get_result();
    // echo"<br>";
    // $row=$result_year->fetch_array(MYSQLI_ASSOC);
    // echo "<br>";
    // echo "hellooooooo";
    // echo $row;
echo $Year;

?>
                        
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