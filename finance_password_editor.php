<?php
session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        require 'connections.php';
if(isset($_POST['submitpassword'])){
if(isset($_SESSION['passwordError'])){
 unset($_SESSION['passwordError']);}
if(isset($_SESSION['CurrentPassYouEntered'])){
 unset($_SESSION['CurrentPassYouEntered']);}
if(isset($_SESSION['newpasswordError'])){
 unset($_SESSION['newpasswordError']);}
if(isset($_SESSION['confirmpasswordError'])){
 unset($_SESSION['confirmpasswordError']);}    
  
 $currentpassword = $_POST['currentpassword'];
 $newpassword = $_POST['newpassword'];
 $confirmpassword = $_POST['confirmpassword'];
 $encurrent=md5($currentpassword); 
 $encnew=md5($newpassword);

  
$useridQuery = mysqli_query($conn,"Select * from users WHERE BINARY username ='{$_SESSION['user']}'");
$row = mysqli_fetch_assoc($useridQuery);
$userid =$row['userId'];
$userpass =$row['password'];

if($encurrent != $userpass){
 $_SESSION['passwordError'] = "Your Current Password was Incorrect!";
 $_SESSION['CurrentPassYouEntered'] = $currentpassword;
 header("location: finance_password_editor.php"); exit();
}
else{         
 if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/",$newpassword)){
  $_SESSION['passwordError'] = $_SESSION['newpasswordError'] = "New Password Does not match Required Password Rules!";
  header("location: finance_password_editor.php"); exit();   
 }
 elseif($newpassword == $userpass){
 $_SESSION['passwordError'] = $_SESSION['newpasswordError'] = "No changes In Password";
  header("location: finance_password_editor.php"); exit();       
 }
 elseif($confirmpassword != $newpassword){
 $_SESSION['passwordError'] = $_SESSION['confirmpasswordError'] = "Confirmation on the new Password Failed. Please Retry!";
  header("location: finance_password_editor.php"); exit();       
 }
else{
$sql = "UPDATE users SET password = '{$encnew}' , profileChange = CURRENT_TIMESTAMP WHERE userId = '{$userid}'";
$sqlExec=mysqli_query($conn,$sql);
$_SESSION['PasswordChangeSuccess'] = "Yes";
    
if(isset($_SESSION['passwordError'])){
 unset($_SESSION['passwordError']);}
if(isset($_SESSION['CurrentPassYouEntered'])){
 unset($_SESSION['CurrentPassYouEntered']);}
if(isset($_SESSION['newpasswordError'])){
 unset($_SESSION['newpasswordError']);}
if(isset($_SESSION['confirmpasswordError'])){
 unset($_SESSION['confirmpasswordError']);}
    
header("location: finance_profile.php"); exit();   
}  
}}
 ?>
<!DOCTYPE html>
<html>   
<head>
    <meta charset="utf-8"> 
    <title>Finance Officer Profile</title>
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
 
    
  <link href="navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
  <link rel="stylesheet" href="hover.css" >
  <link rel="stylesheet" href="uploader/global.css">
    
  <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
  </script>
  <script src="modernizr.js"></script>
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

/*absolute div*/
    div.absolute {
    position: absolute;
    width: 550px;
    margin: auto;
     left: 42%;
}
 </style>
<script>// hover menu over image 
    $(document).ready(function(){
        if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".img").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
             $(this).closest(".img").removeClass("hover");
                }   });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){ $(this).removeClass("hover"); }); } 
    });
</script>
<script>
$(document).ready(
    function(){
        $('input:file').change( function(){ if ($(this).val()) { $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:  $('input:submit').removeAttr('disabled'); 
                }   }
        );})
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
           
          <a class="navbar-brand" href="#" style="margin-top:0px;"><img src="Capital%20inestments%20bank%20brand.png" height="40" class="pull-left" ></a>
             </div> </div>
          <div class="col-xs-8">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
                <li><a href="finance.php">Home </a></li>
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
               <li class="active"><a href="finance_profile.php">Profile</a></li>
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
            <div class="col-sm-8"><h2  class="lead text-center" ><b>FINANCE OFFICER PROFILE</b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded" style="height:45px;"><?php echo $_SESSION['user']; ?></small></b></h6> 
            </div>
           <?php if(isset($_SESSION['PasswordChangeSuccess'])){ ?> <div class="absolute text-center" id="successfade">
            <div class="alert alert-success alert-dismissable" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Your Password has been Changed
        </div></div><?php } unset($_SESSION['PasswordChangeSuccess']) ?>
        </div>

