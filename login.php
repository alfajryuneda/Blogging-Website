<?php 

require "model/db.php";
// registrasi($_POST) > 0
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan')
              </script>";
    }else{
        echo mysqli_error($conn);
    }
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["pw"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if ( mysqli_num_rows($result) === 1 ) {
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
          header("Location: admin.php");
          exit;
      }
  }

  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style3.css" />
    <title>Kelompok 5</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <h2>Kelompok 5</h2>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="#" method="POST">
          <h1>Buat Akun Halaman</h1>
          <input type="email" id="name" name="email" placeholder="Masukkan email" />
          <input type="password" id="pw" name="password" placeholder="Masukkan password" />
          <!-- <button class="signupBtn"><a href="#" id="signup" style="color: white">Daftar</a></button> -->
          <input type="submit" name="register" class="btn inputBtn text-light" value="Daftar" style="width: 142px;background-color: #82e0aa; border-radius: 20px;">
          <!-- <button id="signup" class="signupBtn">Daftar</button> -->
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="#" method="POST">
          <h1>Masuk Halaman</h1>
          <input type="email" id="userName" name="username" placeholder="Masukkan email" />
          <input type="password" id="userPw" name="pw" placeholder="Masukkan password" />
          <div class="g-recaptcha lebarCap" data-sitekey="6LdnScYcAAAAABvlriuZK4vcKiRHsDrg-LCtpk6P"></div>
          <input type="submit" name="login" class="btn inputBtn text-light" value="Masuk" style="width: 142px;background-color: #82e0aa; border-radius: 20px;">
          <?php if (isset($error)) :?>
          <p style="color: red; font-style: italic;">Username atau password salah</p>
          <?php endif; ?>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Hai, Guys!</h1>
            <p>Bergabunglah dengan kami unntuk tetap terhubung</p>
            <button class="ghost" id="signIn">Masuk</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Guys!</h1>
            <p>Daftar dan bergabunglah dengan kami sekarang</p>
            <button class="ghost" id="signUp">Daftar</button>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p></p>
    </footer>
    <script src="js/app.js"></script>
  </body>
</html>
