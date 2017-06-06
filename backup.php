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
     header("location: adminprofile.php");    
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
 
    }
}
// username 
// Email
if(isset($_POST['submitnewEmail'])){
    $newEmail = ($_POST['newEmail']);
    
    
    $q = mysqli_query($conn,"Select email from users WHERE BINARY email='$newEmail'");
    $exists = mysqli_num_rows($q); 
    if($exists > 0 && $newEmail != $_SESSION['myemail'] ){
   $_SESSION['EmailExistsError'] = "This Email Address  Exists !"; 
   $_SESSION['EmailYouEntered'] = $newEmail;
     header("location: adminprofile.php");    
    }
    
    
    else{
        if($newEmail == $_SESSION['myemail']){
          $_SESSION['EmailExistsError'] = "This is currently your email!";
         $_SESSION['EmailYouEntered'] = $newEmail;
        }
        
        
        elseif(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['EmailExistsError'] = "Invalid email format";
         $_SESSION['EmailYouEntered'] = $newEmail;   
        }
        
        
        else{
    $useridQuery = mysqli_query($conn,"Select userId from users WHERE BINARY email ='{$_SESSION['myemail']}'");
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
 
    }
}
// Email


?>