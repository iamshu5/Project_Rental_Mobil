<?php 
date_default_timezone_set('Asia/Jakarta');

$id_akun = $_SESSION['login']['id'];
$cek_akun_admin = mysqli_query($koneksi, "SELECT nama FROM tabel_akun WHERE id = '$id_akun'");
$data_akun_admin = mysqli_fetch_assoc($cek_akun_admin);

function monthNumToString($num) {
    switch ($num) {
        case 1:
            return 'Januari';
        case 2:
            return 'Februari';
        case 3:
            return 'Maret';
        case 4:
            return 'April';
        case 5:
            return 'Mei';
        case 6:
            return 'Juni';
        case 7:
            return 'Juli';
        case 8:
            return 'Agustus';
        case 9:
            return 'September';
        case 10:
            return 'Oktober';
        case 11:
            return 'November';
        case 12:
            return 'Desember';
    }
}

$currentClock = date('d') . ' ' . monthNumToString(date('m')) . ' ' . date('Y') . ' ' . date('H:i:s') . ' WIB';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="ILHAM SHUBKHI" content="">

    <link rel="icon" href="/assets/img/ME.jpeg" type="image/x-icon">
    <title> ISHUBKHI OTOMOTIF - ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="<?= URL_WEB ?>assets/css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL_WEB ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= URL_WEB ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= URL_WEB ?>assets/css/style.css">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-text mx-3">Rental Mobil ILHAM SHUBKHI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item <?= $isActive == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/">
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item <?= $isActive == 'masterdata-mobil' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-mobil/data-mobil.php">
                    <span>Masterdata Mobil</span>
                </a>
            </li>

            <li class="nav-item <?= $isActive == 'masterdata-merk' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-merk/data-merk.php">
                    <span>Masterdata Merk</span>
                </a>
            </li>

            <li class="nav-item <?= $isActive == 'masterdata-perjalanan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-perjalanan/data-perjalanan.php">
                    <span>Masterdata Perjalanan</span>
                </a>
            </li>

            <li class="nav-item <?= $isActive == 'masterdata-pemesan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-pemesan/data-pemesan.php">
                    <span>Masterdata Pemesan</span>
                </a>
            </li>

            <li class="nav-item <?= $isActive == 'masterdata-pesanan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-pesanan/data-pesanan.php">
                    <span>Masterdata Pesanan</span>
                </a>
            </li>

            <li class="nav-item <?= $isActive == 'masterdata-admin' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= URL_WEB ?>admin/masterdata-admin/data-admin.php">
                    <span>Masterdata Admin</span>
                </a>
            </li>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">                    
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span class="ml-md-3" id="clock-realtime"><?= $currentClock ?></span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, <?= $data_akun_admin['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="/assets/img/avatar.jpg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= URL_WEB ?>logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">