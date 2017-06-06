<?php
session_start();
if(isset($_SESSION['Error'])){
    unset($_SESSION['Error']);
if(isset($_SESSION['CatYouEntered'])){
    unset($_SESSION['CatYouEntered']); }
if(isset($_SESSION['catExistsError'])){
    unset($_SESSION['catExistsError']); }
    }
if(isset($_SESSION['subcatError'])){
        unset($_SESSION['subcatError']); 
      if(isset($_SESSION['SubCatYouEntered'])){
        unset($_SESSION['SubCatYouEntered']); }
      if(isset($_SESSION['subcatExistsError'])){
        unset($_SESSION['subcatExistsError']); } 
}  
header("location: categories.php"); exit();
?>