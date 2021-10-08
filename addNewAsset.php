<?php
require 'Session.php';
require 'config.php';
$noEntry= false;
$success=false;
if(isset($_POST['name'])){
    if(!empty($_POST['name'])){
    $name=$_POST['name'];//1
    $group=$_POST['group'];//2
    $description=$_POST['description'];//3
    $value=$_POST['value'];//4
    $depreciation=$_POST['depreciation'];//5
    $entryDate=$_POST['entryDate'];//6
    if(isset($entryDate)){
        $entryDate=$entryDate.' 00:00:00';
    }
    $availability=$_POST['availability'];//7
    $enteredBy=$_POST['enteredBy'];//8
    $updatedOn=$_POST['updatedOn'];//9
    $isPeriodic=$_POST['isPeriodic'];//10
    $type=$_POST['type'];//11
    $frequency=$_POST['frequency'];//12
    $exitDate=$_POST['exit_date'];//13
     if(isset($exitDate)){
         if($exitDate==""){
             $exitDate='null';
         }else{
        $exitDate=$exitDate.' 00:00:00';
         }
    }
    if($sql = $conn->prepare("INSERT INTO `asset` (`id`, `assetName`, `grp`, `Descrip`, `enteredValue`, `depreciationRate`, `entrydate`, `availability`, `enteredBy`, `updatedOn`, `isPeriodic`, `assetType`, `Frequency`, `ExitDate`) VALUES ('null', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);")){
 
 if($sql->bind_param("sssssssssssss",$name,$group,$description,$value,$depreciation,$entryDate,$availability,$enteredBy,$updatedOn,$isPeriodic,$type,$frequency,$exitDate)){
    
      if($sql->execute()){
          
          $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has inserted a new asset with name= ".$name." and value= ".$value." with type= ".$type." at: ".date("Y-m-D")." ".date("H:i:s")."\n");
    $success= true;
    }else{
        echo "ERROR!"."Mysql Error: " . $conn->error;
    }
}else{
    echo "ERRORRRRRRRS!"."Mysql Error: " . $conn->error;
}
}else{
    
}
                       
 
  

  
}else{
    $noEntry=true;
    
}
}else{
    
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Add New Asset</title>
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
                      <li class="breadcrumb-item active">Asset</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-archive"></i> Add New Asset
                    
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
                <?php if($noEntry){
                        echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" id="red_alert" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Error - </strong> Password Mismatch - check your password
        </div>';
                    }elseif($success){
                        echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" id="green_alert" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success - </strong> You have Successfully Changed Your Record
        </div>';
        sleep(1);
        
        header("Location: assets.php");
                    }
                    ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <form class="p-lg-1" method='post' action=''>
                    <input type="hidden" name='id'>
                    <div class="form-group mb-3">
                      <label for="simpleinput">Asset Name</label>
                      <input type="text" id="simpleinput" class="form-control" name='name'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="simpleinput">Group</label>
                      <input type="text" id="simpleinput" class="form-control" name='group'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-textarea">Item Description</label>
                      <textarea class="form-control" id="example-textarea" rows="4" name='description'></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-number">Entered Value</label>
                      <input class="form-control" id="example-number" type="number" name="value">
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Depreciation Rate</label>
                      <input class="form-control" id="example-number" type="number" name="depreciation">
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Entry Date</label>
                      <input class="form-control" id="example-date" type="date" name="entryDate">
                    </div>

                    




                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">


                  <div class="form-group mb-3">
                      <label for="example-number">Availability</label>
                      <!--<input class="form-control" id="example-number" type="number" name="availability">-->
                      <select class="form-control" id="example-select" name='availability'>
                      <option value='1'>available</option>
                      <option value='0'>not available</option>
                      </select>
                    </div>

                    
                      <input class="form-control" id="example-number" type="hidden" name="enteredBy" value='<?PHP echo $_SESSION["ID"] ?>' >
                    

                    <!--<div class="form-group mb-3">-->
                      <!--<label for="example-date">Updated On</label>-->
                      <input class="form-control" id="example-date" type="hidden" name="updatedOn" value='<?PHP date("Y-m-d") ?>'>
                    <!--</div>-->

                    <div class="form-group mb-3">
                      <label for="example-select">Is this asset expected to arrive periodically</label>
                      <select class="form-control" id="example-select" name='isPeriodic'>
                      <option value='1'>Periodic</option>
                      <option value='0'>One time</option>
                      </select>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-select">Asset Type</label>
                      <select class="form-control" id="example-select" name='type'>
                      <option value='asset'>Asset</option>
                      <option value='stock asset'>Asset Stock</option>
                      <option value='Inventory'>Inventory</option>
                      <option value='Income'>Income</option>
                      </select>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Frequency</label>
                      <input class="form-control" id="example-number" type="number" name="frequency">
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-date">Exit Date</label>
                      <input class="form-control" id="example-date" type="date" name="exit_date">
                    </div>

                  
                      

                      
                    
                        
                          <br>
                          <br>
                       <button type="submit" class="btn btn-primary" name='submit'>Add</button>
                       <button type="reset" class="btn btn-danger " name='cancel'>Cancel</button>
                    </form>
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row-->
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
