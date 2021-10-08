<?php
require 'Session.php';
require 'config.php';

            if(isset($_POST['id'])){
                
                if(isset($_POST['submit'])){
                    if($_POST['submit']=="delete"){
                    $sql =$conn->prepare('Delete from liability WHERE ID=?');
                    $sql->bind_param("s",$_POST["id"]);
                    if($sql -> execute()){
                        header("Location: liabilty.php");
                    }else{
                        echo "ERROR!"."Mysql Error: " . $conn->error;
                    }
                    
                }elseif($_POST['submit']=="edit"){
                    if($sql =$conn->prepare("Select * from liability where ID =".$_POST['id'].'')){
                    if($sql->execute()){

                    $result = $sql -> get_result();
                    $row =  $result->fetch_array(MYSQLI_ASSOC);
                                           
                    $id              =$row["id"];//0
                    $name            =$row['liabilityName'];//1
                    $fromTo          =$row['FromTo'];//2
                    $description     =$row['Descrip'];//3
                    $value           =$row['valu'];//4
                    $depreciation    =$row['Remaining'];//5
                    $entryDate       =$row['entrydate'];//6   
                    $availability    =$row['expectedOn'];//7
                    $updatedOn       =$row['updatedOn'];//8
                    $enteredBy       =$row['enteredBy'];//9
                    $isPeriodic      =$row['isPeriodic'];//10
                    $frequency       =$row['Frequency'];//11
                    $exitDate        =$row['ExitDate'];//12
                   
                    }else{
                        echo "executing error". $conn->error;
                    }
                    }else{
                        echo "preparing error". $conn->error;
                    }
                }
                
                }
                if(isset($_POST['post'])){
                    $newId             =$_POST['id'];//0
                    $newName           =$_POST['liabilityName'];//1
                    $newFromTo         =$_POST['FromTo'];//2
                    $newDescription    =$_POST['Descrip'];//3
                    $newValue          =$_POST['valu'];//4
                    $newRemaining      =$_POST['Remaining'];//5
                    $newEntryDate      =$_POST['entrydate']." 00:00:00";//6   
                    $newExpectedOn     =$_POST['expectedOn']." 00:00:00";//7
                    $newUpdatedOn      =$_POST['updatedOn']." ".date("H:i:s");//8
                    $newEnteredBy      =$_POST['enteredBy'];//9
                    $newIsPeriodic     =$_POST['isPeriodic'];//10
                    $newFrequency      =$_POST['Frequency'];//11
                    $newExitDate       =$_POST['ExitDate'];//12
            
                    if(empty($newName)){
                        $newName=$name;
                    }
                    if(empty($newFromTo)){
                        $newFromTo=$fromTo;
                    }
                    if(empty($newDescription)){
                        $newDescription=$description;
                    }
                    if(empty($newValue)){
                        $newValue=$value;
                    }
                    if(empty($newDepreciation)){
                        $newDepreciation=$depreciation;
                    }
                    if(empty($newEntryDate)){
                        $newEntryDate=$entryDate;
                    }
                    if(empty($newAvailability)){
                        $newAvailability=$availability;
                    }
                    if(empty($newEnteredBy)){
                        $newEnteredBy=$enteredBy;
                    }
                    if(empty($newUpdatedOn)){
                        $newUpdatedOn=$updatedOn;
                    }
                    if(empty($newIsPeriodic)){
                        $newIsPeriodic=$isPeriodic;
                    }
                    if(empty($newType)){
                        $newType=$type;
                    }
                    if(empty($newFrequency)){
                        $newFrequency=$frequency;
                    }
                    if(empty($newExitDate)){
                        $newExitDate=$exitDate;
                    }else{
                      $newExitDate=$newExitDate." 00:00:00";
                    }
                    
             //                                                1             2          3          4          5              6             7              8             9             10            11            12             13                                                  
      if($sql = $conn->prepare("UPDATE `liability` SET `liabilityName`=?,`FromTo`=?,`Descrip`=?,`valu`=?,`Remaining`=?,`entrydate`=?,`expectedOn`=?,`updatedOn`=?,`enteredBy`=?,`isPeriodic`=?,`Frequency`=?,`ExitDate`=? WHERE id=?")){
 echo "success";
 //                   1 - 13             1         2            3           4            5               6              7             8             9            10         11             12        13     
 if($sql->bind_param("sssssssssssss",$newName,$newFromTo,$newDescription,$newValue,$newRemaining,$newEntryDate,$newExpectedOn,$newUpdatedOn,$newEnteredBy,$newIsPeriodic,$newFrequency,$newExitDate,$newId)){
     echo 'success';
      if($sql->execute()){
          $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has upadated a liability with id= ".$newId." and name= ".$newName." From/to= ".$newFromTo."and value= ".$newValue." at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh); 
          echo 'success';
  header("Location: liabilty.php");
    }else{
        echo "executing ERROR!"."Mysql Error: " . $conn->error;
    }
}else{
    echo " binding parameters ERROR!"."Mysql Error: " . $conn->error;
}
}else{
   echo "preparing ERROR!"."Mysql Error: " . $conn->error;
}
        
                }else{
                    
                }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                
            }
        
       ?> 
       <html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Edit Liability</title>
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
                    <i class="mdi mdi-archive"></i> Edit Liability
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
                    <input type="hidden" name='id' value='<?php echo $id; ?>'>
                    <div class="form-group mb-3">
                      <label for="simpleinput">Liability Name</label>
                      <input type="text" id="simpleinput" class="form-control" name='liabilityName' value='<?php echo $name; ?>' >
                    </div>

                    <div class="form-group mb-3">
                      <label for="simpleinput">From-To</label>
                      <input type="text" id="simpleinput" class="form-control" name='FromTo' value='<?php echo $fromTo; ?>'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-textarea">Item Description</label>
                      <textarea class="form-control" id="example-textarea" rows="4" name='Descrip' ><?php echo $description ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-number">Entered Value</label>
                      <input class="form-control" id="example-number" type="number" name='valu' value='<?php echo $value; ?>'>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Depreciation Rate</label>
                      <input class="form-control" id="example-number" type="number" name="Remaining" value='<?php echo $depreciation; ?>'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Entry Date</label>
                      <input class="form-control" id="example-date" type="date" name="entrydate" value='<?php echo substr($entryDate,0,10); ?>'>
                      
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Expected on</label>
                      <input class="form-control" id="example-date" type="date" name="expectedOn">
                      
                    </div>





                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">


                  

                    
                      <input class="form-control" id="example-number" type="hidden" name="enteredBy" value='<?PHP echo $enteredBy ?>' >
                    

                    <!--<div class="form-group mb-3">-->
                      <!--<label for="example-date">Updated On</label>-->
                      <input class="form-control" id="example-date" type="hidden" name="updatedOn" value='<?PHP echo date("Y-m-d"); ?>'>
                    <!--</div>-->

                    <div class="form-group mb-3">
                      <label for="example-select">Is this liability expected to arrive periodically</label>
                      <select class="form-control" id="example-select" name='isPeriodic' value='<?php  if($isPeriodic==1){
                      echo "Periodic";
                      }else{
                      echo 'One time';
                      }?>'>
                      <option value='1'>Periodic</option>
                      <option value='0'>One time</option>
                      </select>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Frequency</label>
                      <input class="form-control" id="example-number" type="number" name="Frequency" value='<?php echo $frequency; ?>'>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-date">Exit Date</label>
                      <input class="form-control" id="example-date" type="date" name="ExitDate" value='<?php echo substr($exitDate,0,10); ?>'>
                    </div>

                  
                      

                      
                    
                        
                          <br>
                          <br>
                       <button type="submit" class="btn btn-primary" name='post' >Edit</button>
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

        