<?php 
  include("./Product.php");

  $productObject = new Product();
  $all_data = $productObject->read();
?>

<?php include('data.php') ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $loop_page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
      .container{
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
      }


      .card-text-price{
        color: red;
        font-size: 16px
      }

      .button-css{
        background: transparent;
        border-radius: 20px;
        border: 2px solid #165ec2ff;
        color: black
      }
    </style>
  </head>
  <body>
    <?php include('menu.php'); ?>
    <div class="container">
      <?php foreach($all_data as $value){?>
        <div class="card" style="width: 18rem;">
        <img src="<?php echo $value["image"]; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $value["name"]; ?></h5>
          <p class="card-text"> <?php echo substr($value["desc"], 0, 50);?> </p>
          <p class="card-text-price"> <strong>Price: $<?php echo $value["price"];?> </strong> </p>

          <a href="single.php?id=<?php echo $value['id'];?>" class="btn btn-primary button-css">See more</a>
        </div>
        </div>
      <?php } ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>