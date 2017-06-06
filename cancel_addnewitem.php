<?php
session_start();
if(isset($_SESSION['itemDescriptionError'])){ unset($_SESSION['itemDescriptionError']);}
 if(isset($_SESSION['ItemError'])){ unset($_SESSION['ItemError']);}
 if(isset($_SESSION['ItemYouEntered'])){ unset($_SESSION['ItemYouEntered']);}
 if(isset($_SESSION['itemPriceError'])){ unset($_SESSION['itemPriceError']);}
 if(isset($_SESSION['ItemDescriptionYouEntered'])){ unset($_SESSION['ItemDescriptionYouEntered']);}
 if(isset($_SESSION['CatYouEntered'])){ unset($_SESSION['CatYouEntered']);}
 if(isset($_SESSION['PriceYouEntered'])){ unset($_SESSION['PriceYouEntered']);}
 if(isset($_SESSION['BrandYouEntered'])){ unset($_SESSION['BrandYouEntered']);}
 if(isset($_SESSION['itemBrandError'])){ unset($_SESSION['itemBrandError']);}
 if(isset($_SESSION['ItemPicBackend'])){ unset($_SESSION['ItemPicBackend']);}
if(isset($_SESSION['origiPic'])){ unset($_SESSION['origiPic']);}


 if(isset($_SESSION['page'])){
 header("location: ".$_SESSION['page']);
unset($_SESSION['page']); exit();   
 } else{
 header("location: additems.php"); exit();}
?>