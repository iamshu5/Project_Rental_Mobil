<?php
require '../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../logout.php');
    die;
}

$total_mobil = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM tabel_mobil");
$total_mobil = mysqli_fetch_assoc($total_mobil);

$total_merk = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM tabel_merk");
$total_merk = mysqli_fetch_assoc($total_merk);

$total_pemesan = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM tabel_pemesan");
$total_pemesan = mysqli_fetch_assoc($total_pemesan);

$total_pesanan = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM tabel_pesanan");
$total_pesanan = mysqli_fetch_assoc($total_pesanan);

$isActive = 'dashboard'; 
include 'partials/header.php'; 
?>

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Mobil
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format($total_mobil['total'] ?? 0, 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Merk
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format($total_merk['total'] ?? 0, 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total pemesan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format($total_pemesan['total'] ?? 0, 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pesanan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format($total_pesanan['total'] ?? 0, 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'partials/footer.php'; ?>