<?php
 require 'connections.php';

  $query = "SELECT catid,cat FROM itemcategories";
  $result = $conn->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['catid'], "val" => $row['cat']);
  }

  $query = "SELECT subcatid, catid, subcat FROM itemsubcategories";
  $result = $conn->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['catid']][] = array("id" => $row['subcatid'], "val" => $row['subcat']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);


?>

<!DOCTYPE html>
<html>   
<head>
    <title>Template</title>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    
    <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
 <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
  </script>
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
        }
      }
    </script>
    </head>
  <body onload='loadCategories()'>
    <select id='categoriesSelect'>
    </select>


      
    <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
    <select class="form-control" id="category" name="category" >
<option selected disabled >Select Category</option> 
<div id='subcatsSelect' >
</div>  

</select> </div>
</body>
</html>
