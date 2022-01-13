<?php 
$conn = mysqli_connect("localhost", "root", "", "uas_pemweb");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $message = ($data["message"]);
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date('d/m/y H.i.s');

    // upload gambar. me return nama gambar
    $gambar = upload();
    // if ($gambar === false)
    if (!$gambar) {
        return false;
        // Jika false, insertnya tidak dijalankan
    }

    $query = "INSERT INTO post
                VALUES
                ('', '$judul', '$message', '$kategori', '$gambar', '$waktu', 0 )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  
    // cek success or fail adding data
    // var_dump(mysqli_affected_rows($conn));
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
        return false;
        // jika false atau upload gagal. maka tambah juga gagal
    }

    // apakah yang diupload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar paling besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru.= ".";
    $namaFileBaru.= $ekstensiGambar;
    // var_dump($namaFileBaru);
    // die;

    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

    return $namaFileBaru;

    // lolos pengecekan, gambar siap di upload

}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $message = ($data["message"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE post SET
                judul = '$judul', 
                kat = '$kategori',
                isi = '$message',
                gambar = '$gambar'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // return mysqli_error($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM post WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["email"]));
    // untuk memungkinkan tanda kutip pada password
    $password = mysqli_real_escape_string($conn, $data['password']);
    // $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // apakah username sudah ada
    $cek_name = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek_name)) {
        echo "<script>
                alert('User sudah terdaftar');
              </script>";
              return false;

    }

    // cek konfirmasi password
    // $password !== $password2
    if (false) {
        echo "<script>
                alert('Konfirmasi password tidaksesuai!')
              </script>";
        // return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO user VALUES 
             ('', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>