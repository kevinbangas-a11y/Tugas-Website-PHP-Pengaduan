<?php
session_cache_limiter('nocache');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    $_SESSION['error'] = "❌ Maaf, Anda harus login dulu.";
    header("Location: login-admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Pengaduan Sarana Sekolah SMK Negeri 1 Palangka Raya</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">

    <style>
        .nav-link {
            background-color: cadetblue;
            margin-right: 10px;
            margin-left: 10px;
            color: white !important;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-muted fw-bold" href="#">Aplikasi Pengaduan Sarana Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="dashboard.php">
                        <i class="fa fa-home"></i> Home
                    </a>

                    <a class="nav-link" aria-current="page" href="?page=kategori">
                        <i class="fa fa-tags"></i> Kategori Pengaduan
                    </a>

                    <a class="nav-link" aria-current="page" href="?page=pengaduan">
                        <i class="fa fa-message"></i> Pengaduan
                    </a>

                    <a class="nav-link" aria-current="page" href="?page=info">
                        <i class="fa fa-info-circle"></i> Informasi Website
                    </a>

                    <a class="nav-link" aria-current="page" href="logout.php">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container bordered shadow-lg w-100 p-5 mt-5 rounded-4">
        <?php
        $page = isset($_GET['page'])?$_GET['page']:'';
        if(file_exists($page.".php")) {
            include ($page.".php");

        } else {
        ?>

        <h4>Selamat Datang, Admin. 👋</h4>
        <p class="text-muted fst-italic">
            Pengelolaan Pengaduan Sarana Sekolah digunakan untuk menerima, memverifikasi, 
            dan menindaklanjuti laporan atas kerusakan dan kendala fisik sekolah secara terstruktur dan 
            terdokumentasi.
        </p>

        <?php } ?>
    </div>
</body>
</html>