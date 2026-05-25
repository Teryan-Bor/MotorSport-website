<?php 
  include("../Product.php");
  include("../User.php");

  $productObj = new Product();
  $userObj = new User();

  if(isset($_POST['p_create'])){
    $productObj->create($_POST);
  }

  if(isset($_POST['p_update'])){
    $productObj->update($_POST);
  }

  if(isset($_POST['p_delete'])){
    $productObj->delete($_POST);
  }

  if(isset($_POST['u_update'])){
    $userObj->update($_POST);
  }

  if(isset($_POST['u_delete'])){
    $userObj->delete($_POST);
  }
  

?>