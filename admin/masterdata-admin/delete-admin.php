<?php
require '../../config.php';
$id_akun = $_GET['id'] ?? '';
mysqli_query($koneksi, "DELETE FROM tabel_akun WHERE id = '$id_akun'");
header('Location: data-admin.php');