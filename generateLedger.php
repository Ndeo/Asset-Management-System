<?php
require ('Session.php');
// require ('Fetch.php');
require 'config.php';


$Year=$_POST["startDate"];
// takes a year from a user

$fiscalConn=$conn->prepare("select MONTH(Fiscal_year_date),Day(Fiscal_year_date) from fiscal_year where id=1");
    $fiscalConn->execute();
    $result_fiscalConn=$fiscalConn-> get_result();
    $row=$result_fiscalConn->fetch_array(MYSQLI_ASSOC);
    $yearr=$Year+1;
    $yearr=$yearr."-".$row["MONTH(Fiscal_year_date)"]."-".$row["Day(Fiscal_year_date)"]." 00:00:00";
    $Year=$Year."-".$row["MONTH(Fiscal_year_date)"]."-".$row["Day(Fiscal_year_date)"]." 00:00:00";
    echo $Year;
// concatenate The user Year with fiscal year parameters wich is month and day
// query the database entrydate.
$sqlTypes=$conn->prepare("SELECT asset.entrydate, asset.assetName, asset.grp , asset.enteredValue ,asset.ExitDate FROM asset where (asset.assetType ='Income' AND entrydate<=? AND ExitDate>=?) UNION SELECT entrydate,liabilityName,FromTo,valu,ExitDate FROM liability where (entrydate<=? AND ExitDate>=?) order by(entrydate)");
$sqlTypes->bind_param("ssss",$yearr,$Year,$yearr,$Year);
    $sqlTypes->execute();
    $result_asset=$sqlTypes-> get_result();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <script>
          
          function myfunction(){
              
              window.print();
              
          }
          
      </script>
    <meta charset="utf-8" />
    <title>Asset Manager - Reports</title>
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
                      <li class="breadcrumb-item active">Reports</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="dripicons-document"></i> Reports
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
              <div class="card-body">
                  <button class="btn btn-primary" type="submit" onclick="myfunction();">Print Page</button>
 <table class="table table-striped">
                                <thead>
                                    
                                <tr>
                                                                            <th class="tg-73a0">assetName</th>
                                                                            <th class="tg-73a0">entrydate</th>
                                                                            <th class="tg-73a0">grp</th>
                                                                            <th class="tg-73a0">enteredValue</th>
                                                                            <th class="tg-73a0">ExitDate</th>
                                                                            </tr>
                                </thead>
                                                                            <tbody>
                                                                            
                                                                            <?php
                                                                            
                                                                          while($row =$result_asset->fetch_array(MYSQLI_ASSOC))
                                                                            {
                                                                            
                                                                            echo" <tr>";
                                                                                    echo" <td>".$row['assetName']."</td>";
                                                                                    echo" <td>".$row['entrydate']."</td>";
                                                                                    echo" <td>".$row['grp']."</td>";
                                                                                    echo" <td>".$row['enteredValue']."</td>";
                                                                                    echo" <td>".$row['ExitDate']."</td>";
                                                                                    echo" </tr>";
                                                                            }?>
                                                                            </tbody>
                                                                            </table>
               
                
                    </div>

                  </div>
                  <!-- ============================================= -->
                </div>
              <!-- end card-body-->
            </div>
            <!-- end card-->

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
