<?php

session_start();

// membatasi halaman login supaya login dulu sebelum masuk ke halaman berikutnya 
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('login dulu dong');
            document.location.href = 'login.php';
        </script>";
    exit;
}

include 'config/app.php';

// menerima id akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun Berhasil Dihapus');
            document.location.href = 'crud-modal.php';
        </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal Dihapus');
            document.location.href = 'crud-modal.php';
        </script>";
}
