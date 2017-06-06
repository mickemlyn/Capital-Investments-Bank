<?php
if(isset($_POST["limit"], $_POST["start"]))
{require 'connections.php';
   $query="";
    if($_POST["categ"]== "") {
 
  $query = "SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items ORDER BY dateAdded DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ";  
    }
 else{
     $query = "SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items WHERE itemCategory = '".$_POST["categ"]."' ORDER BY dateAdded DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ";    
    }

 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {
    echo '<tr><td><img src="'.$row["itemImage"].'" height="100" width="100" title="'.$row["itemName"].'"></td> 
    <th>'.$row["itemName"].'</th><td>'. $row["description"].'</td><td>By <a href="sortbybrand.php?itembrand='.$row["model"].'">'. $row["model"].'</a><p>'.$row["itemCategory"].'</p></td> <td>Kshs. '.$row["price"].'</td>
    <td><a href="update_item.php?itemId='.$row["itemId"].'" title="Update"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><br><br>
    <a onClick=\'javascript: return confirm("Please confirm deletion");\' href="delete_item_store.php?itemId='.$row["itemId"].'" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td><tr>';
 }

}

?>