<!-- Use any element to open the sidenav -->
<span style="font-size: 20px;"> <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Change Password</span>
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <div class="well">
                
                <div class="row"> <div class="col-sm-3">
                <p class="lead text-muted"> Profile Picture</p> </div>
                 <div class="col-sm-9">
                     <ol class="breadcrumb">
                        <li><a href="#" id="triggerlink" title="change profile picture">Profile Pic</a></li>
                        <li><a href="finance_profile.php">Email</a></li>
                        <li><a href="finance_profile.php">Phone</a></li>
                        <li><a href="finance_profile.php">Bio</a></li> 
                        <li class="active">Password</li>
                      </ol>
                        </div>
                    </div>
                    
             <div class="row text-muted">   
                <div class="col-sm-3">
                    <div id="pp">
                <div id="effect-5" class="effects clearfix">
                    <div class="img">
                        <img src="<?php echo $_SESSION['profilePic']?>" class="img-rounded">
                        <div class="overlay">
                        <a href="#" id="triggerButton" title="change profile picture" class="expand"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> </span></a>
                        <a class="close-overlay hidden">x</a>
                        </div>
                    </div> 
                    </div>
                    </div>
                    </div>
                 
                <!--APA-->
<div id="div1">
 <div class="col-sm-8">
                
    <div class="panel panel-info"  >
        <div class="panel-heading">
        <div class="panel-title">Change Your Password</div>
        </div>     
      <div style="padding-top:30px" class="panel-body" >
          <p class="text-center text-muted">Your Password Must be Atleast 6 characters( Atleast 1 Number and letters  )</p>
        <form id="passwordform" method="post" name="passwordform" role="form" class="form-horizontal form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-xs-3">
                <div class=" control-label"><label>Current Password</label></div></div>
                <div class="col-xs-9">
                <div class="input-group <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo "has-error"; }?>"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" name="currentpassword" id="currentpassword" placeholder="Enter Current Password" <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo'value="'.$_SESSION['CurrentPassYouEntered'].'"'; } ?> required><span class="input-group-addon" id="checkcurrent" title="Show Password"><i class="glyphicon glyphicon-eye-open" style="cursor:pointer; cursor:hand;"></i></span>
                </div>
                <?php if(isset($_SESSION['CurrentPassYouEntered'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Old Password Error:</span><?php echo $_SESSION['passwordError'] ;?></div><?php }  ?>
                </div>
            </div>
            <div class="row" style="margin-bottom: 15px">
                <div class="col-xs-3">
                <div class=" control-label"><label>New Password</label></div> 
                </div>
                <div class="col-xs-9">
                <div class="input-group <?php if(isset($_SESSION['newpasswordError'])){ echo "has-error"; }?>"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="Enter The New Password" required><span class="input-group-addon" id="checknew"></span></div>
                <?php if(isset($_SESSION['newpasswordError'])){?>
                <div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">New Password Error:</span><?php echo $_SESSION['newpasswordError']; ?></div><?php }  ?></div>
            </div>
            <div class="row" style="margin-bottom: 15px">
               <div class="col-xs-3">
               <div class=" control-label"><label>Confirm Password</label></div> 
                </div>
                <div class="col-xs-9">
                <div class="input-group <?php if(isset($_SESSION['confirmpasswordError'])){ echo "has-error"; }?>"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter New Password Again!" required><span class="input-group-addon" id="checkconfirm"></span></div>
                <?php if(isset($_SESSION['confirmpasswordError'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Password Error:</span><?php echo $_SESSION['confirmpasswordError'] ; ?></div><?php }  ?>
                </div>
            </div>
            <div class="row"> <div class="col-xs-3"></div>
            <div class="col-xs-9"> <div class="input-group">
            <button type="submit" id="submitpassword" name="submitpassword" class="btn btn-success" disabled>Change Password</button> </div></div>
            </div>
         </form></div>    
         
<div class="panel-footer text-center" style="color:#083B4C;"><small >&copy; Capital Investment Bank </small></div>
        </div>  
        </div>
                
     <!--APA--> </div>
        
    <!--div ya pili-->
    <div id="div2" style="display: none" >
    <div class="col-sm-8">   
        <form action="upload.php" method="post" enctype="multipart/form-data" id="upload" class="form-group upload">
        <fieldset>
          <legend class="lead text-muted">Upload New profile Pic</legend>
            <span class="btn btn-default btn-file">Select Image <input type="file" id="file" name="file[]"> </span>
        
    <input type="submit" id="submit" name="submit" class="btn btn-info" value="Upload" disabled>
    </fieldset>
      <div class="bar">
      <span class="bar-fill" id="pb">
      <span class="bar-fill-text" id="pt"></span></span>
      </div>
      <div id="uploads" class="uploads">Uploaded file will appear here: <a href="finance_profile.php" class="btn btn-default pull-right" role="button">Cancel</a></div>
      

<script> document.getElementById('submit').addEventListener('click',function(e){      e.preventDefault();
          var f = document.getElementById('file'),
              pb = document.getElementById('pb'),
              pt = document.getElementById('pt');
          app.uploader({
              files: f,
              progressBar:pb,
              progressText:pt,
              processor: 'upload.php',
              finished: function(data) {
                  var uploads = document.getElementById('uploads'),
                      succeeded = document.createElement('div'),
                      failed = document.createElement('div'),
                      anchor,
                      span, 
                      x;
                  if(data.failed.length){
                      failed.innerHTML = '<p class = "text-danger">Unfortunately, The following failed: </p>';
                      
                  }
                  uploads.innerText = '';
                  for(x=0; x < data.succeeded.length; x= x+1){
                      anchor = document.createElement('a');
                      anchor.href = 'uploads/'+ data.succeeded[x].file;
                      anchor.innerText = data.succeeded[x].name;
                      anchor.target='_blank';
                      console.log(anchor);
                    succeeded.appendChild(anchor); 
                      
                      var btn = document.createElement('a');
                      btn.href = 'finance_password_editor.php';
                      btn.className = 'btn btn-success pull-right';
                      var t = document.createTextNode("Save Changes");
                      btn.appendChild(t);
                      succeeded.appendChild(btn);
                      
                       $("#pp").load("finance_password_editor.php #pp" );
                  }
                 for(x=0; x < data.failed.length; x=x+1){
                      span = document.createElement('span');
                      span.innerText = data.failed[x].name;
                    failed.appendChild(span); 
                     
                     var mbaton = document.createElement('a');
                     mbaton.href = 'finance_profile.php';
                      mbaton.className = 'btn btn-info pull-right';
                      var itslabel = document.createTextNode("Cancel");
                      mbaton.appendChild(itslabel);
                      failed.appendChild(mbaton);
              }
            uploads.appendChild(succeeded);
            uploads.appendChild(failed); 
          },
              error:function(){
                  console.log('Not working');
              }
          }
          
          );
      });
</script>
  </form>    
</div> </div>
<!--div ya pili inaishiia apa-->
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
<script type="text/javascript">
$('#triggerButton').click(function(e){
    e.preventDefault();
    $('#div1').fadeOut('fast', function(){
        $('#div2').fadeIn('fast');
    });
});
   
$('#triggerlink').click(function(e){
    e.preventDefault();
    $('#div1').fadeOut('fast', function(){
        $('#div2').fadeIn('fast');
    });
});
    
$("#newpassword").on('keyup',function(){ 
var passRegex = /^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/;
 if(($(this).val().length >5) && (passRegex.test($(this).val())) &&   ($(this).val() != $("#currentpassword").val() )){ 
     var newpassok = true;
    $("#checknew").html('<i  class="glyphicon glyphicon-ok text-success"></i>'); }           
  else{
    $("#checknew").html('');
  $('#submitpassword').attr('disabled', true);
  }    
});

$("#confirmpassword").on('keyup',function(){ 
 if(($(this).val() == $("#newpassword").val() ) && $(this).val().length !=0 && ($(this).val().length !=0)){
     var confirmed = true;
    $("#checkconfirm").html('<i  class="glyphicon glyphicon-ok text-success"></i>'); 
 if( (confirmed = true) && (newpassok = true) && ($("#currentpassword").val().length >1 )){
   $('#submitpassword').attr('disabled', false);     
    }
    else{ $('#submitpassword').attr('disabled', true); }
 
 
 }           
  else{
    $("#checkconfirm").html('');
  $('#submitpassword').attr('disabled', true);
  }
});

$( "#confirmpassword" ).blur(function() {
  if(($(this).val() == $("#newpassword").val()) && $("#currentpassword").val().length !=0 && (("#newpassword").val().length !=0)){
    $('#submitpassword').attr('disabled', false); } 
    else{
     $('#submitpassword').attr('disabled', true);
     $("#checkconfirm").html('');
    } 
  }).trigger( "blur" );
 
 /*$("#currentpassword").on('keyup',function(){ 
   $( this ).parent( ".input-group" ).removeClass();
}); */

</script>
<script> 
$(document).ready(function(){
$(document).on("keyup", "div.has-error", function(){
    $(this).removeClass("has-error");
    $( "div.shida" ).fadeOut( "normal" );
});  
 });   
</script>
<script>
    $(document).ready(function(){
        $("#checkcurrent").mouseup(function(){
            $("#currentpassword").attr("type", "password");
        });
        $("#checkcurrent").mousedown(function(){
            $("#currentpassword").attr("type", "text");
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
</body>
</html>
<?php }
else{
    //checking password errors  and unset them
    if(isset($_SESSION['passwordError'])){
 unset($_SESSION['passwordError']);}
if(isset($_SESSION['CurrentPassYouEntered'])){
 unset($_SESSION['CurrentPassYouEntered']);}
if(isset($_SESSION['newpasswordError'])){
 unset($_SESSION['newpasswordError']);}
if(isset($_SESSION['confirmpasswordError'])){
 unset($_SESSION['confirmpasswordError']);}
    
    unset($_SESSION['user']);
    unset($_SESSION['LAST_ACTIVITY']);
    $_SESSION['notloggederror'] = "Kindly log in to proceed!";
    header("location: index.php");
    exit();
}
?>