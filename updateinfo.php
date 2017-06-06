<?php
session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
 
     require 'connections.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "Select * from users WHERE userId = $id";
    $exec = mysqli_query($conn,$sql);
    while($thisrow = mysqli_fetch_assoc($exec)){
    $_SESSION['userId_update'] = $thisrow['userId'];
    $_SESSION['username_update'] = $thisrow['username'];
    $_SESSION['userLevel_update'] = $thisrow['userLevel'];
    $_SESSION['password_update'] = $thisrow['password'];
    $_SESSION['email_update'] = $thisrow['email'];
    $_SESSION['fname_update'] = $thisrow['fName'];
    $_SESSION['lname_update'] = $thisrow['lName'];
    }
}
  
    // define variables and set to empty values
    $Username = $Pw = $Userlevel = $Email = $FName = $LName = "";
    
    if(isset($_POST['Update'])){
        $Username = ($_POST['Username']);
        $Pw = ($_POST['Password']);
        //check if password field is empty
        if(!empty($Pw)){
           $encpw=md5($Pw);
        }
        else{
          $encpw = $_SESSION['password_update']; 
        }
        
        $Userlevel = ($_POST['UserLevel']);
        $Email=$_POST['Email'];
        $FName=$_POST['Fname'];
        $LName=$_POST['Lname'];
         
       //$check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$Username'");
    $q = mysqli_query($conn,"Select username from users WHERE BINARY username='$Username'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $Username != $_SESSION['username_update'] ){
        
     $_SESSION['UsernameExistsError'] = $_SESSION['Error'] = "This Username  exists !";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                if(isset($_SESSION['EmailError'])){ unset($_SESSION['EmailError']);}
                
                if(isset($_SESSION['PasswordError'])){ unset($_SESSION['PasswordError']);}
        
                header("location: updateinfo.php");
                    
            }
    else{
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['EmailError'] = $_SESSION['Error'] =  "Invalid email format";
            $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                if(isset($_SESSION['PasswordError'])){ unset($_SESSION['PasswordError']);}
            
                if(isset($_SESSION['UsernameExistsError'])){
                  unset($_SESSION['UsernameExistsError']);  
                }
                header("location: updateinfo.php");
            }  
            elseif(!empty($Pw) && strlen($Pw) < '6' ){
              $_SESSION['PasswordError'] = "Your Password Must Contain At Least 6 Characters!";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                
                header("location: updateinfo.php");   
            }
       elseif(!empty($Pw) && !preg_match("#[0-9]+#",$Pw)) {
            $_SESSION['PasswordError'] = "Your Password Must Contain At Least 1 Number!";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                
                header("location: updateinfo.php");}
        
      else{
        
          $sql = "UPDATE users SET username = '{$Username}' , password = '{$encpw}' , userLevel = '{$Userlevel}'  , email = '{$Email}' , fName = '{$FName}' , lName = '{$LName}', profileChange = CURRENT_TIMESTAMP WHERE userId = '{$_SESSION['userId_update']}'";
            $sqlExec=mysqli_query($conn,$sql);
        
            unset($_SESSION['UsernameExistsError']);
            unset($_SESSION['UsernameYouEntered']);
            unset($_SESSION['UserLevelYouEntered']);
            unset($_SESSION['EmailYouEntered']);
            unset($_SESSION['FnameYouEntered']);
            unset($_SESSION['LnameYouEntered']);
            unset($_SESSION['PasswordError']);
            unset($_SESSION['EmailError']);     
            unset($_SESSION['Error']);
          
          //unset users session variables 
          unset($_SESSION['userId_update']);
          unset($_SESSION['username_update']);
          unset($_SESSION['userLevel_update']);
          unset($_SESSION['password_update']); 
          unset($_SESSION['email_update']);
          unset($_SESSION['fname_update']);
          unset($_SESSION['lname_update']);
          
           header("location: viewusers.php");  
         }}
    }

