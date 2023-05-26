<?php
require '../../config.php';

$id_pesanan = $_GET['id'] ?? '';

$cek_pesanan = mysqli_query($koneksi, "SELECT foto FROM tabel_pesanan WHERE id = '$id_pesanan'");

mysqli_query($koneksi, "DELETE FROM tabel_pesanan WHERE id = '$id_pesanan'");
header('Location: data-pesanan.php');