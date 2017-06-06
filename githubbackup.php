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
    <meta charset="utf-8"> 
    <title>Admin Profile</title>
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
 
    
  <link href="navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
  <link rel="stylesheet" href="sidenav/sidenav.css" >
  <link rel="stylesheet" href="hover.css" >
  <link rel="stylesheet" href="uploader/global.css">
    
  <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
  </script>
  <script src="modernizr.js"></script>
  <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  <script src="upload.js"></script>
    
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
     border:5px solid #083B4C; 
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
 </style>
<script src="sidenav/sidenav.js"></script>
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
                <li><a href="admin.php">Home </a></li>
                <li ><a href="#about"> Orders </a></li>
               <li><a href="#">Suppliers</a></li>
                <li class="dropdown"><a href="viewusers.php" class="dropdown">Users <span class="caret"></span> </a>
               <div class="dropdown-content">
                    <a href="adduserform.php" target="_blank">Add User</a>
                    <a href="viewusers.php">View Users</a>
                    <a href="viewusers.php">Update Info</a>
                   <a href="viewusers.php">Delete User</a>
                    </div> </li> 
               <li class="active"><a href="#">Profile</a></li>
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
            <div class="col-sm-8"><h2  class="lead text-center" ><b>ADMIN PROFILE</b></h2></div>
            <div class="col-sm-4" >
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:40px;"></span><?php echo $_SESSION['user']; ?></small></b></h6> 
            </div> </div>
  <!-- side nav menu-->
 <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Image</a>
  <a href="#">Username</a>
  <a href="#">Edit Password</a>
  <a href="#">Email</a>
  <a href="#">Phone</a>
  <a href="#">Bio</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()" style="cursor:pointer; cursor:hand; font-size: 20px;"> <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Menu</span>
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <div class="well">
                <div class="row"> <div class="col-sm-3">
                <p class="lead text-muted"> Profile Picture</p> </div>
                 <div class="col-sm-9">
                     <ol class="breadcrumb">
                        <li class="active"><a href="#">Profile Pic</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Phone</a></li>
                        <li><a href="#">Password</a></li> 
                        <li class="active">Bio</a></li>
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
                <div class="col-sm-3">
                 <table class="table table-hover table-condensed  table-responsive" >
                    <tr> <th>Username</th></tr>
                    <tr> <td><?php echo $_SESSION['user'];?></td></tr>
                    </table>
                    <table class="table table-hover table-condensed  table-responsive" >
                    <tr> <th>Email</th></tr>
                    <tr><td> mickemalonza@cib.co.ke</td></tr>
                    </table>
                </div>
                <div class="col-sm-3">
            <table class="table table-hover table-condensed  table-responsive" >
                <tr ><th>Phone</th></tr>
                <tr><td>+254710533607</td></tr>
            </table>
                    
        <table class="table table-hover table-condensed  table-responsive" >
            <tr><th>Office</th></tr>
            <tr><td>3733 </td></tr>
            </table>
              </div>
        <div class="col-sm-3">
        <table class="table table-hover table-condensed  table-responsive" >
         <tr><th>Branch</th></tr>
         <tr><td>Capital Branch</td></tr>
        </table>           
        <table class="table table-hover table-condensed  table-responsive" >
            <tr><th>Bio</th></tr>
            <tr><td> Some personal info comes here. Your Job post and stuff </td></tr>
            </table>    
        </div>
     <!--APA--> </div>
        
    <!--div ya pili-->
    <div id="div2" style="display: none">
    <div class="col-sm-9">   
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
      <div id="uploads" class="uploads">Uploaded file will appear here: <a href="adminprofile.php" class="btn btn-default pull-right" role="button">Cancel</a></div>
      
      <script>
      document.getElementById('submit').addEventListener('click',function(e){
          e.preventDefault();
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
                      btn.href = 'adminprofile.php';
                      btn.className = 'btn btn-success pull-right';
                      var t = document.createTextNode("Save Changes");
                      btn.appendChild(t);
                      succeeded.appendChild(btn);
                      
                       $("#pp").load("adminprofile.php #pp" );
                  }
                 for(x=0; x < data.failed.length; x=x+1){
                      span = document.createElement('span');
                      span.innerText = data.failed[x].name;
                    failed.appendChild(span); 
                     
                     var mbaton = document.createElement('a');
                     mbaton.href = 'adminprofile.php';
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
           <p>Standard street,</p>
            <p>Nairobi-CBD,</p>
            <p>Kenya</p></div>
        <div  class="col-sm-3"><img src="media/envelope4-green.png" height="20" ><p>info@cib.co.ke</p></div>  
        <div  class="col-sm-3"> <img src="media/telephone65-blue.png"  height="20" ><p><a href="tel://+254710533607"> +254710533607</a></p></div> 
           
           <div  class="col-sm-3" style="background-color:#083B4C;height:150px;">
            <p>
                <i class="fa fa-facebook" aria-hidden="true"  style="font-size:15px;"></i>
                <i class="fa fa-twitter" aria-hidden="true" style="font-size:15px; padding-left:10px;"></i>
                <i class="fa fa-linkedIn" aria-hidden="true" style="font-size:15px; padding-left:10px;"></i>
            </p>
            <p>&copy; <?php echo " ".date("Y"); ?> CIB</p>
           <footer class="pull-right" style="padding-top:100px;">By &copy;Mickemlyn</footer>
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
    
// create the back to top button
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
var amountScrolled = 300;
$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) { $('a.back-to-top').fadeIn('slow'); } 
    else { $('a.back-to-top').fadeOut('slow'); } });

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({ scrollTop: 0 }, 700);
	return false;
});
</script>
  
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