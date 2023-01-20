<?php
require '../../config.php';

$id_mobil = $_GET['id'] ?? '';
$cek_mobil = mysqli_query($koneksi, "SELECT gambar FROM tabel_mobil WHERE id = '$id_mobil'");

if( mysqli_num_rows($cek_mobil) > 0 ) {
    $data_mobil = mysqli_fetch_assoc($cek_mobil);
    @unlink('../../assets/img/mobil/' . $data_mobil['gambar']);

    mysqli_query($koneksi, "DELETE FROM tabel_merk WHERE id_mobil = '$id_mobil'");
}

$delete_mobil = mysqli_query($koneksi, "DELETE FROM tabel_mobil WHERE id = '$id_mobil'");
header('Location: data-mobil.php');