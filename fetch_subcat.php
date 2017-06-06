<?php
//fetch.php
if(isset($_POST["query"])){
 require 'connections.php';
 $output = '';
  $query = "SELECT subcatid,subcat,itemcategory FROM itemsubcategories WHERE itemcategory = '".$_POST["query"]."' ORDER BY subcat";
  $result = mysqli_query($conn, $query);
  $output .= '<option selected disabled value="">Select SubCategory</option>';
  while($row = mysqli_fetch_array($result)){
   $output .= '<option value="'.$row["subcat"].'">'.$row["subcat"].'</option>';
  }

 echo $output;
}
?>