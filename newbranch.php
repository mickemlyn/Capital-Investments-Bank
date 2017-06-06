<?php
session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
require 'connections.php';
if(isset($_POST['submitnewbranch'])){
    $branchname=$_POST['branchname'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $postal=$_POST['postal'];
    $branchphone=$_POST['phone'];
    
    $q = mysqli_query($conn,"Select Branch from customer WHERE Branch='$branchname'");
    $exists = mysqli_num_rows($q); 
  if($exists > 0){
      $_SESSION['branchExistsError'] = $_SESSION['Error'] = "This Branch exists!";
      $_SESSION['BranchYouEntered'] = $branchname;
      $_SESSION['AddressYouEntered'] = $address;
      $_SESSION['CityYouEntered'] = $city;
      $_SESSION['CountryYouEntered'] = $country;
      $_SESSION['PostalYouEntered'] = $postal;
      $_SESSION['PhoneYouEntered'] = $branchphone;
        header("location: newbranch.php"); exit();
    }
   elseif(!preg_match("/^[a-zA-Z\s-]*$/",$branchname)){
    $_SESSION['Error'] = "Invalid Branch Name!"; 
    $_SESSION['BranchYouEntered'] = $branchname;
    $_SESSION['AddressYouEntered'] = $address;
    $_SESSION['CityYouEntered'] = $city;
    $_SESSION['CountryYouEntered'] = $country;
    $_SESSION['PostalYouEntered'] = $postal;
    $_SESSION['PhoneYouEntered'] = $branchphone;
    header("location: newbranch.php"); exit();
    }
  else{
     $sql="INSERT INTO customer (Branch, Address, City, Postal_code, Country,Branch_phone) VALUES('{$branchname}', '{$address}', '{$city}', '{$postal}', '{$country}', '{$branchphone}')";
     $sqlExec=mysqli_query($conn,$sql);
      $_SESSION['newbranchsuccess'] = "New Branch - ".$branchname." Added.";
      if(isset($_SESSION['Error'])){
        unset($_SESSION['Error']); }
      if(isset($_SESSION['BranchYouEntered'])){
        unset($_SESSION['BranchYouEntered']); }
      if(isset($_SESSION['branchExistsError'])){
        unset($_SESSION['branchExistsError']); } 
      if(isset($_SESSION['AddressYouEntered'])){
        unset($_SESSION['AddressYouEntered']); }  
      if(isset($_SESSION['CityYouEntered'])){
        unset($_SESSION['CityYouEntered']); }  
      if(isset($_SESSION['CountryYouEntered'])){
        unset($_SESSION['CountryYouEntered']); }  
      if(isset($_SESSION['PostalYouEntered'])){
        unset($_SESSION['PostalYouEntered']); }  
      if(isset($_SESSION['PhoneYouEntered'])){
        unset($_SESSION['PhoneYouEntered']); }  
}}
 ?>
<!DOCTYPE html>
<html>   
<head>
    <meta charset="utf-8"> 
    <title>Admin- Branches</title>
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
 
    
  <link href="navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
  <link rel="stylesheet" href="hover.css" >
  <link rel="stylesheet" href="uploader/global.css">
  <link href="bootstrap-3.3.6-dist/css/w3.css" rel="stylesheet" type="text/css"/>   
  <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
  </script>
  <script src="modernizr.js"></script>
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
/*absolute div*/
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
           
          <a class="navbar-brand" href="#" style="margin-top:0px;"><img src="Capital%20inestments%20bank%20brand.png" height="40" class="pull-left" ></a>
             </div> </div>
          <div class="col-xs-8">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
                <li><a href="admin.php">Home </a></li>
                <li ><a href="#about"> Orders </a></li>
               <li><a href="#">Suppliers</a></li>
                <li class="dropdown"><a href="viewusers.php" class="dropdown">Users <span class="caret"></span> </a>
               <div class="dropdown-content">
                    <a href="adduserform.php" target="_blank">Add User</a>
                    <a href="viewusers.php">View Users</a>
                    <a href="viewusers.php">Update Info</a>
                   <a href="viewusers.php">Delete User</a>
                   <a href="newbranch.php">New Branch</a>
                   
                    </div> </li> 
               <li class="active"><a href="adminprofile.php">Profile</a></li>
               <li><a href="#contact">Performance</a></li>
               <li><a href="#contact">Reports</a></li>
               <li><a href="logout.php" title="LogOut"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
            </ul>
        </div>
         </div>
        <!--/.navbar-collapse --> </nav> 
    <div class="content" id="spec">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.3)">
        <div class="row">
            <div class="col-sm-8"><h2  class="lead text-center" ><b>BRANCHES</b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;"><?php echo $_SESSION['user']; ?></small></b></h6> 
            </div>
           <?php if(isset($_SESSION['newbranchsuccess'])){ ?> <div class="absolute text-center" id="successfade">
            <div class="alert alert-success alert-dismissable" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! </strong><?php echo $_SESSION['newbranchsuccess']; ?>
        </div></div><?php } unset($_SESSION['newbranchsuccess']); ?>
        </div>
