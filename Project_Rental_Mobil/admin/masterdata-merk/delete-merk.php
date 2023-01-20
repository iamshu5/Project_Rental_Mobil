<?php
require '../../config.php';

$id_merk = $_GET['id'] ?? '';
$cek_merk = mysqli_query($koneksi, "SELECT merk FROM tabel_merk WHERE id = '$id_merk'");

$delete_mobil = mysqli_query($koneksi, "DELETE FROM tabel_merk WHERE id = '$id_merk'");
header('Location: data-merk.php');