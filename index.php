<?php session_start();?>
<! doctype html>
<html>
<head>
    <title>CIB</title>
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

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Capital Investments Bank e-procurement</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#"> Login</a>
              </a> 
                    </li>
                  
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            
              <div class="panel panel-default">
            <div class="panel-heading"> <img src="Capital%20inestments%20bank%20brand.png" width="654"> </div>
            <div class="panel-body">
              <p class="lead pull-left" style="color:#083B4C;"><small>User Login</small></p>
               <p class="text-center text-danger" ><?php if(isset($_SESSION['notloggederror'])){echo 
                $_SESSION['notloggederror'];
                unset($_SESSION['notloggederror']);
                } 
                   else{echo"";}
                   ?></p> 
            <form action="login.php" method="post" name="RegisterForm" id="RegisterForm" class="form-signin">
                    
                    <div class="form-group">
                    <input type="text" class="form-control" name="Username" class="TField" id="Username" placeholder="Username" <?php if(isset($_SESSION['failedUsername'])){ ?>  <?php echo'value="'.$_SESSION['failedUsername'].'"'; unset($_SESSION['failedUsername']);
                    } ?> required autofocus>
                    </div>
                    
                    <div class="form-group">        
                    <input type="password" class="form-control" name="Password"  class="TField" id="Password" placeholder="Password" required>
                    </div>
                    <div style="color:red;"><?php if(isset($_SESSION['loginError'])){echo 
                $_SESSION['loginError'];} 
                   else{echo"";}
                   ?></div>
                
                    <div class="form-group">
                    <input type="submit" class="btn btn-info btn-primary pull-right" name="login" value="LOGIN" class="button">
                    
                    </div>
                </form>
                    </div>
                
            
            <div class="panel-footer" style="color:#083B4C;"><small>&copy; Capital Investment Bank </small></div>
            </div>
              
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Capital Investments Bank<br/><small>&copy; e-Procurement system by @Mickemlyn & Yowmy</small></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    
   

</body>
</html>