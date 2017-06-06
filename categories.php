<?php
session_start();
 require 'connections.php';
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
if(isset($_POST['submitnewcat'])){
    $newitemcat=$_POST['newcat'];
    $q = mysqli_query($conn,"Select cat from itemcategories WHERE cat='$newitemcat'");
    $exists = mysqli_num_rows($q); 
  if($exists > 0){
      $_SESSION['catExistsError'] = $_SESSION['Error'] = "This Category exists!";
      $_SESSION['CatYouEntered'] = $newitemcat;
        header("location: categories.php"); exit();
    }
   elseif(!preg_match("/^[a-zA-Z\s]*$/",$newitemcat)){
    $_SESSION['Error'] = "Invalid Category Name!"; 
    $_SESSION['CatYouEntered'] = $newitemcat;
    header("location: categories.php"); exit();
    }
  else{
     $sql="INSERT INTO itemcategories (cat) VALUES('{$newitemcat}')";
     $sqlExec=mysqli_query($conn,$sql);
      $_SESSION['newcatsuccess'] = "New Category Added.";
      if(isset($_SESSION['Error'])){
        unset($_SESSION['Error']); }
      if(isset($_SESSION['CatYouEntered'])){
        unset($_SESSION['CatYouEntered']); }
      if(isset($_SESSION['catExistsError'])){
        unset($_SESSION['catExistsError']); }  
}}
        
