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

$title = 'Tambah Barang';

include 'layout/header.php';

// cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>";
    }
}

?>
<div class="container mt-5">
    <h1>Tambah Barang</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama barang..." required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah barang..." required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga barang..." required>
        </div>

        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>

    </form>
</div>

<?php include 'layout/footer.php'; ?>