?>
<!DOCTYPE html>
<html>   
<head>
    <title>CAPITAL INVESTMENTS BANK</title>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    
    <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    
    <link href="navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
    
    <link href="tooltip.css" rel="stylesheet" type="text/css"/>

    
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
                <li class="active"><a href="admin.php">Home </a></li>
                <li ><a href="#about"> Orders </a></li>
               <li><a href="#">Suppliers</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown">Users <span class="caret"></span> </a>
               <div class="dropdown-content">
                    <a href="adduserform.php" target="_blank">Add User</a>
                    <a href="viewusers.php">View Users</a>
                    <a href="viewusers.php">Update Info</a>
                   <a href="viewusers.php">Delete User</a>
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
                echo $_SESSION['user']; 
	 ?></small></b></h6> 
            </div>
            </div>
            
                <div class="row">
                    <div class="col-xs-2"></div>
                 <div class="col-xs-7">
                          <div class="panel panel-default">
            <div class="panel-heading lead" style="color:#083B4C;"> <img src="logo/CIB%20MIXIVA%20FLAME.png" height="40"> Update User</div>
            <div class="panel-body">
        
                <div class=" text-center text-danger" style="margin-bottom:10px;">Fields marked * are compulsory</div>
                
               
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="RegisterForm" id="RegisterForm" class="form-signin">
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['UsernameExistsError'])){ echo "has-error"; } else{ echo ""; }?> ">
                    <input type="text" class="form-control" name="Username" class="TField" id="Username" placeholder="Username" <?php if(isset($_SESSION['username_update'])){ echo'value="'.$_SESSION['username_update'].'"'; } ?> required>
                 <span style="color:red;"for="Username">*</span>
                <?php if(isset($_SESSION['Error'])){?>
                <span class="alert alert-danger" role="alert" >
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Error:</span><?php echo
                $_SESSION['Error']; } ?>
                </span> </div>
  
                    <div class="form-group form-inline <?php if(isset($_SESSION['PasswordError'])){ echo "has-error"; } else{ echo ""; }?> ">     
                    <input type="password" class="form-control TField" name="Password" id="Password" placeholder="Password" min="4"  > <span for="Password" class="text-center text-warning">Fill only if you would like to change the current password </span>     </div>
                
                    
                     
                <?php if(isset($_SESSION['PasswordError'])){?> 
                       <div class="small text-danger"> <?php echo $_SESSION['PasswordError'];?> 
                </div> <?php } 
    
                else{   ?>
                <div class="small text-muted" > Your Password Must Contain Atleast 6 characters & Atleast 1 Number ! </div>
                    
               <?php } ?>
                    
                
                    <div class="form-group form-inline">
                    <input type="number" class="form-control" name="UserLevel" class="TField" id="UserLevel" placeholder="UserLevel - 1,2,3,4" <?php if(isset($_SESSION['userLevel_update'])){ echo'value="'.$_SESSION['userLevel_update'].'"';  } ?> required maxlength="1" max="4" min="1"> <span style="color:red; "for="UserLevel">*</span>
                    </div>
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['EmailError'])){ echo "has-error"; } else{ echo ""; }?> "> 
                    <input type="email" class="form-control" name="Email" class="TField" id="Email" placeholder="Email" <?php if(isset($_SESSION['email_update'])){ echo'value="'.$_SESSION['email_update'].'"';  } ?> required>
                     <span style="color:red;"for="mail">*</span>
                    </div>
                    
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Fname" class="TField" id="Fname" placeholder="First Name" <?php if(isset($_SESSION['fname_update'])){ echo'value="'.$_SESSION['fname_update'].'"';  } ?> required pattern="[A-Za-z\\s]*">
                    <span style="color:red;"for="Fname">*</span>
                    </div>
                
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Lname" class="TField" id="Lname" placeholder="Last Name" <?php if(isset($_SESSION['lname_update'])){ echo'value="'.$_SESSION['lname_update'].'"';  } ?> pattern="[A-Za-z\\s]*">
                   
                    </div>
                   
                    <div class="form-group">
                    <input type="submit" class="btn btn-info" name="Update" value="Update" >
                    
                    </div>
                </form>
                    </div>
                       
            <div class="panel-footer" style="color:#083B4C;"><small>&copy; Capital Investment Bank </small></div>
            </div>
            </div> 
                    
            </div> 
                    <div class="col-xs-3"> </div>

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