

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Album</title>
  <meta name="description" content="Wave is a Bootstrap 5 One Page Template.">


  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Satisfy&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="Public/upload.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#bsb-tpl-navbar" data-bs-smooth-scroll="true" tabindex="0">

  <section id="scrollspyHero" class="bsb-hero-2 bsb-tpl-bg-blue py-5 py-xl-8 py-xxl-10">
    <div class="container overflow-hidden">
      <div class="row gy-3 gy-lg-0 align-items-lg-center justify-content-lg-between">
        <div class="col-12 col-lg-6 order-1 order-lg-0">
          <h1 class="display-3 fw-bolder mb-3">A gallery that tells <br><mark class="bsb-tpl-highlight bsb-tpl-highlight-blue"><span class="bsb-tpl-font-hw display-2 text-accent fw-normal">our story</span></mark>  one image at a time.</h1>
          <p class="fs-4 mb-5">Dive into memories and inspiration with our latest photo album.</p>
          <div class="d-grid gap-2 d-sm-flex">
            <form action="view.php" method="get" style="display:inline;">
            <button type="submit" href="view.php" class="btn btn-primary bsb-btn-3xl rounded-pill">View Album</button>
            </form>
            <form action="uploads.php" method="get" style="display:inline;">
            <button type="submit" href="uploads.php"class="btn btn-outline-primary bsb-btn-3xl rounded-pill">Upload Photos</button>
            </form>
          </div>
        </div>
        <div class="col-12 col-lg-5 text-center">
          <img class="img-fluid" loading="lazy" src="Public/Images/hero-home.webp" alt="" style="-webkit-mask-image: url(Public/Images/hero-home.webp); mask-image: url(Public/Images/hero-blob-1.svg);">
        </div>
      </div>
    </div>
  </section>
</body>

</html>
