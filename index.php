<?php include('data.php') ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $home_page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
      .strong-css{
        font-weight: bold
      }
    </style>
  </head>
  <body>
    <?php include('menu.php'); ?>

  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="<?php echo $carousel_img1; ?>" class="d-block w-100" alt="Porsche 911 991 Turbo S">
      </div>
      <div class="carousel-item">
          <img src="<?php echo $carousel_img2; ?>" class="d-block w-100" alt="Porsche 911 GT3RS">
      </div>
      <div class="carousel-item">
          <img src="<?php echo $carousel_img3; ?>" class="d-block w-100" alt="Porsche Carrera GT">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button strong-css" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Porsche 911 991 Turbo S
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        The Porsche 911 991 Turbo S is a benchmark of all-weather performance. Its twin-turbo flat-six delivers explosive acceleration, yet the car maintains everyday comfort and stability thanks to advanced AWD and active suspension. Blending luxury with razor-sharp precision, the 991 Turbo S stands as a supercar you can drive daily, offering immense speed without sacrificing refinement.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed strong-css" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Porsche 911 992 GT3RS
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        The Porsche 911 GT3 RS 992.1 is the ultimate expression of track performance in the 911 family. Featuring extreme aerodynamics, a high-revving naturally aspirated engine, and chassis tuning inspired by racing, it delivers unmatched precision and cornering ability. Every detail serves speed and control, making the 992.1 GT3 RS a road-legal machine built to dominate circuits.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed strong-css" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Porsche Carerra GT
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        The Porsche Carrera GT is a masterpiece of analog engineering, defined by its roaring naturally aspirated V10 and uncompromising driving dynamics. Built from carbon fiber and motorsport technology, it demands skill and respect from the driver. With its raw manual gearbox and track-bred spirit, the Carrera GT remains one of the most iconic and exhilarating supercars ever created.
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>