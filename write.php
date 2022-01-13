<?php 
// echo $waktu;
// var_dump($waktu);
require "model/db.php";
// tambah($_POST) > 0
if (isset($_POST["write"])) {
    if (tambah($_POST) > 0) {
  //     echo "judul : ".$_POST["judul"]."<br>";
  //     echo "kategori : ".$_POST["kategori"]."<br>";
  //     echo "message : ".$_POST["message"]."<br>";
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'admin.php';
            </script>
            ";
        }
  else{
      echo "
      <script>
          alert('Data gagal ditambahkan');
          document.location.href = 'admin.php';
      </script>
      ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/write.css">
    <!-- SummerNote -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- SummerNote -->
    <title>Kelompok 5</title>
    <style>
      .note-editor .dropdown-toggle::after{
        all:unset
      }
      .note-editor .note-dropdown-menu{
        box-sizing: content-box;
      }
      .note-editor .note-modal-footer{
        box-sizing: content-box;
      }
    </style>
  </head>
  <body>
    <!-- NAVBAR AWAL -->
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
              <a class="nav-link active" href="#">Write</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="export.php">Export</a>
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
    <div class="container mt-3">
      <div class="tes bg-light">
        <h5 id="headline" class="m-3 mb-0 mt-0">Write your blog</h5>
        <hr>
        <!-- <div> -->
          <form action="" method="POST" id="form-data" enctype="multipart/form-data">
            <div class="row">
              <div class="col-4">
                <img id="myimg" src="img/add.png" class=""/>
              </div>
              <div class="col-8">
                <div class="row">
                  <div class="col">
                  <input type="file" name="gambar" id="gambar" class="btn btn-secondary " onchange="loadfile(event)" />
                  </div>
                  <div class="col mt-2">
                  <p>['jpg', [jpeg]]</p>
                  </div>
                </div>
                
                <select id="KatBox" class="form-select mt-3" style="max-width: 25%;" name="kategori">
                    <option value="">Kategori</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="javascript">Javascript</option>
                </select>
                <div class="input-group mt-3" style="width: 100%;">
                    <span class="input-group-text" id="basic-addon1">Judul</span>
                    <input type="text" class="form-control" placeholder="Masukkan judul" name="judul" id="JudulBox" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <!-- <input type="text" id="summernote" class="inputanBaru"> -->
              <textarea name="message" id="summernote" cols="30" rows="10"></textarea>
              <!-- <div class="bg-light mt-4" id="note">
                <div id="summernote">
                  
                </div>
              </div> -->
            </div>
            <input type="submit" name="write" class="btn btn-success mt-3" value="PUBLISH" id="write" onclick="sayHi()" >
          </form>
      </div>
    </div>
    
    <script>
      // Summernote
      $("#summernote").summernote({
        placeholder: "Write here . . . ",
        tabsize: 2,
        height: 180,
        toolbar: [
          ["style", ["style"]],
          ["font", ["bold", "underline", "clear"]],
          ['fontsize', ['fontsize']],
          ["color", ["color"]],
          ["para", ["ul", "ol", "paragraph"]],
          ["table", ["table"]],
          ["insert", ["link", "picture", "video"]],
          ["view", ["fullscreen", "codeview", "help"]],
        ],
      });
    </script>
    <script type="text/javascript">
      function loadfile(event) {
        var output = document.getElementById("myimg");
        output.src = URL.createObjectURL(event.target.files[0]);
      }
      function sayHi(){
        // var markup = $("#summernote").summernote("code");
        var markup = document.getElementsByClassName('inputanBaru').value;
        console.log(markup);
      }
      function masuk() {
        window.location.href = "index.php";
      }
      // insert ajax request
      // mirip pengiriman melalui method post manual
      // $("#write").click((e) => {
      //     if ($("#form-data")[0].checkValidity()) {
      //       e.preventDefault();
      //       isi_post = $("#summernote").summernote("code");
      //       $.ajax({
      //         url: "model/db.php",
      //         type: "POST",
      //         data: $("#form-data").serialize() + "&action=insert",
      //         success: function (response) {
      //           alert("Berhasil menambahkan data");
      //         }
      //       });
      //     }
      //   });
    </script>
</html>
