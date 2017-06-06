<?php 
 require 'connections.php';
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
    </head>
  
<body>
 <div class="container">
 <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
<select class="form-control" id="category" name="category" onchange="ajaxfunction(this.value)">
<option selected disabled >Select Category</option>  
<?php 
    $sql="SELECT catid, cat FROM itemcategories ORDER BY cat ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    while($data=mysqli_fetch_array($row)){
    ?>
    <option value="<?php echo $data["catid"]; ?>"><?php echo $data["cat"]; ?></option> <?php } ?>
</select> </div>
 <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item SubCategory</span>
    <select class="form-control" id="category" name="category" >
<option selected disabled >Select SubCategory</option>  
<?php 
    $sql="SELECT subcatid, subcat, catid FROM itemsubcategories ORDER BY catid ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    while($data=mysqli_fetch_array($row)){
    ?>
    <option value="<?php echo $data["subcatid"]; ?>"><?php echo $data["subcat"]; ?></option> <?php } ?>
</select> </div>
<select id="sub"></select>

</div>  
<script type="text/javascript">
    function ajaxfunction(parent)
    {
        $.ajax({
            url: 'process.php?parent=' + parent,
            success: function(data) {
                $("#sub").html(data);
            }
        });
    }
</script>
</body>
</html>
