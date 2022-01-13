<?php 
// header("Refresh:0");
require "model/db.php";

$mahasiswa = query("SELECT * FROM post ORDER BY id DESC");
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
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link href="css/font-awesome.css" rel="stylesheet"> -->
    <title>Kelompok 5</title>
  </head>
  <body>

    <!-- NAVBAR AWAL-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-lg">
        <a class="navbar-brand" href="#">
          <img src="img/logo5.png" alt="" width="50px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="write.html">Write</a>
            </li> -->
            <!-- <li class="nav-item mx-2">
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
    
    <!-- HERO AWAL -->
    <div class="hero-image">
      <div class="hero-text">
        <h1 style="font-size:50px;">Welcome to Our Blog</h1>
        <h3 style="color: #56b48c;">Web <span style="color: #56b48c;">Development</span></h3>
        <br>
        <!-- <button class="btn-lg btn-success">Get Started</button> -->
        <a href="#filter_id"  class="btn-lg btn-success">Get Started</a>
      </div>
    </div>
    <div id="filter_id"></div>
    <!-- HERO AKHIR -->

    <!-- CONTENT AWAL -->
    <div class="container mt-5 mb-5">
      <br>
      <br>
      <div class="filterPost">
        <ul>
          <li class="list activee" data-filter="all">All</li>
          <li class="list" data-filter="html">HTML</li>
          <li class="list" data-filter="css">CSS</li>
          <li class="list" data-filter="javascript">JAVASCRIPT</li>
        </ul>
      </div>
      <div>
        <div class="row justify-content-center align-content-center" id="postContainer">
          <?php foreach ($mahasiswa as $row) :?>
            <?php 
              if ($row["kat"] == "html") {
                echo "
                <div class='card m-1 itemPost html' style='width: 17rem;'> 
                <div class='myImg'>
                  <img src='img/{$row['gambar']}' class='card-img-top w-100 h-100 m-0' alt='...'>
                </div>
                <div class='kat_html m-2'>HTML</div>
                <div class='card-body p-2 pt-0'>
                  <h5 class='card-title mb-0'>{$row['judul']}</h5>
                  <div class='d-flex justify-content-between mb-1'>
                    <span class='card-text tanggal m-0'>{$row['tanggal']}</span>
                    <span class='card-text tanggal m-0'>{$row['view']} views</span>
                  </div>
                  <a href='detailindex.php?id={$row['id']}' class='btn btn-success btn-sm'>Read more</a>
                </div>
                </div>
                ";
              } elseif ($row["kat"] == "css"){
                echo "
                <div class='card m-1 itemPost css' style='width: 17rem;'> 
                <div class='myImg'>
                  <img src='img/{$row['gambar']}' class='card-img-top w-100 h-100 m-0' alt='...'>
                </div>
                <div class='kat_css m-2'>CSS</div>
                <div class='card-body p-2 pt-0'>
                  <h5 class='card-title mb-0'>{$row['judul']}</h5>
                  <div class='d-flex justify-content-between mb-1'>
                    <span class='card-text tanggal m-0'>{$row['tanggal']}</span>
                    <span class='card-text tanggal m-0'>{$row['view']} views</span>
                  </div>
                  <a href='detailindex.php?id={$row['id']}' class='btn btn-success btn-sm'>Read more</a>
                </div>
                </div>
                ";
              } else{
                echo "
                <div class='card m-1 itemPost javascript' style='width: 17rem;'> 
                <div class='myImg'>
                  <img src='img/{$row['gambar']}' class='card-img-top w-100 h-100 m-0' alt='...'>
                </div>
                <div class='kat_javascript m-2'>Javascript</div>
                <div class='card-body p-2 pt-0'>
                  <h5 class='card-title mb-0'>{$row['judul']}</h5>
                  <div class='d-flex justify-content-between mb-1'>
                    <span class='card-text tanggal m-0'>{$row['tanggal']}</span>
                    <span class='card-text tanggal m-0'>{$row['view']} views</span>
                  </div>
                  <a href='detailindex.php?id={$row['id']}' class='btn btn-success btn-sm'>Read more</a>
                </div>
                </div>
                ";
              }
            ?>
          <?php  endforeach;?>
          
        </div>
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
    <!-- CONTENT AKHIR -->
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
      function masuk() {
        window.location.href = "login.php";
      }
    </script>
  </body>
</html>
