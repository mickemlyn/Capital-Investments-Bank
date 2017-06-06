<?php
require 'connections.php';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="delete from users where userId='".$id."'";
mysqli_query($conn,$sql) or die (mysqli_error($conn, $sql));

header("location: viewusers.php");
}



?>
          