 <?php  
 //load data according to category selected by user  
  require 'connections.php'; 
 $output = '';  
 if(isset($_POST["cat"]))  
 {  
      if($_POST["cat"] != ''){  
          $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items WHERE itemCategory = '".$_POST["cat"]."' ORDER BY dateAdded DESC LIMIT 15";  
      }  
      else{  
           $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items ORDER BY dateAdded DESC LIMIT 15";  
      }  
      $result = mysqli_query($conn, $sql); 
     $output .= '<tr class="header"><th>Image </th><th>Product </th><th>Descriprion </th><th>Details </th><th>Price </th>
     <th class="text-center"> ACTION </th></tr>';
     
      while($row = mysqli_fetch_array($result))  
      {           
        $output .= '<tr><td><img src="'.$row["itemImage"].'" height="100" width="100" title="'.$row["itemName"].'"></td> 
        <th>'.$row["itemName"].'</th><td>'. $row["description"].'</td><td>By <a href="sortbybrand.php?itembrand='.$row["model"].'">'. $row["model"].'</a><p>'.$row["itemCategory"].'</p></td> <td>Kshs.'.$row["price"].'</td>
        <td><a href="update_item.php?itemId='.$row["itemId"].'" title="Update"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><br><br>
    <a onClick=\'javascript: return confirm("Please confirm deletion");\' href="delete_item_store.php?itemId='.$row["itemId"].'" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td><tr>';  
          
      }  
      echo $output;  
 } 
 if(isset($_POST["brand"]))  
 {  
      if($_POST["brand"] != '')  
      {  
          $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items WHERE model = '".$_POST["brand"]."' ORDER BY dateAdded DESC LIMIT 15"; 
      }  
      else  
      {  
           $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items ORDER BY dateAdded DESC LIMIT 15";  
      }  
      $result = mysqli_query($conn, $sql); 
     $output .= '<tr class="header"><th>Image </th><th>Product </th><th>Descriprion </th><th>Details </th><th>Price </th>
     <th class="text-center"> ACTION </th></tr>';
     
      while($row = mysqli_fetch_array($result))  
      {  
          /* $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["product_name"].'</div></div>'; */
          
        $output .= '<tr><td><img src="'.$row["itemImage"].'" height="100" width="100" title="'.$row["itemName"].'"></td> 
        <th>'.$row["itemName"].'</th><td>'. $row["description"].'</td><td>By <a href="#">'. $row["model"].'</a><p>'.$row["itemCategory"].'</p></td> <td>Kshs. '.$row["price"].'</td>
        <td><a href="#.php?itemId='.$row["itemId"].'" title="Update"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><br><br>
    <a onClick=\'javascript: return confirm("Please confirm deletion");\' href="delete_item_store.php?itemId='.$row["itemId"].'" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td><tr>';  
          
      }  
      echo $output;  
 } 
 ?> 