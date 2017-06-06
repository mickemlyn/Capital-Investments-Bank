<?php
session_start();
require 'connections.php';
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  //if we dont hear this in music tomorrow me done with music       
 ?>
<! doctype html>
<html>   
<head>
<title>CIB - CART</title>
<link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="navbar.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
 <link href="bootstrap-3.3.6-dist/css/w3.css" rel="stylesheet" type="text/css"/>  
<script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js" type="text/javascript"></script> 
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    
<style type="text/css">
.content{

height: auto;
min-height: 560px;
color: white;
background-color:#083B4C;
background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGUlEQVQ4y2NgoBJwoJAedcGoC0ZdMOAuAABF0hABJ/8lyQAAAABJRU5ErkJggg==);
background-attachment: fixed;
padding-top: 30px;
}
/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    padding: 12px 12px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}
div.absolute {
    position: absolute;
    width: 550px;
    margin: auto;
     left: 42%;
}
#mytblInput {
  background-image: url('searchiconw3.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 25%;
  font-size: 16px;
  padding: 8px 20px 8px 40px;
  border: 1px solid #ddd;
  margin-bottom: 5px;
border-radius: 17px;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;
}
#mytblInput:focus {
    width: 50%;
}
#doubletrouble {
    padding-left: 40%;
    margin-top: -40px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 15px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 8px;
}
#myTable tr.header{ background-color: #e2e2e2; }
#myTable tr:hover:not(.header) {
background-image: -webkit-linear-gradient(top, #dff0d8 0%, #c8e5bc 100%);
background-image: -o-linear-gradient(top, #dff0d8 0%, #c8e5bc 100%);
background-image: -webkit-gradient(linear, left top, left bottom, from(#dff0d8), to(#c8e5bc));
background-image: linear-gradient(to bottom, #dff0d8 0%, #c8e5bc 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffdff0d8', endColorstr='#ffc8e5bc', GradientType=0);
background-repeat: repeat-x;
border-color: #b2dba1;
}

.fav{ 
position: absolute; font-size:25px; text-align: right; display: inline-block; top: -5px; right: 15px; cursor:pointer; cursor:hand;
}
.fav:hover{ 
    color: gold;
}
.favoz{ 
color: gold;
}
    
</style> 
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
</head>
<body>
   
<nav class="navbar  navbar-fixed-top " style="background-color:white;">
         <div class="col-xs-4">  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           
          <a class="navbar-brand" href="#" style="margin-top:0px;"><img src="Capital%20inestments%20bank%20brand.png" height="40" class="pull-left img-rounded"></a>
        </div>
          </div>
          <div class="col-xs-8">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
                <li class="active"><a href="supplier.php">Home </a></li>
                <li ><a href="#about"> Orders </a></li>
               <li class="dropdown">
                <a href="#" class="dropdown">Store<span class="caret"></span> </a>
               <div class="dropdown-content">
                <a href="#">View Store</a>
                <a href="additems.php">Add Items</a>
               <a href="#">Availability</a>
               <a href="categories.php">Categories</a></div>     
               </li>
               <li><a href="#">Contracts</a></li> 
               <li><a href="#">Profile</a></li>
               <li><a href="#">Reports</a></li>
               <li><a href="#">Feedback</a></li>
               <li><a href="logout.php" title="LogOut"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
               <li><a href="#">Help</a></li>
            </ul>
        </div>
         </div>
          
    <!--/.navbar-collapse -->
        
        </nav>
    
    <div class="content" id="spec">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.3)">
            <div class="row">
            <div class="col-sm-8"><h2  class="lead text-center" ><b>Item Store</b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;"> <?php echo $_SESSION['user']; ?></small></b></h6> 
            </div> 
           <?php if(isset($_SESSION['updateitemsuccess'])){ ?> <div class="absolute text-center" id="successfade">
            <div class="alert alert-success alert-dismissable" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! </strong><?php echo $_SESSION['updateitemsuccess'];?>
        </div></div><?php } unset($_SESSION['updateitemsuccess']) ?> 
        
        <?php if(isset($_SESSION['itemfail'])){ ?> <div class="absolute text-center" id="successfade">
        <div class="alert alert-danger alert-dismissable" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops! </strong><?php echo $_SESSION['itemfail'];?>
        </div></div><?php } unset($_SESSION['itemfail']) ?>            
        </div>
        <div class="well text-muted">
 <h3 align="center">Add Items to Shopping Cart to Place an Order</h3><br>
    <ul class="nav nav-tabs">  
        <li class="active"><a data-toggle="tab" href="#products">Products</a></li>  
        <li><a data-toggle="tab" href="#cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span></a></li>  
    </ul>
        <div class="tab-content">
        <div id="products" class="tab-pane fade in active">
            <div id="doubletrouble"><div class="row"><div class="col-xs-2"><a href="action.php" class="btn btn-default"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Favorites</a> </div><div class="col-xs-10">
        <div class="input-group col-xs-7" style="margin-bottom:5px;"><span class="input-group-addon"> Filter</span>
        <select class="form-control" id="category" name="category" required>
        <option selected disabled value="">Select Category</option>
        <?php 
        $sql="SELECT cat FROM itemcategories ORDER BY cat ASC";
        $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        while($data=mysqli_fetch_array($row)){ ?>
        <a href="33.php"><option value="<?php echo $data["cat"]; ?>" > <?php echo $data["cat"]; ?></option></a> <?php } ?>       
        </select> </div>      
        </div></div></div>
        <div class="row" id="items">  
                 <?php  
                 $query = "SELECT itemId, itemName, description, price, itemCategory, model, itemImage, favorite FROM items ORDER BY dateAdded DESC LIMIT 32";  
                 $result = mysqli_query($conn, $query);  
                 while($row = mysqli_fetch_array($result))  
                 { ?>  
                <div class="col-md-3" style="margin-top:12px;">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px; height:400px;" align="center">
                <span class="favorite fav <?php if($row["favorite"] =="favorite"){ echo "favoz"; } else{ echo ""; } ?>" id="fav<?php echo $row["itemId"]; ?>">&#9734;</span>  
                 <img src="<?php echo $row["itemImage"]; ?>" height="150" width="150" class="img-responsive"/><br />  
                   <h5 class="text-info"><b><?php echo $row["itemName"]; ?></b></h5>  
                   <h5 class="text-danger">Kshs. <?php echo $row["price"]; ?></h5>
                  <p>By <a href="sortbybrand.php?itembrand=<?php echo $row["model"]; ?>" ><?php echo $row["model"]; ?> </a></p>
                 <a href="#" class="dontscroll" title="<?php echo $row["itemName"]; ?>" data-toggle="popover" data-placement="top" data-content="<?php echo $row["description"]; ?>">Show Item Details <span class="ww glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a>
                   <input type="text" name="quantity" id="quantity<?php echo $row["itemId"]; ?>" class="form-control" value="1" />  
                   <input type="hidden" name="hidden_name" id="name<?php echo $row["itemId"]; ?>" value="<?php echo $row["itemName"]; ?>" />  
                   <input type="hidden" name="hidden_price" id="price<?php echo $row["itemId"]; ?>" value="<?php echo $row["price"]; ?>" />  
                   <input type="button" name="add_to_cart" id="<?php echo $row["itemId"]; ?>" style="margin-top:5px;" class="btn btn-info form-control add_to_cart" value="Add to Cart" />  
                          </div>  
                     </div>  
                     <?php } ?>  z
                     </div>  </div>
                <div id="cart" class="tab-pane fade">  
              <div class="table-responsive" id="order_table">  
                   <table class="table table-bordered">  
                        <tr>  
                             <th width="40%">Product Name</th>  
                             <th width="10%">Quantity</th>  
                             <th width="20%">Price</th>  
                             <th width="15%">Total</th>  
                             <th width="5%">Action</th>  
                        </tr>  
                        <?php  
                        if(!empty($_SESSION["shopping_cart"])) {  
                             $total = 0;  
                             foreach($_SESSION["shopping_cart"] as $keys => $values)  
                             { ?>  
                        <tr>  
                             <td><?php echo $values["product_name"]; ?></td>  
                             <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                             <td align="right">Kshs. <?php echo $values["product_price"]; ?></td>  
                             <td align="right">Kshs. <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                             <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                        </tr>  
                        <?php  
                          $total = $total + ($values["product_quantity"] * $values["product_price"]);  }  
                        ?>  
                        <tr>  
                             <td colspan="3" align="right">Total</td>  
                             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                    <td></td>  
                    </tr>  
                    <tr>  
                         <td colspan="5" align="center">  
                              <form method="post" action="cart.php">  
                                   <input type="submit" name="place_order" class="btn btn-info" value="Place Order" />  
                              </form>  
                         </td>  
                    </tr>  
                    <?php  
                    }  
                    ?>  
                    </table>  
                    </div>  
                    </div>  
                    </div> 

                    </div>
                    </div></div>
    
    
<!-- </div>
      FOOTER -->
         <footer id="contact"class="text-center" style="height:200px; background-color:#333; color:white;">
        <div class="container">
       <div class="row" style="padding-top:10px;">
        <div  class="col-sm-3"><img src="media/map25-redish.png" height="20" ><p>CIB House,</p> 
           <p>Moi Avenue, 7th Street</p>
            <p>Nairobi</p>
            <p>Kenya</p></div>
        <div  class="col-sm-3"><img src="media/envelope4-green.png" height="20" ><p>info@cib.co.ke</p><p>P.O. Box 42656 - 00100</p> </div>  
        <div  class="col-sm-3"> <img src="media/telephone65-blue.png"  height="20" ><p><a href="tel://+254710533607"> +254710533607</a></p></div> 
           
           <div  class="col-sm-3" style="background-color:#083B4C;height:150px;">
            <p>
                <i class="fa fa-facebook" aria-hidden="true"  style="font-size:15px;"></i>
                <i class="fa fa-twitter" aria-hidden="true" style="font-size:15px; padding-left:10px;"></i>
                <i class="fa fa-linkedIn" aria-hidden="true" style="font-size:15px; padding-left:10px;"></i>
            </p>
            <p>&copy; <?php echo " ".date("Y"); ?> CIB</p>
           <footer class="pull-right" style="padding-top:100px;">By &copy;Mickemlyn & Yowmy</footer>
           </div>
        </div>
        </div>
      </footer>
    </div><!-- /.container -->
<script>
 $(document).ready (function(){ 
     $("#successfade").hide().fadeIn('normal');
   $("#successfade").fadeTo(4000, 500).slideUp("slow", function(){
    $("#successfade").slideUp("slow");
                });   
            });

</script>
    <script>
     $( function() {
    $( ".dontscroll" ).on( "click", function() {
      $(this).children().toggleClass( "glyphicon-chevron-down");
    });
  });
    </script>
<script>  
 $(document).ready(function(data){  
      $('.add_to_cart').click(function(){  
           var product_id = $(this).attr("id");  
           var product_name = $('#name'+product_id).val();  
           var product_price = $('#price'+product_id).val();  
           var product_quantity = $('#quantity'+product_id).val();  
           var action = "add";  
           if(product_quantity > 0)  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          alert("Product has been Added into Cart");  
                     }  
                });  
           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });  
      $(document).on('click', '.delete', function(){  
           var product_id = $(this).attr("id");  
           var action = "remove";  
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
      $(document).on('keyup', '.quantity', function(){  
           var product_id = $(this).data("product_id");  
           var quantity = $(this).val();  
           var action = "quantity_change";  
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
 });  
 </script>
    <script>
    $('.dontscroll').click(function(e) {
    e.preventDefault();      
});
    </script>
    <script>
    $( function() { $( ".favorite" ).on( "click", function() {
      $(this).toggleClass( "favoz");
    var action = "favorite";
    var itsid = $(this).attr("id");
    var theid = itsid.substring(3); 
        var msg = "";
   if( $('#'+itsid ).hasClass( "favoz" )){
     var msg = "Favorite this product ?";  
   }
        else{
          var msg = "Remove This Product from Favorites ?";     
        }
          if(confirm(msg))  
           {  
                $.ajax({  
                     url:"favorites.php",  
                     method:"POST", 
                     data:{theid:theid, action:action},  
                     success:function(data){  
     alert("Success... Your Preferences have been saved") 
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }
    });
  });
    </script>
<!--
<script>
function mytblFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mytblInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>-->
<script>  
 $(document).ready(function(){  
      $('#category').change(function(){  
           var cat = $(this).val();  
           $.ajax({  
                url:"load_order_items.php",  
                method:"POST",  
                data:{cat:cat},  
                success:function(data){  
                     $('#items').html(data);  
                }  
           });  
      });  
 });  

$(document).ready(function(){
var categ = $('#category').val();
$('#category').change(function(){ 
categ = $(this).val(); 
});
 var limit = 5;
 var start = 5;
 var action = 'inactive';
 function load_item_data(limit, start,categ)
 {
  $.ajax({
   url:"fetch_more_items.php",
   method:"POST",
   data:{limit:limit, start:start, categ:categ},
   cache:false,
   success:function(data)
   {
    $("#myTable").append(data);
    if(data == '')
    {
     $("#load_data_message").html("<button type='button' class='btn btn-info btn-lg btn-block'>No More Items</button>");
     action = 'active';
    }
    else
    {
     $("#load_data_message").html("<button type='button' class='btn btn-warning btn-lg btn-block'><i class='fa fa-spinner fa-spin'></i> Loading More Items</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_item_data(limit, start, categ);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#myTable").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_item_data(limit, start, categ);
   }, 1000);
  }
 });
 
});
</script>       
</body>
</html>
<?php mysqli_close($conn); }
else{
    unset($_SESSION['user']);
    unset($_SESSION['LAST_ACTIVITY']);
    
  $_SESSION['notloggederror'] = "Kindly log in to proceed!";
    header("location: index.php");
    exit();
}
?>