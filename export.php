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
$a= 1;

if (isset($_POST["submitPDF"])) {
    require "export/pdf/fpdf.php";
    require "export/pdf/action.php";
}

if (isset($_POST["submitExcel"])) {
    echo "
    <script>
        alert('Excel');
    </script>";
}

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
    <script type="text/javascript" src="./export/excel/external/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="./export/excel/external/jszip.js"></script>
    <script type="text/javascript" src="./export/excel/external/FileSaver.js"></script>
    <script type="text/javascript" src="./export/excel/scripts/excel-gen.js"></script>
    <script type="text/javascript" src="./export/excel/scripts/demo.page.js"></script>
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
              <a class="nav-link active" href="export.php">Export</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="stat.php">Stat</a>
            </li>
            <li class="nav-item mx-2">
              <button class="btn btn-outline-danger" type="submit" onclick="masuk()">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR AKHIR -->
    <!-- CONTENT AWAL -->
    <div class="container">
        <div class="row mt-5">
            <!-- <div class="col-3"> -->
                <div class="col-1" style="width: 110px;">
                    <form action="" method="POST">
                        <input type="submit" name="submitPDF" class="btn btn-danger" value="Export PDF">
                    </form>
                </div>
                <div class="col-1" style="width: 120px;">
                    <form action="" method="POST">
                        <input type="submit" name="submitExcel2" class="btn btn-success" id="generate-excel-basic" value="Export Excel">
                    </form>
                </div>
            <!-- </div> -->
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <table class="table table-responsive table-bordered table-hover" id="basic_table">
                    <thead class="bg-primary">
                        <tr>
                            <th class='text-center'>No</th>
                            <th class='text-center'>Judul</th>
                            <th class='text-center'>Kategori</th>
                            <th class='text-center'>Tanggal</th>
                            <th class='text-center'>View</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php foreach ($mahasiswa as $row) :?>
                            <?php settype($row['view'], "string"); ?>
                            <?php echo 
                                "
                                <tr>
                                <td class='text-center'>{$a}</td>
                                <td>{$row['judul']}</td>
                                <td>{$row['kat']}</td>
                                <td class='text-center'>{$row['tanggal']}</td>
                                <td class='text-center'>".strval($row['view'])."</td>
                                </tr>
                                "; 
                            ?>
                            <?php $a++; ?>
                        <?php  endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row d-flex justify-content-center"></div>
    </div>
    <div class="container mt-5 mb-5">
      <div>
        <div class="row justify-content-center align-content-center" id="postContainer">
        </div>
      </div>
    </div>
    <!-- CONTENT AKHIR -->
    
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      function masuk() {
        window.location.href = "index.php";
      }
    </script>
  </body>
</html>
