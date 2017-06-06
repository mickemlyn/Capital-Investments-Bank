<?php
session_start();
require 'connections.php';
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    //WALIOKO HATUWATAKI, WANAOTAKA HATUWAAMINI - ANN MED CITY
if(isset($_POST['submitNewItem'])){
    $name = ($_POST['itemName']);
    $itemDescr=$_POST['itemDescription'];
    $itemDescription = mysqli_real_escape_string($conn, $itemDescr);
    $itemCategory=$_POST['category'];
    $itemSubCategory=$_POST['subcategory'];  
    $itemBrand=$_POST['brand'];
    $price = ($_POST['price']);
    if(isset($_SESSION['ItemPicBackend'])){
    $image = $_SESSION['ItemPicBackend'];}
    else{ $image ="itemimages/default.png"; }

 //if u cyah manage the war, stay outta fight  
//check if item exists
    $q = mysqli_query($conn,"Select itemName from items WHERE itemName='$name'");
    $exists = mysqli_num_rows($q); 
if($exists > 0){
    $_SESSION['ItemError'] = "This Item exists !";
    $_SESSION['ItemYouEntered'] = $name;
    $_SESSION['ItemDescriptionYouEntered'] = $itemDescription;
    $_SESSION['CatYouEntered'] = $itemCategory;
    $_SESSION['PriceYouEntered'] = $price;
    $_SESSION['BrandYouEntered'] = $itemBrand;
    $_SESSION['currentItemPic'] = $_SESSION['ItemPicBackend'];
    /*if(isset($_SESSION['EmailError'])){ unset($_SESSION['EmailError']);}

    if(isset($_SESSION['PasswordError'])){ unset($_SESSION['PasswordError']);*/
    header("location: additems.php"); exit();

}    
    elseif(strlen($itemDescription) > '300'){
    $_SESSION['itemDescriptionError'] = "Item Descriprion Too Long!";
    $_SESSION['ItemYouEntered'] = $name;
    $_SESSION['ItemDescriptionYouEntered'] = $itemDescription;
    $_SESSION['CatYouEntered'] = $itemCategory;
    $_SESSION['PriceYouEntered'] = $price;
    $_SESSION['BrandYouEntered'] = $itemBrand;
    $_SESSION['currentItemPic'] = $_SESSION['ItemPicBackend'];
    header("location: additems.php"); exit();  
    }
  
    elseif((strlen($itemBrand) > '19') && (!preg_match("/^[a-zA-Z&-\s]*$/",$itemBrand))){
    $_SESSION['itemBrandError'] = "Invalid Brand Name!";
    $_SESSION['ItemYouEntered'] = $name;
    $_SESSION['ItemDescriptionYouEntered'] = $itemDescription;
    $_SESSION['CatYouEntered'] = $itemCategory;
    $_SESSION['PriceYouEntered'] = $price;
    $_SESSION['BrandYouEntered'] = $itemBrand;
    $_SESSION['currentItemPic'] = $_SESSION['ItemPicBackend'];
    header("location: additems.php"); exit();  
    }
    
   elseif(($price < 15) && (!is_numeric($price))){
    $_SESSION['itemPriceError'] = "Incorrect Item Pricing!";
    $_SESSION['ItemYouEntered'] = $name;
    $_SESSION['ItemDescriptionYouEntered'] = $itemDescription;
    $_SESSION['CatYouEntered'] = $itemCategory;
    $_SESSION['PriceYouEntered'] = $price;
    $_SESSION['BrandYouEntered'] = $itemBrand;
    $_SESSION['currentItemPic'] = $_SESSION['ItemPicBackend'];
    header("location: additems.php"); exit();  
    }
    
    else{    
$sql="INSERT INTO items (itemName, description, price, itemCategory, subCategory, model, itemImage) VALUES('{$name}','{$itemDescription}','{$price}','{$itemCategory}','{$itemSubCategory}','{$itemBrand}','{$image}')";
$sqlExec=mysqli_query($conn,$sql);
$_SESSION['newitemsuccess'] = "New Item - ".$name." Added";

 if(isset($_SESSION['itemDescriptionError'])){ unset($_SESSION['itemDescriptionError']);}
 if(isset($_SESSION['ItemError'])){ unset($_SESSION['ItemError']);}
 if(isset($_SESSION['ItemYouEntered'])){ unset($_SESSION['ItemYouEntered']);}
 if(isset($_SESSION['itemPriceError'])){ unset($_SESSION['itemPriceError']);}
 if(isset($_SESSION['ItemDescriptionYouEntered'])){ unset($_SESSION['ItemDescriptionYouEntered']);}
 if(isset($_SESSION['CatYouEntered'])){ unset($_SESSION['CatYouEntered']);}
 if(isset($_SESSION['PriceYouEntered'])){ unset($_SESSION['PriceYouEntered']);}
 if(isset($_SESSION['BrandYouEntered'])){ unset($_SESSION['BrandYouEntered']);}
 if(isset($_SESSION['itemBrandError'])){ unset($_SESSION['itemBrandError']);}
 if(isset($_SESSION['ItemPicBackend'])){ unset($_SESSION['ItemPicBackend']);}
   
    }  

}
 ?>
