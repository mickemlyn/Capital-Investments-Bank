<?php
require 'connections.php';

if(isset($_GET['catid'])){
$categoryid=$_GET['catid'];
$sql="delete from itemcategories where catid='".$categoryid."'";
mysqli_query($conn,$sql) or die (mysqli_error($conn, $sql));
header("location: categories.php");
}
if(isset($_GET['subcatid'])){
$subcatid=$_GET['subcatid'];
$sql="delete from itemsubcategories where subcatid='".$subcatid."'";
mysqli_query($conn,$sql) or die (mysqli_error($conn, $sql));
header("location: categories.php");
}