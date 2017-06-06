<?php
session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
 ?>
<!DOCTYPE html>
<html>   
<head>
    <title>CAPITAL INVESTMENTS BANK</title>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    
    <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    
    <link href="navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >

    
<style type="text/css">
   
     a.back-to-top {
	display: none;
	width: 50px;
	height: 50px;
	text-indent: -9999px;
	position: fixed;
	z-index: 999;
	right: 20px;
	bottom: 20px;
	background: #27AE61 url("up-arrow.png") no-repeat center 43%;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
}
a:hover.back-to-top {
	background-color: #000;
}

.content{
    
        height: auto;
    color: white;
    background-color:#083B4C;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGUlEQVQ4y2NgoBJwoJAedcGoC0ZdMOAuAABF0hABJ/8lyQAAAABJRU5ErkJggg==);
  background-attachment: fixed;
    padding-top: 30px;
    }
    

 .hovv:hover{
     border:5px solid #fd0000;}
 .hov1:hover{
    border:5px solid #36b44a;
}
 .hov2:hover{
    border:5px solid #004f8c;
}  
 .hov3:hover{
    border:5px solid #ffff00;
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
        </div>
          </div>
          <div class="col-xs-8">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
                <li ><a href="admin.php">Home </a></li>
                <li ><a href="#about"> Orders </a></li>
               <li><a href="#">Suppliers</a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown">Users <span class="caret"></span> </a>
               <div class="dropdown-content">
                    <a href="adduserform.php" target="_blank">Add User</a>
                    <a href="#">View Users</a>
                    <a href="#">Update Info</a>
                   <a href="#">Delete User</a>
                   <a href="newbranch.php">New Branch</a>

                    </div>     
               </li> 
               <li><a href="adminprofile.php">Profile</a></li>
               <li><a href="#contact">Performance</a></li>
               <li><a href="#contact">Reports</a></li>
               <li><a href="logout.php" title="LogOut"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
            </ul>
        </div>
         </div>
          
              <!--/.navbar-collapse -->
        </nav>
    
    
    <div class="content" id="spec">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.3)">
        <div class="row">
            <div class="col-sm-8"><h2  class="lead text-center" ><b>ADMIN  - USER INFORMATION </b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;">  <?php 
                echo $_SESSION['user']; include('connections.php');
	  $sql="SELECT userId, username, userLevel, email, fName, lName FROM users ORDER BY userLevel ASC, signupDate ASC";
	  $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
	 ?></small></b></h6> 
            </div>
            </div>
            
        <div class="well" style="color:black;">
        <table class="table table-hover table-condensed table-bordered table-responsive" >
        <tr class="success lead">
        <th> <small> USER_ID </small></th>
        <th> <small> USERNAME </small></th>
        <th> <small> USERLEVEL </small></th>
        <th> <small> EMAIL </small></th>
        <th> <small> FIRST NAME </small></th>
        <th> <small> LAST NAME </small></th>
        <th colspan="2" class="text-center"><small> ACTION </small> </th>
        </tr>
	  <?php
	  
	  while($data=mysqli_fetch_array($row))
	  {
	  ?>
	  <tr>
	  <td><?php echo $data["userId"]; ?></td>
	  <td><?php echo $data["username"]; ?></td>
	  <td><?php if($data["userLevel"] == 1){
          echo "Procurement Officer";
      } 
          elseif($data["userLevel"] == 2){
          echo "Admin";
      }
           elseif($data["userLevel"] == 3){
          echo "Supplier";
      }
           elseif($data["userLevel"] == 4){
          echo "Approver";
      }
          elseif($data["userLevel"] == 5){
          echo "Finance Officer";
      }
           ?></td>
          
	  <td><?php echo $data["email"]; ?></td>
	  <td><?php echo $data["fName"]; ?></td>
	  <td><?php echo $data["lName"]; ?></td>
	  <td><a href="updateinfo.php?id=<?php echo $data["userId"];  ?>" title="Edit" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
   
       
   <?php echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deleteuser.php?id=".$data["userId"]."' title='Delete User'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td><tr>";?>
          
	  </tr>
	  <?php
	  }
	  
	  
	  ?>
	  </table>
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

<script type="text/javascript">
// create the back to top button
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    
  <script>window.jQuery || document.write('<script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js"><\/script>')</script>
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php }
else{
    unset($_SESSION['user']);
    unset($_SESSION['LAST_ACTIVITY']);
    
  $_SESSION['notloggederror'] = "Kindly log in to proceed!";
    header("location: index.php");
    exit();
}
?>