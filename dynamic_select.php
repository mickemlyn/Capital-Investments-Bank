<?php 
 require 'connections.php'; ?>
<!DOCTYPE html>
<html>   
<head>
    <title>Template</title>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    
    <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
 <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
  </script>
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
  
<body>
 <div class="container">
 <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
<select class="form-control action" id="category" name="category">
<option selected disabled value="" >Select Category</option>  
<?php 
    $sql="SELECT catid, cat FROM itemcategories ORDER BY cat ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    while($data=mysqli_fetch_array($row)){
    ?>
    <option value="<?php echo $data["catid"]; ?>"><?php echo $data["cat"]; ?></option> <?php } ?>
</select> </div>
 <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item SubCategory</span>
    <select class="form-control action" id="subcategory" name="subcategory" >
<option selected disabled value="" >Select SubCategory</option>  

</select> </div>


</div>  
<script>
$(document).ready(function(){
 $('#category').change(function(){
  if($(this).val() != '')
  {
   var query = $(this).val();
   var result = '';
  
   $.ajax({
    url:"fetch_subcat.php",
    method:"POST",
    data:{ query:query},
    success:function(data){
     $('#subcategory').html(data);
    }
   })
  }
 });
});
</script>
</body>
</html>
