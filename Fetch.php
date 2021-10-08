<?php

require("Session.php");
require("Asset.php");

require("config.php");

require("User.php");

require("Liability.php");

function search($searchParameter){
    include("config.php");
    $searchParameter=$searchParameter.'%';
     $sql_asset = $conn->prepare("SELECT * FROM `asset` WHERE (`assetName` like ?) or ( `grp` like ?) or ( `Descrip` like ?) or ( `enteredValue` like ?) or ( `depreciationRate` like ?) or ( `entrydate` like ?) or ( `availability` like ?) or 
     ( `enteredBy` like ?) or ( `updatedOn` like ?) or ( `isPeriodic` like ?) or ( `assetType` like ?) or ( `Frequency` like ?) or ( `ExitDate` like ?)");
     $sql_asset->bind_param("sssssssssssss",$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter);
    

    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $assets_list = new SplDoublyLinkedList();
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {

            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by,$updated_on, $is_periodic, $asset_type,  $frequency, $Exit_date);
     
            
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    
     
    return $assets_list;
}
    //-----------------------------------------------
function searchUsers($searchParameter){
    include("config.php");
    $searchParameter=$searchParameter.'%';
    $users_list = new SplDoublyLinkedList();
    $sql_user = $conn->prepare("SELECT * FROM `user` WHERE (`ID` like ?) or (`Username`like ?) or (`FirstName`like ?) or (`LastName`like ?) or (`Email`like ?) or (`userRole`like ?) or (`phone`like ?) or (`creationDate`like ?) or (`state`like ?) or (`createdby`like ?)" );
    $sql_user->bind_param("ssssssssss",$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter);
    $sql_user->execute();
    $user_result = $sql_user->get_result();

    $users_count = $user_result->num_rows;

    while($users_row = $user_result->fetch_array(MYSQLI_ASSOC)) {

        foreach ($users_row as $key => $value) {
            switch ($key) {
                
                case 'ID':
                    $id = $value;
                    break;
                case 'Username':
                    $user_name=$value;
                case 'FirstName':
                    $first_name = $value;
                    break;
                case 'LastName':
                    $last_name = $value;
                    break;
                case 'Email':
                    $email = $value;
                    break;
                case 'userRole':
                    $userRole = $value;
                    break;
                case 'phone':
                    $phone = $value;
                    break;
                case 'creationDate':
                    $creationDate = $value;
                    break;
                case 'state':
                    $state = $value;
                    break;
                case 'createdby':
                    $created_by = $value."";
                    break;
                case 'image':
                    $image = $value;
                    
                    break;

            }

            }
             $users_list->push(new User($id,$user_name, $first_name, $last_name, $email, $userRole, $phone, $creationDate, $state, $created_by, $image) );
             
             
             
       
    }

    return $users_list;
}


    
    //------------------------------------------------------------------------------
    
function searchLiabilities($searchParameter){
     $searchParameter=$searchParameter.'%';
    include("config.php");
    $liabilities_list = new SplDoublyLinkedList();
    $sql_liability=$conn->prepare("SELECT * FROM `liability` WHERE  (`id`  like ?) or ( `liabilityName` like ?) or (`FromTo` like ?) or (`Descrip` like ?) or (`valu` like ?) or (`Remaining` like ?) or (`expectedOn` like ?) or (`updatedOn` like ?) or (`enteredBy` like ?) or (`isPeriodic` like ?) or (`Frequency` like ?) or (`ExitDate` like ?)");
    $sql_liability -> bind_param("ssssssssssss",$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter,$searchParameter);
    
 $sql_liability -> execute();
    
    $liability_result = $sql_liability -> get_result();
    $liabilities_count = $liability_result-> num_rows;
    while($liabilities_row =  $liability_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($liabilities_row as $key => $value) {
            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'liabilityName':
                    $liability_name = $value;
                    break;
                case 'FromTo':
                    $FromTo = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'valu':
                    $valu = $value;
                    break;
                case 'Remaining':
                    $remaining = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'expectedOn':
                    $expected_on = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }
            
           
        }
         $liabilities_list->push(new Liability($id, $liability_name, $FromTo, $Description, $valu, $remaining, $entry_date, $expected_on, $updated_on, $entered_by, $is_periodic, $frequency, $Exit_date));

    }
    
    return $liabilities_list;
}
    
