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
    padding-left: 55%;
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
        <div class="well text-muted"><div class="row">
        <input type="text" id="mytblInput" onkeyup="mytblFunction()" placeholder="Search for Items.." title="Type in an Item Name">
            
        <div id="doubletrouble">
        <div class="input-group col-xs-7" style="margin-bottom:5px;"><span class="input-group-addon"> Filter</span>
        <select class="form-control" id="category" name="category" required>
        <option selected disabled value="">Select Category</option>
        <?php 
        $sql="SELECT cat FROM itemcategories ORDER BY cat ASC";
        $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        while($data=mysqli_fetch_array($row)){ ?>
        <option value="<?php echo $data["cat"]; ?>" > <?php echo $data["cat"]; ?></option> <?php } ?>       
        </select> </div>
        </div>
<table id="myTable" class="table table-hover table-condensed table-responsive" >
    <tr class="header">
    <th>Image </th>
    <th>Product </th>
    <th>Descriprion </th>
    <th>Details </th>
    <th>Price </th>
    <th class="text-center"> ACTION </th>
    </tr>
    <?php
    $sql="SELECT itemId, itemName, description, price, itemCategory, model, itemImage FROM items ORDER BY dateAdded DESC LIMIT 15";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));

    while($data=mysqli_fetch_array($row))
    {
    ?>
    <tr>
    <td><img src="<?php echo $data["itemImage"]; ?>" height="100" width="100" title="<?php echo $data["itemName"]; ?>"> </td>
    <th><?php echo $data["itemName"]; ?></th>
    <td><?php echo $data["description"]; ?></td>
    <td>By <a href="sortbybrand.php?itembrand=<?php echo $data["model"]; ?>" ><?php echo $data["model"]; ?> </a>
    <p><?php echo $data["itemCategory"]; ?></p>
        </td>
    <td>Kshs. <?php echo $data["price"]; ?></td>

    <?php echo "<td><a  href='update_item.php?itemId=".$data["itemId"]."' title='Update'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a><br><br>
    <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_item_store.php?itemId=".$data["itemId"]."' title='Delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
    </td><tr>";?>
    </tr>
    <?php
    } ?> </table>
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
            <div id="load_data_message">
            </div>
            <div class="col-xs-4"></div>
            </div>
            </div></div>
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
</script>
<script>  
 $(document).ready(function(){  
      $('#category').change(function(){  
           var cat = $(this).val();  
           $.ajax({  
                url:"load_items.php",  
                method:"POST",  
                data:{cat:cat},  
                success:function(data){  
                     $('#myTable').html(data);  
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