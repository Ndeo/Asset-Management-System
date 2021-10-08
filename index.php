<?php 
require "Fetch.php";
//require "function.php";
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

                               if($topProducts3=$conn->prepare("SELECT assetName, enteredValue, Frequency AS TotalQuantity FROM asset ORDER BY enteredValue DESC LIMIT 5")){
                            if($topProducts3->execute()){
                            $Strings="['assetName', 'enteredValue']";
                                                    $results_topProducts3=$topProducts3->get_result();
                                                    while($roow3 =$results_topProducts3->fetch_array(MYSQLI_ASSOC)){
                                                    //   echo ',['.$roow3["assetName"].'],'.$roow3["enteredValue"].']';
                                                //   echo",['".$roow3["assetName"]."', ".$roow3["enteredValue"]."]";

                                                       $Strings=$Strings.",['".$roow3["assetName"]."', ".$roow3["enteredValue"]."]";
                            }
                            // echo $Strings;
                            
                                
                            }else{
                            echo $conn->error;
                                
                            }
                            }else{
                           echo $conn->error;
                                
                            }  

?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        
   
        
        
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      
      google.charts.load('current', {'packages':['corechart']});  
          google.charts.setOnLoadCallback(drawChart2); 

             function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                    // ['assetName', 'enteredValue'],
                    // ['surface laptops go 77', 60000],
                    // ['surface laptops', 60000],
                    // ['testing as usual', 23233],
                    // ['asseting', 8880],
                    // ['Nawaf', 6115],
                            // ['assetName', 'enteredValue'],
                            // ['Structure Beams', 55432],
                            // ['Computers', 45000],
                            // ['Concrete', 32000],
                            // ['Glass Windows', 11022],
                            // ['Linksys Routers', 7112]

                          <?php echo $Strings; ?>
                     ]);  
                var options = {  
                      title: 'Percentage of Assets categories',  
                      //is3D:true,  
                    //   pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options); 
                
                
           }

      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
          ['Months', 'Assets', 'Liabilities'],

          <?php 
          $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May',6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
        for($i=01;$i<=12;$i++){
            
            echo '["'.$months[$i].'",'.$array[$i-1][0].', '.$array[$i-1][1].']';
            // if($i!=12){
                echo ",";
            // }
        }
        //   {
              
        //     echo '["'.$months[$row["MONTH(liability.entrydate)"]].'",'.$row["sum(liability.valu)"].', '.$row["sum(liability.valu)"].'],';
        // }
        
       
        
        ?>
        
]);
        var optionss = {
          chart2: {
            title: 'Company Performance',
            subtitle: 'Assets ,and Liabilities values over 12 months of 2019',
            trendlines: {
      0: {
        labelInLegend: 'Bug line',
        visibleInLegend: true,
      },
      1: {
        labelInLegend: 'Test line',
        visibleInLegend: true,
      }
    }
          }
        };

        var chart2 = new google.charts.Bar(document.getElementById('columnchart_material'));

        // chart2.draw(data2, google.charts.Bar.convertOptions(options));
        chart2.draw(data2, optionss);
      }
      
      
      
      
      
    </script>
        
        
        
        
        
        
        
        <meta charset="utf-8" />
        <title>Asset Manager - Dashboard</title>
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
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><i class="dripicons-meter"></i> Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- ================= end page title ================= -->
               
                                <?php 
                                
                                $getTotalAssetAll=$conn->prepare("SELECT SUM(asset.enteredValue) AS TotalAll FROM asset");
                                    $getTotalAssetAll->execute();
                                
                                    $result_assetSumAll=$getTotalAssetAll-> get_result();
                                    $roow3 =$result_assetSumAll->fetch_array(MYSQLI_ASSOC);
                                
                                
                                
                                
                                
                                  $getTotalAssetSum=$conn->prepare("SELECT SUM(asset.enteredValue) FROM asset WHERE assetType='Asset'");
                                    $getTotalAssetSum->execute();
                                
                                    $result_assetSum=$getTotalAssetSum-> get_result();
                                    $roow4 =$result_assetSum->fetch_array(MYSQLI_ASSOC);
                                    
                                    
                                //   <!--1111111111111111111111111111111111111111111-->
                                
                                $getTotalLiabilitiesSum=$conn->prepare("SELECT SUM(liability.valu) AS valu FROM liability");
                                    $getTotalLiabilitiesSum->execute();
                                
                                    $result_Liabilities=$getTotalLiabilitiesSum-> get_result();
                                    $roow5 =$result_Liabilities->fetch_array(MYSQLI_ASSOC);
                                //   <!--1111111111111111111111111111111111111111111-->

                                  
                                  $getTotalAssetStockSum=$conn->prepare("SELECT SUM(asset.enteredValue) as assetStock FROM asset WHERE assetType='Asset stock'");
                                  $getTotalAssetStockSum->execute();
                                
                                    $result_assetStockSum=$getTotalAssetStockSum-> get_result();
                                    $roow6 =$result_assetStockSum->fetch_array(MYSQLI_ASSOC);
                                //   <!--1111111111111111111111111111111111111111111-->
                                  
                                  $getTotaInventory=$conn->prepare("SELECT SUM(asset.enteredValue) as inventoryTotal FROM asset WHERE assetType='inventory'");
                                    $getTotaInventory->execute();
                                
                                    $result_inventorySum=$getTotaInventory-> get_result();
                                    $roow7 =$result_inventorySum->fetch_array(MYSQLI_ASSOC);
                                  
                                ?>
                                <!--1111111111111111111111111111111111111111111-->
                                
                                <!--1111111111111111111111111111111111111111111-->
                                <!--1111111111111111111111111111111111111111111-->
                                
   
   
   
   <?php 
    
                                  $getTotalincome=$conn->prepare("SELECT SUM(asset.enteredValue) as incomeTotal FROM asset WHERE assetType='income'");
                                    $getTotalincome->execute();
                                
                                    $result_incomeSum=$getTotalincome-> get_result();
                                    $roow8 =$result_incomeSum->fetch_array(MYSQLI_ASSOC);
                                  
                                ?>


   
                        <div class="row">
                            <div class="col-xl-5">

                                <div class="row">
                                     <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Assets</h4>
                                                <h3 class="mt-3 mb-3"><?php echo $roow3["TotalAll"]; ?> SAR</h3>
                                                 <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php   echo updateAssets()->count();  ?></span>
                                                    <span class="text-nowrap">Total Asset Count</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->







                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Number of Orders">Total Liabilities</h4>
                                                <h3 class="mt-3 mb-3"><?php   echo $roow5["valu"];  ?> SAR</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php echo updateLiabilities()->count();  ?></span>
                                                    <span class="text-nowrap">Total liability Count</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Number of Customers">Assets</h4>
                                                <h3 class="mt-3 mb-3"><?php   echo $roow4["SUM(asset.enteredValue)"];  ?> SAR</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php echo updateTypeAssets()->count();  ?></span>
                                                    <span class="text-nowrap">Total Asset Count</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Number of Orders">Asset Stock</h4>
                                                <h3 class="mt-3 mb-3"><?php echo $roow6["assetStock"];  ?> SAR</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php   echo updateTypeAssetsStock()->count();   ?></span>
                                                    <span class="text-nowrap">Total Asset Stock Count</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Average Revenue">Inventory</h4>
                                                <h3 class="mt-3 mb-3"><?php echo $roow7["inventoryTotal"];?> SAR</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php    echo updateTypeInventory()->count();   ?></span>
                                                    <span class="text-nowrap">Total Inventory Count</span>  
                                                </p>
                                             
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                    
                                    <!-- xxxxxxx -->
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-counter widget-icon"></i>
                                                </div>
                                                <h4 class="text-muted font-weight-normal mt-0" title="Number of Orders">Income</h4>
                                                <h3 class="mt-3 mb-3"><?php  echo $roow8["incomeTotal"]; ?> SAR</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success mr-2"><?php  echo updateTypeIncome()->count();   ?></span>
                                                    <span class="text-nowrap">Total Income Count</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <h4 class="header-title mb-3">Items</h4>

                                       <div id="columnchart_material" style="width: 900px; height: 400px;"></div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                         
