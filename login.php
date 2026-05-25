<?php include('data.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $login_page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
      .container{
        padding: 30px;
        border: 2px solid grey;
        border-radius: 20px;
        box-shadow: 2px 4px 5px grey
      }

      .btn-css{
        background: transparent;
        color: black;
        border: 2px inset blue
      }

      .field-css{
        font-weight: bold
      }
    </style>
  </head>
  <body>
    <?php include('menu.php'); ?>

    <div class="container">
      <h2>Login Form</h2>
      <form method="POST" action="action.php" >
        <div class="mb-3 field-css">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3 field-css">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 form-check field-css">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary btn-css" name="login">Log In</button>
      </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>