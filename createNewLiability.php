<?php
require 'Session.php';
require 'config.php';

            if(isset($_POST['post'])){
                echo "hello";
                $name=$_POST['liabilityName'];
                $fromTo=$_POST['FromTo'];
                $Descrip=$_POST['Descrip'];
                $value=$_POST['valu'];
                $remaining=$_POST['Remaining'];
                $entrydate=$_POST['entrydate'];
                $expectedOn=$_POST['expectedOn'];
                $entredBy=$_POST['enteredBy'];
                $isPeriodic= $_POST['isPeriodic'];
                $Frequency=$_POST['Frequency'];
                $ExitDate=$_POST['ExitDate'];
                echo "hello";
                //                                                 1           2         3       4 5           6         7          8         9          10         11              1  2  3  4  5  6  7  8  9  10  11
                if($sql=$conn->prepare("insert into liability (liabilityName , FromTo, Descrip,valu,Remaining,entrydate,expectedOn,enteredBy,isPeriodic,Frequency,ExitDate) values (?, ?, ?, ?, ?, ?, ?, ?, ?,  ?,  ?);")){
                echo "helloss";
                //                                1    2       3         4        5      6             7        8          9          10            11         
                if($sql->bind_param("sssssssssss",$name,$fromTo,$Descrip,$value,$remaining,$entrydate,$expectedOn,$entredBy,$isPeriodic,$Frequency,$ExitDate)){
                echo "hellsso";
                if($sql->execute()){
                echo "hello";
                $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has inserted a new liability with name= ".$name." and value= ".$value." From/To= ".$FromTo." at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh);
                }else{
                echo $conn->error;
            }
            
            }else{
                echo $conn->error;
            }
                }else{
                echo $conn->error;
            }
            }
       ?> 
       <html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Add Liability</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                      <li class="breadcrumb-item active">Liability</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-archive"></i> Add Liability
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
              <div class="card-body">
                
                    <form class="p-lg-2" method='post' action=''>
                        <div class="row">
                  <div class="col-lg-6">
                    
                    <div class="form-group mb-3">
                      <label for="simpleinput">Liability Name</label>
                      <input type="text" id="simpleinput" class="form-control" name='liabilityName'  >
                    </div>

                    <div class="form-group mb-3">
                      <label for="simpleinput">From-To</label>
                      <input type="text" id="simpleinput" class="form-control" name='FromTo' >
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-textarea">Item Description</label>
                      <textarea class="form-control" id="example-textarea" rows="4" name='Descrip' ></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-number">Entered Value</label>
                      <input class="form-control" id="example-number" type="number" name='valu' >
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Depreciation Rate</label>
                      <input class="form-control" id="example-number" type="number" name="Remaining" >
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Entry Date</label>
                      <input class="form-control" id="example-date" type="date" name="entrydate">
                      
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Expected on</label>
                      <input class="form-control" id="example-date" type="date" name="expectedOn">
                      
                    </div>





                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">


                  

                    
                      <input class="form-control" id="example-number" type="hidden" name="enteredBy" value="<?php echo $_SESSION['ID']; ?>" hidden>
                    

                    <!--<div class="form-group mb-3">-->
                      <!--<label for="example-date">Updated On</label>-->
                      <!--<input class="form-control" id="example-date" type="hidden" name="updatedOn" >-->
                    <!--</div>-->

                    <div class="form-group mb-3">
                      <label for="example-select">Is this liability expected to arrive periodically</label>
                      <select class="form-control" id="example-select" name='isPeriodic' >
                      <option value='1'>Periodic</option>
                      <option value='0'>One time</option>
                      </select>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Frequency</label>
                      <input class="form-control" id="example-number" type="number" name="Frequency">
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-date">Exit Date</label>
                      <input class="form-control" id="example-date" type="date" name="ExitDate" >
                    </div>

                  
                      

                      
                    
                        
                          <br>
                          <br>
                       <button type="submit" class="btn btn-primary" name='post' >Add</button>
                       <button type="reset" class="btn btn-danger " name='cancel'>Cancel</button>
                        </div>
                  <!-- end col -->
                </div>
                <!-- end row-->
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

        