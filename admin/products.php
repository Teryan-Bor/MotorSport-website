<?php 
  include("../Product.php");

  $productObject = new Product();
  $products = $productObject->read();
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
      <table class="table">

        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>

        <tbody>
          <?php 
            foreach($products as $product) {?>
          <tr>
            <th scope="row"> <?php echo $product['id']; ?> </th>
            <td> <?php echo $product['name']; ?></td>
            <td> <?php echo $product['price']; ?></td>
            <td style="display: flex; gap:10px;">
              <a href="./product_edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-primary">EDIT</a>

              <form action="./action.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id'] ?> ">
                <button type="submit" class="btn btn-sm btn-danger" name="p_delete"> DELETE </button>
              </form>
            </td>
          </tr>
          <?php } ?>
          
        </tbody>
      </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>