<?php


                        $topProducts=$conn->prepare("SELECT assetName, enteredValue, Frequency AS TotalQuantity FROM asset GROUP BY id ORDER BY SUM(enteredValue) DESC LIMIT 5");
                        $topProducts->execute();
                        $results_topProducts=$topProducts->get_result();
                        $String='<table class="table table-centered table-hover mb-0">
                                                <tbody>';
                        while($row=$results_topProducts->fetch_array(MYSQLI_ASSOC)){
                            $String=$String.'<tr>';
                            $String=$String.'<td><h5 class="font-14 mb-1 font-weight-normal">'.$row['assetName'].'</h5>';
                             $String=$String.'<span class="text-muted font-13">Asset Name</span></td>';
                            
                            $String=$String.'<td><h5 class="font-14 mb-1 font-weight-normal">'.$row['TotalQuantity'].'</h5>';
                              $String=$String.'<span class="text-muted font-13">Quantity</span></td>';

                            
                            $String=$String.'<td><h5 class="font-14 mb-1 font-weight-normal">'.$row['enteredValue']." ". SAR.'</h5>';
                              $String=$String.'<span class="text-muted font-13">Price</span></td>';

                            $String=$String.'</tr>';
                            
                            
                        }
                        
                        $String=$String.'</tbody></table>';
                        
                        
?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-2">Top Selling Assets</h4>

                                        <div class="table-responsive">
                                           <?php echo $String; ?>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-5">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="header-title">Total Sales</h4>
                                             <div id="piechart" style="width: 450px; height: 427px;"></div>
                                        <!--<div class="mb-5 mt-4 chartjs-chart" style="height: 201px; max-width: 180px;">-->
                                            
                                        <!--    <canvas id="average-sales">-->
                                                
                                                
                                        <!--    </canvas>-->
                                        <!--</div>-->
                                        
                                        <div class='chart-widget-list'>
                                           
                                             <?php
                                            //   $topProducts2=$conn->prepare("SELECT assetName, enteredValue, Frequency AS TotalQuantity FROM asset GROUP BY id ORDER BY SUM(enteredValue) DESC LIMIT 5");
                                            //     $topProducts2->execute();
                                            //     $results_topProducts2=$topProducts2->get_result();
                                            //         // $results_topProducts= $conn->query($topProducts); // $con is the connection object
                                            //         // $results_topProducts->data_seek(0);                                              
                                            //         $String2="";
                                            // while($row=$results_topProducts2->fetch_array(MYSQLI_ASSOC)){
                                            // $String2=$String2."<p>";
                                            // $String2=$String2." <i class='mdi mdi-square text-primary'></i>".$row['assetName']."";
                                            // // $String2=$String2."</p>";
                                            //     $String2=$String2."<span class='float-right'>".$row['enteredValue']."</span>";
                                            // //  $String2=$String2."<p>";
                                            // // $String2=$String2." <i class='mdi mdi-square text-primary'></i>".$row['enteredValue']."";
                                            // $String2=$String2."</p>";
                                            // }
                                            
                                            // echo $String2;
                                             ?> 
                                        </div>
                                        
                                      
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            

                        </div>
                        <!-- end row -->

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
        <!--<script src="assets/js/vendor/Chart.bundle.min.js"></script>-->
        
        <!-- demo app -->
        //<script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->
    </body>

</html>