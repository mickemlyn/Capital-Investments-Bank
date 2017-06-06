<?php
session_start();
require 'connections.php';
if(isset($_POST["theid"], $_POST["action"])){
$the_id = $_POST["theid"];
$the_action = $_POST["action"];

 
 $query = mysqli_query($conn,"Select favorite from items WHERE itemId='$the_id'");
 $result = mysqli_fetch_assoc($query);
 $table_status = $result['favorite'];
if($table_status == "notfav") {
    $updatefavorite = mysqli_query($conn,"UPDATE items SET favorite = '{$the_action}' WHERE itemId = '{$the_id}'"); 
    }
 else{
     $the_action = "notfav";
    $updatefavorite = mysqli_query($conn,"UPDATE items SET favorite = '{$the_action}' WHERE itemId = '{$the_id}'");  
    }
}

?>