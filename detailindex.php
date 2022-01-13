<?php 

require "model/db.php";
$id = $_GET["id"];

$a = "UPDATE post SET view = view + 1 WHERE id = '$id'";
$b = mysqli_query($conn, $a);

$mahasiswa = query("SELECT * FROM post WHERE id = '$id'");
$mahasiswa= $mahasiswa[0];
// $mahasiswa = mysqli_fetch_assoc($conn);
// var_dump($mahasiswa);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/detail.css" />
    <title>Kelompok 5</title>
  </head>
  <body>
    <!-- NAVBAR AWAL -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-lg">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo5.png" alt="" width="50px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="#">Write</a>
            </li>
            <li class="nav-item mx-2">
              <button class="btn btn-outline-success" type="submit" onclick="keluar()">Logout</button>
            </li> -->
            <li class="nav-item mx-2">
              <button class="btn btn-outline-success" type="submit" onclick="masuk()">Login</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR AKHIR -->
    <div class="container mt-5">
      <center>
        <img src="img/<?= $mahasiswa['gambar'];  ?>" id="banner" class="bannerDetail" alt="Loading .." />
      </center>
      <br />
      <h1 id="judul">
          <?= $mahasiswa["judul"];  ?>
      </h1>
      <p id="tgl">
      <?= $mahasiswa["tanggal"];  ?>
      </p>
      <br />
      <div id="isi">
      <?= $mahasiswa["isi"];  ?>
      </div>
    </div>
    <!-- FOOTER AWAL -->
    <div class="bg-light p-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-contact mt-4">
            <h3>Kelompok 5</h3>
            <h4 class="text-success">Pemrograman Web D</h4>
          </div>

          <div class="col-lg-4 col-md-6 footer-links m-2 my-0">
            <h4>Anggota Kelompok</h4>
            <p></p>
            <ol>
              <li><a href="#"></a>Achmad Yuneda Alfajr</li>
              <li><a href="#"></a>Alif Ernanda Putra</li>
              <li><a href="#"></a>Ahmad Dendy Prasongko</li>
            </ol>
          </div>
          
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our University</h4>
            <p>UPN "Veteran Jawa Timur"</p>
            <span><a style="color: #56b48c;" href="https://www.instagram.com/upnveteranjawatimur/"><i class="fab fa-instagram fa-2x"></i></a></span>
            <span><a style="color: #56b48c;" href="https://www.facebook.com/upnveteranjawatimur/"><i class="fab fa-facebook fa-2x"></i></a></span>
            <span><a style="color: #56b48c;" href="https://twitter.com/upnvjt_official"><i class="fab fa-twitter fa-2x"></i></a></span>
          </div>

        </div>
      </div>
    </div>
    <!-- FOOTER AKHIR -->
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="js/detailindex.js"></script>
    <script>
      //   function keluar() {
      //     window.location.href = "index.html";
      //   }
      function masuk() {
        window.location.href = "login.php";
      }
    </script>
  </body>
</html>
