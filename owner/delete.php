<?php
// delete.php
$property_id='';
include("../config/config.php");

if(isset($_POST['delete_property']) && isset($_POST['property_id'])){
    delete_property();
}

function delete_property(){
    global $db, $property_id;
    
    $property_id=$_POST['property_id'];

    $sql="DELETE from property_photo where property_id='$property_id'";
    $query=mysqli_query($db,$sql);

    if($query){
        $sql2="DELETE from review where property_id='$property_id'";
        $query2=mysqli_query($db,$sql2);

        $sql3="DELETE from add_property where property_id='$property_id'";
        $query3=mysqli_query($db,$sql3);

        if($query3){
            
            header("Location: owner-index.php?success=1");
            exit();
        }
    }
}
?>