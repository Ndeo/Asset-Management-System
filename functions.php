<?php
/**
 * Created by PhpStorm.
 * User: nawaf
 * Date: 3/12/2019
 * Time: 12:10 AM
 */
include("Asset.php");
include("Asset.php");
include("config.php");
include("User.php");
include("Liability.php");
function topFiveAsset(){
    $assetList=updateAssets();
    $first;
    $second;
    $third;
    $fourth;
    $fifth;
    $assetList->rewind();
    while($assetList->current()->vaild()){
        if(is_a($first,Asset) && $assetList->current()->calculate_current_value()>$first->calculate_current_value()){
                    if(is_a($second,Asset) && $assetList->current()->calculate_current_value()>$second->calculate_current_value()){
                        if(is_a($third,Asset) && $assetList->current()->calculate_current_value()>$third->calculate_current_value()){
                            if(is_a($fourth,Asset) && $assetList->current()->calculate_current_value()>$fourth->calculate_current_value()){
                                if(is_a($fifth,Asset) && $assetList->current()->calculate_current_value()>$fifth->calculate_current_value()){
                                    
                                }else{
                                    $fifth=$assetList->current();
                                }
}else{
    $fifth=$fourth;
    $fourh=$assetList->current();
    
}
                        }else{
                            $fifth=$fourth;
                            $fourth=$third;
                            
                            $third=$assetList->current();
                            
                        }
                    }else{
                            
                            $fifth=$fourth;
                            $fourth=$third;
                            $third=$second;
                        $second=$assetList->current();
                    }
        }else{
            $fifth=$fourth;
                            $fourth=$third;
                            $third=$second;
                            $second=$first;
            $first=$assetList->current();
        }
        }
        $list =new SplDoublyLinkedList();
        $list->push($first);
        $list->push($second);
        $list->push($third);
        $list->push($fourth);
        $list->push($fifth);
        return $list;
        
    }

function suspend_user($id){
    $sql =$conn->prepare('UPDATE user SET state= suspend WHERE ID=?');
$sql -> bind_param("s",$id);

 $sql -> execute();


echo "Updated data successfully\n";
mysqli_close($conn);

}

function activate_user($id){
    $sql =$conn->prepare('UPDATE user SET state= active WHERE ID=?');
    $sql -> bind_param("s",$id);

    $sql -> execute();


    echo "Updated data successfully\n";
    mysqli_close($conn);

}


function delete_user($id,$deleterID){
    echo "hello";
    $sql =$conn->prepare('update asset  set enteredBy=? WHERE enteredBy=?');
    echo "hello";
    $sql -> bind_param("ss",$deleterID,$id);
    echo "hello";
    $sql -> execute();
    echo "hello";
    $sql =$conn->prepare('update liability  set createdby=? WHERE createdby=?');
    $sql -> bind_param("ss",$deleterID,$id);
    $sql -> execute();
    $sql =$conn->prepare('Delete from user WHERE ID=?');
    $sql -> bind_param("s",$id);

    $sql -> execute();


    echo "Updated data successfully\n";
    mysqli_close($conn);

}

function delete_asset($id){
    $sql =$conn->prepare('Delete from asset WHERE ID=?');
    $sql -> bind_param("s",$id);

    $sql -> execute();


    echo "Updated data successfully\n";
    mysqli_close($conn);

}

function update_user($id){
    $sql =$conn->prepare('UPDATE user SET ?=? WHERE ID=?');
    $sql -> bind_param("s,s,s",$id);

    $sql -> execute();


    echo "Updated data successfully\n";
    mysqli_close($conn);

}

//function


?>