<div class="well text-muted">
             <p class="lead"> CIB Branches</p>
            <a class="acoddcat" href="#" title="Expand" data-toggle="collapse" data-target="#addcatdiv"><span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New Branch</span></a>
            <div id="addcatdiv" <?php if(isset($_SESSION['Error'])){ echo ""; } else{ echo 'class = "collapse"'; } ?>>
                
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-inline" >
                <div style="padding:10px;" class="input-group <?php if(isset($_SESSION['Error'])){ echo "has-error"; } else{ echo ""; }?>" ><span class="input-group-addon">Branch Name</span>
                <input type="text" class="form-control" name="branchname" id="branchname" placeholder="Enter New Branch Name" <?php if(isset($_SESSION['BranchYouEntered'])){ echo'value="'.$_SESSION['BranchYouEntered'].'"';  } ?> required></div>
                
                <div style="padding:10px;" class="input-group" ><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" class="form-control" name="address" id="address" placeholder="Branch Address - Location" <?php if(isset($_SESSION['AddressYouEntered'])){ echo'value="'.$_SESSION['AddressYouEntered'].'"';  } ?> required></div>
                
                <div style="padding:10px;" class="input-group" ><span class="input-group-addon">City</span>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" <?php if(isset($_SESSION['CityYouEntered'])){ echo'value="'.$_SESSION['CityYouEntered'].'"';  } ?> required></div>
                
                <div style="padding:10px;" class="input-group" ><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <input type="text" class="form-control" name="country" id="country" placeholder="Country" <?php if(isset($_SESSION['CountryYouEntered'])){ echo'value="'.$_SESSION['CountryYouEntered'].'"';  } ?> required></div>
                
                <div style="padding:10px;" class="input-group" ><span class="input-group-addon">Postal Address</span>
                <input type="text" class="form-control" name="postal" id="postal" placeholder="Enter Postal Address" <?php if(isset($_SESSION['PostalYouEntered'])){ echo'value="'.$_SESSION['PostalYouEntered'].'"';  } ?> required></div>
                
                <div style="padding:10px;" class="input-group" ><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Branch Phone" <?php if(isset($_SESSION['PhoneYouEntered'])){ echo'value="'.$_SESSION['PhoneYouEntered'].'"';  } ?> required maxlength="13"></div>
                
               <button type="submit" name="submitnewbranch" id="submitnewbranch" class="btn btn-success btn-sm ll" disabled>Submit</button></form>
               <?php if(isset($_SESSION['Error'])){?> 
            <div class="text-danger text-center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['Error']; ?>
            <a href="cancel_newbranch.php" title="Cancel" name="cancelCat" class="btn btn-warning">QUIT</a>
            </div> <?php } ?>    
        <div class="text-danger text-center" id="errorszote"></div>
    </div> <br>   
    <div class="w3-card-4">
    <header class="w3-container w3-light-grey">
    <h4 class="text-muted">Current CIB Branches</h4></header>
    <div class="w3-container">
    <table class="table table-hover table-condensed" >
    <tr class="success">
    <th> Branch_ID</th>
    <th> BRANCH NAME</th>
    <th> Address</th>
    <th> City </th>
    <th> Postal Adress</th>
    <th> Branch Phone</th>
    <th class="text-center"><small> ACTION </small> </th>
    </tr>
    <?php
    $sql="SELECT BranchId, Branch, Address, City, Postal_code, Branch_phone FROM customer ORDER BY Date_added ASC";
    $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));

    while($data=mysqli_fetch_array($row))
    {
    ?>
    <tr>
    <td><?php echo $data["BranchId"]; ?></td>
    <td><?php echo $data["Branch"]; ?></td>
    <td><?php echo $data["Address"]; ?></td>
    <td><?php echo $data["City"]; ?></td>
    <td><?php echo $data["Postal_code"]; ?></td>
    <td><?php echo $data["Branch_phone"]; ?></td>

    <?php echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletebranch.php?branchid=".$data["BranchId"]."' title='Delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td><tr>";?>
    </tr>
    <?php
    } ?> </table>
    </div>

    <p class="w3-button w3-block w3-dark-grey">&copy; Capital Investments Bank Admin</p>

    </div> 
