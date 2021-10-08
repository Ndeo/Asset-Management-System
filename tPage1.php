<?php 
require "config.php";
if( isset($_POST["Month"]) && isset($_POST["Day"]) ){
   if( $sql = $conn -> prepare ( "UPDATE `fiscal_year` SET `Fiscal_year_date`= ? WHERE `id`= 1" ) ) { 
   $date="2019-".$_POST["Month"]."-".$_POST["Day"];
   $sql->bind_param("s",$date);
   $sql->execute();
   }else{
       
    echo "                  An error has occured";   
   }
}
$sql=$conn->prepare("SELECT MONTH(`Fiscal_year_date`) as Month,DAY(`Fiscal_year_date`)as Day FROM `fiscal_year` WHERE `id`=1");
$sql->execute();
    $result = $sql->get_result();
$row=$result->fetch_array(MYSQLI_ASSOC);


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
                        <!-- ================= end page title ================= -->
                        <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
                
                       <div class="card">
                           <div class="card-body">
                               <table class="table dt-responsive datatable nowrap" width="100%">
                                   <thead>
                                   <tr>
                                       <th colspan="2">Fiscal year </th></tr>
                                       <tr>
                                       <th>Month</th><th>Day</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   
                                   <tr><td><?php echo $row["Month"]; ?></td> <td><?php echo $row["Day"]; ?></td> </tr>
                                   </tbody>
                               </table>
                               
                               
                               
                               
                               </div>
                              </div>

                            <div class="card">
                           <div class="card-body">
                               
                                <form class="p-lg-1" method="post" action="" name="form">
                                    <h3>Edit the Fiscal year boundries</h3>
                                 
                  
                    



                        
                             <div class="form-group mb-3">
                        <label for="Month">Month</label>
                        <select id="month" name="Month">

<option>- Month -</option>
<option value="1">January</option>
<option value="2">Febuary</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
                      </div>
                      <div class="form-group mb-3">
                        <label for="Day">Day</label>
                        <select id="day" name="Day">
                            <option>- Day -</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>

                        </select>
                      </div>
                            
                            
                                    
                                    
                                    
                                  <button type="submit" class="btn btn-primary">Submit</button>  
                                    
                                    
                                </form>
                               
                               
                               
                               
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
    </body>

</html>