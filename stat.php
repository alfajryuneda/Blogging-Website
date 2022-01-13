<?php 

require "model/db.php";

$mahasiswa = query("SELECT * FROM post");

$html = query("SELECT sum(view) FROM post WHERE kat = 'html'")[0];
$html = (int)$html["sum(view)"];
// var_dump($html);

$css = query("SELECT sum(view) FROM post WHERE kat = 'css'")[0];
$css = (int)$css["sum(view)"];
// var_dump($css);

$javascript = query("SELECT sum(view) FROM post WHERE kat = 'javascript'")[0];
$javascript = (int)$javascript["sum(view)"];
// var_dump($javascript);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Kelompok 5</title>
  </head>
  <body>

    <!-- NAVBAR AWAL-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-lg">
        <a class="navbar-brand" href="admin.php">
          <img src="img/logo5.png" alt="" width="50px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-2">
              <a class="nav-link " aria-current="page" href="admin.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="write.php">Write</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="export.php">Export</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" href="stat.php">Stat</a>
            </li>
            <li class="nav-item mx-2">
              <button class="btn btn-outline-danger" type="submit" onclick="masuk()">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR AKHIR -->
    <br>
    <div class="d-flex justify-content-center">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Data Statistik Jumlah Total View Per Kategori</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div style="width: 500px" class="p-4" id="coverCanvas">
              <canvas id="myChart"></canvas>
            </div>
          </div>
          <div class="col-6">
            <br>
            <br><br>
            <br><br>
            <div style="width: 500px" class="p-4" id="coverCanvas2">
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!-- CONTENT AWAL -->
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
    <!-- CONTENT AKHIR -->
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      function masuk() {
        window.location.href = "index.php";
      }
      const labels = [
          'HTML',
          'CSS',
          'Javascript',
      ];
      const data = {
          labels: labels,
          datasets: [{
            label: 'My First dataset',
            backgroundColor: ['#eb984e','#85c1e9','#f4d03f' ],
            backgroundColor: ['#eb984e','#85c1e9','#f4d03f' ],
            data: [<?= $html ?>, <?= $css ?>, <?= $javascript ?>],
          }]
      };
      const config = {
        type: 'doughnut',
        data: data,
        options: {}
      };
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

      const labels2 = [
          'HTML',
          'CSS',
          'Javascript',
      ];
      const data2 = {
          labels: labels2,
          datasets: [{
            label: 'Jumlah Total View Per Kategori',
            backgroundColor: ['#eb984e','#85c1e9','#f4d03f' ],
            backgroundColor: ['#eb984e','#85c1e9','#f4d03f' ],
            data: [<?= $html ?>, <?= $css ?>, <?= $javascript ?>],
          }]
      };
      const config2 = {
        type: 'bar',
        data: data2,
        options: {}
      };
      const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
      );
    </script>
  </body>
</html>
