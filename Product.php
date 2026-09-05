<?php
require_once __DIR__ . '/db.php';

class Product {

  function read(){
    $db = getDbConnection();

    $query = "SELECT * FROM `products` ";
    $response = mysqli_query($db, $query);
    $result = mysqli_fetch_all($response, MYSQLI_ASSOC);

    mysqli_close($db);

    return $result;
  }

  function create($data){

    $name = $data['name'];
    $desc = $data['desc'];
    $price = $data['price'];
    $image = $data['image'];

    $db = getDbConnection();

    $query = "INSERT INTO `products` (`name`, `desc`, `price`, `image`)
              VALUES('$name', '$desc', $price, '$image')";
    $response = mysqli_query($db, $query);

    if(!$response){
      echo "query error";
    }else{
      header("Location: ./products.php");
    }

    mysqli_close($db);
  }

  function readSingle($id){
    $db = getDbConnection();

    $query = "SELECT * FROM `products` WHERE `id` = '$id' ";
    $response = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($response);

    mysqli_close($db);

    return $result;
  }

  function update($data){

    $id = $data['id'];
    $name = $data['name'];
    $desc = $data['desc'];
    $price = $data['price'];
    $image = $data['image'];

    $db = getDbConnection();

    $query = " UPDATE `products` SET `name`='$name',`desc`='$desc',`price`='$price',`image`='$image' WHERE `id` = '$id' ";
    $response = mysqli_query($db, $query);

    if(!$response){
      echo "query error";
    }else{
      header("Location: ./products.php");
    }

    mysqli_close($db);
  }

  function delete($data){
    $id = $data['id'];

    $db = getDbConnection();

    $query = "DELETE FROM `products` WHERE `id` = '$id' ";
    mysqli_query($db, $query);
    mysqli_close($db);

    header("Location: ./products.php");
  }

}