if(isset($_POST['submitnewsubcat'])){
    $newsubcategory=$_POST['newsubcat']; $itemcat=$_POST['subcat_cat'];
    //getting the category id from category database
    $catidQuery = mysqli_query($conn,"Select catid from itemcategories WHERE BINARY cat ='{$itemcat}'");
    $row = mysqli_fetch_assoc($catidQuery);
    $categoryid =$row['catid'];
    
    $q = mysqli_query($conn,"Select subcat from itemsubcategories WHERE subcat='$newsubcategory'");
    $exists = mysqli_num_rows($q); 
  if($exists > 0){
      $_SESSION['subcatExistsError'] = $_SESSION['subcatError'] = "This SubCategory exists!";
      $_SESSION['SubCatYouEntered'] = $newsubcategory;
        header("location: categories.php"); exit();
    }
   elseif(!preg_match("/^[a-zA-Z\s]*$/",$newsubcategory)){
    $_SESSION['Error'] = "Invalid SubCategory Name!"; 
    $_SESSION['SubCatYouEntered'] = $newsubcategory;
    header("location: categories.php"); exit();
    }
  else{
     $sql="INSERT INTO itemsubcategories (subcat, catid, itemcategory) VALUES('{$newsubcategory}','{$categoryid}','{$itemcat}')";
     $sqlExec=mysqli_query($conn,$sql);
      $_SESSION['newcatsuccess'] = "New SubCategory Added.";
      if(isset($_SESSION['subcatError'])){
        unset($_SESSION['subcatError']); }
      if(isset($_SESSION['SubCatYouEntered'])){
        unset($_SESSION['SubCatYouEntered']); }
      if(isset($_SESSION['subcatExistsError'])){
        unset($_SESSION['subcatExistsError']); }  
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
                <a href="additems.php">Add Items</a>
               <a href="#">Availability</a>
               <a href="#">Categories</a></div>     
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
            <div class="col-sm-8"><h2  class="lead text-center" ><b>Item Categorization</b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;"><?php echo $_SESSION['user']; ?></small></b></h6> 
            </div> 
           <?php if(isset($_SESSION['newcatsuccess'])){ ?> <div class="absolute text-center" id="successfade">
            <div class="alert alert-success alert-dismissable" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! </strong><?php echo $_SESSION['newcatsuccess'];?>
        </div></div><?php } unset($_SESSION['newcatsuccess']) ?>            
            </div>
            <div class="well text-muted"><div class="row">
            <div class="col-xs-6">
            <p class="lead"> Item Categories</p>
            <a class="acoddcat" href="#" title="Expand" data-toggle="collapse" data-target="#addcatdiv"><span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New Category</span></a>
            <div id="addcatdiv" <?php if(isset($_SESSION['Error'])){ echo ""; } else{ echo 'class = "collapse"'; } ?>>
                
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-inline">
                <div class="input-group <?php if(isset($_SESSION['Error'])){ echo "has-error"; } else{ echo ""; }?>" >
                <input type="text" class="form-control" name="newcat" id="newcat" placeholder="Enter New Category" <?php if(isset($_SESSION['CatYouEntered'])){ echo'value="'.$_SESSION['CatYouEntered'].'"';  } ?> required></div>
               <button type="submit" name="submitnewcat" id="submitnewcat" class="btn btn-success btn-sm ll" disabled>Submit</button></form>
               <?php if(isset($_SESSION['Error'])){?> 
            <div class="text-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['Error']; ?>
            <a href="cancel_newcat.php" title="Cancel" name="cancelCat" class="btn btn-warning btn-sm">QUIT</a>
            </div> <?php } ?>    
                </div> <br>   
    <div class="w3-card-4">
    <header class="w3-container w3-light-grey">
    <h4 class="text-muted">Current Item Categories</h4></header>
    <div class="w3-container">
    <table class="table table-hover table-condensed" >
    <tr class="success">
    <th></t> <small> Category_ID </small></th>
    <th> <small> CATEGORY NAME </small></th>
    <th class="text-center"><small> ACTION </small> </th>
    </tr>
    <?php
    $sql="SELECT catid, cat FROM itemcategories ORDER BY cat ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));

    while($data=mysqli_fetch_array($row))
    {
    ?>
    <tr>
    <td><?php echo $data["catid"]; ?></td>
    <td><?php echo $data["cat"]; ?></td>

    <?php echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletecat.php?catid=".$data["catid"]."' title='Delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td><tr>";?>
    </tr>
    <?php
    } ?> </table>
    </div>

    <p class="w3-button w3-block w3-dark-grey">&copy; Capital Investments Bank Supplier</p>

    </div>
                </div>
                <div class="col-xs-6">
                <p class="lead"> Item SubCategories</p>
                <a class="acoddsubcat" href="#" title="Expand" data-toggle="collapse" data-target="#addsubcatdiv"><span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New SubCategory</span></a>
    <div id="addsubcatdiv" <?php if(isset($_SESSION['subcatError'])) { echo ""; } else{ echo 'class = "collapse"'; } ?>>
            <br><p class="text-success">Select the Item Category first then Add the New SubCategory</p>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-inline">
                    
                <div class="input-group col-xs-8" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
                <select class="form-control" id="subcat_cat" name="subcat_cat">
                <option selected disabled>Select Category</option>
                <?php 
                $sql="SELECT cat FROM itemcategories ORDER BY cat ASC";
                $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
                while($data=mysqli_fetch_array($row)){
                ?>
                <option value="<?php echo $data["cat"]; ?>"><?php echo $data["cat"]; ?></option> <?php } ?>       
                </select> </div><br>
             
                <div class="input-group col-xs-7 <?php if(isset($_SESSION['subcatError'])){ echo "has-error"; } else{ echo ""; }?>" >
                <input type="text" class="form-control" name="newsubcat" id="newsubcat" placeholder="Enter New Subcategory" <?php if(isset($_SESSION['SubCatYouEntered'])){ echo'value="'.$_SESSION['SubCatYouEntered'].'"';  } ?> required></div>
               <button type="submit" name="submitnewsubcat" id="submitnewsubcat" class="btn btn-success btn-sm ll" disabled>Submit</button></form>
               <?php if(isset($_SESSION['subcatError'])){?> 
            <div class="text-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['subcatError']; ?>
            <a href="cancel_newcat.php" title="Cancel" name="cancelCat" class="btn btn-warning btn-sm">QUIT</a>
            </div> <?php } ?>                    
         </div> <br>   
    <div class="w3-card-4">
    <header class="w3-container w3-light-grey">
    <h4 class="text-muted">Current Item SubCategories</h4></header>
    <div class="w3-container">
    <table class="table table-hover table-condensed" >
    <tr class="success">
    <th></t> <small>ID </small></th>
    <th> <small> SubCategory </small></th>
    <th> <small> Category </small></th>
    <th class="text-center"><small> ACTION </small> </th>
    </tr>
    <?php
    $sql="SELECT subcatid, subcat, itemcategory FROM itemsubcategories ORDER BY itemcategory ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));

    while($data=mysqli_fetch_array($row))
    {
    ?>
    <tr class="small">
    <td><?php echo $data["subcatid"]; ?></td>
    <td><?php echo $data["subcat"]; ?></td>
     <td><?php echo $data["itemcategory"]; ?></td>

    <?php echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletecat.php?subcatid=".$data["subcatid"]."' title='Delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td><tr>";?>
    </tr>
    <?php
    } ?> </table>
    </div>

    

    </div>
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
$(document).ready(
    function(){
        $('input:file').change( function(){ if ($(this).val()) { $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:  $('input:submit').removeAttr('disabled'); 
                }   }
        );})//706635
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
$(document).ready(function(){
  $("#addcatdiv").on("hide.bs.collapse", function(){
    $(".acoddcat").html('<span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New Category</span>');
  });
  $("#addcatdiv").on("show.bs.collapse", function(){
    $(".acoddcat").html('<span class="glyphicon glyphicon-minus pull-right" aria-hidden="true"> Add New Category</span>');   
  });
});
</script>
 <script>
$(document).ready(function(){
  $("#addsubcatdiv").on("hide.bs.collapse", function(){
    $(".acoddsubcat").html('<span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New Category</span>');
  });
  $("#addsubcatdiv").on("show.bs.collapse", function(){
    $(".acoddsubcat").html('<span class="glyphicon glyphicon-minus pull-right" aria-hidden="true"> Add New Category</span>');   
  });
});
</script>
<script>
 $("#newcat").on('keyup',function(){
  var regEx = /^[a-zA-Z\s]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewcat').attr('disabled', false); }           
        else{
            $('#submitnewcat').attr('disabled',true);}    
});
</script>
<script>
 $("#newsubcat").on('keyup',function(){
  var regEx = /^[a-zA-Z\s]*$/; 
 if(($(this).val().length > 1) && (regEx.test($(this).val())) && ($(this).val().trim().length >0) && ($( "select option:selected" ).text() != "Select Category")){
            $('#submitnewsubcat').attr('disabled', false); }           
        else{
            $('#submitnewsubcat').attr('disabled',true);}    
});

$( "select" ).change(function() {
 var regEx = /^[a-zA-Z\s]*$/;   
 $( "select option:selected" ).each(function() {
      if( ($(this).text() != "Select Category") && ($("#newsubcat").val().length > 1) && (regEx.test($("#newsubcat").val())) && ($("#newsubcat").val().trim().length >0) ){
      $('#submitnewsubcat').attr('disabled', false);    
      }
     else{ $('#submitnewsubcat').attr('disabled',true); }
    });
    }).trigger( "change" );
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