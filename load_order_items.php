 <?php  
 //load data according to category selected by user  
  require 'connections.php'; 
 $output = '';  
 if(isset($_POST["cat"]))  
 {  
      if($_POST["cat"] != ''){  
          $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage, favorite FROM items WHERE itemCategory = '".$_POST["cat"]."' ORDER BY dateAdded DESC LIMIT 20";  
      }  
      else{  
           $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage, favorite FROM items ORDER BY dateAdded DESC LIMIT 20";  
      }  
      $result = mysqli_query($conn, $sql);      
      while($row = mysqli_fetch_array($result))  
      { 
      $output .= '<div class="col-md-3" style="margin-top:12px;">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px; height:400px;" align="center">
                <span class="favorite fav" id="fav'.$row["itemId"].'">&#9734;</span>  
                 <img src="'.$row["itemImage"].'" height="150" width="150" class="img-responsive"/><br />  
                   <h5 class="text-info"><b>'. $row["itemName"].'</b></h5>  
                   <h5 class="text-danger">Kshs.'. $row["price"].'</h5>
                  <p>By <a href="sortbybrand.php?itembrand='.$row["model"].'" >'.$row["model"].'</a></p>
                 <a href="#" class="dontscroll" title="'. $row["itemName"].'" data-toggle="popover" data-placement="top" data-content="'. $row["description"].'">Show Item Details <span class="ww glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a>
                   <input type="text" name="quantity" id="quantity'.$row["itemId"].'" class="form-control" value="1" />  
                   <input type="hidden" name="hidden_name" id="name'.$row["itemId"].'" value="'.$row["itemName"].'" />  
                   <input type="hidden" name="hidden_price" id="price'.$row["itemId"].'" value="'.$row["price"].'" />  
                   <input type="button" name="add_to_cart" id="'.$row["itemId"].'" style="margin-top:5px;" class="btn btn-info form-control add_to_cart" value="Add to Cart" />  
                          </div>  
                     </div>';    
          
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