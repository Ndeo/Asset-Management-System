    <?php
    require "config.php";
    require "Session.php";
    if(isset($_POST['Specific'])){
    $current_user =$_SESSION['FirstName']." ".$_SESSION['LastName'];
    
    if(isset($_POST['startDate'])){
    $startDate =$_POST['startDate'].' 00:00:00';
    }
    $endDate =$_POST['endDate'].' 23:59:59';
    echo "SELECT * FROM asset WHERE (entrydate >= '$startDate' AND ExitDate IS NULL) OR (entrydate >= '$startDate' AND ExitDate <= '$endDate')";
    /*$sql2 = "SELECT * FROM liability where enteredBy = '$entered_by'";
    $sql3 = "SELECT * FROM user where Username='$current_user'"; // pass a variable here if u want it dynamic.
    $sql4 = "SELECT COUNT(id),  FROM Asset GROUP BY assetType";
    */
    
    $sql_asset =$conn->prepare("SELECT * FROM asset WHERE (entrydate >= '?' AND ExitDate IS NULL) OR (entrydate >= '?' AND ExitDate <= '?')");
    $sql_asset->bind_param("sss",$startDate,$startDate,$endDate);
    
    //$sql =$conn->prepare("SELECT COUNT(ID),assetType  FROM asset GROUP BY assetType");
    if($sql_asset -> execute()){
        
    $result_asset = $sql_asset  -> get_result();
    
    $count = $result_asset -> num_rows;
    echo "the count is ------------------------------------------->".$count;
    $sqlTypes=$conn->prepare("select COUNT(`id`), `assetType` from asset where (`entrydate` >= '?' AND `ExitDate` IS NULL) OR (`entrydate` >= '?' AND `ExitDate` <= '?') group by `assetType`");
    $sqlTypes->bind_param("sss",$startDate,$startDate,$endDate);
    $sqlTypes->execute();
    $result_types=$sqlTypes-> get_result();
    $counta=$result_types->num_rows;
    }else{
        
       echo $conn->error;
    }
    
    }elseif(isset($_POST['Monthly'])){
        
    }elseif(isset($_POST['Anually']))
        
    ?>
    
    <!DOCTYPE html>
        <html lang="en">
    
        <head>
          <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
    
            var dt = new google.visualization.DataTable({
        cols: [{id: 'Type', label: 'Type', type: 'string'},
               {id: 'Count', label: 'Number', type: 'number'}],
        rows: [-->
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
          // Define the chart to be drawn.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Asset Type');
          data.addColumn('number', 'Count');
          data.addRows([
            <?php
            $data="";
            while($row = $result_types->fetch_array(MYSQLI_ASSOC)){
                  
                      $data=$data."[".$row['assetType']."][".$row['COUNT(id)']."],";
                  
            }
          rtrim($data,',');
          echo $data;
            ?>
            ['Nitrogen', 0.78],
            ['Oxygen', 0.21],
            ['Other', 0.01]
            ]);
    
          // Instantiate and draw the chart.
          var options = {
              title: 'Assets count';
            };
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
           /*
               ]
        }, 0.6);
    
            var options = {
              title: 'Assets count';
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
            chart.draw(dt, options);
          }*/
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
            <!--<div class="wrapper">-->
    <div>
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
                                 <div class="card-body">
                           <h1><center>Auto-generated Report</center></h1>
                           </br>
                            <h2>Basic Information<hr></h2>
                            <h4>User: <?php echo $current_user; ?> </h4>
                            <h2><br>Assets Information<hr></h2>
                            <table class="table table-striped">
                                <thead>
                                    
                                <tr>
                                                                            <th class="tg-73a0">ID</th>
                                                                            <th class="tg-73a0">Asset Name</th>
                                                                            <th class="tg-73a0">Group</th>
                                                                            <th class="tg-73a0">Description</th>
                                                                            <th class="tg-73a0">entered Value</th>
                                                                            <th class="tg-73a0">Depreciation Rate</th>
                                                                            <th class="tg-73a0">Entry Date</th>
                                                                            <th class="tg-73a0">Availability</th>
                                                                            <th class="tg-73a0">Entered By</th>
                                                                            <th class="tg-73a0">Updated On</th>
                                                                            <th class="tg-73a0">is Periodic</th>
                                                                            <th class="tg-73a0">Asset Type</th>
                                                                            <th class="tg-73a0">Frequency</th>
                                                                            <th class="tg-73a0">Exit Date</th>
                                                                            </tr>
                                </thead>
                                                                            <tbody>
                                                                            
                                                                            <?php
                                                                            
                                                                          while($value1 =$result_asset->fetch_array(MYSQLI_ASSOC))
                                                                            {
                                                                            
                                                                            echo" <tr>";
                                                                                    echo" <td>".$value1['id']."</td>";
                                                                                    echo" <td>".$value1['assetName']."</td>";
                                                                                    echo" <td>".$value1['grp']."</td>";
                                                                                    echo" <td>".$value1['Descrip']."</td>";
                                                                                    echo" <td>".$value1['enteredValue']."</td>";
                                                                                    echo" <td>".$value1['depreciationRate']."</td>";
                                                                                    echo" <td>".$value1['entrydate']."</td>";
                                                                                    echo" <td>".$value1['availability']."</td>";
                                                                                    echo" <td>".$value1['enteredBy']."</td>";
                                                                                    echo" <td>".$value1['updatedOn']."</td>";
                                                                                    echo" <td>".$value1['isPeriodic']."</td>";
                                                                                    echo" <td>".$value1['assetType']."</td>";
                                                                                    echo" <td>".$value1['Frequency']."</td>";
                                                                                    echo" <td>".$value1['ExitDate']."</td>";
                                                                                    echo" </tr>";
                                                                            }?>
                                                                            </tbody>
                                                                            </table>
                                                                            <?php 
                                                                            
                                                                            ?>
                      <h2><br>Liability Information<hr></h2>
                      <table class="table table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                         
                                                                            <th class="tg-73a0">ID</th>
                                                                            <th class="tg-73a0">liability Name</th>
                                                                            <th class="tg-73a0">From-To</th>
                                                                            <th class="tg-73a0">Description</th>
                                                                            <th class="tg-73a0">Value</th>
                                                                            <th class="tg-73a0">Remaining</th>
                                                                            <th class="tg-73a0">Entry Date</th>
                                                                            <th class="tg-73a0">expected on</th>
                                                                            <th class="tg-73a0">Updated On</th>
                                                                            <th class="tg-73a0">Entered By</th>
                                                                            <th class="tg-73a0">is Periodic</th>
                                                                            <th class="tg-73a0">Frequency</th>
                                                                            <th class="tg-73a0">Exit Date</th>
                                                                
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                            $sql_lib =$conn->prepare("SELECT * FROM liability WHERE (entrydate >= '?' AND ExitDate IS NULL) OR (entrydate >= '?' AND ExitDate <= '?')");
                                                                            $sql_lib->bind_param("sss",$startDate,$startDate,$endDate);
                                                                            if($sql_lib -> execute()){
                                                                               $result_lib = $sql_lib  -> get_result();
                                                                               $count1 = $result_lib -> num_rows;
                                                                            }else{
                                                                               echo "<h4>".$conn->error."</h4>";
                                                                            }
                                                                            
                                                                          
                                                                            while($value1 =$result_lib->fetch_array(MYSQLI_ASSOC))
                                                                            {
                                                                            
                                                                            echo" <tr>";
                                                                                    echo" <td>".$value1['id']."</td>";
                                                                                    echo" <td>".$value1['liabilityName']."</td>";
                                                                                    echo" <td>".$value1['FromTo']."</td>";
                                                                                    echo" <td>".$value1['Descrip']."</td>";
                                                                                    echo" <td>".$value1['valu']."</td>";
                                                                                    echo" <td>".$value1['Remaining']."</td>";
                                                                                    echo" <td>".$value1['entrydate']."</td>";
                                                                                    echo" <td>".$value1['expectedOn']."</td>";
                                                                                    echo" <td>".$value1['enteredBy']."</td>";
                                                                                    echo" <td>".$value1['isPeriodic']."</td>";
                                                                                    echo" <td>".$value1['updatedOn']."</td>";
                                                                                    echo" <td>".$value1['Frequency']."</td>";
                                                                                    echo" <td>".$value1['Exitdate']."</td>";
                                                                                    echo" </tr>";
                                                                            }
                                                                            // echo" <tr>";
                                                                            //         echo" <td>".$value2['id']."</td>";
                                                                            //         echo" <td>".$value2['liabilityName']."</td>";
                                                                            //         echo" <td>".$value2['FromTo']."</td>";
                                                                            //         echo" <td>".$value2['Descrip']."</td>";
                                                                            //         echo" <td>".$value2['valu']."</td>";
                                                                            //         echo" <td>".$value2['Remaining']."</td>";
                                                                            //         echo" <td>".$value2['entrydate']."</td>";
                                                                            //         echo" <td>".$value2['expectedOn']."</td>";
                                                                            //         echo" <td>".$value2['updatedOn']."</td>";
                                                                            //         echo" <td>".$value2['enteredBy']."</td>";
                                                                            //         echo" <td>".$value2['isPeriodic']."</td>";
                                                                            //         echo" <td>".$value2['Frequency']."</td>";
                                                                            //         echo" <td>".$value2['ExitDate']."</td>";
                                                                            //         echo" </tr>";
                                                                            
                                                                            ?>
                                                                            </tbody>
                                                                            </table>
                                                                            
    
                                                                            
                            
                             </div>
                    </div>
                            <div id="piechart" style="width: 900px; height: 500px;">
                                
                                
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