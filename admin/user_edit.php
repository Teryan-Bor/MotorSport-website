<?php 
  include("../User.php");

  $id = $_GET['id'];
  $userObject = new User();
  $user = $userObject->read_single($id);
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

    <form action="./action.php" method="POST" style="margin-top: 100px">
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']?>" >
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']?>" >
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $user['email']?>" >
      </div>

      <div class="mb-3">
        <label class="form-label">Avatar</label>
        <input type="text" class="form-control" name="avatar" value="<?php echo $user['avatar']?>" >
      </div>

      <input type="hidden" name="id" value="<?php echo $user['id'];?>" >
      <button type="submit" class="btn btn-primary" name="u_update">Update</button>
    </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>