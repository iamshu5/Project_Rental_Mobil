<?php
require '../../config.php';

$id_perjalanan = $_GET['id'] ?? '';
$cek_perjalanan = mysqli_query($koneksi, "SELECT jarak FROM tabel_perjalanan WHERE id = '$id_perjalanan'");

$delete_tujuan = mysqli_query($koneksi, "DELETE FROM tabel_perjalanan WHERE id = '$id_perjalanan'");
header('Location: data-perjalanan.php');