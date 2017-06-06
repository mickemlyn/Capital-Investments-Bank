
<?php session_start();
require 'connections.php';
if(isset($_POST['Register'])){
        $Username=$_POST['Username'];
        $Pw=$_POST['Password'];
        $encpw=md5($Pw);
        $Userlevel=$_POST['UserLevel'];
        $Email=$_POST['Email'];
        $FName=$_POST['Fname'];
        $LName=$_POST['Lname'];
       
        
       //$check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$Username'");
    $q = mysqli_query($conn,"Select * from users WHERE BINARY username='$Username'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0){
        
                $_SESSION['UsernameExistsError'] = "Username already exists !";
                $_SESSION['UsernameYouEntered'] = $Username;
                $_SESSION['UserLevelYouEntered'] = $Userlevel;
                $_SESSION['EmailYouEntered'] = $Email;
                $_SESSION['FnameYouEntered'] = $FName;
                $_SESSION['LnameYouEntered'] = $LName;
                
                header("Refresh:0");
                
                
                
            }
    else{
          $sql="INSERT INTO users (username,password,userLevel,email,fName,lName) VALUES('{$Username}','{$encpw}','{$Userlevel}','{$Email}','{$FName}','{$LName}')";
            $sqlExec=mysqli_query($conn,$sql);
            echo "<script>window.close();</script>";
         }
    }
       
     

?>
<! doctype html>
<html>
<head>
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
               <p class="text-center text-danger" ><?php if(isset($_SESSION['UsernameExistsError'])){echo 
                $_SESSION['UsernameExistsError'];
                unset($_SESSION['UsernameExistsError']);
                session_destroy();} 
                   else{echo"";}
                   ?></p> 
            <form method="post" action="<?$_SERVER['PHP_SELF']?>"  name="RegisterForm" id="RegisterForm" class="form-signin">
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['UsernameExistsError'])){ echo "error"; } else{ echo ""; }?> ">
                    <label style="color:red;"for="Username">*</label>
                    <input type="text" class="form-control" name="Username" class="TField" id="Username" placeholder="Username" <?php if(isset($_SESSION['UsernameYouEntered'])){ echo'value="'.$_SESSION['UsernameYouEntered'].'"'; } ?> required>
                    </div>
                
                    <div class="form-group form-inline">
                    <label style="color:red;"for="Password">*</label>     
                    <input type="password" class="form-control" name="Password"  class="TField" id="Password" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group form-inline">
                    <label style="color:red;"for="UserLevel">*</label>
                    <input type="text" class="form-control" name="UserLevel" class="TField" id="UserLevel" placeholder="UserLevel - 1,2,3,4" <?php if(isset($_SESSION['UserLevelYouEntered'])){ echo'value="'.$_SESSION['UserLevelYouEntered'].'"';  } ?> required>
                    </div>
                    
                    <div class="form-group form-inline">
                    <label style="color:red;"for="mail">*</label>
                    <input type="email" class="form-control" name="Email" class="TField" id="Email" placeholder="Email" <?php if(isset($_SESSION['EmailYouEntered'])){ echo'value="'.$_SESSION['EmailYouEntered'].'"';  } ?> required>
                    </div>
                    
                    <div class="form-group form-inline">
                    <label style="color:red;"for="Fname">*</label>
                    <input type="text" class="form-control" name="Fname" class="TField" id="Fname" placeholder="First Name" <?php if(isset($_SESSION['FnameYouEntered'])){ echo'value="'.$_SESSION['FnameYouEntered'].'"';  } ?> required>
                    </div>
                
                    <div class="form-group form-inline">
                    <label style="color:red;"for="Username"></label>
                    <input type="text" class="form-control" name="Lname" class="TField" id="Lname" placeholder="Last Name" <?php if(isset($_SESSION['LnameYouEntered'])){ echo'value="'.$_SESSION['LnameYouEntered'].'"';  } ?> >
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