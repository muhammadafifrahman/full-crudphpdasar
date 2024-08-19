<?php

// fungsi menampilkan data dari database
function select($query)
{

    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data barang
function create_barang($POST)
{
    global $db;

    $nama    = strip_tags($POST['nama']);
    $jumlah  = strip_tags($POST['jumlah']);
    $harga   = strip_tags($POST['harga']);
    $barcode = rand(100000, 999999);

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang
function update_barang($POST)
{
    global $db;

    $id_barang  = $POST['id_barang'];
    $nama       = strip_tags($POST['nama']);
    $jumlah     = strip_tags($POST['jumlah']);
    $harga      = strip_tags($POST['harga']);

    // query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = '$id_barang'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambahkan data mahasiswa
function create_mahasiswa($POST)
{
    global $db;

    // htmlspecialchar/strip_tags untuk $nama terhidar dari serangan XSS
    $nama     = strip_tags($POST['nama']);
    $prodi    = strip_tags($POST['prodi']);
    $jk       = strip_tags($POST['jk']);
    $telepon  = strip_tags($POST['telepon']);
    $alamat   = $POST['alamat'];
    $email    = strip_tags($POST['email']);
    $foto     = strip_tags(upload_file());

    // check upload foto
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data mahasiswa
function update_mahasiswa($POST)
{
    global $db;

    $id_mahasiswa = strip_tags($POST['id_mahasiswa']);
    $nama         = strip_tags($POST['nama']);
    $prodi        = strip_tags($POST['prodi']);
    $jk           = strip_tags($POST['jk']);
    $telepon      = strip_tags($POST['telepon']);
    $alamat       = $POST['alamat'];
    $email        = strip_tags($POST['email']);
    $fotoLama     = strip_tags($POST['fotoLama']);

    // check upload foto baru atau tidak
    // memilih foto lama
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        // memilih foto baru
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengupload file
function upload_file()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // generate name file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'assets/img/' .  $namaFileBaru);
    return $namaFileBaru;
}

// fungsi menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // ambil foto sesuai data dipilih
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

    // hapus berkas foto
    unlink("assets/img/" . $foto['foto']);

    // query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi tambah akun
function create_akun($POST)
{
    global $db;

    $nama      = strip_tags($POST['nama']);
    $username  = strip_tags($POST['username']);
    $email     = strip_tags($POST['email']);
    $password  = strip_tags($POST['password']);
    $level     = strip_tags($POST['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah akun
function update_akun($POST)
{
    global $db;

    $id_akun   = strip_tags($POST['id_akun']);
    $nama      = strip_tags($POST['nama']);
    $username  = strip_tags($POST['username']);
    $email     = strip_tags($POST['email']);
    $password  = strip_tags($POST['password']);
    $level     = strip_tags($POST['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    // query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = '$id_akun'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