function updateGroups($groupName)
{
   
    include("config.php");
    $sql_group = $conn->prepare("Select * from asset where grp = ?");
     $sql_group->bind_param("s",$groupName);

    $sql_group->execute();
    $group_result = $sql_group->get_result();

    $group_count = $group_result->num_rows;
    $groups_list = new SplDoublyLinkedList();
    while($groups_rows = $group_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($groups_rows as $key => $value) {

            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by,$updated_on, $is_periodic, $asset_type,  $frequency, $Exit_date);
     
            
        $groups_list->push($newAsset);
        
    }
    
    $groups_list->rewind();
    
     
    return $groups_list;
}
    //-----------------------------------------------
function updateAssets()
{
   
    include("config.php");
    $sql_asset = $conn->prepare("Select * from asset");
    

    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $assets_list = new SplDoublyLinkedList();
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
           
            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            

            
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    
     
    return $assets_list;
}
    //-----------------------------------------------
    function updateTypeAssets()
{
    
    //include("Asset.php");
    include("config.php");
     
    $sql_asset = $conn->prepare("Select * from asset where assetType = 'Asset'");
     

   // $sql1 = $conn->prepare("Select * from asset where assetType = income");
   // $sql2 = $conn->prepare("Select * from asset where assetType = asset Stock");
   // $sql3 = $conn->prepare("Select * from asset where assetType = inventory");
 
    $sql_asset->execute();
     
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $type_asset = 0;
    $type_income = 0;
    $type_assetStock = 0;
    $type_inventorty = 0;
    $assets_list = new SplDoublyLinkedList();
    $longString="<table> ";
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
           
            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            

        //echo $newAsset -> calculate_current_value()."\n";
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    //Works this far....
    //echo $assets_list-> current() -> calculate_current_value() ."\n";
    
    
     $longString = $longString . "</table>";
     //echo $longString;
     //echo $longString;
     $assets_list->rewind();
     while($assets_list->valid()){
    
    $assets_list->next();
    }
    
    $totalValue = 0;
    $asset = 0;
    $income = 0;
    $assetStock = 0;
    $inventory = 0;
    $assets_list->rewind();
     while($assets_list->valid()){
  
    
        $totalValue += $assets_list->current()-> calculate_current_value();

    // echo $assets_list->current()->getName().$assets_list->current()->getID().'<br>';
        switch ($assets_list->current()->getAssetType()) {
            
            case 'asset':
                $asset += $assets_list->current() -> calculate_current_value();
                $type_asset++;
                break;
            case 'income':
                $income += $assets_list->current()-> calculate_current_value();
                $type_income++;
                break;
            case 'asset Stock':
                $assetStock += $assets_list->current() -> calculate_current_value();
                $type_assetStock++;
                break;
            case 'inventory':
                $inventory += $assets_list->current() -> calculate_current_value();
                $type_inventorty++;
                break;
        }
        $assets_list->next();
    }
    $numOfAsset = count($assets_list);
    return $assets_list;
}
    //-----------------------------------------------
    function updateTypeAssetsStock()
{
   
    //include("Asset.php");
    include("config.php");
    $sql_asset = $conn->prepare("Select * from asset where assetType= 'Asset stock'");
    

   // $sql1 = $conn->prepare("Select * from asset where assetType = income");
   // $sql2 = $conn->prepare("Select * from asset where assetType = asset Stock");
   // $sql3 = $conn->prepare("Select * from asset where assetType = inventory");

    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $type_asset = 0;
    $type_income = 0;
    $type_assetStock = 0;
    $type_inventorty = 0;
    $assets_list = new SplDoublyLinkedList();
    $longString="<table> ";
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
            $longString = $longString . "<tr>";
            $longString = $longString . "<td>" . $key . "</td>";
            $longString = $longString . "<td>" . $value . "</td>";
            $longString = $longString . "</tr>";

            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            


        //echo $newAsset -> calculate_current_value()."\n";
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    //Works this far....
    //echo $assets_list-> current() -> calculate_current_value() ."\n";
    
    
     $longString = $longString . "</table>";
     //echo $longString;
     //echo $longString;
     $assets_list->rewind();
     while($assets_list->valid()){
    
    $assets_list->next();
    }
    
    $totalValue = 0;
    $asset = 0;
    $income = 0;
    $assetStock = 0;
    $inventory = 0;
    $assets_list->rewind();
     while($assets_list->valid()){
  
    
        $totalValue += $assets_list->current()-> calculate_current_value();

     
        switch ($assets_list->current()->getAssetType()) {
            case 'asset':
                $asset += $assets_list->current() -> calculate_current_value();
                $type_asset++;
                break;
            case 'income':
                $income += $assets_list->current()-> calculate_current_value();
                $type_income++;
                break;
            case 'asset Stock':
                $assetStock += $assets_list->current() -> calculate_current_value();
                $type_assetStock++;
                break;
            case 'inventory':
                $inventory += $assets_list->current() -> calculate_current_value();
                $type_inventorty++;
                break;
        }
        $assets_list->next();
    }
    $numOfAsset = count($assets_list);
    return $assets_list;
}
    //----------------------------------------------- 
    function updateTypeInventory()
{
   
    //include("Asset.php");
    include("config.php");
    $sql_asset = $conn->prepare("Select * from asset where assetType= 'Inventory'");
    

   // $sql1 = $conn->prepare("Select * from asset where assetType = income");
   // $sql2 = $conn->prepare("Select * from asset where assetType = asset Stock");
   // $sql3 = $conn->prepare("Select * from asset where assetType = inventory");

    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $type_asset = 0;
    $type_income = 0;
    $type_assetStock = 0;
    $type_inventorty = 0;
    $assets_list = new SplDoublyLinkedList();
    $longString="<table> ";
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
            $longString = $longString . "<tr>";
            $longString = $longString . "<td>" . $key . "</td>";
            $longString = $longString . "<td>" . $value . "</td>";
            $longString = $longString . "</tr>";

            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            


        //echo $newAsset -> calculate_current_value()."\n";
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    //Works this far....
    //echo $assets_list-> current() -> calculate_current_value() ."\n";
    
    
     $longString = $longString . "</table>";
     //echo $longString;
     //echo $longString;
     $assets_list->rewind();
     while($assets_list->valid()){
    
    $assets_list->next();
    }
    
    $totalValue = 0;
    $asset = 0;
    $income = 0;
    $assetStock = 0;
    $inventory = 0;
    $assets_list->rewind();
     while($assets_list->valid()){
  
    
        $totalValue += $assets_list->current()-> calculate_current_value();

     
        switch ($assets_list->current()->getAssetType()) {
            case 'asset':
                $asset += $assets_list->current() -> calculate_current_value();
                $type_asset++;
                break;
            case 'income':
                $income += $assets_list->current()-> calculate_current_value();
                $type_income++;
                break;
            case 'asset Stock':
                $assetStock += $assets_list->current() -> calculate_current_value();
                $type_assetStock++;
                break;
            case 'inventory':
                $inventory += $assets_list->current() -> calculate_current_value();
                $type_inventorty++;
                break;
        }
        $assets_list->next();
    }
    $numOfAsset = count($assets_list);
    return $assets_list;
}
    //-----------------------------------------------
   function updateTypeIncome()
{
   
    //include("Asset.php");
    include("config.php");
    $sql_asset = $conn->prepare("Select * from asset where assetType= 'Income'");
    
    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
  
    $assets_list = new SplDoublyLinkedList();
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
            
            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            

        $assets_list->push($newAsset);
        
    }
    
     $assets_list->rewind();
     
    
    return $assets_list;
}
    //---------------------------------------------------
  
    //-----------------------------------------------
    function updateMonth($monthNumber)
{
    $currentDate =date("Y-m-d");
   $year = substr(strlen($currentDate),0,4);
    //include("Asset.php");
    include("config.php");
    $date=$year.'-'.$monthNumber.'-*';
    $sql_asset = $conn->prepare("Select * from asset where entrydate= $date");
    

   // $sql1 = $conn->prepare("Select * from asset where assetType = income");
   // $sql2 = $conn->prepare("Select * from asset where assetType = asset Stock");
   // $sql3 = $conn->prepare("Select * from asset where assetType = inventory");

    $sql_asset->execute();
    $asset_result = $sql_asset->get_result();

    $asset_count = $asset_result->num_rows;
    $type_asset = 0;
    $type_income = 0;
    $type_assetStock = 0;
    $type_inventorty = 0;
    $assets_list = new SplDoublyLinkedList();
    $longString="<table> ";
    while($assets_rows = $asset_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($assets_rows as $key => $value) {
            $longString = $longString . "<tr>";
            $longString = $longString . "<td>" . $key . "</td>";
            $longString = $longString . "<td>" . $value . "</td>";
            $longString = $longString . "</tr>";

            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'assetName':
                    $asset_name = $value;
                    break;
                case 'grp':
                    $group = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'enteredValue':
                    $price = $value;
                    break;
                case 'depreciationRate':
                    $depreciation_rate = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'availability':
                    $is_available = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }

        }
                

        $newAsset= new Asset($id, $asset_name, $group, $Description, $price, $depreciation_rate, $entry_date, $is_available, $entered_by, $is_periodic, $asset_type, $updated_on, $frequency, $Exit_date);
     
            


        //echo $newAsset -> calculate_current_value()."\n";
        $assets_list->push($newAsset);
        
    }
    
    $assets_list->rewind();
    //Works this far....
    //echo $assets_list-> current() -> calculate_current_value() ."\n";
    
    
     $longString = $longString . "</table>";
     //echo $longString;
     //echo $longString;
     $assets_list->rewind();
     while($assets_list->valid()){
    
    $assets_list->next();
    }
    
    $totalValue = 0;
    $asset = 0;
    $income = 0;
    $assetStock = 0;
    $inventory = 0;
    $assets_list->rewind();
     while($assets_list->valid()){
  
    
        $totalValue += $assets_list->current()-> calculate_current_value();

     
        switch ($assets_list->current()->getAssetType()) {
            case 'asset':
                $asset += $assets_list->current() -> calculate_current_value();
                $type_asset++;
                break;
            case 'income':
                $income += $assets_list->current()-> calculate_current_value();
                $type_income++;
                break;
            case 'asset Stock':
                $assetStock += $assets_list->current() -> calculate_current_value();
                $type_assetStock++;
                break;
            case 'inventory':
                $inventory += $assets_list->current() -> calculate_current_value();
                $type_inventorty++;
                break;
        }
        $assets_list->next();
    }
    $numOfAsset = count($assets_list);
    return $assets_list;
}
    //-----------------------------------------------
    
