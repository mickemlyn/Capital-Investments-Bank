<?php
session_start();
require 'connections.php';

if(isset($_GET['itemId'])){
$itemid=$_GET['itemId'];
 $q = mysqli_query($conn,"SELECT itemId, itemName, description, price, itemCategory, subCategory, model, itemImage FROM items WHERE itemId = '".$_GET['itemId']."'");
 while($row = mysqli_fetch_array($q))  
 { 
    $olditemId = $row["itemId"];
    $name =  $row["itemName"];
    $dbItemDescription = $row["description"];
    $price = $row["price"];
    $itemCategory = $row["itemCategory"];
    $itemSubCategory = $row["subCategory"];
    $itemBrand = $row["model"];
    $pic =  $row["itemImage"];  
     
 $backup = "INSERT INTO deleteditems (itemName, description, price, itemCategory, subCategory, model, itemImage, olditemId) VALUES('{$name}','{$dbItemDescription}','{$price}','{$itemCategory}','{$itemSubCategory}','{$itemBrand}','{$pic}','{$olditemId}')";
     $backupsqlExec=mysqli_query($conn,$backup);
 } 
    
$sql="delete from items where itemId='".$itemid."'";
mysqli_query($conn,$sql) or die (mysqli_error($conn, $sql));
$_SESSION['actionsuccess'] = "Item Deleted From Store";
header("location: store.php");
}