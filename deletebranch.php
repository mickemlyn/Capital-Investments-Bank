<?php
require 'connections.php';

if(isset($_GET['branchid'])){
$Branchid=$_GET['branchid'];
$sql="delete from customer where BranchId='".$Branchid."'";
mysqli_query($conn,$sql) or die (mysqli_error($conn, $sql));
header("location: newbranch.php");
}
