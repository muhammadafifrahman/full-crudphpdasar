<?php

include 'config/app.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css" rel="stylesheet">

    <title><?= $title; ?></title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">CRUD PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <!-- munculkan saat login admin dan barang -->
                        <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Barang</a>
                            </li>
                        <?php endif; ?>

                        <!-- munculkan saat login admin dan mahasiswa -->
                        <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="crud-modal.php">Akun</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin keluar ?')">Keluar</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <a class="navbar-brand" href="#"><?= $_SESSION['nama']; ?></a>
                </div>
            </div>
        </nav>
    </div>