function updateUsers(){
    include("config.php");
    $users_list = new SplDoublyLinkedList();
    $sql_user = $conn->prepare("Select * from user ");
    $sql_user->execute();
    $user_result = $sql_user->get_result();

    $users_count = $user_result->num_rows;

    while($users_row = $user_result->fetch_array(MYSQLI_ASSOC)) {

        foreach ($users_row as $key => $value) {
            switch ($key) {
                
                case 'ID':
                    $id = $value;
                    break;
                case 'Username':
                    $user_name=$value;
                case 'FirstName':
                    $first_name = $value;
                    break;
                case 'LastName':
                    $last_name = $value;
                    break;
                case 'Email':
                    $email = $value;
                    break;
                case 'userRole':
                    $userRole = $value;
                    break;
                case 'phone':
                    $phone = $value;
                    break;
                case 'creationDate':
                    $creationDate = $value;
                    break;
                case 'state':
                    $state = $value;
                    break;
                case 'createdby':
                    $created_by = $value."";
                    break;
                case 'image':
                    $image = $value;
                    
                    break;

            }

            }
             $users_list->push(new User($id,$user_name, $first_name, $last_name, $email, $userRole, $phone, $creationDate, $state, $created_by, $image) );
             
             
             
       
    }

    return $users_list;
}
//-----------------------------------------------------
function updateLiabilities(){
    include("config.php");
    $liabilities_list = new SplDoublyLinkedList();
    $sql_liability =$conn->prepare("Select * from liability ");
    
    $sql_liability -> execute();
    
    $liability_result = $sql_liability -> get_result();
    $liabilities_count = $liability_result-> num_rows;
    while($liabilities_row =  $liability_result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($liabilities_row as $key => $value) {
            switch ($key) {
                case 'id':
                    $id = $value;
                    break;
                case 'liabilityName':
                    $liability_name = $value;
                    break;
                case 'FromTo':
                    $FromTo = $value;
                    break;
                case 'Descrip':
                    $Description = $value;
                    break;
                case 'valu':
                    $valu = $value;
                    break;
                case 'Remaining':
                    $remaining = $value;
                    break;
                case 'entrydate':
                    $entry_date = $value;
                    break;
                case 'expectedOn':
                    $expected_on = $value;
                    break;
                case 'enteredBy':
                    $entered_by = $value;
                    break;
                case 'isPeriodic':
                    $is_periodic = $value;
                    break;
                case 'assetType':
                    $asset_type = $value;
                    break;
                case 'updatedOn':
                    $updated_on = $value;
                    break;
                case 'Frequency':
                    $frequency = $value;
                    break;
                case 'Exitdate':
                    $Exit_date = $value;
                    break;
            }
            
           
        }
         $liabilities_list->push(new Liability($id, $liability_name, $FromTo, $Description, $valu, $remaining, $entry_date, $expected_on, $updated_on, $entered_by, $is_periodic, $frequency, $Exit_date));

    }
    
    return $liabilities_list;
}
/*
$assetlistsatas=updateAssets();
$assetlistsatas->rewind();
     while($assetlistsatas->valid()){
    echo $assetlistsatas->current()->calculate_current_valuee();
    echo "\r\n";
    $assetlistsatas->next();
    }

updateUsers();

updateLiabilities();
*/

