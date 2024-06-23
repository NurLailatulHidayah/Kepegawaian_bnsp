<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Responsive Slideshow</title>
  <link rel="stylesheet" href="../assets/css/stylee1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
  <nav>
    <div class="left">
      <img src="../assets/img/logo.jfif" alt="">
    </div>
    <div class="right">
      <!-- <a href="">HOME</a> -->
      <a href="{{ route('login') }}" class="btn btn-primary text-white">Login</a>

    </div>
  </nav>

  <div class="slides">
    <div class="slide">
      <img src="../assets/img/gambar1.jfif" alt="">
    </div>
    <div class="slide">
      <img src="../assets/img/gambar2.jfif" alt="">
    </div>
    <div class="slide">
      <img src="../assets/img/gambar3.jfif" alt="">
    </div>
    <div class="slide">
      <img src="../assets/img/gambar4.jfif" alt="">
    </div>
    <div class="slide">
      <img src="../assets/img/gambar5.jfif" alt="">
    </div>
    <div class="navigation">
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(-1)">&#10095;</a>
    </div>
  </div>

  <script src="../assets/js/scripts.js"></script>
</body>

</html>