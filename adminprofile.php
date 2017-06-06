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

.content{
        height: auto;
        color: white;
        background-color:#083B4C;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGUlEQVQ4y2NgoBJwoJAedcGoC0ZdMOAuAABF0hABJ/8lyQAAAABJRU5ErkJggg==);
        background-attachment: fixed;
        padding-top: 30px;
    }
    
 .hovv:hover{
     border:4px solid #083B4C; 
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
    /*absolute div - suuccessfade*/
    div.absolute {
    position: absolute;
    width: 550px;
    margin: auto;
     left: 42%;
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
                   <a href="newbranch.php">New Branch</a>
                   
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
            <h6  class="lead pull-right" ><b ><small style="color: white;"> <img src="<?php echo $_SESSION['profilePic'] ?>" class="img-rounded hovv" style="height:45px;"><?php echo $_SESSION['user']; ?></small></b></h6> 
            </div> 
           <?php if(isset($_SESSION['PasswordChangeSuccess'])){ ?> <div class="absolute text-center" id="successfade">
            <div class="alert alert-success alert-dismissable" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Your Password has been Changed
        </div></div><?php } unset($_SESSION['PasswordChangeSuccess']) ?>            
            </div>
  <!-- side nav menu-->
 <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Image</a>
  <a href="#">Username</a>
  <a href="adminpassordeditor.php">Edit Password</a>
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
                        <li class="active"><a href="#" id="triggerlink" title="change profile picture">Profile Pic</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Phone</a></li>
                        <li><a href="adminpassordeditor.php">Password</a></li> 
                        <li class="active">Bio</li>
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
                 <table class="table table-hover table-condensed  table-responsive" id="usernametable">
                    <tr><th>Username</th></tr>
                     
                    <tr><td><?php echo $_SESSION['user'];?> 
                    <a class="a" href="#" title="Edit" data-toggle="collapse" data-target="#chiniyamaji"><span class="glyphicon glyphicon-edit pull-right" aria-hidden="true"> Edit</span></a>    
                    </td></tr>
                     
                    <tr id="chiniyamaji" <?php if(isset($_SESSION['UsernameExistsError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> ><td>
                    <form action="adminprofileeditor.php" method="post" class="form-inline">
                    <div class="form-group <?php if(isset($_SESSION['UsernameExistsError'])){ echo "has-error"; } else{ echo ""; }?> ">
                    <input type="text" class="form-control" name="newUsername" id="newUsername" placeholder="Enter New Username" <?php if(isset($_SESSION['UsernameYouEntered'])){ echo'value="'.$_SESSION['UsernameYouEntered'].'"'; } ?> required></div>
                <?php if(isset($_SESSION['UsernameExistsError'])){?>
                <br>
                        <div class="text-danger">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Error:</span><?php echo
                $_SESSION['UsernameExistsError']; } ?></div>
                    <button type="submit" name="submitnewusername" class="btn btn-default btn-sm">SUBMIT</button>
                   <?php if(isset($_SESSION['UsernameExistsError'])){ ?>
                        <a href="cancel_profileedit.php" title="Cancel" name="cancel" class="btn btn-info btn-sm pull-right">QUIT</a> <?php }?>
                    </form>
                   </td></tr>
                    </table>
                    
                    <table class="table table-hover table-condensed  table-responsive" >
                    <tr> <th>Email</th></tr>
                    <tr><td> <?php echo $_SESSION['myemail']; ?>
                        <a class="b" href="#" title="Edit" data-toggle="collapse" data-target="#dl"><span class="glyphicon glyphicon-edit pull-right" aria-hidden="true"> Edit</span></a>
                        </td></tr>
                        
                         <tr id="dl" <?php if(isset($_SESSION['EmailExistsError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> ><td>
                    <form action="adminprofileeditor.php" method="post" class="form-inline">
                    <div class="form-group <?php if(isset($_SESSION['EmailExistsError'])){ echo "has-error"; } else{ echo ""; }?> ">
                        <input type="email" class="form-control" name="newEmail" id="newEmail" placeholder="Enter New Email Adress" <?php if(isset($_SESSION['EmailYouEntered'])){ echo'value="'.$_SESSION['EmailYouEntered'].'"'; } ?> required></div>
                <?php if(isset($_SESSION['EmailExistsError'])){?>
                <br>
                <div class="text-danger">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Error:</span><?php echo
                $_SESSION['EmailExistsError']; } ?></div>
                <button type="submit" name="submitnewEmail" class="btn btn-default btn-sm">Submit</button>
                <?php if(isset($_SESSION['EmailExistsError'])){ ?>
                        <a href="cancel_profileedit.php" title="Cancel" name="cancel" class="btn btn-info btn-sm pull-right">QUIT</a> <?php }?>
                    </form>
                   </td></tr>
                        
                    </table>
                </div>
                <div class="col-sm-3">
            <table class="table table-hover table-condensed  table-responsive" >
                <tr ><th>Phone</th></tr>
                <tr><td><?php echo $_SESSION['myphone']; ?>
             <a class="c" href="#" title="Edit" data-toggle="collapse" data-target="#phone"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"> Edit</span></a>  
                </td></tr>
                 <tr id="phone" <?php if(isset($_SESSION['phoneError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> ><td>
                <form action="adminprofileeditor.php" method="post">
                <div class="form-group <?php if(isset($_SESSION['phoneError'])){ echo "has-error"; } else{ echo ""; }?> ">
                <input type="text" class="form-control phone" name="newPhone" id="newPhone" maxlength="13" placeholder="Enter Phone Number" <?php if(isset($_SESSION['PhoneYouEntered'])){ echo'value="'.$_SESSION['PhoneYouEntered'].'"'; } else { echo'value="+254"'; } ?> required></div>
                <?php if(isset($_SESSION['phoneError'])){?>
                <div class="text-danger">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Phone Error:</span><?php echo
                $_SESSION['phoneError']; } ?></div>
                <button type="submit" name="submitnewPhone" id="submitnewPhone" class="btn btn-default btn-sm ph" disabled>Submit</button>
                <?php if(isset($_SESSION['phoneError'])){ ?>
                <a href="cancel_profileedit.php" title="Cancel" name="cancel" class="btn btn-info btn-sm pull-right">QUIT</a> <?php }?>
                </form>
                   </td></tr>
            </table>
                    
        <table class="table table-hover table-condensed  table-responsive" >
            <tr><th>Office <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></th></tr>
            <tr><td><?php echo $_SESSION['myline']; ?>
            <a class="d" href="#" title="Edit" data-toggle="collapse" data-target="#simu"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"> Edit</span></a></td></tr>
            
            <tr id="simu" <?php if(isset($_SESSION['lineError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> ><td>
                <form action="adminprofileeditor.php" method="post" class="form-inline">
                <div class="input-group col-xs-6 <?php if(isset($_SESSION['lineError'])){ echo "has-error"; } else{ echo ""; }?> ">
                <input type="text" class="form-control" name="newSimu" id="newSimu" maxlength="5" placeholder="Office line" <?php if(isset($_SESSION['LineYouEntered'])){ echo'value="'.$_SESSION['LineYouEntered'].'"'; } ?> required></div>
                <?php if(isset($_SESSION['lineError'])){?>
                <div class="text-danger">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['lineError']; } ?> </div>
                <button type="submit" name="submitnewSimu" id="submitnewSimu" class="btn btn-default btn-sm ll" disabled>Submit</button>
                <?php if(isset($_SESSION['lineError'])){ ?>
                <a href="cancel_profileedit.php" title="Cancel" name="cancel" class="btn btn-info btn-sm pull-right">QUIT</a> <?php }?>
                </form>
                   </td></tr>
            
            </table>
              </div>
        <div class="col-sm-3">
        <table class="table table-hover table-condensed  table-responsive" >
         <tr><th>Branch</th></tr>
         <tr><td><?php echo $_SESSION['mybranch']; ?>
            <a class="e" href="#" title="Edit" data-toggle="collapse" data-target="#branch"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"> Edit</span></a>   
         </td></tr>
            <tr id="branch" <?php if(isset($_SESSION['branchError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> ><td>
            <form action="adminprofileeditor.php" method="post" class="form-inline">
             <div class="input-group col-xs-8">
              <select class="form-control" id="branches" name="branches" >
                <option <?php if(!isset($_SESSION['BranchYouEntered'])){ echo "selected"; } ?> disabled >Select Branch</option>
                <option value="Capital Branch" <?php if(isset($_SESSION['BranchYouEntered']) && $_SESSION['BranchYouEntered'] == "Capital Branch" ){ echo "selected"; } ?> >Capital Branch</option>
                <option value="Elite Branch" <?php if(isset($_SESSION['BranchYouEntered']) && $_SESSION['BranchYouEntered'] == "Elite Branch" ){ echo "selected"; } ?> >Elite Branch</option>
                <option value="Head Office" <?php if(isset($_SESSION['BranchYouEntered']) && $_SESSION['BranchYouEntered'] == "Head Office" ){ echo "selected"; } ?> >Head Office</option>
                <option value="UpperValley Branch" <?php if(isset($_SESSION['BranchYouEntered']) && $_SESSION['BranchYouEntered'] == "UpperValley Branch" ){ echo "selected"; } ?> >UpperValley Branch</option>  
              </select>
            </div>
            <?php if(isset($_SESSION['branchError'])){?>
            <div class="text-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['branchError']; } ?> </div>
            <button type="submit" name="submitBranch" id="submitBranch" class="btn btn-default btn-sm br" disabled>Submit</button>
            <?php if(isset($_SESSION['branchError'])){ ?>
            <a href="cancel_profileedit.php" title="Cancel" name="cancel" class="btn btn-info btn-sm pull-right">QUIT</a> <?php }?>
            </form></td></tr>
        </table>
        <table class="table table-hover table-condensed  table-responsive" >
            <tr><th colspan="2">Bio</th></tr>
            <tr><td><?php if($_SESSION['mybio'] == null ){ echo "Some personal info comes here. Your Job post and stuff... Click To Add"; } else{ echo $_SESSION['mybio']; } ?> </td>
                <td><a  href="#" class="f" title="Edit" data-toggle="collapse" data-target="#bio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>  </td></tr>
            <tr id="bio" <?php if(isset($_SESSION['bioError'])){ echo ""; } else{ echo 'class = "collapse"'; } ?> >
               <td><div class="panel panel-default">    
            <form action="adminprofileeditor.php" method="post">
                 <div class="form-input <?php if(isset($_SESSION['bioError'])){ echo "has-error"; } ?> ">
                <textarea class="form-control" rows="4" maxlength="140" id="textbio" name="textbio" placeholder="Enter Some Personal Info (Less than 140 characters)"><?php if(isset($_SESSION['BioYouEntered'])){ echo $_SESSION['BioYouEntered']; } ?></textarea>
                </div>
               <div class="panel-footer bg-success" style="padding:2px;">
               <button type="submit" name="submitBio" id="submitBio" class="btn btn-success btn-sm biob" disabled>Submit</button> 
                 <div class="text-success pull-right"> <span id="charsleft"></span> Characters left</div>
  
                <?php if(isset($_SESSION['bioError'])){?>
            <div class="text-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only"> Error:</span><?php echo $_SESSION['bioError']; ?>
            <a href="cancel_profileedit.php" title="Cancel" name="cancel" class=" pull-right lead"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
            </div>
            <?php } ?></form></div></div></td></div>
            </tr>
            </table>    
        </div>
     <!--APA--> </div>
        
    <!--div ya pili-->
    <div id="div2" style="display: none" >
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
 $(document).ready (function(){ 
     $("#successfade").hide().fadeIn('normal');
   $("#successfade").fadeTo(4000, 500).slideUp("slow", function(){
    $("#successfade").slideUp("slow");
                });   
            });

</script>     
<script>
$(document).ready(function(){
  $("#chiniyamaji").on("hide.bs.collapse", function(){
    $(".a").html('<span class="glyphicon glyphicon-edit pull-right"> Edit</span>');
  });
  $("#chiniyamaji").on("show.bs.collapse", function(){
    $(".a").html('<span class="glyphicon glyphicon-collapse-up pull-right"> Close</span>');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#dl").on("hide.bs.collapse", function(){
    $(".b").html('<span class="glyphicon glyphicon-edit pull-right"> Edit</span>');
  });
  $("#dl").on("show.bs.collapse", function(){
    $(".b").html('<span class="glyphicon glyphicon-collapse-up pull-right"> Close</span>');
  });
});
</script> 
  <script>
$(document).ready(function(){
  $("#phone").on("hide.bs.collapse", function(){
    $(".c").html('<span class="glyphicon glyphicon-pencil pull-right"> Edit</span>');
  });
  $("#phone").on("show.bs.collapse", function(){
    $(".c").html('<span class="glyphicon glyphicon-collapse-up pull-right"> Close</span>');
  });
});
</script>
  <script>
$(document).ready(function(){
  $("#simu").on("hide.bs.collapse", function(){
    $(".d").html('<span class="glyphicon glyphicon-pencil pull-right"> Edit</span>');
  });
  $("#simu").on("show.bs.collapse", function(){
    $(".d").html('<span class="glyphicon glyphicon-collapse-up pull-right"> Close</span>');
  });
});
</script>
 <script>
$(document).ready(function(){
  $("#branch").on("hide.bs.collapse", function(){
    $(".e").html('<span class="glyphicon glyphicon-pencil pull-right"> Edit</span>');
  });
  $("#branch").on("show.bs.collapse", function(){
    $(".e").html('<span class="glyphicon glyphicon-collapse-up pull-right"> Close</span>');   
  });
});
</script>
 <script>
$(document).ready(function(){
  $("#bio").on("hide.bs.collapse", function(){
    $(".f").html('<span class="glyphicon glyphicon-pencil pull-right"></span>');
  });
  $("#bio").on("show.bs.collapse", function(){
    $(".f").html('<span class="glyphicon glyphicon-collapse-up pull-right"></span>');   
  });
});
</script>
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
              } } );
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
       
var readOnlyLength = 4;
$('#newPhone').on('keypress, keydown', function(event) {
    if ((event.which != 37 && (event.which != 39))
        && ((this.selectionStart < readOnlyLength)
        || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
        return false; }
});
    
$("#newPhone").on('keyup',function(){
  var regEx = /^[+-]?\d+$/;  
 if(($(this).val().length > 12) && (regEx.test($(this).val()))){
            $('.ph').attr('disabled', false); }           
        else{
            $('.ph').attr('disabled',true);}    
});
   
$("#newSimu").on('keyup',function(){
  var numregEx = /^\d+$/;  
 if(($(this).val().length >3 && $(this).val().length <=5) && (numregEx.test($(this).val()))){
    $('.ll').attr('disabled', false); }           
  else{
    $('.ll').attr('disabled',true);}    
});

$( "select" ).change(function() {
 $( "select option:selected" ).each(function() {
      if( $( this ).text() != "Select Branch" ){
      $('.br').attr('disabled', false);    
      }
     else{ $('.br').attr('disabled',true); }
    });
    }).trigger( "change" );
   
$("#textbio").on('keyup',function(){ 
    var chars = (140 - ($(this).val().length) );
$("#charsleft").text( chars);
 if(($(this).val().length >0) && ($(this).val().length < 141 )){  
    $('.biob').attr('disabled', false); }           
  else{
    $('.biob').attr('disabled',true);}    
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