/*else{
    $sql =$conn->prepare("Select * from asset where enteredBy = ?");
    $sql -> bind_param("s",$_Session['ID']);
    $sql -> execute();
    $result = $sql -> get_result();
    $assets =  $result->fetch_array(MYSQLI_ASSOC);
    $asset_count = $result-> num_rows;
    //-------------------------------------------------------------------
    $sql =$conn->prepare("Select * from liability  where enteredBy = ?");
    $sql -> bind_param("s",$_Session['ID']);
    $sql -> execute();
    $result = $sql -> get_result();
    $users =  $result->fetch_array(MYSQLI_ASSOC);
    $users_count = $result-> num_rows;
}*/
function getLastYearMonths(){
    $year=intval(date(Y));
    $month=intval(date(m));
    $endDate= $year.'-'.$month.'*';
    $text="";
    for($counter =0;$counter<12;$counter++){
        
        if($month<1){
            $month+=12;
            $year--;
            $month--;
        }else{
            $month--;
    }
}
include 'config.php';
    $startDate= $year.'-'.$month.'*';
   $sql = $conn->prepare("Select * from asset where ExitDate <= ? AND entryDate =null");
   $sql -> bind_param("s",$endDate);
    $sql -> execute();
    $result = $sql  -> get_result();
      $count = $result -> num_rows;

    while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "success";
         
         foreach ($row as $key => $value) {
    echo $key."    ".$value.'\t';
}
                
            }
        
    
    


    
}
?>
