<?php 
  include("../Product.php");

  $id = $_GET['id'];
  $productObject = new product();
  $product = $productObject->readSingle($id);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include("menu.php"); ?>

    <div class="container">
      
      <div class="d-flex justify-content-center align-items-center">
        
        <form action="./action.php" method="POST" style="width: 30vw;">
          <h2 class="mt-4">Update Product</h2>
          <div class="mb-3 mt-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $product['name'] ?>" >
          </div>
          <div class="mb-3 mt-4">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="<?php echo $product['price'] ?>">
          </div>
          <div class="mb-3 mt-4">
            <label class="form-label">Image</label>
            <input type="text" class="form-control" name="image" value="<?php echo $product['image'] ?>">
          </div>

          <div class="mb-3 mt-4">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="4" name="desc"><?php echo $product['desc'] ?>"</textarea>
          </div>

          <input type="hidden" name="id" value="<?php echo $product['id'] ?> ">
          
          <button type="submit" class="btn btn-primary" name="p_update">Update</button>
        </form>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>