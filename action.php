<?php 
  include("User.php");

  $userObject = new User();

  if(isset($_POST['register'])) {
    $userObject->create($_POST);
  }

  if(isset($_POST['login'])){
    $userObject->login($_POST);
  }



?>