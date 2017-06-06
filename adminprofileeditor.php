<?php
session_start();
require 'connections.php';
$newUsername = $newPw = $newUserlevel = $newEmail = "";
// username 
if(isset($_POST['submitnewusername'])){
    $newUsername = ($_POST['newUsername']);
    $q = mysqli_query($conn,"Select username from users WHERE BINARY username='$newUsername'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newUsername != $_SESSION['user'] ){
   $_SESSION['UsernameExistsError'] = "This Username  exists !"; 
   $_SESSION['UsernameYouEntered'] = $newUsername;
     header("location: adminprofile.php"); exit();   
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
    
     $sql = "UPDATE users SET username = '$newUsername' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['user'] = $newUsername;
            
    if(isset($_SESSION['UsernameExistsError'])){ unset($_SESSION['UsernameExistsError']);
    unset($_SESSION['UsernameYouEntered']);
                                           }
     }  
    header("location: adminprofile.php");
 exit();
    }
}
// username 
// Email
if(isset($_POST['submitnewEmail'])){
    $newEmail = ($_POST['newEmail']);
    
if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
     $_SESSION['EmailExistsError'] = "Invalid email format";
     $_SESSION['EmailYouEntered'] = $newEmail;   
     header("location: adminprofile.php"); 
     
    }
elseif($newEmail == $_SESSION['myemail']){
    $_SESSION['EmailExistsError'] = "This is your Current Email!";
     $_SESSION['EmailYouEntered'] = $newEmail;
     header("location: adminprofile.php"); 
    exit();
        }
else{
    $q = mysqli_query($conn,"Select email from users WHERE BINARY email='$newEmail'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newEmail != $_SESSION['myemail'] ){
   $_SESSION['EmailExistsError'] = "This Email Address  Exists !"; 
   $_SESSION['EmailYouEntered'] = $newEmail;     
    } 
    else{
      $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET email = '$newEmail' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['myemail'] = $newEmail;
            
    if(isset($_SESSION['EmailExistsError'])){ unset($_SESSION['EmailExistsError']);
    unset($_SESSION['EmailYouEntered']);
                                           }  
    }
    header("location: adminprofile.php");
 exit();
    }
}
// Email
// phone  number
if(isset($_POST['submitnewPhone'])){
    $newphoneNumber = ($_POST['newPhone']);
    $pattern = '/^[+-]?\d+$/';
if((!preg_match($pattern, $newphoneNumber )) && (strlen($newphoneNumber)!=13)) {
     $_SESSION['phoneError'] = "Invalid Phone number format!";
     $_SESSION['PhoneYouEntered'] = $newphoneNumber ;   
     header("location: adminprofile.php"); 
     
    }
elseif($newphoneNumber == $_SESSION['myphone']){
    $_SESSION['phoneError'] = "This is your Current Phone!";
     $_SESSION['PhoneYouEntered'] = $newphoneNumber;
     header("location: adminprofile.php"); 
    exit();
        }
else{
    $q = mysqli_query($conn,"Select phone from users WHERE phone ='$newphoneNumber'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newphoneNumber != $_SESSION['myphone'] ){
   $_SESSION['phoneError'] = "This Phone Number Exists !"; 
   $_SESSION['PhoneYouEntered'] = $newphoneNumber;     
    } 
    else{
      $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET phone = '$newphoneNumber' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['myphone'] = $newphoneNumber;
            
    if(isset($_SESSION['phoneError'])){ unset($_SESSION['phoneError']);
    unset($_SESSION['PhoneYouEntered']);
                                           }  
    }
    header("location: adminprofile.php");
 exit();
    }
}
// Phone number
// Office Line
if(isset($_POST['submitnewSimu'])){
    $newLine = ($_POST['newSimu']);
if((!filter_var($newLine, FILTER_VALIDATE_INT )) || (strlen($newLine)<3) && (strlen($newLine)>5)){
     $_SESSION['lineError'] = "Invalid Office Line !";
     $_SESSION['LineYouEntered'] = $newLine;   
     header("location: adminprofile.php"); 
     
    }
elseif($newLine == $_SESSION['myline']){
    $_SESSION['lineError'] = "This is your Current Line!";
     $_SESSION['LineYouEntered'] = $newLine;
     header("location: adminprofile.php"); 
    exit();
        }
else{
    $q = mysqli_query($conn,"Select office from users WHERE office ='$newLine'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newLine != $_SESSION['myline'] ){
   $_SESSION['lineError'] = "This Office Line Exists !"; 
   $_SESSION['LineYouEntered'] = $newLine;     
    } 
    else{
      $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET office = '$newLine' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['myline'] = $newLine;
            
    if(isset($_SESSION['lineError'])){ unset($_SESSION['lineError']);
    unset($_SESSION['lineYouEntered']);
                                           }  
    }
    header("location: adminprofile.php");
 exit();
    }
}
// Office line
// Branch
if(isset($_POST['submitBranch'])){
    $branch = $_POST['branches'];   
if($branch == $_SESSION['mybranch']){
    $_SESSION['branchError'] = "This is your Current Branch!";
     $_SESSION['BranchYouEntered'] = $branch;
     header("location: adminprofile.php"); 
    exit();
        }
    else{
      $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET branch = '$branch' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['mybranch'] = $branch;
            
    if(isset($_SESSION['branchError'])){ unset($_SESSION['branchError']);
    unset($_SESSION['BranchYouEntered']); }  
    header("location: adminprofile.php"); exit();
    }
}
// Branch
// Bio
if(isset($_POST['submitBio'])){
    $bio = filter_var($_POST['textbio'], FILTER_SANITIZE_STRING);
if($bio == $_SESSION['mybio']){
    $_SESSION['bioError'] = "No Changes!";
     $_SESSION['BioYouEntered'] = $bio;
     header("location: adminprofile.php"); 
    exit();
        }
    else{
      $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY username ='{$_SESSION['user']}'");
    $row = mysqli_fetch_assoc($useridQuery);
    $userid =$row['userId'];
    
     $sql = "UPDATE users SET bio = '$bio' , profileChange = CURRENT_TIMESTAMP WHERE userId = '$userid'";   
     $sqlExec=mysqli_query($conn,$sql); 
     $_SESSION['mybio'] = $bio;
            
    if(isset($_SESSION['bioError'])){ unset($_SESSION['bioError']);
    unset($_SESSION['BioYouEntered']); }  
    header("location: adminprofile.php"); exit();
    }
}
// Bio

?>