</div>
        </div>
    </div>  
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
$(document).on("keyup", "div.has-error", function(){
    $(this).removeClass("has-error");
    $( "div.shida" ).fadeOut( "normal" );
});  
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
$(document).ready(function(){
  $("#addcatdiv").on("hide.bs.collapse", function(){
    $(".acoddcat").html('<span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"> Add New Branch</span>');
  });
  $("#addcatdiv").on("show.bs.collapse", function(){
    $(".acoddcat").html('<span class="glyphicon glyphicon-minus pull-right" aria-hidden="true"> Add New Branch</span>');   
  });
});
</script>
<script>
 $("#branchname").on('keyup',function(){
  var regEx = /^[a-zA-Z\s-]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewbranch').attr('disabled', false); $('#errorszote').html(''); }           
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect Branch Name. Kindly Fill Out Correctly'); }
        }    
});
</script>
<script>
 $("#address").on('keyup',function(){
  var regEx = /^[a-zA-Z0-9\s-,&]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewbranch').attr('disabled', false); $('#errorszote').html(''); }           
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect Location Address Format. Kindly Fill Out Correctly'); }
        }    
});
</script>
<script>
 $("#city").on('keyup',function(){
  var regEx = /^[a-zA-Z\s]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewbranch').attr('disabled', false); $('#errorszote').html(''); }           
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect City Name. Kindly Fill Out Correctly');
        }  }  
});
</script>
<script>
 $("#country").on('keyup',function(){
  var regEx = /^[a-zA-Z]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewbranch').attr('disabled', false); $('#errorszote').html(''); }           
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect Country Name. Kindly Fill Out Correctly'); } }   
});
</script>
<script>
 $("#postal").on('keyup',function(){
  var regEx = /^[a-zA-Z0-9\s-.]*$/; 
 if(($(this).val().length > 2) && (regEx.test($(this).val())) && ($(this).val().trim().length >0)){
            $('#submitnewbranch').attr('disabled', false); $('#errorszote').html(''); }           
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect Postal Address Format. Kindly Fill Out Correctly'); }  }
});
</script>
<script>
 $("#phone").on('keyup',function(){
  var regEx = /^[0-9+]*$/; 
 if(($(this).val().length > 3) && (regEx.test($(this).val())) && ($(this).val().length < 13)){
    $('#submitnewbranch').attr('disabled', false);
     $('#errorszote').html('');
     }        
             
        else{
            $('#submitnewbranch').attr('disabled',true);
            if(($(this).val().length <3)){
             $('#errorszote').html(''); }
            else{ $('#errorszote').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span> <span class="sr-only"> Error:</span> Incorrect Office Phone Format. Kindly Fill Out Correctly');
        
        }  }  
});
</script>
</body>
</html>
<?php }
else{
    //checking errors in page  and unset them
      if(isset($_SESSION['Error'])){
        unset($_SESSION['Error']); }
      if(isset($_SESSION['BranchYouEntered'])){
        unset($_SESSION['BranchYouEntered']); }
      if(isset($_SESSION['branchExistsError'])){
        unset($_SESSION['branchExistsError']); } 
      if(isset($_SESSION['AddressYouEntered'])){
        unset($_SESSION['AddressYouEntered']); }  
      if(isset($_SESSION['CityYouEntered'])){
        unset($_SESSION['CityYouEntered']); }  
      if(isset($_SESSION['CountryYouEntered'])){
        unset($_SESSION['CountryYouEntered']); }  
      if(isset($_SESSION['PostalYouEntered'])){
        unset($_SESSION['PostalYouEntered']); }  
      if(isset($_SESSION['PhoneYouEntered'])){
        unset($_SESSION['PhoneYouEntered']); } 
    
    unset($_SESSION['user']);
    unset($_SESSION['LAST_ACTIVITY']);
    $_SESSION['notloggederror'] = "Kindly log in to proceed!";
    header("location: index.php");
    exit();
}
?>