<! doctype html>
<html>   
<head>
<title>CIB SUPPLIER</title>
<link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="navbar.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
<link rel="stylesheet" href="global.css">
 <link href="bootstrap-3.3.6-dist/css/w3.css" rel="stylesheet" type="text/css"/>  
<script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js" type="text/javascript"></script> 
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
 <script src="upload.js"></script>    
<style type="text/css">
.content{

height: auto;
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
.btn-file {
        position: relative;
        overflow: hidden;
    }
.btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    div.absolute {
    position: absolute;
    width: 550px;
    margin: auto;
     left: 42%;
}

</style>    
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
                <a href="store.php">View Store</a>
                <a href="#">Add Items</a>
               <a href="#">Availability</a>
               <a href="categories.php">Categorization</a></div>     
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
        <div class="col-sm-8"><h2  class="lead text-center" ><b>Add Items To Store</b></h2></div>
        <div class="col-sm-4" >
        <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;"> <?php echo $_SESSION['user']; ?></small></b></h6> 
        </div>
    <?php if(isset($_SESSION['newitemsuccess'])){ ?> <div class="absolute text-center" id="successfade">
    <div class="alert alert-success alert-dismissable" >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong><?php echo $_SESSION['newitemsuccess'];?>
    </div></div><?php } unset($_SESSION['newitemsuccess']) ?>       
            
        </div>
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <div class="panel panel-info">
            <div class="panel-heading text-center lead">Add New Item</div>
            <div class="panel-body text-muted">
            <p class="text-center">All fields are required. Item Names should be well Descriptive.</p>
<div class="row">
<div class="col-sm-6"> 
<form id="AddItemsForm" method="post" name="AddItemsForm" role="form" class="form-horizontal form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <div style="margin-bottom:10px;"> <div class="input-group col-xs-12 <?php if(isset($_SESSION['ItemError'])){ echo "has-error"; }?>"><span class="input-group-addon">Item Name</span>
    <input class="form-control" type="text" name="itemName" id="itemName" maxlength="50" placeholder="Enter Item Name" <?php if(isset($_SESSION['ItemYouEntered'])){ echo'value="'.$_SESSION['ItemYouEntered'].'"'; } ?> required> </div>
    <?php if(isset($_SESSION['ItemError'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Item Name Error:</span><?php echo $_SESSION['ItemError'] ;?></div><?php }  ?>  </div>
    
    <div style="margin-bottom:10px;">
    <div class="panel panel-default">
    <div class="input-group col-xs-12 <?php if(isset($_SESSION['itemDescriptionError'])){ echo "has-error"; }?>">
        <textarea style="min-width: 100%" class="form-control" rows="4" name="itemDescription" id="itemDescription" maxlength="300" placeholder="Enter Detailed Item Description( Less than 300 characters)" required><?php if(isset($_SESSION['ItemDescriptionYouEntered'])){ echo $_SESSION['ItemDescriptionYouEntered']; } ?></textarea></div>
    <div class="panel-footer bg-success"> 
    <div class="text-success"> <span id="charsleft"></span> Characters left</div>
    </div></div>
    <?php if(isset($_SESSION['itemDescriptionError'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Item Name Error:</span><?php echo $_SESSION['itemDescriptionError'] ;?></div><?php }  ?>  
    </div>
    
    <div style="margin-bottom:10px;">
    <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
    <select class="form-control" id="category" name="category" required>
    <option selected disabled value="">Select Category</option>
    <?php 
    $sql="SELECT cat FROM itemcategories ORDER BY cat ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    while($data=mysqli_fetch_array($row)){ ?>
    <option value="<?php echo $data["cat"]; ?>" <?php if(isset($_SESSION['CatYouEntered']) && $_SESSION['CatYouEntered'] == $data["cat"] ){ echo "selected"; } ?> ><?php echo $data["cat"]; ?></option> <?php } ?>       
    </select> </div>
    </div>
    
    <div style="margin-bottom:10px;">
    <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item SubCategory</span>
     <select class="form-control action" id="subcategory" name="subcategory" required>
    <option disabled selected value="">Select SubCategory</option> </select> </div> 
    </div>
        
    <div style="margin-bottom:10px;">
    <div class="input-group col-xs-10 <?php if(isset($_SESSION['itemBrandError'])){ echo "has-error"; }?>"><span class="input-group-addon">Model/Brand</span>
    <input class="form-control" type="text" name="brand" id="brand"  maxlength="19" placeholder="Enter Item Brand or Model" <?php if(isset($_SESSION['BrandYouEntered'])){ echo'value="'.$_SESSION['BrandYouEntered'].'"'; } ?> required autocomplete="on"> </div>
    <?php if(isset($_SESSION['itemBrandError'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Price Error:</span><?php echo $_SESSION['itemBrandError'] ;?></div><?php }  ?>
    </div>
    
    <div style="margin-bottom:10px;"><div class="input-group col-xs-7 <?php if(isset($_SESSION['itemPriceError'])){ echo "has-error"; }?>"><span class="input-group-addon">Price( KES)</span>
    <input class="form-control" type="number" name="price" id="price" min="10" max="1000001" placeholder="Item Price In Kshs" <?php if(isset($_SESSION['PriceYouEntered'])){ echo'value="'.$_SESSION['PriceYouEntered'].'"'; } ?> required></div>
    <?php if(isset($_SESSION['itemPriceError'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Price Error:</span><?php echo $_SESSION['itemPriceError'] ;?></div><?php }  ?> </div>
    
    <button type="submit" id="submitNewItem" name="submitNewItem" class="btn btn-success btn-lg btn-block" disabled>ADD THIS ITEM</button>
    <?php if(isset($_SESSION['itemDescriptionError']) || (isset($_SESSION['ItemError']))|| ( isset( $_SESSION['itemPriceError']) ) || (isset( $_SESSION['itemBrandError'])) ){?><a  href="cancel_addnewitem.php" id="CancelNewItem" name="CancelNewItem" class="btn btn-warning btn-lg btn-block">CANCEL</a><?php }  ?>
    </form>
</div>
<div class="col-sm-6">
    <div style="margin-bottom:10px;">
       <div id="refreshuploader">
        <div class="upload" id="uploaderdiv"> 
        <form action="itemupload.php" method="post" enctype="multipart/form-data" id="upload" class="form-group upload">
        <fieldset>
        <legend class="lead text-muted">Upload Item Image</legend><span class="btn btn-default btn-file">Select Image <input type="file" id="file" name="file[]" required> </span>
        <input type="submit" id="submit" name="submit" class="btn btn-info" value="Upload" disabled>
        </fieldset>
        <div class="bar"><span class="bar-fill" id="pb">
        <span class="bar-fill-text" id="pt"></span></span></div><div id="uploads" class="uploads">Uploaded file will appear here: </div></form></div>    
        </div>   
    </div> 
    
    <div style="margin-bottom:5px;">
        <div style="padding:5px; width:200px; height:200px" class="w3-card-4">
        <div id="refreshimage"  style="width:190px; margin: 0 auto;"><img src="<?php if(isset($_SESSION['currentItemPic'])){ echo $_SESSION['currentItemPic']; } else{ echo "itemimages/default1.png";}?>" height="190" title="Uploaded Item Image will appear here"></div></div> 
    </div>                  
   <?php if(isset($_SESSION['currentItemPic'])){
       $_SESSION['ItemPicBackend'] = $_SESSION['currentItemPic'];  
 //LIFE IS LIKE A BEAUTIFUL MELODY. ONLY THE LYRICS ARE  MESSED UP.
     unset($_SESSION['currentItemPic']);}?>                   
                
    <button class="btn btn-default btn-lg btn-block" title="Reset Entered Data" onclick="resetFunction()"> RESET </button>
                    
                    
                    
                    
</div>
</div></div>
<div class="panel-footer text-center" style="color:#083B4C;"><small>&copy; Capital Investment Bank </small></div>
</div>
</div>
    <div class="col-sm-1"></div> </div>
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
<script>
$(document).ready(
    function(){
        $('input:file').change( function(){ if ($(this).val()) { $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:  $('input:submit').removeAttr('disabled'); 
                }   }
        );})//706635
</script> 
<script> document.getElementById('submit').addEventListener('click',function(e){      e.preventDefault();
          var f = document.getElementById('file'),
              pb = document.getElementById('pb'),
              pt = document.getElementById('pt');
          app.uploader({
              files: f,
              progressBar:pb,
              progressText:pt,
              processor: 'itemupload.php',
              finished: function(data) {
                  var uploads = document.getElementById('uploads'),
                      succeeded = document.createElement('div'),
                      failed = document.createElement('div'),
                      anchor,
                      span, 
                      x;
                  if(data.failed.length){
                      failed.innerHTML = '<p class = "text-danger">Unfortunately, The following Failed:-</p>';
                      
                  }
                  uploads.innerText = '';
                  for(x=0; x < data.succeeded.length; x= x+1){
                      anchor = document.createElement('a');
                      anchor.href = 'itemimages/'+ data.succeeded[x].file;
                      anchor.innerText = data.succeeded[x].name;
                      anchor.target='_blank';
                      console.log(anchor);
                    succeeded.appendChild(anchor); 
                      
                       $("#refreshimage").load("additems.php #refreshimage" );
                  }
                 for(x=0; x < data.failed.length; x=x+1){
                      span = document.createElement('span');
                      span.innerText = data.failed[x].name;
                    failed.appendChild(span); 
                     
              }
            uploads.appendChild(succeeded);
            uploads.appendChild(failed); 
          },
              error:function(){
                  console.log('Not working');
              } } );
      });
</script>
<script>
function resetFunction() {
    document.getElementById("AddItemsForm").reset();
          $("#refreshimage").load("additems.php #refreshimage" );
    $("#refreshuploader").load("additems.php #refreshuploader" );
//    $("#uploaderdiv").load("additems.php #uploaderdiv" );
}
</script>
<script>
$("#itemDescription").on('keyup',function(){ 
    var chars = (300 - ($(this).val().length) );
$("#charsleft").text( chars);
    
});
</script>
<script>
 $(document).ready (function(){ 
     $("#successfade").hide().fadeIn('normal');
   $("#successfade").fadeTo(4000, 500).slideUp("slow", function(){
    $("#successfade").slideUp("slow");
                });   
            });

</script>
<script>
 $("#itemName").on('keyup',function(){
  var regEx = /^[a-zA-Z0-9\s-/()."]*$/; 
 if(($(this).val().length > 5) && (regEx.test($(this).val())) && ($(this).val().trim().length >0) ){
            $('#submitNewItem').attr('disabled', false); }           
        else{
            $('#submitNewItem').attr('disabled',true);}    
});
    </script>
<script>
 $("#brand").on('keyup',function(){
  var regEx = /^[a-zA-Z0-9\s-]*$/; 
 if(($(this).val().length > 1) && (regEx.test($(this).val())) && ($(this).val().trim().length >0) ){
            $('#submitNewItem').attr('disabled', false); }           
        else{
            $('#submitNewItem').attr('disabled',true);}    
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