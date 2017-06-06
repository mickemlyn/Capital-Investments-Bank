<?php
    session_start();
if(isset($_SESSION['UsernameExistsError'])){
 unset($_SESSION['UsernameExistsError']);   
 unset($_SESSION['UsernameYouEntered']);   
}
if(isset($_SESSION['EmailExistsError'])){
 unset($_SESSION['EmailExistsError']);   
 unset($_SESSION['EmailYouEntered']);   
}
if(isset($_SESSION['phoneError'])){
 unset($_SESSION['phoneError']);   
 unset($_SESSION['PhoneYouEntered']);   
}
if(isset($_SESSION['lineError'])){
 unset($_SESSION['lineError']);   
 unset($_SESSION['LineYouEntered']);   
}
if(isset($_SESSION['branchError'])){
 unset($_SESSION['branchError']);   
 unset($_SESSION['BranchYouEntered']);   
}
if(isset($_SESSION['bioError'])){
 unset($_SESSION['bioError']);   
 unset($_SESSION['BioYouEntered']);   
}
//Set redirect functions
if(isset($_SESSION['myuserlevel']) && ($_SESSION['myuserlevel']==1)){
header("location: pro_profile.php"); exit();   
}
elseif(isset($_SESSION['myuserlevel']) && ($_SESSION['myuserlevel']==2)){
header("location: adminprofile.php"); exit();   
}
elseif(isset($_SESSION['myuserlevel']) && ($_SESSION['myuserlevel']==3)){
header("location: supplier_profile.php"); exit();   
}
elseif(isset($_SESSION['myuserlevel']) && ($_SESSION['myuserlevel']==4)){
header("location: approver_profile.php"); exit();   
}
elseif(isset($_SESSION['myuserlevel']) && ($_SESSION['myuserlevel']==5)){
header("location: finance_profile.php"); exit();   
}

?>