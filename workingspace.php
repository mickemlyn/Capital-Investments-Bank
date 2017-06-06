<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

 is_numeric intval //check if value is number
     $output = preg_replace( '/[^0-9]/', '', $string );





if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) {
    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
}

?>


  <div class="img">
        <img src="img/jpg/4.jpg" alt="">
        <div class="overlay">
            <a href="#" class="expand">+</a>
            <a class="close-overlay hidden">x</a>
        </div>
    </div>
</div>


 <div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
  <span class="help-block">This is some help text...</span>
</div>


<div class="container">
  <h2>Simple Collapsible</h2>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>
HAVE THE FAITH THT THINGS WILL GET BETTTER. YOUR EXPERIENCES AND FAITH WORK HAND IN HAND. AND EVEN WHEN THINGS ARE NOT GOING THE WAY WE WOULD LIKE THEM TO GO, WE MUST STILL HAVE FAITH. AND WHEN THINGS DO GO RIGHT, WE MUST ALSO HAVE FAITH THAT THINGS ARE GONNA GET EVEN BETTER. 


<script>
$(document).ready(
    function selected(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    // $('input:submit').removeAttr('disabled'); 
                } 
            }
            );
    });</script>

html

<form action="#" method="post">
    <input type="file" name="fileInput" id="fileInput" />
    <input type="submit" value="submit" disabled />
</form>
<div id="result"></div>

echo "Welcome $names!";
$compname = $subformat_$subgame_$subname_$subseason;

echo '<script type="text/javascript">$(document).ready( function(){ $("#quote a").load("display.php?timm='. $tizz .'"); } ); </script>';

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>load demo</title>
  <style>
  body {
    font-size: 12px;
    font-family: Arial;
  }
  </style>
 
<b>Projects:</b>
<ol id="new-projects"></ol>
 
<script>
$( "#new-projects" ).load( "/resources/load.html #projects li" );
</script>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Expand and Collapse with different icons</h2>
    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">
      <span class="glyphicon glyphicon-collapse-down"></span> Open
    </button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>

<script>
$(document).ready(function(){
  $("#demo").on("hide.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-down"></span> Open');
  });
  $("#demo").on("show.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
  });
});
</script>

</body>
</html>
    <a class="a" href="#" title="Edit" data-toggle="collapse" data-target="#chiniyamaji"><span class="glyphicon glyphicon-edit pull-right" aria-hidden="true"> Edit</span></a>
    
    <?
    
if(isset($_POST['submitnewusername'])){
    $newUsername = ($_POST['newUsername']);
    $q = mysqli_query($conn,"Select username from users WHERE BINARY username='$newUsername'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newUsername != $_SESSION['user'] ){
   $_SESSION['UsernameExistsError'] = "This Username  exists !"; 
   $_SESSION['UsernameYouEntered'] = $newUsername;
        
    }
    else{
        if($newUsername == $_SESSION['user']){
          $_SESSION['UsernameExistsError'] = "No Changes to be saved!";
          $_SESSION['UsernameYouEntered'] = $newUsername;  
        
        }
        else{
    $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET username = '$newUsername' , profileChange = CURRENT_TIMESTAMP WHERE BINARY userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['user'] = $newUsername;
            
    if(isset($_SESSION['UsernameExistsError'])){ unset($_SESSION['UsernameExistsError']);
    unset($_SESSION['UsernameYouEntered']);
                                           }
     }    
    }
}
// username 
    ?>
    <input id="field" type="text" value="CAN'T TOUCH THIS!" size="50" />
<script>
JavaScript (jQuery):

var readOnlyLength = $('#field').val().length;

