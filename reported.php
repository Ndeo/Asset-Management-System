<?php
    require "config.php";
    require "Session.php";
    
     $sqlTypes=$conn->prepare("Select MONTH(liability.entrydate),sum(liability.valu) from liability group by MONTH(entrydate)");
    $sqlTypes->execute();
    $result_liabilities=$sqlTypes-> get_result();
    
    $array = array(
    array(0, 0),
    array(0, 0),
    array(0, 0),
    array(0, 0),
    array( 0, 0),
    array( 0, 0),
    array( 0, 0),
    array( 0, 0),
    array( 0, 0),
     array( 0, 0),
    array( 0, 0),
     array( 0, 0)
);
while($row =$result_liabilities->fetch_array(MYSQLI_ASSOC)){
    $array[$row["MONTH(liability.entrydate)"]][1]=$row["sum(liability.valu)"];
}
    
    $sqlTypes=$conn->prepare("Select MONTH(asset.entrydate),sum(asset.enteredValue) from asset group by MONTH(entrydate)");
    $sqlTypes->execute();
    $result_assets=$sqlTypes-> get_result();
    while($roow =$result_assets->fetch_array(MYSQLI_ASSOC)){
    $array[$roow["MONTH(asset.entrydate)"]][0]=$roow["sum(asset.enteredValue)"];
}
    
    
    if(isset($_POST['Specific'])||isset($_POST['Monthly'])||isset($_POST['Anually'])){
    $current_user =$_SESSION['FirstName']." ".$_SESSION['LastName'];
    if(isset($_POST['Specific'])){
    if(isset($_POST['startDate'])){
    $startDate =$_POST['startDate'].' 00:00:00';
    }
    // echo "hello";
    $endDate =$_POST['endDate'].'- 23:59:59';
    }elseif(isset($_POST['Monthly'])){
        if(isset($_POST['startDate'])){
    $startDate =$_POST['startDate'].'-01 00:00:00';
    }
    // echo "hello";
    $endDate =$_POST['endDate'].'-31 23:59:59';
    
    }elseif(isset($_POST['Anually'])){
        if(isset($_POST['startDate'])){
    $startDate =$_POST['startDate'].'-01-01 00:00:00';
    }
    // echo "hello";
    $endDate =$_POST['endDate'].'-12-31 23:59:59';
    }
    // echo "SELECT * FROM asset WHERE (entrydate <= '$endDate' AND ExitDate = '0000-00-00 00:00:00')OR (entrydate <= '$endDate' AND ExitDate >= '$startDate')";
    if($sql_asset =$conn->prepare("SELECT * FROM asset WHERE (entrydate <= ? AND ExitDate = '0000-00-00 00:00:00') OR (entrydate <= ? AND ExitDate >= ?)")){
        // echo "hello";
    if($sql_asset->bind_param("sss",$endDate,$endDate,$startDate)){
    // echo "hello";
    if($sql_asset -> execute()){
        
    $result_asset = $sql_asset  -> get_result();
    
    $count = $result_asset -> num_rows;
    }
    }
    }
    
    $sql_lib =$conn->prepare("SELECT * FROM liability WHERE (entrydate <= ? AND ExitDate = '0000-00-00 00:00:00') OR (entrydate <= ? AND ExitDate >= ?)");
    $sql_lib->bind_param("sss",$endDate,$endDate,$startDate);
    if($sql_lib -> execute()){
       $result_lib = $sql_lib  -> get_result();
       $count1 = $result_lib -> num_rows;
    }else{
       echo "<h4>".$conn->error."</h4>";
    }
    
    
    }else{
     header("Location: reports.php");
    }
    // echo "select COUNT(`id`), `assetType` from asset where (entrydate <= $endDate AND ExitDate = '0000-00-00 00:00:00') OR (entrydate <= $endDate AND ExitDate >= $startDate) group by `assetType`";
    $sqlTypes=$conn->prepare("select COUNT(`id`), `assetType` from asset where (entrydate <= ? AND ExitDate = '0000-00-00 00:00:00') OR (entrydate <= ? AND ExitDate >= ?) group by `assetType`");
    $sqlTypes->bind_param("sss",$endDate,$endDate,$startDate);
    $sqlTypes->execute();
    $result_types=$sqlTypes-> get_result();
    ?>
    <!DOCTYPE html>
        <html lang="en">
    
        <head>
            
            
            <meta charset="utf-8" />
            <div>
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
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                 <script type="text/javascript">
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           
           
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart2);

           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['assetType', 'COUNT(`id`)'],  
                          <?php  
                          $flag=false;
                          while($row =$result_types->fetch_array(MYSQLI_ASSOC))  
                          {  
                              if ($flag){
                                //   echo ",<br>";
                              }
                              echo '["'.$row["assetType"].'", '.$row["COUNT(`id`)"].'],';
                              $flag=true;
                               
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Assets categories',  
                      //is3D:true,  
                    //   pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options); 
                
                function resetTableStyle(){
    var myDiv = document.getElementById('piechart');
    var myTable = myDiv.getElementsByTagName('table')[0];
    myTable.style.margin = 'auto';
  }
           }
           
            function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Months', 'Assets', 'Liabilities'],

          <?php 
          $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
        for($i=0;$i<12;$i++){
            echo '["'.$months[$i+1].'",'.$array[$i][0].', '.$array[$i][1].'],';
        }
        //   {
              
        //     echo '["'.$months[$row["MONTH(liability.entrydate)"]].'",'.$row["sum(liability.valu)"].', '.$row["sum(liability.valu)"].'],';
        // }
        
       
        
        ?>
        
          
          ['last month', 1030, 540]
            ]);
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };
// columnchart_material
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
           
           </script>  

              <!--     Load the Visualization API and the piechart package.-->
              <!--    google.charts.load('current', {'packages':['corechart']});-->

              <!--    // Set a callback to run when the Google Visualization API is loaded.-->
              <!--    google.charts.setOnLoadCallback(drawChart);-->

              <!--    // Callback that creates and populates a data table, -->
              <!--    // instantiates the pie chart, passes in the data and-->
              <!--    // draws it.-->
              <!--   // function drawChart() {-->

              <!--    // Create the data table.-->
              <!--  //   var data = new google.visualization.DataTable();-->
              <!--//  var data = new google.visualization.arrayToDataTable([-->
              <!--     // ['Type','Count '],-->
              <!--   // data.addColumn('string', 'Type');-->
              <!--   // data.addColumn('number', 'Count');-->
              <!--    //data.addRows([-->
                      <?php
                     // $flag=false;
                     // while ($row =$resultTypes->fetch_array(MYSQLI_ASSOC)){
                    //       $String="";
                    //       if($flag===true){
                    //           echo ",<br>";
                    //       }
                    //       $String =$String."['".$row['assetType']."', ".$row['COUNT(`id`)']."]";
                       //  echo  "['".$row["assetType"]."', ".$row["COUNT(`id`)"]."],";
                    //       $flag=true;
                          
                    //  }
                    //  ?>
                <!--    // ['Mushrooms', 3],-->
                <!--    // ['Onions', 1],-->
                <!--    // ['Olives', 1],-->
                <!--    // ['Zucchini', 1],-->
                <!--    // ['Pepperoni', 2]-->
                <!--//   ]);-->

                <!--  // Set chart options-->
                <!--//   var options = {'title':'How Much Pizza I Ate Last Night',-->
                <!--//                  'width':400,-->
                <!--//                  'height':300};-->

                <!--//   // Instantiate and draw our chart, passing in some options.-->
                <!--//   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));-->
                <!--//   chart.draw(data, options);-->
                <!--// }-->
                <!--// </script>-->
        </head>
    
        <body class="enlarged" data-keep-enlarged="true">
    
            <!-- Begin page -->
            <div class="wrapper">
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
                                        <div class="page-title-right card">
                                           
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
                            <h4>Date: <?php echo date('Y-m-d'); ?></h4>
                            <h4>Time: <?php echo date('H:m:s'); ?> </h4>
                            <br>
                            
                            <button class="btn btn-primary" type="submit" onclick="window.print();">Print Page</button>
                            <button class="btn btn-primary" type="submit" onclick="location.href='generateLedger.php';">Generate Ledger</button>
                            <br>
                            
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
                                                                            
                                                                          while($row =$result_asset->fetch_array(MYSQLI_ASSOC))
                                                                            {
                                                                            
                                                                            echo" <tr>";
                                                                                    echo" <td>".$row['id']."</td>";
                                                                                    echo" <td>".$row['assetName']."</td>";
                                                                                    echo" <td>".$row['grp']."</td>";
                                                                                    echo" <td>".$row['Descrip']."</td>";
                                                                                    echo" <td>".$row['enteredValue']."</td>";
                                                                                    echo" <td>".$row['depreciationRate']."</td>";
                                                                                    echo" <td>".$row['entrydate']."</td>";
                                                                                    echo" <td>".$row['availability']."</td>";
                                                                                    echo" <td>".$row['enteredBy']."</td>";
                                                                                    echo" <td>".$row['updatedOn']."</td>";
                                                                                    echo" <td>".$row['isPeriodic']."</td>";
                                                                                    echo" <td>".$row['assetType']."</td>";
                                                                                    echo" <td>".$row['Frequency']."</td>";
                                                                                    echo" <td>".$row['ExitDate']."</td>";
                                                                                    echo" </tr>";
                                                                            }?>
                                                                            </tbody>
                                                                            </table>
                                                                            </div>
                                                                            </div>
                                                                            <div class="card">
                                 <div class="card-body">
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
                    <div class="card">
                        
                                 <div class="card-body">
                                                                <div class="row">
                                                              <div class="col-lg-6">    <!-- col 1 \/\/\/\/ -->
                                                                
                                                                  
                                                            <div id="piechart" style="width: 700px; height: 500px;"></div> 
                                                            
                                                            
                                                            
                                                            
                                                            
                                                              </div>
                                                              <!-- end col -->
                                                            
                                                              <div class="col-lg-6">    <!-- col 2 \/\/\/\/ -->
                                                                
                                                            
                                                            
                                                            
                                                                            <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
                                                            </div> 
                                                            
                                                            
                                                            
                                                            
                                                              </div>
                                                              <!-- end col -->
                                                            </div>
                                                            <!-- end row-->

                                     
                                    
                                     <!--<div id="chart_div">-->
                                         
                                         
                                     <!--</div>-->
                        
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