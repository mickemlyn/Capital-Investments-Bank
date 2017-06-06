<?php session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
    require 'connections.php';
    // define variables and set to empty values
    $Username = $Pw = $Userlevel = $Email = $FName = $LName = "";
    
    if(isset($_POST['Register'])){
        $Username = ($_POST['Username']);
        $Pw = ($_POST['Password']);
        $encpw=md5($Pw);
        $Userlevel = ($_POST['UserLevel']);
        $Email=$_POST['Email'];
        $FName=$_POST['Fname'];
        $LName=$_POST['Lname'];
         
       //$check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$Username'");
    $q = mysqli_query($conn,"Select username from users WHERE BINARY username='$Username'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0){
        
     $_SESSION['UsernameExistsError'] = $_SESSION['Error'] = "This Username  exists !";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                if(isset($_SESSION['EmailError'])){ unset($_SESSION['EmailError']);}
                
                if(isset($_SESSION['PasswordError'])){ unset($_SESSION['PasswordError']);}
        
                header("location: adduserform.php");
                    
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
                  unset($_SESSION['UsernameExistsError']); }
                header("location: adduserform.php");
            }  
            elseif(strlen($Pw) < '6'){
              $_SESSION['PasswordError'] = "Your Password Must Contain At Least 6 Characters!";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                
                header("location: adduserform.php");   
            }
       elseif(!preg_match("#[0-9]+#",$Pw)) {
            $_SESSION['PasswordError'] = "Your Password Must Contain At Least 1 Number!";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                
                header("location: adduserform.php");}
        
      else{
        
          $sql="INSERT INTO users (username,password,userLevel,email,fName,lName) VALUES('{$Username}','{$encpw}','{$Userlevel}','{$Email}','{$FName}','{$LName}')";
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
          
            echo "<script>window.close();</script>";
         }}
    }
       
     

?>
<!DOCTYPE html>
<html>
<head>
    <title>CIB - Add User</title>
    <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="bootstrap-3.3.6-dist/css/signin.css" rel="stylesheet" type="text/css"/>
    <link type="text/css" href="bootstrap-3.3.6-dist/css/cover.css" rel="stylesheet"/>
     <style type="text/css">
    
body { 
  background: url(slide1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

    </style>
<script type="text/javascript" src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="inner cover">
            
              <div class="panel panel-default">
            <div class="panel-heading"> <img src="Capital%20inestments%20bank%20brand.png" width="654"> </div>
            <div class="panel-body">
              <div class="lead pull-left" style="color:#083B4C;"><small>Add User</small></div>
                <div class=" text-center text-danger" >Fields marked * are compulsory</div>
                
                <?php if(isset($_SESSION['Error'])){?>
                <span class="alert alert-danger fade in alert-dismissable pull-right" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Error:</span><?php echo
                $_SESSION['Error'];
                                                    
                } 
                   ?></span>
                
               
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="RegisterForm" id="RegisterForm" class="form-signin">
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['UsernameExistsError'])){ echo "has-error"; } else{ echo ""; }?> ">
                    <input type="text" class="form-control" name="Username" class="TField" id="Username" placeholder="Username" <?php if(isset($_SESSION['UsernameYouEntered'])){ echo'value="'.$_SESSION['UsernameYouEntered'].'"'; } ?> required>
                 <span style="color:red;"for="Username">*</span>
                    </div>
                
                    <div class="form-group form-inline <?php if(isset($_SESSION['PasswordError'])){ echo "has-error"; } else{ echo ""; }?> ">     
                    <input type="password" class="form-control" name="Password"  class="TField" id="Password" placeholder="Password" min="4" required><span style="color:red;"for="Password"> * </span>     </div>
                <?php if(isset($_SESSION['PasswordError'])){?> 
                       <div class="small text-center text-danger"> <?php echo $_SESSION['PasswordError'];?> 
                </div> <?php } 
    
                else{   ?>
                <div class="small text-center text-muted" > Your Password Must Contain Atleast 6 characters & Atleast 1 Number ! </div>
                    
               <?php } ?>
                    
                
                    <div class="form-group form-inline" style="padding-left:15px;">
                    <input type="number" class="form-control" name="UserLevel" class="TField" id="UserLevel" placeholder="UserLevel - 1,2,3,4,5" <?php if(isset($_SESSION['UserLevelYouEntered'])){ echo'value="'.$_SESSION['UserLevelYouEntered'].'"';  } ?> required maxlength="1" max="5" min="1"> <span style="color:red; "for="UserLevel">*</span>
                    </div>
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['EmailError'])){ echo "has-error"; } else{ echo ""; }?> "> 
                    <input type="email" class="form-control" name="Email" class="TField" id="Email" placeholder="Email" <?php if(isset($_SESSION['EmailYouEntered'])){ echo'value="'.$_SESSION['EmailYouEntered'].'"';  } ?> required>
                     <span style="color:red;"for="mail">*</span>
                    </div>
                    
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Fname" class="TField" id="Fname" placeholder="First Name" <?php if(isset($_SESSION['FnameYouEntered'])){ echo'value="'.$_SESSION['FnameYouEntered'].'"';  } ?> required pattern="[A-Za-z\\s]*">
                    <span style="color:red;"for="Fname">*</span>
                    </div>
                
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Lname" class="TField" id="Lname" placeholder="Last Name" <?php if(isset($_SESSION['LnameYouEntered'])){ echo'value="'.$_SESSION['LnameYouEntered'].'"';  } ?> pattern="[A-Za-z\\s]*">
                   
                    </div>
                   
                    <div class="form-group">
                    <input type="submit" class="btn btn-info btn-primary pull-right" name="Register" value="Register User" >
                    
                    </div>
                </form>
                    </div>
                
            <div class="panel-footer" style="color:#083B4C;"><small>&copy; Capital Investment Bank </small></div>
            </div>      
          </div>
          </div>
        </div>
    </div>
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