$('#field').on('keypress, keydown', function(event) {
    if ((event.which != 37 && (event.which != 39))
        && ((this.selectionStart < readOnlyLength)
        || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
        return false;
    }
});

    //disable submit button  
    $(document).ready(function(){
    $('.sendButton').attr('disabled',true);
    $('#message').keyup(function(){
        if($(this).val().length !=0)
            $('.sendButton').attr('disabled', false);            
        else
            $('.sendButton').attr('disabled',true);
    })
});
    </script>
    <script>
$(document).ready(function (){
  $("#newPhone").focus(function () {
    if($(this).val().length < 5){
      $('.ph').attr('disabled', 'disabled');
    } else {
      $('.ph').removeAttr('disabled');
    }
  });
});
//length
 

var myLength = $("#newPhone").val().length;
        
        $('input').on('keyup',function(){
      var input = $(this);
      input.next("span").text(input.val().length + " chars");
        });</script>
        <input type="text"> <span></span>

 <script>     
if($("#newPhone").val().length > 5){
            $('.ph').attr('disabled', false); }           
        else{
            $('.ph').attr('disabled',true);} 
  
  var regEx = /^[+-]?\d+$/;
if (regEx.test($("#textBoxID").val()) { 
      // validated ok
} else {
      // didn't validate ok
}
  
 
$("#title").focus(function() {
    console.log('in');
}).blur(function() {
    console.log('out');
});    
    
    $("#newpassword").on('keyup',function()

    $( "#confirmpassword" ).focusout(function() {
  if(($(this).val() == $("#newpassword").val() ) && $("#currentpassword").val().length !=0 ){
    $('#submitpassword').attr('disabled', false); } 
    else{
     $('#submitpassword').attr('disabled', true);   
    } 
  }).trigger( "focusout" );
    </script>
    
    
*******************************************************************
 <form id="AddItemsForm" method="post" name="AddItemsForm" role="form" class="form-horizontal form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="row" style="margin-bottom:10px;">
 <div class="col-xs-6">
                 <div class="input-group col-xs-12 <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo "has-error"; }?>"><span class="input-group-addon">Item Name</span>
                <input class="form-control" type="text" name="itemName" id="itemName" placeholder="Enter Item Name" <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo'value="'.$_SESSION['CurrentPassYouEntered'].'"'; } ?> required> </div>
                <?php if(isset($_SESSION['CurrentPassYouEntered'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Item Name Error:</span><?php echo $_SESSION['passwordError'] ;?></div><?php }  ?>        </div>
 <div class="col-xs-6">
                <div class="input-group col-xs-7 <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo "has-error"; }?>"><span class="input-group-addon">Price( KES)</span>
                <input class="form-control" type="number" name="price" id="price" min="10" max="1000001" placeholder="Item Price In Kshs" <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo'value="'.$_SESSION['CurrentPassYouEntered'].'"'; } ?> required></div>
                <?php if(isset($_SESSION['CurrentPassYouEntered'])){?><div class="text-danger shida"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Price Error:</span><?php echo $_SESSION['passwordError'] ;?></div><?php }  ?>
</div></div>
 <div class="row" style="margin-bottom:6px;">
    <div class="col-xs-6">
                <div class="panel panel-default">
                <textarea style="min-width: 100%" class="form-control" rows="4" name="itemDescription" id="itemDescription" maxlength="300" placeholder="Enter Detailed Item Description( Less than 300 characters)"><?php if(isset($_SESSION['BioYouEntered'])){ echo $_SESSION['BioYouEntered']; } ?></textarea>
                <div class="panel-footer bg-success"> 
                <div class="text-success"> <span id="charsleft"></span> Characters left</div>
                </div></div>
    </div>
    <div class="col-xs-6">
                <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item Category</span>
                <select class="form-control" id="category" name="category" >
                <option selected disabled value="">Select Category</option>
                <?php 
                $sql="SELECT catid,cat FROM itemcategories ORDER BY cat ASC";
                $row=mysqli_query($conn,$sql) or die (mysqli_error($conn));
                while($data=mysqli_fetch_array($row)){
                ?>
                <option value="<?php echo $data["catid"]; ?>"><?php echo $data["cat"]; ?></option> <?php } ?>       

                </select> </div>
                
                 <div class="input-group col-xs-10" style="margin-bottom:10px;"><span class="input-group-addon">Item SubCategory</span>
                 <select class="form-control action" id="subcategory" name="subcategory" >
                <option disabled selected value="">Select SubCategory</option>
                
                </select> </div> 
                    
                <div class="input-group col-xs-10 <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo "has-error"; }?>"><span class="input-group-addon">Model/Brand</span>
                <input class="form-control" type="text" name="brand" id="brand" placeholder="Enter Item Brand or Model" <?php if(isset($_SESSION['CurrentPassYouEntered'])){ echo'value="'.$_SESSION['CurrentPassYouEntered'].'"'; } ?> required> </div>
    </div>
</div></form>
<div class="row" style="margin-bottom:10px;">
    <div id="refreshuploader">
    <div class="col-xs-6 text-muted"> <div class="upload" id="uploaderdiv"> 
            <form action="itemupload.php" method="post" enctype="multipart/form-data" id="upload" class="form-group upload">
            <fieldset>
            <legend class="lead text-muted">Upload Item Image</legend><span class="btn btn-default btn-file">Select Image <input type="file" id="file" name="file[]"> </span>
            <input type="submit" id="submit" name="submit" class="btn btn-info" value="Upload" disabled>
            </fieldset>
            <div class="bar"><span class="bar-fill" id="pb">
            <span class="bar-fill-text" id="pt"></span></span></div><div id="uploads" class="uploads">Uploaded file will appear here: </div></form></div></div>
     </div>
     <div class="col-xs-6"><div style="padding:5px; width:160px; height:160px" class="w3-card-4">
            <div id="refreshimage"  style="width:150px; margin: 0 auto;"><img src="<?php if(isset($_SESSION['currentItemPic'])){ echo $_SESSION['currentItemPic']; } else{ echo "itemimages/default.png";}?>" height="150" title="Uploaded Item Image will appear here"></div></div>
     </div><?php if(isset($_SESSION['currentItemPic'])){
 //LIFE IS LIKE A BEAUTIFUL MELODY. ONLY THE LYRICS ARE  MESSED UP.
     unset($_SESSION['currentItemPic']);}?>
</div>
    <div class="row text-muted">
            <div class="col-xs-6">
            <button type="submit" id="submitNewItem" name="submitNewItem" class="btn btn-success btn-lg btn-block">ADD THIS ITEM</button>
            </div>
            <div class="col-xs-6">
            <button class="btn btn-default btn-lg btn-block" title="Reset Entered Data" onclick="resetFunction()">RESET</button>
            </div>
    </div>
</div>
   <?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "testing");
 $query = "SELECT * FROM tbl_posts ORDER BY post_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["post_title"].'</h3>
  <p>'.$row["post_description"].'</p>
  <p class="text-muted" align="right">By - '.$row["post_author"].'</p>
  <hr />
  ';
 }
}

?>
<script>

$(document).ready(function(){
 
 var limit = 7;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>

1st Floor, Gateway Park, Along Mombasa Road
    Gateway
    P.O. Box 58233