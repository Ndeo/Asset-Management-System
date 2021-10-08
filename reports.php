<!DOCTYPE html>
<html lang="en">
  <head>
      <script type="text/javascript"> 
        
        function hideToDate() { 
             var select = document.getElementById("example-select1");
            var length = select.options.length;
      var option = document.createElement("CURRENT");
      var dt = new Date().getYear()+19bk00;
        select.getElementsByTagName('option')[dt-1969].selected = 'selected';

            }
            
  
        
        
        function hideToDate2() { 
            
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
             if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 
            
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("example-date1").setAttribute("value", today);


        <?php
        $currentDate=Date("YYYY-mm-DD");
        echo $currentDate;
            ?>
        
            
            
  
        }
        function hideToDate3() { 
            var cd=new Date();
        var year=cd.getFullYear();
        var month=cd.getMonth()+1;
        
        if(month < 10){
            var fullDate= year+'-0'+month;
        }else{
             var fullDate= year+'-'+month;
        }
        //var day=cd.getDate();
        //var hour=cd.getHours();
        //var minutes=cd.getMinutes();
        //var seconds=cd.getSeconds();
        //var fullDate= year+'-'+month+'-'+day+' '+hour+':'+minutes+':'+seconds;
        //document.getElementById("To-Date-Hide-Monthly").type="text";
        
            document.getElementById("month").value=fullDate;
                             
                              //  document.getElementById('month').value="2015-05";

        // if( document.getElementById("To-Date-Hide-Monthly").style.display == "none"){
         //    document.getElementById("To-Date-Hide-Monthly").style.display = "block";
            
        
       // }else
       /// {
           // document.getElementById("To-Date-Hide-Monthly").style.display = "none";
          // document.getElementById("example-monthh").value="2019-05';
        var cd=new Date();
        var year=cd.getFullYear();
        var month=cd.getMonth()+1;
        //var day=cd.getDate();
        //var hour=cd.getHours();
        //var minutes=cd.getMinutes();
        //var seconds=cd.getSeconds();
        //var fullDate= year+'-'+month+'-'+day+' '+hour+':'+minutes+':'+seconds;
        var fullDate= year+'-0'+month;
        //document.getElementById("To-Date-Hide-Monthly").type="text";
        document.getElementById("To-Date-Hide-Monthly").value=year+'-'+month;
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
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-4">
                  <li class="nav-item">
                    <a
                      href="#Assets"
                      data-toggle="tab"
                      aria-expanded="true"
                      class="nav-link rounded-0 active"
                    >
                      <!--<i class="mdi mdi-archive"></i>-->
                      <span class="d-none d-lg-block">Specific</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="#stockAssets"
                      data-toggle="tab"
                      aria-expanded="false"
                      class="nav-link rounded-0 "
                    >
                      <!--<i class=" mdi mdi-alpha-s-box"></i>-->
                      <span class="d-none d-lg-block">Monthly</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="#Inventory"
                      data-toggle="tab"
                      aria-expanded="false"
                      class="nav-link rounded-0"
                    >
                      <!--<i class=" mdi mdi-alpha-i-box"></i>-->
                      <span class="d-none d-lg-block">Anually</span>
                    </a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane show active" id="Assets">
                    <h4 class="header-title mb-3">Time Period</h4>
                        <div class="form-group mb-3">
                            <form method="post" action="reported.php">
                            <label for="example-date">Date</label>
                            <input class="form-control" id="example-date" type="date" name="startDate">
                             
                                  <input type="checkbox" name="date" id= "checkbox" onclick="hideToDate2()"> To This Date
                                  <br>
                                  <div id="To-Date-Hide-Spec">
                                      <h4>To</h4>
                                      <input class="form-control" id="example-date1" type="date" name="endDate" min='1970-01-01' value="<?php echo date('Y-m-d'); ?>">
                                  </div> 
                                                                <br>
                       <button class="btn btn-primary" type="submit" name="Specific" style="float: right;">Search</button>
                        
                  
                        </form>

                        </div>

                </div>

                  <!-- ============================================= -->
                
                  <div class="tab-pane" id="stockAssets">
                    <form method="post" action="reported.php">
                    <h4 class="header-title mb-3">Monthly</h4>
                     <div class="form-group mb-3">
                            <label>Time Period in Months</label>
                            <input class="form-control" id="example-month" type="month" name="startDate" >
                    </div>
                                         <input type="checkbox" name="date" id= "checkbox" onclick="hideToDate3()"> To This Date

                                                           
                                                                        <div id="To-Date-Hide-Monthly"> 
                                                                         <h4>To</h4>
                                                                        <input class="form-control" type=month name='endDate' id=month value="<?php echo date("Y-m");?>" >
                                                                        </div>
                                                                        <br>
                                                

                                         <button class="btn btn-primary" type="submit" name="Monthly" style="float: right;">Search</button>
                                         
                        </form>
                  </div>
                    
                  <!-- ============================================= -->
                    <div class="tab-pane" id="Inventory">
                <form method="post" action="reported.php">
                <h4 class="header-title mb-3">Time Period in Years</h4>
                <div class="form-group mb-3">
                <label for="example-select">Starts From</label>
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
                <input type="checkbox" name="date" id= "checkbox" onclick="hideToDate()"> To This Date
                <br>
                <br>
                <div id= "To-Date">
                      <label>Ends on</label>
                        <select name="endDate" class="form-control" id="example-select1" name="date2" >
                          <option>-Years-</option>
                             <?php
                                $currentDate = date("Y");
                                $startDate = 1970;
                                for ($startDate ; $startDate<=$currentDate ; $startDate++)
                                {
                                    if($startDate==date('Y')){
                                        echo "<option value='$startDate' selected>$startDate</option>";
                                    }else{
                                    echo "<option value='$startDate' >$startDate</option>";
                                    }
                                }
                            ?>
                        </select>
                            <br>
                            <br> 
                             </div>
                            <button class="btn btn-primary" type="submit" name ="Anually" style="float: right;">Search</button>
                            

               
                
                    </div>
</form>
                  </div>
                  <!-- ============================================= -->
                  </div>
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
