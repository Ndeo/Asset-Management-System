<?php
require 'Session.php';
require 'config.php';

            if(isset($_POST['id'])){
                
                if(isset($_POST['submit'])){
                    if($_POST['submit']=="delete"){
                    $sql =$conn->prepare('Delete from asset WHERE ID=?');
                    $sql->bind_param("s",$_POST["id"]);
                    if($sql -> execute()){
                        header("Location: assets.php");
                    }else{
                        echo "ERROR!"."Mysql Error: " . $conn->error;
                    }
                    
                }elseif($_POST['submit']=="edit"){
                    if($sql =$conn->prepare("Select * from asset where ID =".$_POST['id'].'')){
                    if($sql->execute()){

                    $result = $sql -> get_result();
                    $row =  $result->fetch_array(MYSQLI_ASSOC);
                                           
                    $id              =$row["id"];//0
                    $name            =$row['assetName'];//1
                    $group           =$row['grp'];//2
                    $description     =$row['Descrip'];//3
                    $value           =$row['enteredValue'];//4
                    $depreciation    =$row['depreciationRate'];//5
                    $entryDate       =$row['entrydate'];//6   
                    $availability    =$row['availability'];//7
                    $enteredBy       =$row['enteredBy'];//8
                    $updatedOn       =$row['updatedOn'];//9
                    $isPeriodic      =$row['isPeriodic'];//10
                    $type            =$row['assetType'];//11
                    $frequency       =$row['Frequency'];//12
                    $exitDate        =$row['ExitDate'];//13
                   
                    }else{
                        echo "executing error";
                    }
                    }else{
                        echo "preparing error";
                    }
                }
                
                }elseif(isset($_POST['post'])){
                    $newId             =$_POST['id'];//0
                    $newName           =$_POST['name'];//1
                    $newGroup          =$_POST['grp'];//2
                    $newDescription    =$_POST['Descrip'];//3
                    $newValue          =$_POST['enteredValue'];//4
                    $newDepreciation   =$_POST['depreciationRate'];//5
                    $newEntryDate      =$_POST['entrydate']." 00:00:00";//6   
                    $newAvailability   =$_POST['availability'];//7
                    $newEnteredBy      =$_POST['enteredBy'];//8
                    $newUpdatedOn      =$_POST['updatedOn']." ".date("H:i:s");//9
                    $newIsPeriodic     =$_POST['isPeriodic'];//10
                    $newType           =$_POST['assetType'];//11
                    $newFrequency      =$_POST['Frequency'];//12
                    $newExitDate       =$_POST['ExitDate'];//13
            
                    if(empty($newName)){
                        $newName=$name;
                    }
                    if(empty($newGroup)){
                        $newGroup=$group;
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
                
      if($sql = $conn->prepare("UPDATE `asset` SET `assetName`=?,`grp`=?,`Descrip`=?,`enteredValue`=?,`depreciationRate`=?,`entrydate`=?,`availability`=?,`enteredBy`=?,`updatedOn`=?,`isPeriodic`=?,`assetType`=?,`Frequency`=?,`ExitDate`=? WHERE id=?")){
 echo "success";
 if($sql->bind_param("ssssssssssssss",$newName,$newGroup,$newDescription,$newValue,$newDepreciation,$newEntryDate,$newAvailability,$newEnteredBy,$newUpdatedOn,$newIsPeriodic,$newType,$newFrequency,$newExitDate,$newId)){
     echo 'success';
      if($sql->execute()){
          $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has upadted an asset with ID= ".$newId." name= ".$name." and value= ".$value." with type= ".$type." at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh);
          echo 'success';
  header("Location: assets.php");
    }else{
        echo "ERROR!"."Mysql Error: " . $conn->error;
    }
}else{
    echo "ERROR!"."Mysql Error: " . $conn->error;
}
}else{
   echo "ERROR!"."Mysql Error: " . $conn->error;
}
        
                }else{
                }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                
            }
        
       ?> 
       <html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Edit Asset</title>
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
                    <i class="mdi mdi-archive"></i> Edit Asset
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
                      <label for="simpleinput">Asset Name</label>
                      <input type="text" id="simpleinput" class="form-control" name='name' value='<?php echo $name; ?>' >
                    </div>

                    <div class="form-group mb-3">
                      <label for="simpleinput">Group</label>
                      <input type="text" id="simpleinput" class="form-control" name='grp' value='<?php echo $group; ?>'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-textarea">Item Description</label>
                      <textarea class="form-control" id="example-textarea" rows="4" name='Descrip' ><?php echo $description ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-number">Entered Value</label>
                      <input class="form-control" id="example-number" type="number" name='enteredValue' value='<?php echo $value; ?>'>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="example-number">Depreciation Rate</label>
                      <input class="form-control" id="example-number" type="number" name="depreciationRate" value='<?php echo $depreciation; ?>'>
                    </div>

                    <div class="form-group mb-3">
                      <label for="example-date">Entry Date</label>
                      <input class="form-control" id="example-date" type="date" name="entrydate" value='<?php echo substr($entryDate,0,10); ?>'>
                      
                    </div>

                    




                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">


                  <div class="form-group mb-3">
                      <label for="example-number">Availability</label>
                      <!--<input class="form-control" id="example-number" type="number" name="availability">-->
                      <select class="form-control" id="example-select" name='availability' value='<?php echo $availability;
                      if($availability==1){
                      echo "available";
                      }else{
                      echo 'not available';
                      }
                      ?>'>
                      <option value='1'>available</option>
                      <option value='0'>not available</option>
                      </select>
                    </div>

                    
                      <input class="form-control" id="example-number" type="hidden" name="enteredBy" value='<?PHP echo $enteredBy ?>' >
                    

                    <!--<div class="form-group mb-3">-->
                      <!--<label for="example-date">Updated On</label>-->
                      <input class="form-control" id="example-date" type="hidden" name="updatedOn" value='<?PHP echo date("Y-m-d"); ?>'>
                    <!--</div>-->

                    <div class="form-group mb-3">
                      <label for="example-select">Is this asset expected to arrive periodically</label>
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
                      <label for="example-select">Asset Type</label>
                      <select class="form-control" id="example-select" name='assetType' value='<?php echo $type; ?>'>
                      <option value='asset'>Asset</option>
                      <option value='stock'>Asset Stock</option>
                      <option value='Inventory'>Inventory</option>
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

        