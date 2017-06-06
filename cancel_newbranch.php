<?php
session_start();
      if(isset($_SESSION['Error'])){
        unset($_SESSION['Error']); }
      if(isset($_SESSION['BranchYouEntered'])){
        unset($_SESSION['BranchYouEntered']); }
      if(isset($_SESSION['branchExistsError'])){
        unset($_SESSION['branchExistsError']); } 
      if(isset($_SESSION['AddressYouEntered'])){
        unset($_SESSION['AddressYouEntered']); }  
      if(isset($_SESSION['CityYouEntered'])){
        unset($_SESSION['CityYouEntered']); }  
      if(isset($_SESSION['CountryYouEntered'])){
        unset($_SESSION['CountryYouEntered']); }  
      if(isset($_SESSION['PostalYouEntered'])){
        unset($_SESSION['PostalYouEntered']); }  
      if(isset($_SESSION['PhoneYouEntered'])){
        unset($_SESSION['PhoneYouEntered']); } 
header("location: newbranch.php"); exit();
?>