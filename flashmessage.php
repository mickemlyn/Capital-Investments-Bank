
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
  <div class="product-options">
    <a  id="myWish" href="javascript:;"  class="btn btn-mini" >Add to Wishlist </a>
    <a  href="" class="btn btn-mini"> Purchase </a>
</div>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    Product have added to your wishlist.
</div> 
<script>
   $(document).ready (function(){
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").alert();
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#success-alert").slideUp(500);
                });   
            });
 });
 </script>
</body>
</html>
